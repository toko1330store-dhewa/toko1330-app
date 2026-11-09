<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans min-h-screen pb-24"> <!-- pb-24 ditambahkan agar tidak tertutup nav -->

    <!-- Sidebar & Konten Utama tetap di sini -->
    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-md p-6 mt-10">
        
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Produk</h1>
            <a href="{{ route('admin.products.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-green-700">+ Tambah Produk</a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="px-4 py-3">Gambar</th>
                        <th class="px-4 py-3">Nama Produk</th>
                        <th class="px-4 py-3">Brand</th>
                        <th class="px-4 py-3">Harga</th>
                        <th class="px-4 py-3">Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-4 py-3">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" class="w-12 h-12 object-cover rounded">
                            @else
                                <div class="w-12 h-12 bg-gray-200 rounded flex items-center justify-center text-[10px]">No Img</div>
                            @endif
                        </td>
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $product->name }}</td>
                        <td class="px-4 py-3">{{ $product->brand->name }}</td>
                        <td class="px-4 py-3">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="px-4 py-3">{{ $product->stock }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-4 py-8 text-center text-gray-500">Belum ada produk. Silakan tambah produk baru.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- PANGGIL NAVIGASI BAWAH -->
    @include('partials.bottom-nav')

</body>
</html>