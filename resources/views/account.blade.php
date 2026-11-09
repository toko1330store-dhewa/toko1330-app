<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Saya - Toko 1330</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-serif-custom { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-[#0b3b36] pb-20 text-[#f4f1ea]">
    <div class="max-w-md mx-auto bg-[#0b3b36] min-h-screen relative shadow-2xl">
        
        <!-- HEADER PROFIL -->
        <div class="bg-[#1a4f48] rounded-b-3xl px-6 pt-12 pb-8 shadow-lg relative overflow-hidden">
            <!-- Ornamen Daun -->
            <div class="absolute -right-4 -top-4 opacity-10">
                <svg viewBox="0 0 100 100" fill="none" stroke="#e0c097" stroke-width="1" class="w-32 h-32"><path d="M50 10 C30 30, 10 60, 50 90 C90 60, 70 30, 50 10 Z"></path></svg>
            </div>

            <div class="flex items-center gap-4 relative z-10">
                <div class="w-16 h-16 bg-[#e0c097] rounded-full flex items-center justify-center text-[#0b3b36] shadow-md">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                <div>
                    @if(Auth::guard('member')->check())
                        <h1 class="font-serif-custom text-xl text-[#f4f1ea]">Halo, {{ Auth::guard('member')->user()->name }}!</h1>
                        <p class="text-xs text-[#a8c3b8] mt-1 tracking-widest uppercase">Member Toko 1330</p>
                    @else
                        <h1 class="font-serif-custom text-xl text-[#f4f1ea]">Halo, Guest!</h1>
                        <p class="text-xs text-[#a8c3b8] mt-1">Yuk login untuk dapat promo menarik.</p>
                    @endif
                </div>
            </div>
            
            <!-- Tombol Login / Logout -->
            @if(Auth::guard('member')->check())
                <form method="POST" action="{{ route('logout') }}" class="mt-6 relative z-10">
                    @csrf
                    <button type="submit" class="w-full bg-red-500/20 text-red-300 border border-red-500/50 font-semibold py-2.5 rounded-xl text-sm hover:bg-red-500 hover:text-white transition">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="mt-6 block text-center w-full bg-[#e0c097] text-[#0b3b36] font-bold py-2.5 rounded-xl text-sm shadow-md hover:bg-white transition relative z-10">
                    Masuk / Daftar Akun
                </a>
            @endif
        </div>

        <!-- MENU LIST -->
        <div class="px-6 mt-6 space-y-3">
            
            <!-- Menu Lacak Pesanan -->
            <a href="{{ route('track.index') }}" class="flex items-center justify-between bg-[#1a4f48] p-4 rounded-xl border border-[#2d5c56] hover:border-[#e0c097] transition group">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-[#0b3b36] text-[#e0c097] rounded-full flex items-center justify-center transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-serif-custom text-[#f4f1ea] text-sm">Lacak Pesanan</h3>
                        <p class="text-[10px] text-[#a8c3b8]">Cek status pesanan Anda</p>
                    </div>
                </div>
                <svg class="w-5 h-5 text-[#a8c3b8] group-hover:text-[#e0c097] transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>

            <!-- Menu Bantuan (Langsung ke WhatsApp) -->
            <a href="https://wa.me/628158911330" target="_blank" class="flex items-center justify-between bg-[#1a4f48] p-4 rounded-xl border border-[#2d5c56] hover:border-[#e0c097] transition group">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-[#0b3b36] text-[#e0c097] rounded-full flex items-center justify-center transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="text-left">
                        <h3 class="font-serif-custom text-[#f4f1ea] text-sm">Bantuan</h3>
                        <p class="text-[10px] text-[#a8c3b8]">Hubungi CS kami via WA</p>
                    </div>
                </div>
                <svg class="w-5 h-5 text-[#a8c3b8] group-hover:text-[#e0c097] transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>

            <!-- Menu Tentang Kami -->
            <a href="{{ route('about') }}" class="flex items-center justify-between bg-[#1a4f48] p-4 rounded-xl border border-[#2d5c56] hover:border-[#e0c097] transition group">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-[#0b3b36] text-[#e0c097] rounded-full flex items-center justify-center transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="text-left">
                        <h3 class="font-serif-custom text-[#f4f1ea] text-sm">Tentang Kami</h3>
                        <p class="text-[10px] text-[#a8c3b8]">Informasi Toko 1330</p>
                    </div>
                </div>
                <svg class="w-5 h-5 text-[#a8c3b8] group-hover:text-[#e0c097] transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>

            <!-- Menu Syarat & Ketentuan -->
            <a href="{{ route('terms') }}" class="flex items-center justify-between bg-[#1a4f48] p-4 rounded-xl border border-[#2d5c56] hover:border-[#e0c097] transition group">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-[#0b3b36] text-[#e0c097] rounded-full flex items-center justify-center transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <div class="text-left">
                        <h3 class="font-serif-custom text-[#f4f1ea] text-sm">Syarat & Ketentuan</h3>
                        <p class="text-[10px] text-[#a8c3b8]">Aturan belanja di Toko 1330</p>
                    </div>
                </div>
                <svg class="w-5 h-5 text-[#a8c3b8] group-hover:text-[#e0c097] transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>

        </div>
    </div>

    <!-- PANGGIL NAVIGASI BAWAH -->
    @include('partials.bottom-nav')

</body>
</html>