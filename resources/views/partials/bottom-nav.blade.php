<!-- BOTTOM NAVIGATION (Tema Tosca) -->
<nav class="fixed bottom-0 left-0 right-0 bg-[#0F766E] border-t border-[#115E59] max-w-md mx-auto z-50 pb-safe shadow-[0_-5px_15px_rgba(0,0,0,0.1)]">
    <div class="flex justify-around items-center h-16">
        
        <!-- Home -->
        <a href="{{ url('/') }}" class="flex flex-col items-center justify-center w-full h-full {{ request()->is('/') ? 'text-[#F59E0B]' : 'text-teal-100 hover:text-white' }} transition">
            <svg class="w-6 h-6 mb-1" fill="{{ request()->is('/') ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            <span class="text-[10px] font-medium">Home</span>
        </a>
        
        <!-- Kategori -->
        <a href="{{ route('category') }}" class="flex flex-col items-center justify-center w-full h-full {{ request()->is('kategori*') ? 'text-[#F59E0B]' : 'text-teal-100 hover:text-white' }} transition">
            <svg class="w-6 h-6 mb-1" fill="{{ request()->is('kategori*') ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            <span class="text-[10px] font-medium">Kategori</span>
        </a>

        <!-- Keranjang -->
        <a href="{{ route('cart.index') }}" class="flex flex-col items-center justify-center w-full h-full {{ request()->is('cart*') ? 'text-[#F59E0B]' : 'text-teal-100 hover:text-white' }} transition relative">
            <div class="relative">
                <svg class="w-6 h-6 mb-1" fill="{{ request()->is('cart*') ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                @if(session('cart'))
                    <span class="absolute -top-1 -right-2 bg-[#F59E0B] text-white text-[9px] font-extrabold px-1.5 py-0.5 rounded-full shadow-sm">{{ count(session('cart')) }}</span>
                @endif
            </div>
            <span class="text-[10px] font-medium">Keranjang</span>
        </a>
        
        <!-- Akun -->
        <a href="{{ route('account') }}" class="flex flex-col items-center justify-center w-full h-full {{ request()->is('account*') ? 'text-[#F59E0B]' : 'text-teal-100 hover:text-white' }} transition">
            <svg class="w-6 h-6 mb-1" fill="{{ request()->is('account*') ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            <span class="text-[10px] font-medium truncate max-w-[60px]">
                @if(Auth::guard('member')->check())
                    {{ Str::limit(Auth::guard('member')->user()->name, 6) }}
                @else
                    Akun
                @endif
            </span>
        </a>
    </div>
</nav>