<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    // Menampilkan daftar semua pesanan
    public function index()
    {
        $orders = Order::with('items')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    // Menampilkan detail satu pesanan
    public function show($id)
    {
        $order = Order::with('items')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    // Mengubah status pesanan
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diproses,selesai'
        ]);

        $order = Order::findOrFail($id);
        $order->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui!');
    }
}