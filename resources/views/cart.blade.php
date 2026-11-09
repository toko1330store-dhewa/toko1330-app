<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - Toko 1330</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-serif-custom { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-[#0b3b36] pb-20 text-[#f4f1ea]">
    <div class="max-w-md mx-auto bg-[#0b3b36] min-h-screen relative shadow-2xl flex flex-col">

        <!-- HEADER -->
        <header class="px-6 pt-10 pb-4 flex items-center gap-4">
            <a href="{{ route('home') }}" class="text-[#a8c3b8] hover:text-[#f4f1ea]">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h1 class="font-serif-custom text-xl tracking-wider">Keranjang Belanja</h1>
        </header>

        <!-- KONTEN KOSONG -->
        <main class="flex-1 flex flex-col items-center justify-center px-6">
            <div class="w-24 h-24 mb-6 text-[#2d5c56]">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <h2 class="font-serif-custom text-xl mb-2 text-[#f4f1ea]">Keranjang Anda Masih Kosong</h2>
            <p class="text-[#a8c3b8] text-sm mb-8 text-center">Sepertinya Anda belum menambahkan produk impian Anda.</p>
            
            <a href="{{ route('home') }}" class="bg-[#e0c097] text-[#0b3b36] px-8 py-3 rounded-full font-bold text-sm tracking-wide hover:bg-white transition shadow-lg">
                Mulai Belanja
            </a>
        </main>

        @include('partials.bottom-nav')
    </div>
</body>
</html>