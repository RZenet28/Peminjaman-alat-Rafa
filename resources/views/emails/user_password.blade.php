<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }
        .header p {
            margin: 5px 0 0 0;
            opacity: 0.9;
            font-size: 14px;
        }
        .content {
            padding: 40px;
        }
        .greeting {
            font-size: 16px;
            margin-bottom: 20px;
            color: #1e293b;
        }
        .info-box {
            background-color: #f8fafc;
            border-left: 4px solid #4f46e5;
            padding: 20px;
            margin: 25px 0;
            border-radius: 4px;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #e2e8f0;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .info-label {
            font-weight: 600;
            color: #475569;
        }
        .info-value {
            color: #1e293b;
            font-family: monospace;
            background-color: white;
            padding: 8px 12px;
            border-radius: 4px;
            word-break: break-all;
        }
        .password-highlight {
            background-color: #fef3c7;
            border: 1px solid #fcd34d;
            padding: 3px 8px;
            border-radius: 3px;
            font-weight: 600;
        }
        .instructions {
            background-color: #eff6ff;
            border-left: 4px solid #3b82f6;
            padding: 20px;
            margin: 25px 0;
            border-radius: 4px;
        }
        .instructions h3 {
            margin: 0 0 15px 0;
            color: #1e40af;
            font-size: 14px;
        }
        .instructions ol {
            margin: 0;
            padding-left: 20px;
            color: #1e40af;
        }
        .instructions li {
            margin: 8px 0;
            font-size: 14px;
        }
        .warning {
            background-color: #fef2f2;
            border-left: 4px solid #ef4444;
            padding: 20px;
            margin: 25px 0;
            border-radius: 4px;
            color: #991b1b;
            font-size: 14px;
        }
        .warning strong {
            display: block;
            margin-bottom: 8px;
        }
        .footer {
            background-color: #f8fafc;
            padding: 20px;
            text-align: center;
            color: #64748b;
            font-size: 12px;
            border-top: 1px solid #e2e8f0;
        }
        .button {
            display: inline-block;
            background-color: #4f46e5;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 6px;
            margin: 20px 0;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>🎉 Akun Berhasil Dibuat!</h1>
            <p>Selamat datang di BookHub Sekolah</p>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="greeting">
                Halo <strong>{{ $user->name }}</strong>,
            </div>

            <p>Akun Anda telah berhasil didaftarkan dalam sistem. Di bawah ini adalah informasi login Anda:</p>

            <!-- Info Box -->
            <div class="info-box">
                <div class="info-row">
                    <span class="info-label">📧 Email:</span>
                    <span class="info-value">{{ $user->email }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">🔐 Password:</span>
                    <span class="info-value"><span class="password-highlight">{{ $password }}</span></span>
                </div>
            </div>

            <!-- Instructions -->
            <div class="instructions">
                <h3>📋 Langkah Selanjutnya:</h3>
                <ol>
                    <li>Buka aplikasi BookHub Sekolah</li>
                    <li>Masuk dengan Email dan Password di atas</li>
                    <li>Silakan ubah password Anda dengan password yang lebih aman</li>
                    <li>Mulai meminjam buku yang Anda inginkan</li>
                </ol>
            </div>

            <!-- Warning -->
            <div class="warning">
                <strong>⚠️ Perhatian Penting:</strong>
                Jangan bagikan password ini kepada siapapun. Password bersifat pribadi dan hanya untuk Anda gunakan. Kami menyarankan Anda untuk mengubah password setelah login untuk keamanan akun yang lebih baik.
            </div>

            <p style="text-align: center; margin: 30px 0;">
                <a href="http://127.0.0.1:8000/login" class="button">Login Sekarang</a>
            </p>

            <p style="color: #64748b; font-size: 14px;">
                Jika Anda tidak mendaftar akun ini atau merasa ada kesalahan, silakan hubungi admin sistem kami.
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p style="margin: 0;">
                © 2026 BookHub Sekolah. All rights reserved.<br>
                Email ini dikirim karena Anda telah mendaftar di sistem kami.
            </p>
        </div>
    </div>
</body>
</html>