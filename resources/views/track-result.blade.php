<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Lacak Pesanan - Toko 1330</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-gray-50 font-sans min-h-screen pb-20">

    <div class="max-w-md mx-auto p-6">
        
        <!-- Header -->
        <div class="flex items-center mb-6 pt-6">
            <a href="{{ route('track.form') }}" class="bg-white p-2 rounded-full shadow-sm mr-4 hover:bg-gray-50">
                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h1 class="text-xl font-bold text-gray-800">Status Pesanan</h1>
        </div>

        <!-- Kartu Status -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-4">
            <div class="flex justify-between items-center border-b pb-3 mb-3">
                <div>
                    <p class="text-xs text-gray-500">Nomor Invoice</p>
                    <p class="font-bold text-gray-800">{{ $order->order_number }}</p>
                </div>
                @if($order->status == 'pending')
                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-bold uppercase">Pending</span>
                @elseif($order->status == 'diproses')
                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold uppercase">Diproses</span>
                @else
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold uppercase">Selesai</span>
                @endif
            </div>
            
            <div class="text-sm text-gray-600 mb-1">
                <p class="flex justify-between"><span>Tanggal Pesan:</span> <span class="font-medium">{{ $order->created_at->format('d M Y, H:i') }}</span></p>
                <p class="flex justify-between mt-1"><span>Penerima:</span> <span class="font-medium">{{ $order->name }}</span></p>
                <p class="flex justify-between mt-1"><span>Kota Tujuan:</span> <span class="font-medium">{{ $order->city }}</span></p>
            </div>
        </div>

        <!-- Rincian Barang -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <h2 class="font-bold text-gray-800 mb-3 border-b pb-2">Rincian Barang</h2>
            <div class="space-y-2 mb-4">
                @foreach($order->items as $item)
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">{{ $item->quantity }}x {{ $item->product_name }}</span>
                    <span class="font-medium">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
                </div>
                @endforeach
            </div>
            
            <div class="border-t pt-3 flex justify-between font-bold text-lg text-teal-600">
                <span>Total</span>
                <span>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
            </div>
        </div>

    </div>

    <!-- PANGGIL NAVIGASI BAWAH -->
    @include('partials.bottom-nav')

</body>
</html>