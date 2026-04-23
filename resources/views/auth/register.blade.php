<x-guest-layout>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #6366f1;
            --primary-hover: #4f46e5;
            --bg-gradient: linear-gradient(135deg, #f8fafc 0%, #eff6ff 100%);
            --glass-bg: rgba(255, 255, 255, 0.9);
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --shadow-sm: 0 1px 2px rgba(0,0,0,0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg-gradient);
            margin: 0;
            color: var(--text-main);
        }

        .reg-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .auth-card {
            background: white;
            width: 100%;
            max-width: 1000px;
            display: flex;
            border-radius: 32px;
            overflow: hidden;
            box-shadow: var(--shadow-xl);
            min-height: 700px;
        }

        /* Left side - Information/Promo */
        .info-side {
            flex: 1;
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .info-side::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            top: -100px;
            left: -100px;
        }

        .branding-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 40px;
        }

        .logo-box {
            background: rgba(255,255,255,0.2);
            padding: 10px;
            border-radius: 12px;
            display: flex;
            backdrop-filter: blur(5px);
        }

        .illust-box {
            text-align: center;
            margin: 40px 0;
            z-index: 2;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        .floating { animation: float 4s ease-in-out infinite; }

        .info-title { font-size: 2.2rem; font-weight: 800; line-height: 1.2; margin-bottom: 15px; }
        .info-p { font-size: 1rem; opacity: 0.85; line-height: 1.6; max-width: 340px; }

        /* Right side - Form */
        .form-side {
            flex: 1.1;
            padding: 60px;
            background: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-header { margin-bottom: 35px; }
        .form-header h2 { font-size: 1.75rem; font-weight: 700; margin: 0 0 8px 0; color: #0f172a; }
        .form-header p { color: var(--text-muted); font-size: 0.95rem; margin: 0; }

        .input-group { margin-bottom: 20px; }
        .input-group label { display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px; color: #475569; }

        .field-wrapper { position: relative; }
        .field-wrapper i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            display: flex;
        }

        .input-field {
            width: 100%;
            padding: 14px 16px 14px 48px;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            font-size: 0.95rem;
            transition: all 0.2s;
            box-sizing: border-box;
            background: #fcfdfe;
        }

        .input-field:focus {
            outline: none;
            border-color: var(--primary);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        .submit-btn {
            width: 100%;
            background: var(--primary);
            color: white;
            border: none;
            padding: 16px;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .submit-btn:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.3);
        }

        .login-footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9rem;
            color: var(--text-muted);
        }

        .login-footer a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 700;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .info-side { display: none; }
            .auth-card { max-width: 480px; min-height: auto; }
            .form-side { padding: 40px; }
        }
    </style>

    <div class="reg-container">
        <div class="auth-card">
            <!-- Sisi Kiri (Visual) -->
            <div class="info-side">
                <div class="branding-header">
                    <div class="logo-box">
                        <svg width="24" height="24" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <span style="font-weight: 700; letter-spacing: 0.5px;">BookHub Sekolah</span>
                </div>

                <div class="illust-box floating">
                    <svg width="240" height="240" viewBox="0 0 200 200">
                        <circle cx="100" cy="100" r="80" fill="white" fill-opacity="0.1"/>
                        <!-- Stacked Books Illustration -->
                        <rect x="60" y="60" width="80" height="100" rx="8" fill="white" fill-opacity="0.2" />
                        <rect x="70" y="50" width="80" height="100" rx="8" fill="white" fill-opacity="0.4" />
                        <rect x="80" y="40" width="80" height="100" rx="8" fill="white" stroke="white" stroke-width="2" />
                        <path d="M135 40V70L145 65L155 70V40H135Z" fill="#fbbf24" />
                    </svg>
                </div>

                <h1 class="info-title">Akses Ribuan Buku Pelajaran</h1>
                <p class="info-p">Daftarkan akun Anda dan nikmati kemudahan meminjam buku secara digital di mana saja.</p>
            </div>

            <!-- Sisi Kanan (Form) -->
            <div class="form-side">
                <div class="form-header">
                    <h2>Buat Akun Baru</h2>
                    <p>Lengkapi data diri untuk bergabung. Password akan dikirim ke email Anda.</p>
                </div>

                @if ($errors->any())
                    <div style="background-color: #fee; border: 1px solid #fcc; border-radius: 8px; padding: 12px; margin-bottom: 20px; color: #c33; font-size: 0.9rem;">
                        <strong>Gagal:</strong>
                        <ul style="margin: 8px 0 0 0; padding-left: 20px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="input-group">
                        <label>Nama Lengkap</label>
                        <div class="field-wrapper">
                            <i><svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></i>
                            <input type="text" name="name" class="input-field" placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required autofocus>
                        </div>
                        <x-input-error :messages="$errors->get('name')" style="color: #ef4444; font-size: 0.8rem; margin-top: 5px;" />
                    </div>

                    <!-- Email -->
                    <div class="input-group">
                        <label>Email</label>
                        <div class="field-wrapper">
                            <i><svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg></i>
                            <input type="email" name="email" class="input-field" placeholder="nama@email.com" value="{{ old('email') }}" required>
                        </div>
                        <x-input-error :messages="$errors->get('email')" style="color: #ef4444; font-size: 0.8rem; margin-top: 5px;" />
                    </div>

                    <button type="submit" class="submit-btn">
                        Daftar Akun
                        <svg width="20" height="20" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24"><path d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </button>
                </form>

                <div class="login-footer">
                    Sudah punya akun? <a href="{{ route('login') }}">Masuk Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>