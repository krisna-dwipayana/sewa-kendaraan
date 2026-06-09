<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - RentalKu</title>
    <!-- Memanggil Tailwind CSS bawaan Laravel -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900 bg-gray-50">
    <div class="flex min-h-screen">
        
        <!-- Sisi Kiri: Gambar Cover (Hanya tampil di layar laptop/desktop) -->
        <div class="hidden lg:flex lg:w-1/2 relative bg-blue-700 items-center justify-center overflow-hidden">
            <!-- Gambar Background Kendaraan -->
            <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?q=80&w=1000&auto=format&fit=crop" 
                 alt="Armada RentalKu" 
                 class="absolute inset-0 h-full w-full object-cover opacity-40 mix-blend-overlay">
            
            <div class="relative z-10 text-center px-8 text-white">
                <h1 class="text-5xl font-extrabold tracking-tight mb-4">RentalKu</h1>
                <p class="text-lg font-medium text-blue-100">Platform Penyewaan Kendaraan Cepat, Aman, dan Terpercaya.</p>
            </div>
        </div>

        <!-- Sisi Kanan: Form Login -->
        <div class="flex flex-col justify-center w-full lg:w-1/2 px-6 py-12 sm:px-12 xl:px-24">
            <div class="mx-auto w-full max-w-md bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                
                <!-- Judul Form -->
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900">Selamat Datang</h2>
                    <p class="text-gray-500 mt-2">Silakan masuk ke akun Anda</p>
                </div>

                <!-- Session Status (Untuk pesan error/sukses dari backend) -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Form Authentikasi Utama -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                               class="mt-1 block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm">
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password" 
                               class="mt-1 block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm">
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="flex items-center cursor-pointer">
                            <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                            <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm font-medium text-blue-600 hover:text-blue-500 hover:underline" href="{{ route('password.request') }}">
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    <!-- Tombol Login -->
                    <div>
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition uppercase tracking-wider">
                            LOG IN
                        </button>
                    </div>
                </form>
                
                <!-- Link Register (Opsional) -->
                @if (Route::has('register'))
                <div class="mt-8 pt-6 border-t border-gray-100 text-center text-sm text-gray-600">
                    Belum punya akun? 
                    <a href="{{ route('register') }}" class="font-bold text-blue-600 hover:text-blue-500 hover:underline">Daftar sekarang</a>
                </div>
                @endif
                
            </div>
        </div>
        
    </div>
</body>
</html>