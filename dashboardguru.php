<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru - Absensi</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 50%, #dbeafe 100%);
            background-attachment: fixed;
            min-height: 100vh;
        }

        /* Header */
        .header {
            background: white;
            border-bottom: 2px solid #e0f2fe;
            padding: 16px 24px;
            box-shadow: 0 2px 10px rgba(59, 130, 246, 0.08);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-content {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-icon {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #bfdbfe, #93c5fd);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-icon svg {
            width: 24px;
            height: 24px;
        }

        .header-title h1 {
            font-size: 1.25rem;
            color: #1e3a8a;
            font-weight: 700;
        }

        .header-title p {
            font-size: 0.85rem;
            color: #60a5fa;
        }

        .user-section {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .notification-btn {
            position: relative;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: #f0f9ff;
            border: 2px solid #e0f2fe;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .notification-btn:hover {
            background: #dbeafe;
            border-color: #bfdbfe;
        }

        .notification-badge {
            position: absolute;
            top: -4px;
            right: -4px;
            width: 18px;
            height: 18px;
            background: #ef4444;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            color: white;
            font-weight: 700;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 16px;
            background: #f0f9ff;
            border-radius: 12px;
            border: 2px solid #e0f2fe;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 0.9rem;
        }

        .user-details {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-size: 0.9rem;
            font-weight: 600;
            color: #1e40af;
        }

        .user-role {
            font-size: 0.75rem;
            color: #60a5fa;
        }

        .logout-btn {
            padding: 10px 18px;
            background: white;
            color: #ef4444;
            border: 2px solid #fee2e2;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .logout-btn:hover {
            background: #fef2f2;
            border-color: #fecaca;
        }

        /* Main Container */
        .main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 30px 24px;
        }

        /* Welcome Section */
        .welcome-section {
            background: white;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            border: 2px solid #e0f2fe;
            box-shadow: 0 4px 20px rgba(59, 130, 246, 0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .welcome-text h2 {
            font-size: 1.75rem;
            color: #1e3a8a;
            margin-bottom: 8px;
        }

        .welcome-text p {
            color: #60a5fa;
            font-size: 1rem;
        }

        .date-time {
            text-align: right;
        }

        .current-date {
            font-size: 1rem;
            color: #1e40af;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .current-time {
            font-size: 1.5rem;
            color: #3b82f6;
            font-weight: 700;
        }

        /* Quick Stats */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            border: 2px solid #e0f2fe;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.08);
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .stat-icon.green {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
        }

        .stat-icon.blue {
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
        }

        .stat-icon.yellow {
            background: linear-gradient(135deg, #fef3c7, #fde68a);
        }

        .stat-icon svg {
            width: 28px;
            height: 28px;
        }

        .stat-content h3 {
            font-size: 1.75rem;
            color: #1e3a8a;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .stat-content p {
            color: #60a5fa;
            font-size: 0.85rem;
            font-weight: 500;
        }

        /* Absensi Card */
        .absensi-card {
            background: white;
            border-radius: 20px;
            padding: 35px;
            margin-bottom: 30px;
            border: 2px solid #e0f2fe;
            box-shadow: 0 4px 20px rgba(59, 130, 246, 0.08);
            text-align: center;
        }

        .absensi-title {
            font-size: 1.5rem;
            color: #1e3a8a;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .absensi-subtitle {
            color: #60a5fa;
            font-size: 1rem;
            margin-bottom: 30px;
        }

        .camera-placeholder {
            width: 280px;
            height: 280px;
            margin: 0 auto 25px;
            background: linear-gradient(135deg, #f0f9ff, #dbeafe);
            border-radius: 20px;
            border: 3px dashed #93c5fd;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 16px;
        }

        .camera-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .camera-icon svg {
            width: 40px;
            height: 40px;
            stroke: white;
        }

        .camera-text {
            color: #60a5fa;
            font-size: 1rem;
            font-weight: 500;
        }

        .absensi-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-absensi {
            padding: 16px 32px;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            border: none;
            border-radius: 14px;
            font-size: 1.05rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-absensi:hover {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
        }

        .btn-absensi.secondary {
            background: white;
            color: #3b82f6;
            border: 2px solid #e0f2fe;
            box-shadow: none;
        }

        .btn-absensi.secondary:hover {
            background: #f0f9ff;
            border-color: #bfdbfe;
        }

        /* Menu Grid */
        .menu-section {
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 1.5rem;
            color: #1e3a8a;
            font-weight: 700;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .menu-card {
            background: white;
            border-radius: 20px;
            padding: 28px;
            border: 2px solid #e0f2fe;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.08);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .menu-card::before {
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

        .menu-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 30px rgba(59, 130, 246, 0.15);
            border-color: #93c5fd;
        }

        .menu-card:hover::before {
            transform: scaleX(1);
        }

        .menu-icon {
            width: 60px;
            height: 60px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 18px;
        }

        .menu-icon.blue {
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
        }

        .menu-icon.purple {
            background: linear-gradient(135deg, #e9d5ff, #d8b4fe);
        }

        .menu-icon svg {
            width: 30px;
            height: 30px;
        }

        .menu-card h3 {
            font-size: 1.15rem;
            color: #1e3a8a;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .menu-card p {
            color: #60a5fa;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 16px;
                align-items: flex-start;
            }

            .user-section {
                width: 100%;
                justify-content: space-between;
            }

            .user-details {
                display: none;
            }

            .main-container {
                padding: 20px 16px;
            }

            .welcome-section {
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }

            .date-time {
                text-align: center;
            }

            .welcome-text h2 {
                font-size: 1.5rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .absensi-card {
                padding: 25px 20px;
            }

            .camera-placeholder {
                width: 100%;
                max-width: 280px;
                height: 240px;
            }

            .menu-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <div class="logo-section">
                <div class="logo-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                </div>
                <div class="header-title">
                    <h1>Absensi Guru</h1>
                    <p>Dashboard Guru</p>
                </div>
            </div>

            <div class="user-section">
                <button class="notification-btn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
                    </svg>
                    <span class="notification-badge">2</span>
                </button>

                <div class="user-info">
                    <div class="user-avatar">BS</div>
                    <div class="user-details">
                        <span class="user-name">Budi Santoso</span>
                        <span class="user-role">Guru Matematika</span>
                    </div>
                </div>

                <button class="logout-btn" onclick="logout()">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                        <polyline points="16 17 21 12 16 7"/>
                        <line x1="21" y1="12" x2="9" y2="12"/>
                    </svg>
                    Keluar
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-container">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <div class="welcome-text">
                <h2>Selamat Datang, Budi Santoso! 👋</h2>
                <p>Jangan lupa absen hari ini ya!</p>
            </div>
            <div class="date-time">
                <div class="current-date">Selasa, 11 November 2025</div>
                <div class="current-time" id="currentTime">07:30:15</div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon green">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                        <polyline points="22 4 12 14.01 9 11.01"/>
                    </svg>
                </div>
                <div class="stat-content">
                    <h3>22</h3>
                    <p>Hari Hadir</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon blue">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                </div>
                <div class="stat-content">
                    <h3>2</h3>
                    <p>Izin/Cuti</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon yellow">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/>
                        <line x1="12" y1="9" x2="12" y2="13"/>
                        <line x1="12" y1="17" x2="12.01" y2="17"/>
                    </svg>
                </div>
                <div class="stat-content">
                    <h3>95%</h3>
                    <p>Persentase Hadir</p>
                </div>
            </div>
        </div>

        <!-- Absensi Card -->
        <div class="absensi-card">
            <h2 class="absensi-title">Absensi Hari Ini</h2>
            <p class="absensi-subtitle">Ambil foto selfie untuk melakukan absensi</p>

            <div class="camera-placeholder">
                <div class="camera-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/>
                        <circle cx="12" cy="13" r="4"/>
                    </svg>
                </div>
                <p class="camera-text">Klik tombol di bawah untuk mulai</p>
            </div>

            <div class="absensi-buttons">
                <button class="btn-absensi" onclick="goToAbsensi()">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/>
                        <circle cx="12" cy="13" r="4"/>
                    </svg>
                    Mulai Absensi
                </button>
                <button class="btn-absensi secondary" onclick="goToPage('riwayat_absensi.php')">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                    Lihat Riwayat
                </button>
            </div>
        </div>

        <!-- Menu Section -->
        <div class="menu-section">
            <h2 class="section-title">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="7" height="7"/>
                    <rect x="14" y="3" width="7" height="7"/>
                    <rect x="14" y="14" width="7" height="7"/>
                    <rect x="3" y="14" width="7" height="7"/>
                </svg>
                Menu Lainnya
            </h2>

            <div class="menu-grid">
                <div class="menu-card" onclick="goToPage('riwayat_kehadiran.php')">
                    <div class="menu-icon blue">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/>
                            <line x1="16" y1="13" x2="8" y2="13"/>
                            <line x1="16" y1="17" x2="8" y2="17"/>
                            <polyline points="10 9 9 9 8 9"/>
                        </svg>
                    </div>
                    <h3>Riwayat Kehadiran</h3>
                    <p>Lihat histori absensi dan kehadiran Anda</p>
                </div>

                <div class="menu-card" onclick="goToPage('pengajuan_izin.php')">
                    <div class="menu-icon purple">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#9333ea" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/>
                            <line x1="12" y1="18" x2="12" y2="12"/>
                            <line x1="9" y1="15" x2="15" y2="15"/>
                        </svg>
                    </div>
                    <h3>Pengajuan Izin / Cuti</h3>
                    <p>Ajukan izin tidak masuk atau cuti</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Update current time
        function updateTime() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('currentTime').textContent = `${hours}:${minutes}:${seconds}`;
        }

        // Update time every second
        setInterval(updateTime, 1000);
        updateTime();

        function goToAbsensi() {
            window.location.href = 'form_absensi.php';
        }

        function goToPage(page) {
            window.location.href = page;
        }

        function logout() {
            if (confirm('Apakah Anda yakin ingin keluar?')) {
                window.location.href = 'loginguru.php';
            }
        }
    </script>
</body>
</html>