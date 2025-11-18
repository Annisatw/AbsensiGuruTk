<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Guru - Absensi Guru</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 50%, #dbeafe 100%);
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            position: relative;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .bg-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(59, 130, 246, 0.08);
            filter: blur(60px);
            animation: float 8s ease-in-out infinite;
        }

        .circle-1 {
            width: 400px;
            height: 400px;
            top: -100px;
            left: -100px;
        }

        .circle-2 {
            width: 300px;
            height: 300px;
            bottom: -80px;
            right: -80px;
            animation-delay: 2s;
        }

        @keyframes float {
            0%, 100% {
                transform: translate(0, 0);
            }
            50% {
                transform: translate(20px, -20px);
            }
        }

        .login-container {
            max-width: 450px;
            width: 100%;
            position: relative;
            z-index: 10;
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-card {
            background: white;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(59, 130, 246, 0.15);
            border: 2px solid rgba(147, 197, 253, 0.3);
        }

        .logo-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, #bfdbfe 0%, #93c5fd 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.15);
        }

        .logo svg {
            width: 45px;
            height: 45px;
        }

        .logo-container h1 {
            font-size: 1.75rem;
            color: #1e3a8a;
            margin-bottom: 8px;
            font-weight: 700;
        }

        .logo-container p {
            color: #60a5fa;
            font-size: 1rem;
        }

        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 24px;
            background: linear-gradient(135deg, #bfdbfe, #93c5fd);
            color: #1e40af;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 25px;
        }

        .role-badge svg {
            width: 18px;
            height: 18px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            color: #1e40af;
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #60a5fa;
        }

        input {
            width: 100%;
            padding: 14px 14px 14px 45px;
            border: 2px solid #e0f2fe;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            color: #1e40af;
            background: #f8fafc;
        }

        input:focus {
            outline: none;
            border-color: #3b82f6;
            background: white;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        .password-toggle {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #60a5fa;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: #3b82f6;
        }

        .forgot-password {
            text-align: right;
            margin-top: 8px;
        }

        .forgot-password a {
            color: #3b82f6;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .forgot-password a:hover {
            color: #2563eb;
            text-decoration: underline;
        }

        .btn-login {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.05rem;
            font-weight: 700;
            cursor: pointer;
            margin-top: 25px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .btn-back {
            width: 100%;
            padding: 14px;
            background: white;
            color: #3b82f6;
            border: 2px solid #e0f2fe;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 12px;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background: #f0f9ff;
            border-color: #bfdbfe;
        }

        .error-message {
            background: #fee2e2;
            border: 2px solid #fecaca;
            color: #dc2626;
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: none;
            font-size: 0.9rem;
            font-weight: 500;
            animation: slideDown 0.3s ease-out;
        }

        .error-message.show {
            display: block;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }

        .info-box {
            background: #f0f9ff;
            border: 2px solid #dbeafe;
            border-radius: 12px;
            padding: 14px;
            margin-bottom: 20px;
            display: flex;
            align-items: start;
            gap: 12px;
        }

        .info-box svg {
            flex-shrink: 0;
            margin-top: 2px;
        }

        .info-box p {
            color: #1e40af;
            font-size: 0.85rem;
            line-height: 1.5;
        }

        @media (max-width: 640px) {
            .login-card {
                padding: 30px 25px;
            }

            .logo-container h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="bg-circle circle-1"></div>
    <div class="bg-circle circle-2"></div>

    <div class="login-container">
        <div class="login-card">
            <div class="logo-container">
                <div class="logo">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                </div>
                <h1>Login Guru</h1>
            </div>

            <div style="text-align: center;">
                <span class="role-badge">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    Guru / Pengajar
                </span>
            </div>

            <div class="info-box">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <line x1="12" y1="16" x2="12" y2="12"/>
                    <line x1="12" y1="8" x2="12.01" y2="8"/>
                </svg>
                <p>Gunakan username dan password yang diberikan oleh admin untuk login pertama kali.</p>
            </div>

            <div class="error-message" id="errorMessage">
                <strong>Login Gagal!</strong><br>
                Username atau password salah. Silakan coba lagi.
            </div>

            <form id="loginForm" onsubmit="handleLogin(event)">
                <div class="form-group">
                    <label for="username">Username</label>
                    <div class="input-wrapper">
                        <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                        <input type="text" id="username" name="username" placeholder="Masukkan username guru" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                        </svg>
                        <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                        <svg class="password-toggle" onclick="togglePassword()" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path id="eyeIcon" d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                            <circle id="eyeCircle" cx="12" cy="12" r="3"/>
                        </svg>
                    </div>
                    <div class="forgot-password">
                        <a href="#">Lupa password?</a>
                    </div>
                </div>

                <button type="submit" class="btn-login">Masuk sebagai Guru</button>
                <button type="button" class="btn-back" onclick="goBack()">Kembali ke Pilihan Role</button>
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            const eyeCircle = document.getElementById('eyeCircle');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.setAttribute('d', 'M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24');
                eyeCircle.style.display = 'none';
            } else {
                passwordInput.type = 'password';
                eyeIcon.setAttribute('d', 'M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z');
                eyeCircle.style.display = 'block';
            }
        }

        function handleLogin(event) {
            event.preventDefault();
            
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const errorMessage = document.getElementById('errorMessage');

            // Simulasi validasi login (ganti dengan logika PHP/database Anda)
            // Contoh kredensial dummy untuk guru:
            const validUsername = 'guru';
            const validPassword = 'guru123';

            if (username === validUsername && password === validPassword) {
                // Login berhasil
                errorMessage.classList.remove('show');
                
                // Redirect ke dashboard guru
                window.location.href = 'dashboardguru.php';
            } else {
                // Login gagal - tampilkan pesan error
                errorMessage.classList.add('show');
                
                // Shake animation untuk form
                const form = document.getElementById('loginForm');
                form.style.animation = 'shake 0.5s';
                setTimeout(() => {
                    form.style.animation = '';
                }, 500);

                // Auto hide error message after 5 seconds
                setTimeout(() => {
                    errorMessage.classList.remove('show');
                }, 5000);
            }
        }

        function goBack() {
            window.location.href = 'role_selection.php';
        }
    </script>
</body>
</html>