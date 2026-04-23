<x-guest-layout>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --bg-body: #f1f5f9;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --white: #ffffff;
            --shadow: 0 20px 50px rgba(0, 0, 0, 0.05);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-body);
            margin: 0;
            color: var(--text-main);
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .main-card {
            background: var(--white);
            width: 100%;
            max-width: 1100px;
            display: flex;
            border-radius: 32px;
            overflow: hidden;
            box-shadow: var(--shadow);
            min-height: 600px;
        }

        /* Sisi Kiri (Hero) */
        .hero-side {
            flex: 1;
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            color: white;
            overflow: hidden;
        }

        .hero-side::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            filter: blur(40px);
        }

        .branding {
            display: flex;
            align-items: center;
            gap: 12px;
            z-index: 10;
        }

        .brand-icon {
            background: rgba(255, 255, 255, 0.2);
            padding: 8px;
            border-radius: 10px;
            display: flex;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .brand-name {
            font-size: 1.25rem;
            font-weight: 700;
        }

        .illustration-area {
            text-align: center;
            z-index: 10;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .floating-svg {
            animation: float 5s ease-in-out infinite;
            filter: drop-shadow(0 10px 15px rgba(0,0,0,0.1));
        }

        .hero-title {
            font-size: 2rem;
            margin: 20px 0 10px;
        }

        .hero-desc {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
            max-width: 320px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .stats-row {
            display: flex;
            justify-content: space-between;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 30px;
            z-index: 10;
        }

        .stat-item b { font-size: 1.2rem; display: block; }
        .stat-item span { font-size: 0.75rem; opacity: 0.7; text-transform: uppercase; letter-spacing: 1px; }

        /* Sisi Kanan (Form) */
        .form-side {
            flex: 1;
            padding: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-wrapper {
            width: 100%;
            max-width: 380px;
        }

        .welcome-text h2 { font-size: 1.8rem; margin-bottom: 8px; }
        .welcome-text p { color: var(--text-muted); font-size: 0.9rem; margin-bottom: 40px; }

        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px; color: #475569; }

        .input-wrapper { position: relative; }
        .input-wrapper i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        .input-field {
            width: 100%;
            padding: 14px 16px 14px 48px;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            background: #f8fafc;
            font-size: 0.9rem;
            transition: all 0.3s;
            box-sizing: border-box;
        }

        .input-field:focus {
            outline: none;
            border-color: var(--primary);
            background: white;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
            margin-bottom: 30px;
        }

        .btn-submit {
            width: 100%;
            background: var(--primary);
            color: white;
            border: none;
            padding: 16px;
            border-radius: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            font-size: 1rem;
        }

        .btn-submit:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(79, 70, 229, 0.2);
        }

        .footer-link {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9rem;
            color: var(--text-muted);
        }

        .footer-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 700;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .hero-side { display: none; }
            .main-card { max-width: 500px; }
        }
    </style>

    <div class="login-container">
        <div class="main-card">
            <!-- Left Hero -->
            <div class="hero-side">
                <div class="branding">
                    <div class="brand-icon">
                        <svg width="24" height="24" fill="none" stroke="white" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <span class="brand-name">BookHub Sekolah</span>
                </div>

                <div class="illustration-area">
                    <div class="floating-svg">
                        <svg width="200" height="200" viewBox="0 0 200 200" fill="none">
                            <rect x="40" y="60" width="100" height="130" rx="12" fill="white" fill-opacity="0.1" />
                            <rect x="55" y="45" width="100" height="130" rx="12" fill="white" fill-opacity="0.2" />
                            <rect x="70" y="30" width="100" height="130" rx="12" fill="white" fill-opacity="0.3" stroke="white" />
                            <path d="M140 30V65L150 58L160 65V30H140Z" fill="#FCD34D" />
                        </svg>
                    </div>
                    <h2 class="hero-title">Kelola Buku Digital</h2>
                    <p class="hero-desc">Sistem perpustakaan modern untuk memudahkan akses literasi bagi seluruh warga sekolah.</p>
                </div>

                <div class="stats-row">
                    <div class="stat-item"><b>5000+</b><span>Buku</span></div>
                    <div class="stat-item"><b>1200+</b><span>Siswa</span></div>
                    <div class="stat-item"><b>98%</b><span>Puas</span></div>
                </div>
            </div>

            <!-- Right Form -->
            <div class="form-side">
                <div class="form-wrapper">
                    <div class="welcome-text">
                        <h2>Selamat Datang 👋</h2>
                        <p>Silakan masuk ke akun sekolah Anda.</p>
                    </div>

                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label>Alamat Email</label>
                            <div class="input-wrapper">
                                <i>
                                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" /></svg>
                                </i>
                                <input type="email" name="email" class="input-field" placeholder="nama@sekolah.com" required autofocus>
                            </div>
                            <x-input-error :messages="$errors->get('email')" />
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-wrapper">
                                <i>
                                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                                </i>
                                <input type="password" name="password" class="input-field" placeholder="••••••••" required>
                            </div>
                            <x-input-error :messages="$errors->get('password')" />
                        </div>

                        <div class="form-options">
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                <input type="checkbox" name="remember" style="accent-color: var(--primary);"> Ingat saya
                            </label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" style="color: var(--primary); text-decoration: none; font-weight: 600;">Lupa Password?</a>
                            @endif
                        </div>

                        <button type="submit" class="btn-submit">
                            Masuk Sekarang
                            <svg width="20" height="20" fill="none" stroke="white" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" /></svg>
                        </button>
                    </form>

                    <div class="footer-link">
                        Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>