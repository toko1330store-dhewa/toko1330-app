<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Berhasil - Toko 1330</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-gray-50 font-sans min-h-screen flex items-center justify-center p-6">

    <div class="bg-white p-8 rounded-2xl shadow-sm text-center w-full max-w-md">
        <!-- Ikon Centang Tosca -->
        <div class="w-20 h-20 bg-teal-100 text-teal-600 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        </div>
        
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Pesanan Berhasil!</h1>
        <p class="text-gray-500 mb-6">Terima kasih, pesanan Anda telah kami terima.</p>
        
        <!-- Kotak Invoice -->
        <div class="bg-gray-50 rounded-lg p-4 mb-6 text-left border">
            <p class="text-sm text-gray-500">Nomor Pesanan</p>
            <p class="font-bold text-gray-800 mb-3">{{ $order->order_number }}</p>
            
            <p class="text-sm text-gray-500">Total Pembayaran</p>
            <p class="font-bold text-teal-600 text-lg">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</p>
        </div>

        <!-- Tombol Aksi -->
        <div class="space-y-3">
            <!-- Tombol Lacak Pesanan (Baru) -->
            <a href="{{ route('track.form') }}" class="block w-full bg-teal-600 text-white font-bold py-3 rounded-full hover:bg-teal-700 transition shadow-lg">
                Lacak Pesanan
            </a>
            <!-- Tombol Kembali -->
            <a href="{{ url('/') }}" class="block w-full bg-gray-100 text-gray-700 font-bold py-3 rounded-full hover:bg-gray-200 transition">
                Kembali ke Beranda
            </a>
        </div>
    </div>

</body>
</html>