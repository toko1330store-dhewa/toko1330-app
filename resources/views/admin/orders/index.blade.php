<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pesanan - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-5xl mx-auto">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Pesanan</h1>
            <a href="{{ route('admin.products.index') }}" class="bg-teal-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-teal-700 transition">
                Ke Data Produk
            </a>
        </div>

        <!-- Notifikasi Sukses -->
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel Pesanan -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200 text-gray-600 text-sm">
                            <th class="p-4 font-semibold">No. Invoice</th>
                            <th class="p-4 font-semibold">Tanggal</th>
                            <th class="p-4 font-semibold">Pemesan</th>
                            <th class="p-4 font-semibold">Kota</th>
                            <th class="p-4 font-semibold">Total</th>
                            <th class="p-4 font-semibold">Status</th>
                            <th class="p-4 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        @forelse($orders as $order)
                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                                <td class="p-4 font-bold text-gray-800">{{ $order->order_number }}</td>
                                <td class="p-4 text-gray-600">{{ $order->created_at->format('d M Y, H:i') }}</td>
                                <td class="p-4 text-gray-600">
                                    <span class="font-medium text-gray-800">{{ $order->name }}</span><br>
                                    {{ $order->phone }}
                                </td>
                                <td class="p-4 text-gray-600">{{ $order->city }}</td>
                                <td class="p-4 font-bold text-teal-600">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                                <td class="p-4">
                                    @if($order->status == 'pending')
                                        <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs font-semibold">Pending</span>
                                    @elseif($order->status == 'diproses')
                                        <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-full text-xs font-semibold">Diproses</span>
                                    @else
                                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-semibold">Selesai</span>
                                    @endif
                                </td>
                                <td class="p-4 text-center">
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="inline-block bg-gray-100 text-gray-700 px-3 py-1.5 rounded-md text-xs font-semibold hover:bg-gray-200 transition">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="p-8 text-center text-gray-500">Belum ada pesanan yang masuk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>