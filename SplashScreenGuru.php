<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading - Absensi Guru</title>
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
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        /* Animated background circles */
        .bg-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(59, 130, 246, 0.08);
            filter: blur(60px);
            animation: pulse 4s ease-in-out infinite;
        }

        .circle-1 {
            width: 300px;
            height: 300px;
            top: 20%;
            left: 20%;
            background: rgba(147, 197, 253, 0.1);
            animation-delay: 0s;
        }

        .circle-2 {
            width: 400px;
            height: 400px;
            bottom: 20%;
            right: 20%;
            background: rgba(96, 165, 250, 0.1);
            animation-delay: 1s;
        }

        .circle-3 {
            width: 250px;
            height: 250px;
            top: 50%;
            right: 30%;
            background: rgba(191, 219, 254, 0.12);
            animation-delay: 0.5s;
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 0.4;
                transform: scale(1);
            }
            50% {
                opacity: 0.6;
                transform: scale(1.1);
            }
        }

        /* Main container */
        .splash-container {
            text-align: center;
            position: relative;
            z-index: 10;
            padding: 20px;
        }

        /* Logo container */
        .logo-container {
            position: relative;
            width: 160px;
            height: 160px;
            margin: 0 auto 40px;
        }

        .rotating-ring {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 3px solid #dbeafe;
            border-radius: 50%;
            animation: spin 3s linear infinite;
        }

        .pulsing-ring {
            position: absolute;
            top: 10px;
            left: 10px;
            width: calc(100% - 20px);
            height: calc(100% - 20px);
            border: 3px solid #bfdbfe;
            border-radius: 50%;
            animation: pulse-ring 2s ease-in-out infinite;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes pulse-ring {
            0%, 100% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.1);
                opacity: 0.6;
            }
        }

        .logo-box {
            position: relative;
            width: 140px;
            height: 140px;
            margin: 10px;
            background: linear-gradient(135deg, #ffffff 0%, #f0f9ff 100%);
            border-radius: 28px;
            box-shadow: 0 10px 40px rgba(59, 130, 246, 0.15);
            border: 2px solid rgba(147, 197, 253, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease;
        }

        .logo-box:hover {
            transform: scale(1.05);
        }

        .logo-icon {
            width: 70px;
            height: 70px;
        }

        /* Floating dots */
        .floating-dot {
            position: absolute;
            border-radius: 50%;
            animation: bounce 1.2s ease-in-out infinite;
        }

        .dot-1 {
            width: 14px;
            height: 14px;
            background: #60a5fa;
            top: -7px;
            right: -7px;
        }

        .dot-2 {
            width: 10px;
            height: 10px;
            background: #93c5fd;
            bottom: -5px;
            left: -5px;
            animation-delay: 0.3s;
        }

        .dot-3 {
            width: 10px;
            height: 10px;
            background: #3b82f6;
            top: 50%;
            right: -15px;
            animation-delay: 0.5s;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        /* Title */
        .title {
            font-size: 3rem;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 10px;
            letter-spacing: -0.5px;
        }

        .subtitle {
            font-size: 1.25rem;
            color: #3b82f6;
            margin-bottom: 50px;
            font-weight: 500;
        }

        /* Loading step */
        .loading-step {
            display: inline-flex;
            align-items: center;
            gap: 14px;
            background: white;
            padding: 18px 28px;
            border-radius: 50px;
            box-shadow: 0 4px 20px rgba(59, 130, 246, 0.12);
            border: 2px solid rgba(147, 197, 253, 0.3);
            margin-bottom: 35px;
        }

        .step-icon {
            width: 28px;
            height: 28px;
            position: relative;
            animation: pulse-icon 1.5s ease-in-out infinite;
        }

        @keyframes pulse-icon {
            0%, 100% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.15);
                opacity: 0.7;
            }
        }

        .step-text {
            color: #1e40af;
            font-size: 1.125rem;
            font-weight: 600;
        }

        /* Progress bar */
        .progress-container {
            max-width: 420px;
            margin: 0 auto 28px;
        }

        .progress-bar {
            width: 100%;
            height: 10px;
            background: white;
            border-radius: 50px;
            overflow: hidden;
            box-shadow: inset 0 2px 4px rgba(59, 130, 246, 0.08);
            border: 1px solid rgba(147, 197, 253, 0.3);
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #3b82f6 0%, #60a5fa 50%, #93c5fd 100%);
            border-radius: 50px;
            width: 0%;
            transition: width 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .progress-fill::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            to {
                left: 100%;
            }
        }

        .progress-text {
            color: #3b82f6;
            font-size: 1rem;
            margin-top: 14px;
            font-weight: 600;
        }

        /* Step dots */
        .step-dots {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 40px;
        }

        .dot {
            height: 8px;
            border-radius: 50px;
            transition: all 0.5s ease;
            background: #dbeafe;
        }

        .dot.active {
            width: 32px;
            background: linear-gradient(90deg, #3b82f6, #60a5fa);
        }

        .dot.completed {
            width: 8px;
            background: #93c5fd;
        }

        .dot.pending {
            width: 8px;
        }

        /* Footer */
        .footer {
            color: #60a5fa;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .footer-brand {
            color: #2563eb;
            font-weight: 700;
            margin-top: 6px;
            font-size: 1rem;
        }

        @media (max-width: 640px) {
            .title {
                font-size: 2rem;
            }
            .subtitle {
                font-size: 1rem;
            }
            .logo-container {
                width: 120px;
                height: 120px;
            }
            .logo-box {
                width: 100px;
                height: 100px;
            }
            .logo-icon {
                width: 50px;
                height: 50px;
            }
        }
    </style>
</head>
<body>
    <!-- Background circles -->
    <div class="bg-circle circle-1"></div>
    <div class="bg-circle circle-2"></div>
    <div class="bg-circle circle-3"></div>

    <!-- Main splash content -->
    <div class="splash-container">
        <!-- Logo -->
        <div class="logo-container">
            <div class="rotating-ring"></div>
            <div class="pulsing-ring"></div>
            <div class="logo-box">
                <!-- SVG Icon - Graduation Cap -->
                <svg class="logo-icon" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                    <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                </svg>
            </div>
            <div class="floating-dot dot-1"></div>
            <div class="floating-dot dot-2"></div>
            <div class="floating-dot dot-3"></div>
        </div>

        <!-- Title -->
        <h1 class="title">Absensi Guru</h1>
        <p class="subtitle">Sistem Manajemen Kehadiran</p>

        <!-- Loading step -->
        <div class="loading-step">
            <svg class="step-icon" id="stepIcon" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            </svg>
            <span class="step-text" id="stepText">Memuat data guru...</span>
        </div>

        <!-- Progress bar -->
        <div class="progress-container">
            <div class="progress-bar">
                <div class="progress-fill" id="progressFill"></div>
            </div>
            <p class="progress-text"><span id="progressPercent">0</span>%</p>
        </div>

        <!-- Step dots -->
        <div class="step-dots">
            <div class="dot active" id="dot0"></div>
            <div class="dot pending" id="dot1"></div>
            <div class="dot pending" id="dot2"></div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Create by</p>
            <p class="footer-brand">Kelompok 2</p>
        </div>
    </div>

    <script>
        const steps = [
            {
                text: 'Memuat data guru...',
                icon: '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>'
            },
            {
                text: 'Menyiapkan absensi...',
                icon: '<rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>'
            },
            {
                text: 'Hampir selesai...',
                icon: '<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>'
            }
        ];

        let progress = 0;
        let currentStep = 0;

        const progressFill = document.getElementById('progressFill');
        const progressPercent = document.getElementById('progressPercent');
        const stepText = document.getElementById('stepText');
        const stepIcon = document.getElementById('stepIcon');

        // Update progress
        const progressInterval = setInterval(() => {
            if (progress >= 100) {
                clearInterval(progressInterval);
                // Redirect after loading complete
                setTimeout(() => {
                    window.location.href = 'Role_Selection.php'; // Ganti dengan halaman tujuan
                }, 500);
            } else {
                progress += 2;
                progressFill.style.width = progress + '%';
                progressPercent.textContent = progress;
            }
        }, 50);

        // Update steps
        const stepInterval = setInterval(() => {
            if (currentStep < steps.length - 1) {
                // Mark current as completed
                document.getElementById('dot' + currentStep).className = 'dot completed';
                
                currentStep++;
                
                // Update to new step
                stepText.textContent = steps[currentStep].text;
                stepIcon.innerHTML = steps[currentStep].icon;
                document.getElementById('dot' + currentStep).className = 'dot active';
            } else {
                clearInterval(stepInterval);
            }
        }, 1500);
    </script>
</body>
</html>