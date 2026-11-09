<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } .font-serif-custom { font-family: 'Playfair Display', serif; } </style>
</head>
<body class="bg-[#0b3b36] pb-24 text-[#f4f1ea]">
    <div class="max-w-md mx-auto min-h-screen relative shadow-2xl">
        
        <!-- HEADER -->
        <header class="px-6 pt-10 pb-4 flex items-center gap-4 sticky top-0 z-40 bg-[#0b3b36]">
            <a href="{{ route('admin.products.index') }}" class="text-[#a8c3b8] hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h1 class="font-serif-custom text-xl">Tambah Produk</h1>
        </header>

        <main class="px-6 py-4">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                
                <div>
                    <label class="block text-xs text-[#a8c3b8] mb-1">Pilih Brand</label>
                    <select name="brand_id" class="w-full bg-[#1a4f48] border border-[#2d5c56] rounded-lg px-4 py-3 text-sm text-[#f4f1ea] focus:outline-none focus:border-[#e0c097]" required>
                        <option value="">-- Pilih Brand --</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs text-[#a8c3b8] mb-1">Pilih Kategori</label>
                    <select name="category_id" class="w-full bg-[#1a4f48] border border-[#2d5c56] rounded-lg px-4 py-3 text-sm text-[#f4f1ea] focus:outline-none focus:border-[#e0c097]" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs text-[#a8c3b8] mb-1">Nama Produk</label>
                    <input type="text" name="name" class="w-full bg-[#1a4f48] border border-[#2d5c56] rounded-lg px-4 py-3 text-sm text-[#f4f1ea] focus:outline-none focus:border-[#e0c097]" placeholder="Contoh: Buku Shafahat Custom" required>
                </div>

                <div>
                    <label class="block text-xs text-[#a8c3b8] mb-1">Harga (Rp)</label>
                    <input type="number" name="price" class="w-full bg-[#1a4f48] border border-[#2d5c56] rounded-lg px-4 py-3 text-sm text-[#f4f1ea] focus:outline-none focus:border-[#e0c097]" placeholder="15000" required>
                </div>

                <div>
                    <label class="block text-xs text-[#a8c3b8] mb-1">Stok</label>
                    <input type="number" name="stock" class="w-full bg-[#1a4f48] border border-[#2d5c56] rounded-lg px-4 py-3 text-sm text-[#f4f1ea] focus:outline-none focus:border-[#e0c097]" placeholder="10" required>
                </div>

                <div>
                    <label class="block text-xs text-[#a8c3b8] mb-1">Berat (Gram)</label>
                    <input type="number" name="weight" class="w-full bg-[#1a4f48] border border-[#2d5c56] rounded-lg px-4 py-3 text-sm text-[#f4f1ea] focus:outline-none focus:border-[#e0c097]" placeholder="200" required>
                </div>

                <div>
                    <label class="block text-xs text-[#a8c3b8] mb-1">Deskripsi (Opsional)</label>
                    <textarea name="description" rows="3" class="w-full bg-[#1a4f48] border border-[#2d5c56] rounded-lg px-4 py-3 text-sm text-[#f4f1ea] focus:outline-none focus:border-[#e0c097]"></textarea>
                </div>

                <div>
                    <label class="block text-xs text-[#a8c3b8] mb-1">Gambar Produk (Opsional)</label>
                    <input type="file" name="image" class="w-full text-sm text-[#a8c3b8] file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-[#e0c097] file:text-[#0b3b36] hover:file:bg-white transition">
                </div>

                <button type="submit" class="w-full bg-[#e0c097] text-[#0b3b36] font-bold py-3 rounded-xl mt-6 shadow-md hover:bg-white transition">
                    Simpan Produk
                </button>
            </form>
        </main>
    </div>
</body>
</html>