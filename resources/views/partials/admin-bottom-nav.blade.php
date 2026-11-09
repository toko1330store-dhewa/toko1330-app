<!-- ADMIN BOTTOM NAVIGATION (Tema Tosca Gelap) -->
<nav class="fixed bottom-0 left-0 right-0 bg-[#0a2e26] border-t border-[#1a4a3f] max-w-md mx-auto z-50 pb-safe shadow-[0_-5px_15px_rgba(0,0,0,0.3)]">
    <div class="flex justify-around items-center h-16">
        
        <!-- Produk -->
        <a href="{{ route('admin.products.index') }}" class="flex flex-col items-center justify-center w-full h-full {{ request()->is('admin/products*') ? 'text-[#e0c097]' : 'text-[#a8c3b8] hover:text-white' }} transition">
            <svg class="w-6 h-6 mb-1" fill="{{ request()->is('admin/products*') ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            <span class="text-[10px] font-medium">Produk</span>
        </a>
        
        <!-- Pesanan -->
        <a href="{{ route('admin.orders.index') }}" class="flex flex-col items-center justify-center w-full h-full {{ request()->is('admin/orders*') ? 'text-[#e0c097]' : 'text-[#a8c3b8] hover:text-white' }} transition">
            <svg class="w-6 h-6 mb-1" fill="{{ request()->is('admin/orders*') ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
            <span class="text-[10px] font-medium">Pesanan</span>
        </a>

        <!-- Logout -->
        <form method="POST" action="{{ route('admin.logout') }}" class="flex flex-col items-center justify-center w-full h-full">
            @csrf
            <button type="submit" class="flex flex-col items-center justify-center w-full h-full text-[#a8c3b8] hover:text-red-400 transition">
                <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                <span class="text-[10px] font-medium">Keluar</span>
            </button>
        </form>
    </div>
</nav>