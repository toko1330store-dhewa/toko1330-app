<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko 1330</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <style>
        .font-serif-custom { font-family: 'Playfair Display', serif; }
        /* Animasi Fade In */
        .fade-in { animation: fadeIn 2s ease-in-out forwards; opacity: 0; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
    </style>
</head>
<body class="bg-[#0b3b36] h-screen flex flex-col items-center justify-center relative overflow-hidden text-[#f4f1ea]">

    <!-- Ornamen Daun Transparan di Background -->
    <div class="absolute inset-0 opacity-10 pointer-events-none flex justify-center items-center">
        <svg viewBox="0 0 100 100" fill="none" stroke="#e0c097" stroke-width="0.5" class="w-96 h-96">
            <path d="M50 10 C30 30, 10 60, 50 90 C90 60, 70 30, 50 10 Z"></path>
            <path d="M50 10 L50 90"></path>
            <path d="M50 30 L30 40 M50 50 L25 60 M50 70 L35 80"></path>
            <path d="M50 30 L70 40 M50 50 L75 60 M50 70 L65 80"></path>
        </svg>
    </div>

    <!-- Konten Splash -->
    <div class="text-center fade-in z-10">
        <!-- Logo -->
        <img src="{{ asset('images/1330-logo.png') }}" alt="Logo Toko" class="h-24 w-auto mx-auto mb-6 drop-shadow-lg">
        
        <!-- Nama Toko -->
        <h1 class="font-serif-custom text-4xl md:text-5xl tracking-[0.2em] mb-4 uppercase">Toko 1330</h1>
        
        <!-- Garis Pemisah Elegan -->
        <div class="w-16 h-[1px] bg-[#e0c097] mx-auto mb-4"></div>
        
        <!-- Tagline -->
        <p class="text-sm md:text-base font-light tracking-widest text-[#a8c3b8] uppercase">Belanja Mudah, Kualitas Terjaga</p>
    </div>

    <!-- Teks Loading di Bawah -->
    <div class="absolute bottom-16 text-center fade-in" style="animation-delay: 1s;">
        <p class="text-xs tracking-[0.3em] text-[#e0c097] uppercase mb-2">Loading...</p>
        <!-- Garis Loading -->
        <div class="w-32 h-[2px] bg-[#2d5c56] mx-auto overflow-hidden relative">
            <div class="w-1/2 h-full bg-[#e0c097] absolute top-0 left-0 animate-[slide_1.5s_infinite]"></div>
        </div>
    </div>

    <style>
        @keyframes slide {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(200%); }
        }
    </style>

    <!-- Script Auto Redirect ke Home setelah 3.5 detik -->
    <script>
    setTimeout(function(){
        window.location.href = "{{ route('home') }}"; // Ini otomatis mengarah ke /home
    }, 3500); 
</script>
</body>
</html>