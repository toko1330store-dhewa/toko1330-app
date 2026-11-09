<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - Admin Toko 1330</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-4 md:p-10 font-sans">
    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-md p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Tambah Produk Baru</h1>
            <a href="{{ route('admin.products.index') }}" class="text-sm text-green-600 font-semibold hover:underline">&larr; Kembali</a>
        </div>

        <!-- Tampilkan Error jika ada -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Brand</label>
                    <select name="brand_id" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-green-500 focus:border-green-500" required>
                        <option value="">-- Pilih Brand --</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Kategori</label>
                    <select name="category_id" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-green-500 focus:border-green-500" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-green-500 focus:border-green-500" required placeholder="Contoh: Buku Tulis Spiral 100 Lembar">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
                    <input type="number" name="price" value="{{ old('price') }}" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-green-500 focus:border-green-500" required placeholder="15000">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Stok</label>
                    <input type="number" name="stock" value="{{ old('stock') }}" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-green-500 focus:border-green-500" required placeholder="10">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Berat (Gram)</label>
                    <input type="number" name="weight" value="{{ old('weight') }}" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-green-500 focus:border-green-500" required placeholder="200">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi (Opsional)</label>
                <textarea name="description" rows="3" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-green-500 focus:border-green-500">{{ old('description') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Produk (Opsional)</label>
                <input type="file" name="image" class="w-full border border-gray-300 rounded-lg p-2 bg-gray-50 text-sm">
            </div>

            <button type="submit" class="w-full bg-green-600 text-white font-bold py-3 rounded-lg hover:bg-green-700 transition">
                Simpan Produk
            </button>
        </form>
    </div>
</body>
</html>