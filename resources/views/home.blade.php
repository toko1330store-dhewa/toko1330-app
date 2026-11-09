<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko 1330 - Belanja Mudah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-serif-custom { font-family: 'Playfair Display', serif; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<!-- Background Utama: Tosca Gelap Kalem (Deep Teal) -->
<body class="bg-[#0b3b36] pb-20 text-[#f4f1ea]">

    <!-- Container Utama -->
    <div class="max-w-md mx-auto bg-[#0b3b36] min-h-screen relative shadow-2xl">

        <!-- HEADER (Logo Tengah, Tulisan di Bawah, Lonceng di Kanan) -->
        <header class="px-6 pt-10 pb-6 sticky top-0 z-50 bg-[#0b3b36] relative flex justify-center items-center">
            
            <!-- Konten Tengah: Logo & Tulisan -->
            <div class="flex flex-col items-center justify-center">
                <img src="{{ asset('images/1330-logo.png') }}" alt="Logo Toko" class="h-12 w-auto object-contain drop-shadow-md mb-2">
                <h1 class="text-xl font-bold tracking-widest text-[#f4f1ea] uppercase">Toko 1330</h1>
            </div>

            <!-- Lonceng Notifikasi (Posisi Absolut di Kanan) -->
            <a href="{{ route('notifications') }}" class="absolute right-6 top-12 p-2 text-[#a8c3b8] hover:text-[#f4f1ea] transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
            </a>
        </header>

        <!-- KONTEN -->
        <main class="px-6 py-2 space-y-8">
            
            <!-- Banner Promo (Gaya Kotak Foto MOYA) -->
            <div class="bg-[#e0c097] rounded-2xl p-5 text-[#0b3b36] relative overflow-hidden shadow-sm flex items-center justify-between">
                <div class="relative z-10 w-2/3">
                    <p class="text-[10px] font-semibold uppercase tracking-widest mb-1 opacity-70">Ceremonial Promo</p>
                    <h2 class="text-lg font-serif-custom font-bold leading-tight mb-2">Diskon 20% Pembelian Pertama</h2>
                    <!-- Tombol Shop Now -->
                    <a href="{{ route('category') }}" class="inline-block bg-[#0b3b36] text-[#f4f1ea] text-[10px] font-semibold px-4 py-2 rounded-md uppercase tracking-wider mt-1 hover:bg-[#1a4f48] transition">Shop Now</a>
                </div>
                <!-- Ornamen Daun Minimalis -->
                <div class="absolute -right-2 -bottom-4 w-24 h-24 opacity-30">
                    <svg viewBox="0 0 100 100" fill="none" stroke="#0b3b36" stroke-width="1.5"><path d="M50 10 C30 30, 10 60, 50 90 C90 60, 70 30, 50 10 Z"></path><path d="M50 10 L50 90"></path></svg>
                </div>
            </div>

            <!-- BRAND SECTION (Gaya Scroll Horizontal MOYA) -->
            <section>
                <div class="flex justify-between items-end mb-4">
                    <h3 class="font-serif-custom text-lg text-[#f4f1ea]">Explore Our Brands</h3>
                    <a href="{{ route('category') }}" class="text-[10px] uppercase tracking-wider text-[#a8c3b8] hover:text-[#f4f1ea]">View All</a>
                </div>
                
                <div class="flex overflow-x-auto gap-4 pb-4 scrollbar-hide snap-x">
                    
                    <!-- Card SITRA -->
                    <a href="{{ route('category', 'sitra') }}" class="snap-start flex-shrink-0 w-24 text-center group">
                        <div class="w-20 h-20 mx-auto bg-[#e0c097] rounded-full flex items-center justify-center overflow-hidden mb-2 p-3 border border-transparent group-hover:border-[#0b3b36] transition">
                            <img src="{{ asset('storage/brands/sitra.png') }}" alt="SITRA" class="w-full h-full object-contain mix-blend-multiply">
                        </div>
                        <h4 class="text-[10px] font-semibold uppercase tracking-wider text-[#f4f1ea]">Sitra</h4>
                        <p class="text-[9px] text-[#a8c3b8] italic mt-0.5">Modest & Modern</p>
                    </a>

                    <!-- Card SHAFAHAT -->
                    <a href="{{ route('category', 'shafahat') }}" class="snap-start flex-shrink-0 w-24 text-center group">
                        <div class="w-20 h-20 mx-auto bg-[#e0c097] rounded-full flex items-center justify-center overflow-hidden mb-2 p-3 border border-transparent group-hover:border-[#0b3b36] transition">
                            <img src="{{ asset('storage/brands/shafahat.png') }}" alt="SHAFAHAT" class="w-full h-full object-contain mix-blend-multiply">
                        </div>
                        <h4 class="text-[10px] font-semibold uppercase tracking-wider text-[#f4f1ea]">Shafahat</h4>
                        <p class="text-[9px] text-[#a8c3b8] italic mt-0.5">Your Story</p>
                    </a>

                    <!-- Card KEI -->
                    <a href="{{ route('category', 'kei') }}" class="snap-start flex-shrink-0 w-24 text-center group">
                        <div class="w-20 h-20 mx-auto bg-[#e0c097] rounded-full flex items-center justify-center overflow-hidden mb-2 p-3 border border-transparent group-hover:border-[#0b3b36] transition">
                            <img src="{{ asset('storage/brands/kei.png') }}" alt="KEI" class="w-full h-full object-contain mix-blend-multiply">
                        </div>
                        <h4 class="text-[10px] font-semibold uppercase tracking-wider text-[#f4f1ea]">Kei</h4>
                        <p class="text-[9px] text-[#a8c3b8] italic mt-0.5">Made with love</p>
                    </a>

                </div>
            </section>

            <!-- PRODUK TERBARU SECTION (Gaya List Minimalis MOYA) -->
            <section>
                <div class="flex justify-between items-end mb-4">
                    <h3 class="font-serif-custom text-lg text-[#f4f1ea]">Latest Collection</h3>
                </div>

                <div class="space-y-4">
                    @forelse($products as $product)
                        <a href="{{ route('product.detail', $product->slug) }}" class="flex items-center gap-4 bg-transparent border-b border-[#2d5c56] pb-4 group">
                            <!-- Gambar Produk -->
                            <div class="w-20 h-24 bg-[#1a4f48] rounded-lg overflow-hidden flex-shrink-0 relative">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover opacity-90 group-hover:scale-105 transition duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-[#a8c3b8] text-[10px]">No Img</div>
                                @endif
                            </div>
                            
                            <!-- Info Produk -->
                            <div class="flex-1 py-1">
                                <p class="text-[9px] font-bold text-[#e0c097] mb-1 uppercase tracking-widest">{{ $product->brand->name ?? 'Brand' }}</p>
                                <h4 class="font-serif-custom text-base text-[#f4f1ea] leading-tight mb-2">{{ $product->name }}</h4>
                                <p class="text-sm font-medium text-[#a8c3b8]">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            </div>

                            <!-- Tombol Tambah Bundar -->
                            <div class="w-8 h-8 rounded-full border border-[#2d5c56] flex items-center justify-center text-[#a8c3b8] group-hover:bg-[#e0c097] group-hover:text-[#0b3b36] group-hover:border-[#e0c097] transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            </div>
                        </a>
                    @empty
                        <div class="text-center py-10 border border-dashed border-[#2d5c56] rounded-xl">
                            <p class="text-[#a8c3b8] text-sm">Belum ada produk yang tersedia.</p>
                        </div>
                    @endforelse
                </div>
            </section>

        </main>

        <!-- PANGGIL NAVIGASI BAWAH -->
        @include('partials.bottom-nav')
    </div>

</body>
</html>