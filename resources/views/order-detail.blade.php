<x-app-layout>
    <div class="max-w-md mx-auto bg-gray-50 min-h-screen pb-16">
        <div class="bg-white p-4 shadow-sm flex items-center sticky top-0 z-10">
            <a href="{{ route('orders.index') }}" class="mr-3 text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h1 class="text-lg font-bold text-gray-800">Detail Pesanan</h1>
        </div>

        <div class="p-4 space-y-3">
            <!-- Status & Invoice -->
            <div class="bg-white p-4 rounded-lg shadow-sm text-center">
                <p class="text-sm text-gray-500">Status Pesanan</p>
                <p class="font-bold text-lg text-green-600 uppercase mb-2">{{ $order->status }}</p>
                <p class="text-xs text-gray-500">No. Invoice: <span class="font-bold text-gray-800">{{ $order->order_number }}</span></p>
            </div>

            <!-- Alamat -->
            <div class="bg-white p-4 rounded-lg shadow-sm">
                <h2 class="font-bold text-gray-800 mb-2 border-b pb-2">Info Pengiriman</h2>
                <p class="text-sm text-gray-800 font-semibold">{{ $order->name }}</p>
                <p class="text-sm text-gray-600">{{ $order->phone }}</p>
                <p class="text-sm text-gray-600 mt-1">{{ $order->address }}</p>
                <p class="text-sm text-gray-600">Kota: {{ $order->city }}</p>
            </div>

            <!-- Produk -->
            <div class="bg-white p-4 rounded-lg shadow-sm">
                <h2 class="font-bold text-gray-800 mb-3 border-b pb-2">Produk Dipesan</h2>
                @foreach($order->items as $item)
                <div class="flex justify-between text-sm mb-3">
                    <div>
                        <p class="font-medium text-gray-800">{{ $item->product_name }}</p>
                        <p class="text-gray-500">{{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                    </div>
                    <span class="font-bold">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
                </div>
                @endforeach
            </div>

            <!-- Rincian Biaya -->
            <div class="bg-white p-4 rounded-lg shadow-sm">
                <div class="flex justify-between text-sm mb-2">
                    <span class="text-gray-600">Ongkos Kirim</span>
                    <span class="font-medium">Rp {{ number_format($order->shipping_cost, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-base font-bold text-green-600 border-t pt-2 mt-2">
                    <span>Total Bayar</span>
                    <span>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>