<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } .font-serif-custom { font-family: 'Playfair Display', serif; } </style>
</head>
<body class="bg-[#0b3b36] pb-24 text-[#f4f1ea]">
    
    <div class="max-w-md mx-auto min-h-screen relative shadow-2xl">
        
        <!-- HEADER ADMIN -->
        <header class="px-6 pt-10 pb-4 flex justify-between items-center sticky top-0 z-40 bg-[#0b3b36]">
            <div>
                <p class="text-xs text-[#a8c3b8]">Panel Admin</p>
                <h1 class="font-serif-custom text-xl">Kelola Produk</h1>
            </div>
        </header>

        <!-- DAFTAR PRODUK (Gaya Mobile List) -->
        <main class="px-6 py-2 space-y-4">
            @if(session('success'))
                <div class="bg-green-500/20 border border-green-500 text-green-200 p-3 rounded-lg text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @forelse($products as $product)
                <div class="bg-[#1a4f48] rounded-xl p-4 flex gap-4 border border-[#2d5c56]">
                    <!-- Gambar -->
                    <div class="w-16 h-20 bg-[#0b3b36] rounded-lg overflow-hidden flex-shrink-0">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-[#a8c3b8] text-[10px]">No Img</div>
                        @endif
                    </div>
                    <!-- Info -->
                    <div class="flex-1">
                        <p class="text-[10px] text-[#e0c097] uppercase tracking-widest">{{ $product->brand->name ?? 'Brand' }}</p>
                        <h3 class="text-sm font-semibold text-[#f4f1ea] line-clamp-1">{{ $product->name }}</h3>
                        <p class="text-sm font-medium mt-1">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <p class="text-xs text-[#a8c3b8] mt-1">Stok: {{ $product->stock }}</p>
                    </div>
                    <!-- Tombol Aksi -->
                    <div class="flex flex-col justify-center gap-2">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="text-xs bg-[#e0c097] text-[#0b3b36] px-3 py-1 rounded font-semibold text-center">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin hapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs bg-red-500/20 text-red-300 border border-red-500/50 px-3 py-1 rounded w-full">Hapus</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="text-center py-10 border border-dashed border-[#2d5c56] rounded-xl">
                    <p class="text-[#a8c3b8] text-sm">Belum ada produk.</p>
                </div>
            @endforelse
        </main>

        <!-- Tombol Tambah Produk Melayang (FAB) -->
        <a href="{{ route('admin.products.create') }}" class="fixed bottom-24 right-6 w-14 h-14 bg-[#e0c097] text-[#0b3b36] rounded-full flex items-center justify-center shadow-lg hover:scale-105 transition transform z-50">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        </a>

        @include('partials.admin-bottom-nav')
    </div>
</body>
</html>