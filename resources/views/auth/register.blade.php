<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl w-full flex flex-col lg:flex-row items-center gap-8">
            
            <!-- Left Side - Illustration -->
            <div class="hidden lg:flex lg:w-1/2 flex-col items-center justify-center">
                <div class="relative">
                    <!-- Student with Books Illustration SVG -->
                    <svg class="w-80 h-80 animate-float" viewBox="0 0 400 400" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <!-- Student Figure -->
                        <circle cx="200" cy="120" r="35" fill="#4F46E5" opacity="0.9"/>
                        <path d="M200 155 Q180 170 180 200 L180 250 Q180 260 190 260 L210 260 Q220 260 220 250 L220 200 Q220 170 200 155 Z" fill="#7C3AED" opacity="0.9"/>
                        <path d="M180 180 Q160 185 150 200 L140 240 Q138 248 145 250 L165 245 Q170 243 168 235 Z" fill="#7C3AED" opacity="0.8"/>
                        <path d="M220 180 Q240 185 250 200 L260 240 Q262 248 255 250 L235 245 Q230 243 232 235 Z" fill="#7C3AED" opacity="0.8"/>
                        
                        <!-- Books in hands -->
                        <rect x="140" y="230" width="45" height="60" rx="4" fill="#EC4899" opacity="0.9"/>
                        <rect x="143" y="233" width="39" height="8" fill="#F472B6" opacity="0.7"/>
                        <rect x="215" y="230" width="45" height="60" rx="4" fill="#10B981" opacity="0.9"/>
                        <rect x="218" y="233" width="39" height="8" fill="#34D399" opacity="0.7"/>
                        
                        <!-- Stack of books on ground -->
                        <rect x="100" y="300" width="80" height="15" rx="3" fill="#F59E0B" opacity="0.9"/>
                        <rect x="105" y="285" width="80" height="15" rx="3" fill="#FBBF24" opacity="0.9"/>
                        <rect x="110" y="270" width="80" height="15" rx="3" fill="#FCD34D" opacity="0.9"/>
                        
                        <rect x="220" y="300" width="80" height="15" rx="3" fill="#8B5CF6" opacity="0.9"/>
                        <rect x="215" y="285" width="80" height="15" rx="3" fill="#A78BFA" opacity="0.9"/>
                        <rect x="210" y="270" width="80" height="15" rx="3" fill="#C4B5FD" opacity="0.9"/>
                    </svg>
                    
                    <!-- Floating Particles -->
                    <div class="absolute top-10 left-10 w-3 h-3 bg-yellow-400 rounded-full animate-ping"></div>
                    <div class="absolute bottom-20 right-10 w-2 h-2 bg-purple-400 rounded-full animate-pulse"></div>
                    <div class="absolute top-1/2 right-0 w-4 h-4 bg-pink-400 rounded-full animate-bounce"></div>
                    <div class="absolute top-20 right-20 w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
                </div>
                
                <div class="mt-8 text-center">
                    <h2 class="text-3xl font-bold text-gray-800">Bergabunglah!</h2>
                    <p class="mt-2 text-gray-600">Daftar Sistem Peminjaman Buku</p>
                    <p class="mt-1 text-sm text-gray-500">Mulai meminjam buku pelajaran dengan mudah</p>
                </div>
            </div>

            <!-- Right Side - Register Form -->
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
                        <p class="mt-2 text-sm text-gray-600">Buat akun baru Anda</p>
                    </div>

                    <!-- Register Form -->
                    <form method="POST" action="{{ route('register') }}" class="space-y-5">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" value="Nama Lengkap" class="text-gray-700 font-semibold" />
                            <div class="relative mt-2">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <x-text-input 
                                    id="name" 
                                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200" 
                                    type="text" 
                                    name="name" 
                                    :value="old('name')" 
                                    required 
                                    autofocus 
                                    autocomplete="name"
                                    placeholder="Masukkan nama lengkap" 
                                />
                            </div>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" value="Email" class="text-gray-700 font-semibold" />
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
                                    autocomplete="username"
                                    placeholder="nama@sekolah.com" 
                                />
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div>
                            <x-input-label for="password" value="Password" class="text-gray-700 font-semibold" />
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
                                    autocomplete="new-password"
                                    placeholder="Minimal 8 karakter" 
                                />
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <x-input-label for="password_confirmation" value="Konfirmasi Password" class="text-gray-700 font-semibold" />
                            <div class="relative mt-2">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <x-text-input 
                                    id="password_confirmation" 
                                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                                    type="password"
                                    name="password_confirmation"
                                    required 
                                    autocomplete="new-password"
                                    placeholder="Ulangi password" 
                                />
                            </div>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <!-- Register Button -->
                        <div class="pt-2">
                            <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-semibold rounded-lg text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98] shadow-lg hover:shadow-xl">
                                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-indigo-300 group-hover:text-indigo-200 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                    </svg>
                                </span>
                                Daftar Sekarang
                            </button>
                        </div>

                        <!-- Login Link -->
                        <div class="text-center mt-6">
                            <p class="text-sm text-gray-600">
                                Sudah punya akun? 
                                <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold transition duration-200">
                                    Masuk disini
                                </a>
                            </p>
                        </div>
                    </form>

                    <!-- Footer Info -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <p class="text-xs text-center text-gray-500">
                            Dengan mendaftar, Anda menyetujui syarat dan ketentuan kami
                        </p>
                    </div>
                </div>

                <!-- Mobile Illustration Text -->
                <div class="lg:hidden mt-6 text-center">
                    <h2 class="text-2xl font-bold text-gray-800">Sistem Peminjaman Buku</h2>
                    <p class="mt-2 text-gray-600">Bergabung dan mulai meminjam buku</p>
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