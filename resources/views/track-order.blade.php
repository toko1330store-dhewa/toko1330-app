<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lacak Pesanan - Toko 1330</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-gray-50 font-sans min-h-screen pb-20">

    <div class="max-w-md mx-auto p-6 pt-12">
        <div class="bg-white p-8 rounded-2xl shadow-sm w-full">
            <!-- Header -->
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-teal-100 text-teal-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <h1 class="text-2xl font-bold text-gray-800">Lacak Pesanan</h1>
                <p class="text-sm text-gray-500 mt-2">Masukkan Nomor Invoice Anda untuk melihat status pesanan.</p>
            </div>

            <!-- Notifikasi Error -->
            @if(session('error'))
                <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4 text-sm text-center">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('track.result') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Invoice</label>
                    <input type="text" name="order_number" placeholder="Contoh: INV-GUEST-20261108-0001" required class="w-full border-gray-300 rounded-xl shadow-sm focus:border-teal-500 focus:ring-teal-500 text-sm p-3 border bg-gray-50">
                </div>
                
                <button type="submit" class="w-full bg-teal-600 text-white font-bold py-3 rounded-xl hover:bg-teal-700 transition shadow-lg">
                    Cek Status Pesanan
                </button>
            </form>

            <!-- Tombol Kembali ke Akun -->
            <div class="mt-6 text-center">
                <a href="{{ route('account.index') }}" class="text-sm font-semibold text-gray-500 hover:text-gray-800">Kembali ke Akun</a>
            </div>
        </div>
    </div>

    <!-- PANGGIL NAVIGASI BAWAH -->
    @include('partials.bottom-nav')

</body>
</html>