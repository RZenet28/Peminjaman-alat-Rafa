<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl w-full flex flex-col lg:flex-row items-center gap-8">
            
            <!-- Left Side - Illustration -->
            <div class="hidden lg:flex lg:w-1/2 flex-col items-center justify-center">
                <div class="relative">
                    <!-- Book Illustration SVG -->
                    <svg class="w-80 h-80 animate-float" viewBox="0 0 400 400" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <!-- Stack of Books -->
                        <rect x="80" y="180" width="120" height="160" rx="8" fill="#4F46E5" opacity="0.9"/>
                        <rect x="85" y="185" width="110" height="10" fill="#6366F1" opacity="0.7"/>
                        <rect x="85" y="200" width="110" height="3" fill="#818CF8" opacity="0.5"/>
                        <rect x="85" y="210" width="110" height="3" fill="#818CF8" opacity="0.5"/>
                        
                        <rect x="120" y="140" width="120" height="160" rx="8" fill="#7C3AED" opacity="0.9"/>
                        <rect x="125" y="145" width="110" height="10" fill="#8B5CF6" opacity="0.7"/>
                        <rect x="125" y="160" width="110" height="3" fill="#A78BFA" opacity="0.5"/>
                        <rect x="125" y="170" width="110" height="3" fill="#A78BFA" opacity="0.5"/>
                        
                        <rect x="160" y="100" width="120" height="160" rx="8" fill="#EC4899" opacity="0.9"/>
                        <rect x="165" y="105" width="110" height="10" fill="#F472B6" opacity="0.7"/>
                        <rect x="165" y="120" width="110" height="3" fill="#F9A8D4" opacity="0.5"/>
                        <rect x="165" y="130" width="110" height="3" fill="#F9A8D4" opacity="0.5"/>
                        
                        <!-- Bookmark -->
                        <rect x="225" y="90" width="15" height="80" fill="#FCD34D" opacity="0.8"/>
                        <path d="M232.5 170 L225 162 L240 162 Z" fill="#FCD34D" opacity="0.8"/>
                    </svg>
                    
                    <!-- Floating Particles -->
                    <div class="absolute top-10 left-10 w-3 h-3 bg-yellow-400 rounded-full animate-ping"></div>
                    <div class="absolute bottom-20 right-10 w-2 h-2 bg-purple-400 rounded-full animate-pulse"></div>
                    <div class="absolute top-1/2 right-0 w-4 h-4 bg-pink-400 rounded-full animate-bounce"></div>
                </div>
                
                <div class="mt-8 text-center">
                    <h2 class="text-3xl font-bold text-gray-800">Selamat Datang!</h2>
                    <p class="mt-2 text-gray-600">Sistem Peminjaman Buku Sekolah</p>
                    <p class="mt-1 text-sm text-gray-500">Akses mudah untuk meminjam buku pelajaran</p>
                </div>
            </div>

            <!-- Right Side - Login Form -->
            <div class="w-full lg:w-1/2 max-w-md">
                <div class="bg-white rounded-2xl shadow-2xl p-8 lg:p-10 transform transition-all duration-300 hover:shadow-3xl">
                    
                    <!-- Logo & Title -->
                    <div class="text-center mb-8">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl mb-4 shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <h1 class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                            BookHub Sekolah
                        </h1>
                        <p class="mt-2 text-sm text-gray-600">Masuk ke akun Anda</p>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold" />
                            <div class="relative mt-2">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                    </svg>
                                </div>
                                <x-text-input 
                                    id="email" 
                                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200" 
                                    type="email" 
                                    name="email" 
                                    :value="old('email')" 
                                    required 
                                    autofocus 
                                    autocomplete="username"
                                    placeholder="nama@sekolah.com" 
                                />
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div>
                            <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-semibold" />
                            <div class="relative mt-2">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                </div>
                                <x-text-input 
                                    id="password" 
                                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                                    type="password"
                                    name="password"
                                    required 
                                    autocomplete="current-password"
                                    placeholder="••••••••" 
                                />
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                                <input 
                                    id="remember_me" 
                                    type="checkbox" 
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 cursor-pointer transition duration-200" 
                                    name="remember"
                                >
                                <span class="ml-2 text-sm text-gray-600 hover:text-gray-900 transition duration-200">Ingat saya</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a class="text-sm text-indigo-600 hover:text-indigo-800 font-medium transition duration-200" href="{{ route('password.request') }}">
                                    Lupa password?
                                </a>
                            @endif
                        </div>

                        <!-- Login Button -->
                        <div>
                            <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-semibold rounded-lg text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98] shadow-lg hover:shadow-xl">
                                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-indigo-300 group-hover:text-indigo-200 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                    </svg>
                                </span>
                                Masuk
                            </button>
                        </div>

                        <!-- Register Link (Optional) -->
                        <div class="text-center mt-6">
                            <p class="text-sm text-gray-600">
                                Belum punya akun? 
                                <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold transition duration-200">
                                    Daftar disini
                                </a>
                            </p>
                        </div>
                    </form>

                    <!-- Footer Info -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <p class="text-xs text-center text-gray-500">
                            © 2024 BookHub Sekolah. Sistem Peminjaman Buku Pelajaran
                        </p>
                    </div>
                </div>

                <!-- Mobile Illustration Text -->
                <div class="lg:hidden mt-6 text-center">
                    <h2 class="text-2xl font-bold text-gray-800">Sistem Peminjaman Buku</h2>
                    <p class="mt-2 text-gray-600">Akses mudah untuk meminjam buku pelajaran</p>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .shadow-3xl {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
    </style>
</x-guest-layout>