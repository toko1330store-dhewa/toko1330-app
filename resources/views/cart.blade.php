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

        <!-- KONDISI JIKA KERANJANG KOSONG -->
        @if(session('cart') && count(session('cart')) > 0)
            <!-- KONTEN KERANJANG (JIKA ADA BARANG) -->
            <main class="flex-1 px-6 py-2">
                @if(session('success'))
                    <div class="bg-green-500/20 border border-green-500 text-green-200 p-3 rounded-lg text-sm mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="space-y-4">
                    @php $total = 0; @endphp
                    @foreach(session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity']; @endphp
                        <div class="flex items-center gap-4 bg-[#1a4f48] p-3 rounded-xl border border-[#2d5c56]">
                            <!-- Gambar -->
                            <div class="w-16 h-20 bg-[#0b3b36] rounded-lg overflow-hidden flex-shrink-0">
                                @if(isset($details['image']) && $details['image'])
                                    <img src="{{ asset('storage/' . $details['image']) }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-[#a8c3b8] text-[10px]">No Img</div>
                                @endif
                            </div>
                            
                            <!-- Info -->
                            <div class="flex-1">
                                <h4 class="font-serif-custom text-sm text-[#f4f1ea] leading-tight mb-1">{{ $details['name'] }}</h4>
                                <p class="text-xs font-medium text-[#e0c097]">Rp {{ number_format($details['price'], 0, ',', '.') }}</p>
                                <p class="text-xs text-[#a8c3b8] mt-1">Qty: {{ $details['quantity'] }}</p>
                            </div>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('cart.remove', $id) }}" method="POST" class="flex-shrink-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-300 p-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </main>

            <!-- FOOTER TOTAL & CHECKOUT -->
            <div class="px-6 py-4 bg-[#0b3b36] border-t border-[#2d5c56] mt-auto">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-sm text-[#a8c3b8]">Subtotal</span>
                    <span class="text-lg font-bold text-[#e0c097]">Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>
                <a href="{{ route('checkout.index') }}" class="block text-center w-full bg-[#e0c097] text-[#0b3b36] font-bold py-3 rounded-xl hover:bg-white transition">
                    Lanjut ke Checkout
                </a>
            </div>

        @else
            <!-- TAMPILAN KERANJANG KOSONG -->
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
        @endif

        @include('partials.bottom-nav')
    </div>
</body>
</html>