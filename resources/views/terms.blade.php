<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syarat & Ketentuan - Toko 1330</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } .font-serif-custom { font-family: 'Playfair Display', serif; } </style>
</head>
<body class="bg-[#0b3b36] pb-20 text-[#f4f1ea]">
    <div class="max-w-md mx-auto min-h-screen relative shadow-2xl">
        <header class="px-6 pt-10 pb-4 flex items-center gap-4">
            <a href="{{ route('account') }}" class="text-[#a8c3b8] hover:text-[#f4f1ea]">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h1 class="font-serif-custom text-xl tracking-wider">Syarat & Ketentuan</h1>
        </header>
        <main class="px-6 py-4 space-y-4 text-[#a8c3b8] text-sm leading-relaxed">
            <h2 class="text-[#f4f1ea] font-semibold mb-2">1. Ketentuan Pembelian</h2>
            <p>Pembeli dapat melakukan transaksi sebagai Guest maupun Member. Pastikan data pengiriman diisi dengan benar.</p>
            <h2 class="text-[#f4f1ea] font-semibold mb-2 mt-4">2. Pengembalian Barang</h2>
            <p>Klaim kerusakan atau kesalahan pengiriman maksimal 1x24 jam setelah paket diterima dengan menyertakan video unboxing.</p>
        </main>
        @include('partials.bottom-nav')
    </div>
</body>
</html>