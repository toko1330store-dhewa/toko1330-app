<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Toko 1330</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #082621; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center px-4">

    <div class="max-w-md w-full bg-[#e6cca1] rounded-xl shadow-2xl p-8 border border-[#d4af37]">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-[#082621]">Toko 1330</h1>
            <p class="text-sm text-[#082621] opacity-80 mt-2">Panel Administrator</p>
        </div>

        <!-- Error Message -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ $errors->first() }}</span>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.store') }}">
            @csrf

            <!-- Username -->
            <div class="mb-4">
                <label for="username" class="block text-[#082621] text-sm font-bold mb-2">Username</label>
                <input type="text" name="username" id="username" value="{{ old('username') }}" required autofocus
                    class="w-full px-3 py-2 border border-[#d4af37] rounded-md focus:outline-none focus:ring-2 focus:ring-[#082621] bg-white text-gray-800">
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-[#082621] text-sm font-bold mb-2">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-3 py-2 border border-[#d4af37] rounded-md focus:outline-none focus:ring-2 focus:ring-[#082621] bg-white text-gray-800">
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mb-6">
                <input type="checkbox" name="remember" id="remember" class="mr-2 accent-[#082621]">
                <label for="remember" class="text-sm text-[#082621]">Ingat Saya</label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-[#082621] text-[#e6cca1] font-bold py-2 px-4 rounded-md hover:bg-opacity-90 transition duration-300">
                Masuk ke Panel Admin
            </button>
        </form>

        <div class="mt-6 text-center">
            <a href="/" class="text-sm text-[#082621] hover:underline opacity-80">Kembali ke Toko</a>
        </div>
    </div>

</body>
</html>