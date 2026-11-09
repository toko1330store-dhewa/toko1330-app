<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Toko 1330</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans pb-24">

    <!-- HEADER -->
    <header class="bg-white sticky top-0 z-50 px-4 py-3 flex items-center shadow-sm">
        <a href="{{ route('cart.index') }}" class="p-2 bg-gray-100 rounded-full mr-3">
            <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        </a>
        <h1 class="text-lg font-bold text-gray-800">Checkout</h1>
    </header>

    <form action="{{ route('checkout.store') }}" method="POST" class="p-4 space-y-4">
        @csrf
        
        <!-- Info Pengiriman -->
        <div class="bg-white p-4 rounded-lg shadow-sm">
            <h2 class="font-bold text-gray-800 mb-3 border-b pb-2">Alamat Pengiriman</h2>
            
            <div class="mb-3">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Penerima</label>
                <input type="text" name="name" value="{{ old('name', auth()->user()->name ?? '') }}" required class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500 text-sm p-2 border">
            </div>
            
            <div class="mb-3">
                <label class="block text-sm font-medium text-gray-700 mb-1">No. HP/WhatsApp</label>
                <input type="text" name="phone" value="{{ old('phone') }}" required class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500 text-sm p-2 border">
            </div>

            <div class="mb-3">
                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap</label>
                <textarea name="address" rows="3" required class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500 text-sm p-2 border">{{ old('address') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="block text-sm font-medium text-gray-700 mb-1">Kota Tujuan (Ongkir)</label>
                <select name="city" id="city" required class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500 text-sm p-2 border">
                    <option value="">-- Pilih Kota --</option>
                    @foreach($cities as $city)
                        <option value="{{ $city->city }}" data-cost="{{ $city->cost }}">{{ $city->city }} (Rp {{ number_format($city->cost, 0, ',', '.') }})</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Ringkasan Pesanan -->
        <div class="bg-white p-4 rounded-lg shadow-sm">
            <h2 class="font-bold text-gray-800 mb-3 border-b pb-2">Ringkasan Pesanan</h2>
            @foreach($cart as $item)
            <div class="flex justify-between text-sm mb-2">
                <span class="text-gray-600">{{ $item['quantity'] }}x {{ $item['name'] }}</span>
                <span class="font-medium">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
            </div>
            @endforeach
            
            <div class="border-t mt-3 pt-3">
                <div class="flex justify-between text-sm mb-1">
                    <span class="text-gray-600">Subtotal Produk</span>
                    <span id="subtotal" data-val="{{ $subtotal }}">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-sm mb-2">
                    <span class="text-gray-600">Ongkos Kirim</span>
                    <span id="shipping_display" class="text-gray-800 font-medium">Rp 0</span>
                </div>
                <div class="flex justify-between text-base font-bold text-green-600 border-t pt-2">
                    <span>Total Bayar</span>
                    <span id="total_display">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>

                <!-- Fixed Bottom Button -->
        <div class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 p-4 z-50">
            <div class="max-w-md mx-auto">
                <button type="submit" class="w-full bg-green-600 text-white font-bold py-3 rounded-full hover:bg-green-700 transition shadow-lg">
                    Buat Pesanan
                </button>
            </div>
        </div>

    <!-- Script Hitung Ongkir Otomatis -->
    <script>
        document.getElementById('city').addEventListener('change', function() {
            let selectedOption = this.options[this.selectedIndex];
            let cost = parseInt(selectedOption.getAttribute('data-cost')) || 0;
            let subtotal = parseInt(document.getElementById('subtotal').getAttribute('data-val'));
            let total = subtotal + cost;

            document.getElementById('shipping_display').innerText = 'Rp ' + new Intl.NumberFormat('id-ID').format(cost);
            document.getElementById('total_display').innerText = 'Rp ' + new Intl.NumberFormat('id-ID').format(total);
        });
    </script>

</body>
</html>