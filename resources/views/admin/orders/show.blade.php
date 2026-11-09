<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="flex items-center mb-6">
            <a href="{{ route('admin.orders.index') }}" class="bg-white p-2 rounded-full shadow-sm mr-4 hover:bg-gray-50">
                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h1 class="text-2xl font-bold text-gray-800">Detail Pesanan</h1>
        </div>

        <!-- Notifikasi Sukses -->
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Info Pesanan -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="font-bold text-gray-800 mb-4 border-b pb-2">Info Invoice</h2>
                <div class="space-y-2 text-sm">
                    <p class="flex justify-between"><span class="text-gray-500">No. Invoice:</span> <span class="font-bold">{{ $order->order_number }}</span></p>
                    <p class="flex justify-between"><span class="text-gray-500">Tanggal:</span> <span>{{ $order->created_at->format('d F Y, H:i') }}</span></p>
                    
                    <!-- Form Ubah Status -->
                    <div class="flex justify-between items-center border-t pt-2 mt-2">
                        <span class="text-gray-500">Ubah Status:</span>
                        <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="flex items-center gap-2">
                            @csrf
                            <select name="status" class="border-gray-300 rounded-md text-sm p-1 border focus:ring-teal-500">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="diproses" {{ $order->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="selesai" {{ $order->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                            <button type="submit" class="bg-teal-600 text-white px-3 py-1 rounded-md text-xs font-semibold hover:bg-teal-700 transition">Update</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Info Pengiriman -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="font-bold text-gray-800 mb-4 border-b pb-2">Info Pengiriman</h2>
                <div class="space-y-1 text-sm">
                    <p class="font-bold text-gray-800">{{ $order->name }}</p>
                    <p class="text-gray-600">{{ $order->phone }}</p>
                    <p class="text-gray-600 mt-2">{{ $order->address }}</p>
                    <p class="text-gray-600">Kota: {{ $order->city }}</p>
                </div>
            </div>
        </div>

        <!-- Rincian Produk -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mt-6">
            <h2 class="font-bold text-gray-800 mb-4 border-b pb-2">Produk yang Dibeli</h2>
            <div class="space-y-3">
                @foreach($order->items as $item)
                <div class="flex justify-between items-center text-sm">
                    <div>
                        <p class="font-medium text-gray-800">{{ $item->product_name }}</p>
                        <p class="text-gray-500">{{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                    </div>
                    <p class="font-bold text-gray-800">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</p>
                </div>
                @endforeach
            </div>
            
            <div class="border-t mt-4 pt-4 space-y-2 text-sm">
                <div class="flex justify-between text-gray-600">
                    <span>Subtotal Produk</span>
                    <span>Rp {{ number_format($order->total_amount - $order->shipping_cost, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-gray-600">
                    <span>Ongkos Kirim ({{ $order->city }})</span>
                    <span>Rp {{ number_format($order->shipping_cost, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-lg font-bold text-teal-600 pt-2 border-t">
                    <span>Total Pendapatan</span>
                    <span>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>
    </div>

</body>
</html>