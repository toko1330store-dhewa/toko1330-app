<x-app-layout>
    <div class="max-w-md mx-auto bg-gray-50 min-h-screen pb-16">
        <div class="bg-white p-4 shadow-sm flex items-center sticky top-0 z-10">
            <a href="{{ url('/') }}" class="mr-3 text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h1 class="text-lg font-bold text-gray-800">Riwayat Pesanan</h1>
        </div>

        <div class="p-4 space-y-3">
            @forelse($orders as $order)
            <div class="bg-white rounded-lg shadow-sm p-4 border border-gray-100">
                <div class="flex justify-between items-center border-b pb-2 mb-2">
                    <div>
                        <p class="text-xs text-gray-500">{{ $order->created_at->format('d M Y, H:i') }}</p>
                        <p class="font-bold text-sm">{{ $order->order_number }}</p>
                    </div>
                    <span class="text-xs font-semibold px-2 py-1 rounded-full 
                        @if($order->status == 'pending') bg-yellow-100 text-yellow-700 
                        @elseif($order->status == 'diproses') bg-blue-100 text-blue-700
                        @else bg-green-100 text-green-700 @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm font-medium text-gray-800">Total Belanja</p>
                        <p class="text-green-600 font-bold">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</p>
                    </div>
                    <a href="{{ route('orders.show', $order->id) }}" class="text-sm font-semibold text-green-600 border border-green-600 px-3 py-1.5 rounded-md hover:bg-green-50">Detail</a>
                </div>
            </div>
            @empty
            <div class="text-center py-10">
                <p class="text-gray-500">Belum ada riwayat pesanan.</p>
            </div>
            @endforelse
        </div>
    </div>
</x-app-layout>