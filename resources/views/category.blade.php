<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori - Toko 1330</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-serif-custom { font-family: 'Playfair Display', serif; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#0b3b36] pb-20 text-[#f4f1ea]">
    <div class="max-w-md mx-auto bg-[#0b3b36] min-h-screen relative shadow-2xl">

        <!-- HEADER -->
        <header class="px-6 pt-10 pb-4 sticky top-0 z-50 bg-[#0b3b36]">
            <div class="flex items-center gap-4 mb-6">
                <a href="{{ route('home') }}" class="text-[#a8c3b8] hover:text-[#f4f1ea]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                </a>
                <h1 class="font-serif-custom text-xl tracking-wider">Kategori Produk</h1>
            </div>
            
            <!-- Search Bar -->
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-0 text-[#a8c3b8]">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </span>
                <input type="text" placeholder="Cari produk..." class="w-full pl-7 pr-4 py-2 bg-transparent border-b border-[#2d5c56] text-sm text-[#f4f1ea] placeholder-[#a8c3b8] focus:outline-none focus:border-[#e0c097] transition-all italic">
            </div>
        </header>

        <main class="px-6 py-4">
            <!-- Filter Kategori (Pills) -->
            <div class="flex gap-2 overflow-x-auto pb-4 scrollbar-hide mb-4">
                <button class="px-5 py-1.5 rounded-full bg-[#e0c097] text-[#0b3b36] text-xs font-semibold whitespace-nowrap">Semua</button>
                <button class="px-5 py-1.5 rounded-full border border-[#2d5c56] text-[#a8c3b8] text-xs font-semibold whitespace-nowrap hover:border-[#e0c097] hover:text-[#f4f1ea] transition">Buku</button>
                <button class="px-5 py-1.5 rounded-full border border-[#2d5c56] text-[#a8c3b8] text-xs font-semibold whitespace-nowrap hover:border-[#e0c097] hover:text-[#f4f1ea] transition">Aksesoris</button>
            </div>

            <!-- Grid Produk -->
            <div class="grid grid-cols-2 gap-4">
                @forelse($products as $product)
                    <a href="{{ route('product.detail', $product->slug) }}" class="block group">
                        <!-- Gambar -->
                        <div class="aspect-[3/4] bg-[#1a4f48] rounded-xl overflow-hidden mb-3 relative">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500 opacity-90">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-[#a8c3b8] text-xs">No Image</div>
                            @endif
                        </div>
                        <!-- Info -->
                        <div class="px-1">
                            <p class="text-[9px] font-bold text-[#e0c097] mb-1 uppercase tracking-widest">{{ $product->brand->name ?? 'Brand' }}</p>
                            <h4 class="font-serif-custom text-sm text-[#f4f1ea] leading-tight mb-1 line-clamp-1">{{ $product->name }}</h4>
                            <p class="text-xs font-medium text-[#a8c3b8]">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                    </a>
                @empty
                    <div class="col-span-2 text-center py-10 border border-dashed border-[#2d5c56] rounded-xl">
                        <p class="text-[#a8c3b8] text-sm">Belum ada produk di kategori ini.</p>
                    </div>
                @endforelse
            </div>
        </main>
        @include('partials.bottom-nav')
    </div>
</body>
</html>