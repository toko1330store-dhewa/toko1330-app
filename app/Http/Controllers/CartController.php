<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Menampilkan halaman keranjang
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    // Menambah produk ke keranjang
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        // Jika produk sudah ada di keranjang, tambah quantity-nya
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Jika belum ada, buat data baru di keranjang
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image,
                "brand" => $product->brand->name
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // Menghapus produk dari keranjang
    public function remove(Request $request, $id)
    {
        if($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                $request->session()->put('cart', $cart);
            }
        }
        return redirect()->back()->with('success', 'Produk dihapus dari keranjang.');
    }
}