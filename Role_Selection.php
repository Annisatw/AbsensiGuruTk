<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Role - Absensi Guru</title>
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
            padding: 20px;
            position: relative;
            overflow-x: hidden;
            overflow-y: auto;
        }

        /* Animated background circles */
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
            animation-delay: 0s;
        }

        .circle-2 {
            width: 300px;
            height: 300px;
            bottom: -80px;
            right: -80px;
            animation-delay: 2s;
        }

        .circle-3 {
            width: 250px;
            height: 250px;
            top: 50%;
            left: 50%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% {
                transform: translate(0, 0);
            }
            33% {
                transform: translate(30px, -30px);
            }
            66% {
                transform: translate(-20px, 20px);
            }
        }

        .container {
            max-width: 1000px;
            width: 100%;
            position: relative;
            z-index: 10;
            animation: fadeIn 0.6s ease-out;
            margin: auto;
            padding: 20px 0;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Header Section */
        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo-small {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, #ffffff 0%, #f0f9ff 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 30px rgba(59, 130, 246, 0.15);
            border: 2px solid rgba(147, 197, 253, 0.3);
        }

        .logo-small svg {
            width: 40px;
            height: 40px;
        }

        .header h1 {
            font-size: 2.5rem;
            color: #1e3a8a;
            margin-bottom: 8px;
            font-weight: 700;
        }

        .header p {
            font-size: 1.125rem;
            color: #3b82f6;
            font-weight: 500;
        }

        /* Role Cards Container */
        .role-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
            align-items: stretch;
        }

        /* Role Card */
        .role-card {
            background: white;
            border-radius: 24px;
            padding: 40px 30px 30px 30px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(59, 130, 246, 0.08);
            border: 2px solid rgba(147, 197, 253, 0.2);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: visible;
            display: flex;
            flex-direction: column;
        }

        .role-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #3b82f6, #60a5fa);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .role-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 40px rgba(59, 130, 246, 0.2);
            border-color: #93c5fd;
        }

        .role-card:hover::before {
            transform: scaleX(1);
        }

        .role-card:active {
            transform: translateY(-4px);
        }

        /* Icon Container */
        .icon-container {
            width: 100px;
            height: 100px;
            margin: 0 auto 25px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            transition: all 0.3s ease;
        }

        .role-card:hover .icon-container {
            transform: scale(1.1) rotate(5deg);
        }

        .admin-icon {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
        }

        .teacher-icon {
            background: linear-gradient(135deg, #bfdbfe 0%, #93c5fd 100%);
        }

        .icon-container svg {
            width: 50px;
            height: 50px;
            stroke: #2563eb;
            stroke-width: 2;
        }

        /* Floating badge */
        .badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: linear-gradient(135deg, #3b82f6, #60a5fa);
            color: white;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: bold;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
            animation: pulse-badge 2s ease-in-out infinite;
        }

        @keyframes pulse-badge {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }

        /* Card Title */
        .role-card h2 {
            font-size: 1.75rem;
            color: #1e40af;
            margin-bottom: 12px;
            font-weight: 700;
        }

        .role-card p {
            color: #60a5fa;
            font-size: 1rem;
            margin-bottom: 25px;
            line-height: 1.6;
        }

        /* Features List */
        .features {
            text-align: left;
            margin-bottom: 30px;
            flex-grow: 1;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #1e40af;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .feature-item svg {
            width: 18px;
            height: 18px;
            stroke: #3b82f6;
            flex-shrink: 0;
        }

        /* Button */
        .btn {
            width: 100%;
            padding: 14px 24px;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.2);
        }

        .btn:hover {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.3);
            transform: translateY(-2px);
        }

        .btn:active {
            transform: translateY(0);
        }

        /* Footer */
        .footer {
            text-align: center;
            color: #60a5fa;
            font-size: 0.9rem;
            margin-top: 40px;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 15px;
        }

        .footer-link {
            color: #3b82f6;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: #2563eb;
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding: 15px;
            }

            .container {
                padding: 10px 0;
            }

            .header {
                margin-bottom: 30px;
            }

            .header h1 {
                font-size: 2rem;
            }

            .header p {
                font-size: 1rem;
            }

            .role-container {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .role-card {
                padding: 30px 20px 25px 20px;
            }

            .icon-container {
                width: 80px;
                height: 80px;
            }

            .icon-container svg {
                width: 40px;
                height: 40px;
            }
        }
    </style>
</head>
<body>
    <!-- Background circles -->
    <div class="bg-circle circle-1"></div>
    <div class="bg-circle circle-2"></div>
    <div class="bg-circle circle-3"></div>

    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="logo-small">
                <svg viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                    <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                </svg>
            </div>
            <h1>Selamat Datang</h1>
            <p>Pilih role untuk melanjutkan</p>
        </div>

        <!-- Role Cards -->
        <div class="role-container">
            <!-- Admin Card -->
            <div class="role-card" onclick="selectRole('admin')">
                <div class="icon-container admin-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                        <path d="M2 17l10 5 10-5"/>
                        <path d="M2 12l10 5 10-5"/>
                    </svg>
                    <div class="badge">★</div>
                </div>
                <h2>Admin</h2>
                <p>Kelola sistem absensi dan data guru</p>
                
                <div class="features">
                    <div class="feature-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                        <span>Kelola data guru & pegawai</span>
                    </div>
                    <div class="feature-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                        <span>Kelola hari kerja / libur </span>
                    </div>
                    <div class="feature-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                        <span>Laporan & statistik lengkap</span>
                    </div>
                    <div class="feature-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                        <span>Pengaturan sistem</span>
                    </div>
                </div>

                <button class="btn">Masuk sebagai Admin</button>
            </div>

            <!-- Teacher Card -->
            <div class="role-card" onclick="selectRole('guru')">
                <div class="icon-container teacher-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    <div class="badge">✓</div>
                </div>
                <h2>Guru</h2>
                <p>Absensi dan kelola kehadiran Anda</p>
                
                <div class="features">
                    <div class="feature-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                        <span>Absensi masuk & pulang</span>
                    </div>
                    <div class="feature-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                        <span>Riwayat kehadiran pribadi</span>
                    </div>
                    <div class="feature-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                        <span>Pengajuan izin & cuti</span>
                    </div>
                    <div class="feature-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                        <span>Notifikasi reminder</span>
                    </div>
                </div>

                <button class="btn">Masuk sebagai Guru</button>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>© 2025 Kelompok 2. All rights reserved.</p>
            <div class="footer-links">
                <a href="#" class="footer-link">Bantuan</a>
                <a href="#" class="footer-link">Panduan</a>
                <a href="#" class="footer-link">Kontak</a>
            </div>
        </div>
    </div>

    <script>
        function selectRole(role) {
    // Add loading animation
    const card = event.currentTarget;
    card.style.transform = 'scale(0.95)';
    card.style.opacity = '0.7';

    // Redirect based on role
    setTimeout(() => {
        if (role === 'admin') {
            window.location.href = 'loginadmin.php';
        } else if (role === 'guru') {
            window.location.href = 'loginguru.php';
        }
    }, 300);
}

        // Add entrance animation on page load
        window.addEventListener('load', () => {
            const cards = document.querySelectorAll('.role-card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    card.style.transition = 'all 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 100 * (index + 1));
            });
        });
    </script>
</body>
</html>