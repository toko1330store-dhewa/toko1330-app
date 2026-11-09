<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Toko 1330</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans pb-36">

    <!-- HEADER SEDERHANA -->
    <header class="bg-white sticky top-0 z-50 px-4 py-3 flex items-center shadow-sm">
        <a href="{{ url('/') }}" class="p-2 bg-gray-100 rounded-full mr-3">
            <!-- Icon Panah Kembali -->
            <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        </a>
        <h1 class="text-lg font-bold text-gray-800 truncate">Detail Produk</h1>
    </header>

    <!-- NOTIFIKASI SUKSES (Muncul setelah tambah ke keranjang) -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 mx-4 mt-4 rounded-lg text-sm shadow-sm border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    <!-- GAMBAR PRODUK -->
    <div class="w-full h-80 bg-white flex items-center justify-center overflow-hidden">
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-contain">
        @else
            <span class="text-gray-400">Tanpa Gambar</span>
        @endif
    </div>

    <!-- INFO PRODUK -->
    <div class="bg-white p-4 mt-2 rounded-t-2xl shadow-sm relative -mt-4">
        
        <!-- Badge Brand -->
        <span class="inline-block text-[10px] font-bold text-green-700 bg-green-100 px-2 py-1 rounded uppercase tracking-wider mb-2">
            {{ $product->brand->name }}
        </span>
        
        <h2 class="text-xl font-bold text-gray-800 leading-tight">{{ $product->name }}</h2>
        
        <div class="flex items-end justify-between mt-3">
            <p class="text-2xl font-bold text-green-600">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            <p class="text-sm text-gray-500">Stok: {{ $product->stock }}</p>
        </div>

        <!-- Info Berat & Kategori -->
        <div class="mt-3 flex space-x-4 text-xs text-gray-500 border-t border-b py-2">
            <span>Kategori: {{ $product->category->name }}</span>
            <span>Berat: {{ $product->weight }} gram</span>
        </div>

        <!-- DESKRIPSI -->
        <div class="mt-4">
            <h3 class="font-bold text-gray-800 mb-2">Deskripsi Produk</h3>
            <p class="text-sm text-gray-600 leading-relaxed">
                {{ $product->description ?? 'Belum ada deskripsi untuk produk ini.' }}
            </p>
        </div>
    </div>

    <!-- BOTTOM ACTION (Tombol Beli) -->
    <div class="fixed bottom-16 w-full bg-white border-t border-gray-200 p-4 flex items-center justify-between z-50 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.1)]">
        <div>
            <p class="text-xs text-gray-500">Total Harga</p>
            <p class="text-lg font-bold text-green-600">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
        </div>
        
        <!-- FORM TAMBAH KE KERANJANG -->
        <form action="{{ route('cart.add', $product->id) }}" method="POST">
            @csrf
            <button type="submit" class="bg-green-600 text-white font-bold py-3 px-6 rounded-full hover:bg-green-700 transition shadow-lg flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                Tambah ke Keranjang
            </button>
        </form>
    </div>

    <!-- BOTTOM NAVIGATION (Menu Bawah) -->
    <nav class="fixed bottom-0 w-full bg-white border-t border-gray-200 flex justify-around items-center h-16 z-40">
        <!-- Home -->
        <a href="{{ url('/') }}" class="flex flex-col items-center text-gray-400 hover:text-green-600 transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            <span class="text-[10px] font-medium mt-1">Home</span>
        </a>
        <!-- Kategori -->
        <a href="#" class="flex flex-col items-center text-gray-400 hover:text-green-600 transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            <span class="text-[10px] font-medium mt-1">Kategori</span>
        </a>
        <!-- Keranjang (Sudah terhubung ke halaman cart) -->
        <a href="{{ route('cart.index') }}" class="flex flex-col items-center text-gray-400 hover:text-green-600 transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            <span class="text-[10px] font-medium mt-1">Keranjang</span>
        </a>
        <!-- Akun -->
        <a href="#" class="flex flex-col items-center text-gray-400 hover:text-green-600 transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            <span class="text-[10px] font-medium mt-1">Akun</span>
        </a>
    </nav>

</body>
</html>