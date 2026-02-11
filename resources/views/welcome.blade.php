<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Sistem Peminjaman Buku') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Inter', sans-serif;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 20px;
            }

            .container {
                max-width: 1200px;
                width: 100%;
            }

            .header {
                text-align: center;
                margin-bottom: 40px;
            }

            .header h1 {
                color: white;
                font-size: 3rem;
                font-weight: 700;
                margin-bottom: 10px;
                text-shadow: 0 2px 10px rgba(0,0,0,0.1);
            }

            .header p {
                color: rgba(255,255,255,0.9);
                font-size: 1.1rem;
            }

            .main-card {
                background: white;
                border-radius: 20px;
                box-shadow: 0 20px 60px rgba(0,0,0,0.3);
                overflow: hidden;
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 0;
            }

            .left-section {
                padding: 60px;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            .left-section h2 {
                font-size: 2rem;
                color: #2d3748;
                margin-bottom: 20px;
                font-weight: 700;
            }

            .left-section p {
                color: #718096;
                font-size: 1.1rem;
                line-height: 1.8;
                margin-bottom: 30px;
            }

            .features {
                display: flex;
                flex-direction: column;
                gap: 20px;
                margin-bottom: 40px;
            }

            .feature-item {
                display: flex;
                align-items: center;
                gap: 15px;
            }

            .feature-icon {
                width: 50px;
                height: 50px;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
            }

            .feature-icon svg {
                width: 24px;
                height: 24px;
                stroke: white;
                fill: none;
            }

            .feature-content h3 {
                font-size: 1.1rem;
                color: #2d3748;
                margin-bottom: 5px;
                font-weight: 600;
            }

            .feature-content p {
                font-size: 0.9rem;
                color: #a0aec0;
                margin: 0;
            }

            .right-section {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                padding: 60px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                position: relative;
                overflow: hidden;
            }

            .right-section::before {
                content: '';
                position: absolute;
                width: 300px;
                height: 300px;
                background: rgba(255,255,255,0.1);
                border-radius: 50%;
                top: -100px;
                right: -100px;
            }

            .right-section::after {
                content: '';
                position: absolute;
                width: 200px;
                height: 200px;
                background: rgba(255,255,255,0.1);
                border-radius: 50%;
                bottom: -50px;
                left: -50px;
            }

            .book-illustration {
                position: relative;
                z-index: 1;
                margin-bottom: 40px;
            }

            .book-illustration svg {
                width: 200px;
                height: 200px;
                filter: drop-shadow(0 10px 30px rgba(0,0,0,0.2));
            }

            .auth-buttons {
                display: flex;
                gap: 15px;
                position: relative;
                z-index: 1;
                width: 100%;
                max-width: 300px;
            }

            .btn {
                flex: 1;
                padding: 15px 30px;
                border-radius: 12px;
                font-weight: 600;
                font-size: 1rem;
                cursor: pointer;
                transition: all 0.3s ease;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                border: 2px solid white;
            }

            .btn-primary {
                background: white;
                color: #667eea;
            }

            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 25px rgba(255,255,255,0.3);
            }

            .btn-secondary {
                background: transparent;
                color: white;
            }

            .btn-secondary:hover {
                background: white;
                color: #667eea;
            }

            .stats {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 30px;
                margin-top: 50px;
                padding-top: 50px;
                border-top: 1px solid #e2e8f0;
            }

            .stat-item {
                text-align: center;
            }

            .stat-number {
                font-size: 2.5rem;
                font-weight: 700;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .stat-label {
                color: #718096;
                font-size: 0.9rem;
                margin-top: 5px;
            }

            @media (max-width: 968px) {
                .main-card {
                    grid-template-columns: 1fr;
                }

                .header h1 {
                    font-size: 2rem;
                }

                .left-section, .right-section {
                    padding: 40px;
                }

                .stats {
                    grid-template-columns: 1fr;
                    gap: 20px;
                }
            }

            @media (max-width: 640px) {
                .header h1 {
                    font-size: 1.8rem;
                }

                .left-section h2 {
                    font-size: 1.5rem;
                }

                .auth-buttons {
                    flex-direction: column;
                }

                .left-section, .right-section {
                    padding: 30px;
                }
            }

            /* Animation */
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .main-card {
                animation: fadeInUp 0.6s ease-out;
            }

            .feature-item {
                animation: fadeInUp 0.6s ease-out;
                animation-fill-mode: both;
            }

            .feature-item:nth-child(1) { animation-delay: 0.1s; }
            .feature-item:nth-child(2) { animation-delay: 0.2s; }
            .feature-item:nth-child(3) { animation-delay: 0.3s; }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1>📚 BookHub Sekolah</h1>
                <p>Sistem Peminjaman Buku Sekolah Modern & Efisien</p>
            </div>

            <div class="main-card">
                <div class="left-section">
                    <h2>Kelola Peminjaman Buku dengan Mudah</h2>
                    <p>Sistem manajemen perpustakaan yang memudahkan siswa dan guru dalam meminjam buku secara digital.</p>

                    <div class="features">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                                </svg>
                            </div>
                            <div class="feature-content">
                                <h3>Katalog Lengkap</h3>
                                <p>Ribuan koleksi buku tersedia untuk dipinjam</p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                </svg>
                            </div>
                            <div class="feature-content">
                                <h3>Peminjaman Cepat</h3>
                                <p>Proses peminjaman hanya dalam hitungan detik</p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                            </div>
                            <div class="feature-content">
                                <h3>Pengingat Otomatis</h3>
                                <p>Notifikasi pengembalian buku tepat waktu</p>
                            </div>
                        </div>
                    </div>

                    <div class="stats">
                        <div class="stat-item">
                            <div class="stat-number">5000+</div>
                            <div class="stat-label">Koleksi Buku</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">1200+</div>
                            <div class="stat-label">Pengguna Aktif</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">98%</div>
                            <div class="stat-label">Kepuasan</div>
                        </div>
                    </div>
                </div>

                <div class="right-section">
                    <div class="book-illustration">
                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                            <!-- Book Stack -->
                            <rect x="40" y="120" width="120" height="15" fill="#ffffff" opacity="0.9" rx="2"/>
                            <rect x="45" y="100" width="110" height="15" fill="#ffffff" opacity="0.8" rx="2"/>
                            <rect x="50" y="80" width="100" height="15" fill="#ffffff" opacity="0.7" rx="2"/>
                            
                            <!-- Main Book -->
                            <rect x="60" y="40" width="80" height="100" fill="#ffffff" rx="3"/>
                            <rect x="65" y="45" width="70" height="90" fill="#f7fafc" rx="2"/>
                            
                            <!-- Book Details -->
                            <line x1="75" y1="60" x2="125" y2="60" stroke="#667eea" stroke-width="2"/>
                            <line x1="75" y1="70" x2="120" y2="70" stroke="#cbd5e0" stroke-width="1.5"/>
                            <line x1="75" y1="78" x2="120" y2="78" stroke="#cbd5e0" stroke-width="1.5"/>
                            <line x1="75" y1="86" x2="115" y2="86" stroke="#cbd5e0" stroke-width="1.5"/>
                            
                            <!-- Bookmark -->
                            <rect x="100" y="40" width="8" height="30" fill="#764ba2"/>
                            <polygon points="104,70 100,65 108,65" fill="#764ba2"/>
                        </svg>
                    </div>

                    @if (Route::has('login'))
                        <div class="auth-buttons">
                            @auth
                                <a href="{{ url('/redirect-dashboard') }}" class="btn btn-primary">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-secondary">
                                    Masuk
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-primary">
                                        Daftar
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>