<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Absensi Guru</title>
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
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
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
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .user-info:hover {
            background: #dbeafe;
            border-color: #bfdbfe;
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
        }

        .welcome-section h2 {
            font-size: 1.75rem;
            color: #1e3a8a;
            margin-bottom: 8px;
        }

        .welcome-section p {
            color: #60a5fa;
            font-size: 1rem;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            border: 2px solid #e0f2fe;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.08);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.15);
            border-color: #bfdbfe;
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
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

        .stat-icon.red {
            background: linear-gradient(135deg, #fee2e2, #fecaca);
        }

        .stat-icon svg {
            width: 24px;
            height: 24px;
        }

        .stat-content h3 {
            font-size: 2rem;
            color: #1e3a8a;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .stat-content p {
            color: #60a5fa;
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* Menu Navigation */
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
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .menu-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
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
            width: 64px;
            height: 64px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .menu-icon.purple {
            background: linear-gradient(135deg, #e9d5ff, #d8b4fe);
        }

        .menu-icon.blue {
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
        }

        .menu-icon.orange {
            background: linear-gradient(135deg, #fed7aa, #fdba74);
        }

        .menu-icon svg {
            width: 32px;
            height: 32px;
        }

        .menu-card h3 {
            font-size: 1.25rem;
            color: #1e3a8a;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .menu-card p {
            color: #60a5fa;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .menu-card .arrow {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #3b82f6;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .menu-card:hover .arrow {
            gap: 10px;
        }

        /* Quick Actions */
        .quick-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .action-btn {
            padding: 12px 20px;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .action-btn:hover {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
        }

        .action-btn.secondary {
            background: white;
            color: #3b82f6;
            border: 2px solid #e0f2fe;
            box-shadow: none;
        }

        .action-btn.secondary:hover {
            background: #f0f9ff;
            border-color: #bfdbfe;
        }

        /* Logout Button */
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

            .main-container {
                padding: 20px 16px;
            }

            .welcome-section {
                padding: 20px;
            }

            .welcome-section h2 {
                font-size: 1.5rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .menu-grid {
                grid-template-columns: 1fr;
            }

            .user-details {
                display: none;
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
                        <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                        <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                    </svg>
                </div>
                <div class="header-title">
                    <h1>Absensi Guru</h1>
                    <p>Dashboard Admin</p>
                </div>
            </div>

            <div class="user-section">
                <button class="notification-btn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
                    </svg>
                    <span class="notification-badge">3</span>
                </button>

                <div class="user-info">
                    <div class="user-avatar">AD</div>
                    <div class="user-details">
                        <span class="user-name">Administrator</span>
                        <span class="user-role">Admin</span>
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
            <h2>Selamat Datang, Administrator! 👋</h2>
            <p>Kelola sistem absensi guru dengan mudah dan efisien</p>
        </div>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon green">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                    </div>
                </div>
                <div class="stat-content">
                    <h3>45</h3>
                    <p>Total Guru</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon blue">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                            <polyline points="22 4 12 14.01 9 11.01"/>
                        </svg>
                    </div>
                </div>
                <div class="stat-content">
                    <h3>42</h3>
                    <p>Hadir Hari Ini</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon yellow">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <polyline points="12 6 12 12 16 14"/>
                        </svg>
                    </div>
                </div>
                <div class="stat-content">
                    <h3>2</h3>
                    <p>Izin/Cuti</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon red">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <line x1="15" y1="9" x2="9" y2="15"/>
                            <line x1="9" y1="9" x2="15" y2="15"/>
                        </svg>
                    </div>
                </div>
                <div class="stat-content">
                    <h3>1</h3>
                    <p>Alpha</p>
                </div>
            </div>
        </div>

        <!-- Menu Navigation -->
        <div class="menu-section">
            <h2 class="section-title">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="7" height="7"/>
                    <rect x="14" y="3" width="7" height="7"/>
                    <rect x="14" y="14" width="7" height="7"/>
                    <rect x="3" y="14" width="7" height="7"/>
                </svg>
                Menu Navigasi
            </h2>

            <div class="menu-grid">
                <!-- Kelola Guru -->
                <div class="menu-card" onclick="goToPage('kelola_guru.php')">
                    <div class="menu-icon purple">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#9333ea" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                    </div>
                    <h3>Kelola Guru</h3>
                    <p>Tambah, edit, dan hapus data guru. Kelola informasi pegawai dengan mudah.</p>
                    <span class="arrow">
                        Buka Menu
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"/>
                            <polyline points="12 5 19 12 12 19"/>
                        </svg>
                    </span>
                </div>

                <!-- Kelola Hari Kerja/Libur -->
                <div class="menu-card" onclick="goToPage('kelola_kalender.php')">
                    <div class="menu-icon blue">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                            <line x1="16" y1="2" x2="16" y2="6"/>
                            <line x1="8" y1="2" x2="8" y2="6"/>
                            <line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                    </div>
                    <h3>Kelola Hari Kerja / Libur</h3>
                    <p>Atur jadwal hari kerja, libur, dan hari besar. Tampilkan kalender sistem.</p>
                    <span class="arrow">
                        Buka Menu
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"/>
                            <polyline points="12 5 19 12 12 19"/>
                        </svg>
                    </span>
                </div>

                <!-- Lihat Laporan Absensi -->
                <div class="menu-card" onclick="goToPage('laporan_absensi.php')">
                    <div class="menu-icon orange">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#f97316" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/>
                            <line x1="16" y1="13" x2="8" y2="13"/>
                            <line x1="16" y1="17" x2="8" y2="17"/>
                            <polyline points="10 9 9 9 8 9"/>
                        </svg>
                    </div>
                    <h3>Lihat Laporan Absensi</h3>
                    <p>Lihat dan export laporan absensi berdasarkan periode. Hitung potongan gaji otomatis.</p>
                    <span class="arrow">
                        Buka Menu
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"/>
                            <polyline points="12 5 19 12 12 19"/>
                        </svg>
                    </span>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="menu-section">
            <h2 class="section-title">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 11 12 14 22 4"/>
                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>
                </svg>
                Aksi Cepat
            </h2>
            <div class="quick-actions">
                <button class="action-btn" onclick="goToPage('tambah_guru.php')">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"/>
                        <line x1="5" y1="12" x2="19" y2="12"/>
                    </svg>
                    Tambah Guru Baru
                </button>
                <button class="action-btn secondary" onclick="goToPage('laporan_hari_ini.php')">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                        <polyline points="7 10 12 15 17 10"/>
                        <line x1="12" y1="15" x2="12" y2="3"/>
                    </svg>
                    Export Laporan Hari Ini
                </button>
                <button class="action-btn secondary" onclick="goToPage('pengaturan.php')">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M12 1v6m0 6v6m-9-9h6m6 0h6"/>
                        <path d="m19 19-2-2m-2-2-2-2m2 2 2 2m-2-2 2-2"/>
                    </svg>
                    Pengaturan Sistem
                </button>
            </div>
        </div>
    </div>

    <script>
        function goToPage(page) {
            window.location.href = page;
        }

        function logout() {
            if (confirm('Apakah Anda yakin ingin keluar?')) {
                window.location.href = 'login.php';
            }
        }
    </script>
</body>
</html>