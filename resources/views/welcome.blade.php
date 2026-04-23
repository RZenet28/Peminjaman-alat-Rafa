<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'BookHub Sekolah') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800" rel="stylesheet" />

    <style>
        :root {
            --primary: #4F46E5;
            --primary-hover: #4338CA;
            --secondary: #F8FAFC;
            --text-dark: #0F172A;
            --text-muted: #64748B;
            --bg-body: #F1F5F9;
            --card-bg: #FFFFFF;
            --border-light: #E2E8F0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-body);
            /* Elemen mesh gradient background yang sangat halus */
            background-image:
                radial-gradient(at 0% 0%, rgba(79, 70, 229, 0.08) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(139, 92, 246, 0.08) 0px, transparent 50%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            color: var(--text-dark);
        }

        /* Header Nav Logo */
        .header-logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 2rem;
            animation: fadeInDown 0.8s ease-out;
        }

        .header-logo svg {
            width: 32px;
            height: 32px;
            color: var(--primary);
        }

        .header-logo span {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--text-dark);
            letter-spacing: -0.03em;
        }

        /* Card Container */
        .main-card {
            background: var(--card-bg);
            border-radius: 32px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08), 0 0 0 1px rgba(0, 0, 0, 0.02);
            overflow: hidden;
            display: flex;
            max-width: 1200px;
            width: 100%;
            padding: 1.5rem;
            /* Inner padding untuk card style modern */
            gap: 2rem;
            animation: fadeInUp 0.8s ease-out;
        }

        /* --- Left Section --- */
        .left-section {
            flex: 1.2;
            padding: 3rem 2rem 3rem 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            background: #EEF2FF;
            color: var(--primary);
            padding: 0.5rem 1rem;
            border-radius: 99px;
            font-size: 0.875rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            width: fit-content;
            letter-spacing: 0.02em;
        }

        .left-section h1 {
            font-size: 3.5rem;
            font-weight: 800;
            color: var(--text-dark);
            line-height: 1.1;
            letter-spacing: -0.03em;
            margin-bottom: 1.25rem;
        }

        .left-section p.subtitle {
            color: var(--text-muted);
            font-size: 1.125rem;
            line-height: 1.7;
            margin-bottom: 2.5rem;
            max-width: 90%;
        }

        /* Auth Buttons Layout */
        .auth-buttons {
            display: flex;
            gap: 1rem;
            margin-bottom: 3rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.875rem 2.25rem;
            border-radius: 14px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            box-shadow: 0 4px 14px 0 rgba(79, 70, 229, 0.39);
        }

        .btn-primary:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79, 70, 229, 0.23);
        }

        .btn-secondary {
            background: var(--card-bg);
            color: var(--text-dark);
            border: 1px solid var(--border-light);
        }

        .btn-secondary:hover {
            background: var(--bg-body);
            border-color: #CBD5E1;
        }

        /* Features Grid */
        .features {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 1.25rem;
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            background: #EEF2FF;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: var(--primary);
            transition: transform 0.3s ease;
        }

        .feature-item:hover .feature-icon {
            transform: scale(1.05);
        }

        .feature-icon svg {
            width: 24px;
            height: 24px;
            stroke: currentColor;
            fill: none;
        }

        .feature-content h3 {
            font-size: 1.125rem;
            color: var(--text-dark);
            margin-bottom: 0.25rem;
            font-weight: 700;
        }

        .feature-content p {
            font-size: 0.95rem;
            color: var(--text-muted);
            line-height: 1.5;
        }

        /* Stats Section */
        .stats {
            display: flex;
            align-items: center;
            gap: 3rem;
            padding-top: 2.5rem;
            border-top: 1px solid var(--border-light);
        }

        .stat-item {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: var(--text-dark);
            letter-spacing: -0.02em;
        }

        .stat-label {
            color: var(--text-muted);
            font-size: 0.875rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        /* --- Right Section (Visual) --- */
        .right-section {
            flex: 1;
            background-color: var(--primary);
            background-image:
                radial-gradient(at 0% 0%, #6366f1 0px, transparent 50%),
                radial-gradient(at 100% 0%, #a855f7 0px, transparent 50%),
                radial-gradient(at 100% 100%, #ec4899 0px, transparent 50%),
                radial-gradient(at 0% 100%, #3b82f6 0px, transparent 50%);
            border-radius: 24px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: inset 0 2px 20px rgba(255, 255, 255, 0.2);
        }

        /* Floating Glass Tags */
        .glass-tag {
            position: absolute;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 0.75rem 1.25rem;
            border-radius: 99px;
            color: white;
            font-weight: 600;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
            animation: float 6s ease-in-out infinite;
            z-index: 10;
        }

        .glass-tag svg {
            width: 18px;
            height: 18px;
        }

        .tag-1 {
            top: 15%;
            right: 10%;
            animation-delay: 0s;
        }

        .tag-2 {
            bottom: 15%;
            left: 10%;
            animation-delay: -3s;
        }

        .book-illustration {
            position: relative;
            z-index: 1;
            width: 320px;
            height: 320px;
            animation: float 8s ease-in-out infinite;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-15px);
            }
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .main-card {
                flex-direction: column;
                padding: 1rem;
            }

            .left-section {
                padding: 2.5rem 1.5rem;
            }

            .left-section h1 {
                font-size: 2.75rem;
            }

            .right-section {
                min-height: 400px;
                border-radius: 20px;
            }

            .stats {
                gap: 1.5rem;
                flex-wrap: wrap;
            }
        }

        @media (max-width: 640px) {
            .left-section h1 {
                font-size: 2.25rem;
            }

            .auth-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }

            .stats {
                flex-direction: column;
                align-items: flex-start;
            }

            .glass-tag {
                display: none;
                /* Hide on mobile to save space */
            }

            .book-illustration {
                width: 240px;
                height: 240px;
            }
        }
    </style>
</head>

<body>

    <div class="header-logo">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path
                d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.995 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.214 8.214 0 0118 18.75c1.68 0 3.282.515 4.75 1.407A.75.75 0 0024 19.5V5.262a.75.75 0 00-.5-.707A9.735 9.735 0 0018 3a9.707 9.707 0 00-5.25 1.533v16.103z" />
        </svg>
        <span>BookHub Sekolah</span>
    </div>

    <div class="main-card">

        <div class="left-section">
            <div class="badge">Perpustakaan Digital</div>
            <h1>Kelola Peminjaman Buku dengan Mudah</h1>
            <p class="subtitle">Sistem manajemen perpustakaan modern yang memudahkan siswa dan guru dalam meminjam buku
                secara digital tanpa ribet.</p>

            <!-- Auth Buttons Pindah ke Kiri (Sesuai Konvensi UI/UX Modern) -->
            @if (Route::has('login'))
                <div class="auth-buttons">
                    @auth
                        <a href="{{ url('/redirect-dashboard') }}" class="btn btn-primary">
                            Akses Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-secondary">
                            Masuk Akun
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary">
                                Daftar Sekarang
                            </a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="features">
                <div class="feature-item">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                        </svg>
                    </div>
                    <div class="feature-content">
                        <h3>Katalog Lengkap</h3>
                        <p>Ribuan koleksi buku tersedia untuk dipinjam secara real-time.</p>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                    </div>
                    <div class="feature-content">
                        <h3>Peminjaman Cepat</h3>
                        <p>Proses peminjaman dan pengembalian hanya dalam hitungan detik.</p>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </div>
                    <div class="feature-content">
                        <h3>Pengingat Otomatis</h3>
                        <p>Notifikasi pintar agar tidak telat dalam mengembalikan buku.</p>
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
            <!-- Floating Glass Elements -->
            <div class="glass-tag tag-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                Mudah Digunakan
            </div>
            <div class="glass-tag tag-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Akses 24/7
            </div>

            <!-- Modern Flat-3D SVG Book Illustration -->
            <div class="book-illustration">
                <svg viewBox="0 0 240 240" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient id="coverGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#ffffff" />
                            <stop offset="100%" stop-color="#f8fafc" />
                        </linearGradient>
                        <linearGradient id="spineGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#e0e7ff" />
                            <stop offset="100%" stop-color="#c7d2fe" />
                        </linearGradient>
                        <filter id="shadow" x="-20%" y="-20%" width="140%" height="140%">
                            <feDropShadow dx="0" dy="15" stdDeviation="15" flood-color="#000000" flood-opacity="0.15" />
                        </filter>
                    </defs>

                    <!-- Book Stack Shadows / Pages -->
                    <path
                        d="M40,150 L200,150 A10,10 0 0,1 210,160 L210,165 A10,10 0 0,1 200,175 L40,175 A10,10 0 0,1 30,165 L30,160 A10,10 0 0,1 40,150 Z"
                        fill="#ffffff" opacity="0.3" />
                    <path
                        d="M45,130 L195,130 A10,10 0 0,1 205,140 L205,145 A10,10 0 0,1 195,155 L45,155 A10,10 0 0,1 35,145 L35,140 A10,10 0 0,1 45,130 Z"
                        fill="#ffffff" opacity="0.6" />

                    <!-- Main Book -->
                    <rect x="50" y="40" width="140" height="110" rx="8" fill="url(#coverGrad)" filter="url(#shadow)" />
                    <rect x="50" y="40" width="15" height="110" rx="0" fill="url(#spineGrad)" />

                    <!-- Bookmark -->
                    <path d="M140,40 L160,40 L160,95 L150,85 L140,95 Z" fill="#f43f5e" />

                    <!-- Cover Content (Lines) -->
                    <rect x="85" y="65" width="80" height="6" rx="3" fill="#cbd5e1" />
                    <rect x="85" y="85" width="55" height="6" rx="3" fill="#cbd5e1" />
                    <rect x="85" y="105" width="70" height="6" rx="3" fill="#cbd5e1" />
                    <rect x="85" y="125" width="40" height="6" rx="3" fill="#cbd5e1" />

                    <!-- Abstract Floating Decor -->
                    <circle cx="20" cy="50" r="4" fill="#ffffff" opacity="0.6" />
                    <circle cx="220" cy="80" r="6" fill="#ffffff" opacity="0.5" />
                    <rect x="190" y="30" width="10" height="10" rx="2" fill="#ffffff" opacity="0.6"
                        transform="rotate(45 190 30)" />
                    <circle cx="40" cy="200" r="8" fill="#ffffff" opacity="0.4" />
                </svg>
            </div>
        </div>

    </div>
</body>

</html>