<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ShippingCost;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth; // Tambahan untuk deteksi login

class CheckoutController extends Controller
{
    // 1. Menampilkan Halaman Form Checkout
    public function index()
    {
        $cart = session()->get('cart', []);
        if(count($cart) == 0) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja masih kosong!');
        }

        $cities = ShippingCost::all();
        $subtotal = array_sum(array_map(function($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        return view('checkout', compact('cart', 'cities', 'subtotal'));
    }

    // 2. Proses Simpan Pesanan
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'city' => 'required|string',
        ]);

        $cart = session()->get('cart', []);
        if(count($cart) == 0) return redirect()->route('cart.index');

        // Hitung biaya
        $subtotal = array_sum(array_map(function($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));
        
        $shipping = ShippingCost::where('city', $request->city)->first();
        $shipping_cost = $shipping ? $shipping->cost : 30000; 
        $total = $subtotal + $shipping_cost;

        // ==========================================
        // LOGIKA FORMAT INVOICE BARU
        // ==========================================
        
        // 1. Tentukan Jenis User (Gunakan guard member)
        if (Auth::guard('member')->check()) {
            // Jika member login, ambil nama depan dari username
            $username = Auth::guard('member')->user()->username;
            $jenis_user = strtoupper($username);
        } else {
            // Jika Guest Checkout
            $jenis_user = 'GUEST';
        }

        // 2. Hitung urutan pesanan hari ini
        $urutan_hari_ini = Order::whereDate('created_at', date('Y-m-d'))->count();
        $urutan_pemesan = str_pad($urutan_hari_ini + 1, 4, '0', STR_PAD_LEFT); // Hasil: 0001, 0002

        // 3. Susun Nomor Invoice
        $order_number = 'INV-' . $jenis_user . '-' . date('Ymd') . '-' . $urutan_pemesan;

        // ==========================================

        // Simpan ke tabel orders
        $order = Order::create([
            // Akan bernilai ID member jika login, dan null jika guest
            'user_id' => Auth::guard('member')->check() ? Auth::guard('member')->id() : null, 
            'order_number' => $order_number,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'shipping_cost' => $shipping_cost,
            'total_amount' => $total,
            'status' => 'pending'
        ]);

        // Simpan ke tabel order_items
        foreach($cart as $id => $details) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'product_name' => $details['name'],
                'price' => $details['price'],
                'quantity' => $details['quantity']
            ]);

            // Kurangi stok produk otomatis
            $product = Product::find($id);
            if($product) {
                $product->decrement('stock', $details['quantity']);
            }
        }

        // Bersihkan keranjang
        session()->forget('cart');

        return redirect()->route('checkout.success', $order->id);
    }

    // 3. Halaman Sukses Checkout
    public function success($id)
    {
        $order = Order::findOrFail($id);
        return view('checkout-success', compact('order'));
    }

    // 6. Halaman Form Lacak Pesanan
    public function trackForm()
    {
        return view('track-order');
    }

    // 7. Proses Pencarian Pesanan
    public function trackResult(Request $request)
    {
        $request->validate([
            'order_number' => 'required|string'
        ]);

        $order = Order::with('items')->where('order_number', $request->order_number)->first();

        if (!$order) {
            return redirect()->back()->with('error', 'Nomor Invoice tidak ditemukan. Pastikan penulisan sudah benar.');
        }

        return view('track-result', compact('order'));
    }
}