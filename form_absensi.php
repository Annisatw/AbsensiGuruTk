<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Absensi - Foto & GPS</title>
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
            padding: 20px;
            overflow-y: auto;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px 0;
        }

        /* Header Card */
        .header-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 20px;
            border: 2px solid #e0f2fe;
            box-shadow: 0 4px 20px rgba(59, 130, 246, 0.08);
            text-align: center;
        }

        .header-card h1 {
            font-size: 1.5rem;
            color: #1e3a8a;
            margin-bottom: 8px;
        }

        .current-time-display {
            font-size: 2rem;
            color: #3b82f6;
            font-weight: 700;
            margin: 10px 0;
        }

        .current-date-display {
            color: #60a5fa;
            font-size: 1rem;
        }

        /* Time Warning */
        .time-warning {
            background: #fef3c7;
            border: 2px solid #fde68a;
            border-radius: 12px;
            padding: 14px;
            margin-bottom: 20px;
            display: none;
            align-items: center;
            gap: 12px;
        }

        .time-warning.show {
            display: flex;
        }

        .time-warning.error {
            background: #fee2e2;
            border-color: #fecaca;
        }

        .time-warning svg {
            flex-shrink: 0;
        }

        .time-warning p {
            color: #92400e;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .time-warning.error p {
            color: #991b1b;
        }

        /* Camera Card */
        .camera-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 20px;
            border: 2px solid #e0f2fe;
            box-shadow: 0 4px 20px rgba(59, 130, 246, 0.08);
        }

        .section-title {
            font-size: 1.25rem;
            color: #1e3a8a;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
        }

        .camera-container {
            position: relative;
            width: 100%;
            max-width: 400px;
            margin: 0 auto 20px;
            border-radius: 16px;
            overflow: hidden;
            background: #1e293b;
        }

        #video {
            width: 100%;
            height: auto;
            display: block;
        }

        #canvas {
            display: none;
        }

        .photo-preview {
            width: 100%;
            border-radius: 16px;
            display: none;
        }

        .photo-preview.show {
            display: block;
        }

        .camera-placeholder {
            width: 100%;
            aspect-ratio: 4/3;
            background: linear-gradient(135deg, #f0f9ff, #dbeafe);
            border: 3px dashed #93c5fd;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 16px;
        }

        .camera-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .camera-icon svg {
            width: 35px;
            height: 35px;
            stroke: white;
        }

        .camera-text {
            color: #60a5fa;
            font-size: 1rem;
            font-weight: 500;
            text-align: center;
            padding: 0 20px;
        }

        .camera-buttons {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 14px 24px;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
        }

        .btn-primary:disabled {
            background: #94a3b8;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .btn-secondary {
            background: white;
            color: #3b82f6;
            border: 2px solid #e0f2fe;
        }

        .btn-secondary:hover {
            background: #f0f9ff;
            border-color: #bfdbfe;
        }

        .btn-danger {
            background: white;
            color: #ef4444;
            border: 2px solid #fee2e2;
        }

        .btn-danger:hover {
            background: #fef2f2;
            border-color: #fecaca;
        }

        /* GPS Info Card */
        .gps-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 20px;
            border: 2px solid #e0f2fe;
            box-shadow: 0 4px 20px rgba(59, 130, 246, 0.08);
        }

        .gps-status {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px;
            background: #f0f9ff;
            border-radius: 12px;
            margin-bottom: 16px;
        }

        .gps-status.active {
            background: #d1fae5;
            border: 2px solid #a7f3d0;
        }

        .gps-status.loading {
            background: #fef3c7;
            border: 2px solid #fde68a;
        }

        .gps-icon-status {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
        }

        .gps-status p {
            color: #1e40af;
            font-weight: 600;
            flex: 1;
        }

        .gps-details {
            display: none;
            gap: 12px;
        }

        .gps-details.show {
            display: flex;
            flex-direction: column;
        }

        .gps-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px;
            background: #f8fafc;
            border-radius: 10px;
            border: 1px solid #e0f2fe;
        }

        .gps-item svg {
            flex-shrink: 0;
        }

        .gps-item-content {
            flex: 1;
        }

        .gps-label {
            font-size: 0.8rem;
            color: #60a5fa;
            margin-bottom: 2px;
        }

        .gps-value {
            font-size: 0.95rem;
            color: #1e40af;
            font-weight: 600;
        }

        /* Submit Section */
        .submit-section {
            background: white;
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 20px;
            border: 2px solid #e0f2fe;
            box-shadow: 0 4px 20px rgba(59, 130, 246, 0.08);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: #1e40af;
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0f2fe;
            border-radius: 12px;
            font-size: 1rem;
            color: #1e40af;
            background: #f8fafc;
            resize: vertical;
            min-height: 80px;
            font-family: inherit;
        }

        .form-group textarea:focus {
            outline: none;
            border-color: #3b82f6;
            background: white;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        .btn-submit {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #059669, #047857);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
        }

        .btn-submit:disabled {
            background: #94a3b8;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
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

        /* Loading Spinner */
        .spinner {
            border: 3px solid #e0f2fe;
            border-top: 3px solid #3b82f6;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            animation: spin 1s linear infinite;
            display: none;
        }

        .spinner.show {
            display: inline-block;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Responsive */
        @media (max-width: 640px) {
            .container {
                padding: 10px 0;
            }

            .header-card,
            .camera-card,
            .gps-card,
            .submit-section {
                padding: 20px;
            }

            .current-time-display {
                font-size: 1.75rem;
            }

            .camera-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header with Time -->
        <div class="header-card">
            <h1>📸 Form Absensi</h1>
            <div class="current-time-display" id="displayTime">07:30:00</div>
            <div class="current-date-display" id="displayDate">Selasa, 11 November 2025</div>
        </div>

        <!-- Time Warning -->
        <div class="time-warning" id="timeWarning">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/>
                <line x1="12" y1="9" x2="12" y2="13"/>
                <line x1="12" y1="17" x2="12.01" y2="17"/>
            </svg>
            <p id="warningText">Waktu absensi: 07:00 - 10:00. Pastikan Anda absen tepat waktu!</p>
        </div>

        <!-- Camera Section -->
        <div class="camera-card">
            <h2 class="section-title">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/>
                    <circle cx="12" cy="13" r="4"/>
                </svg>
                Ambil Foto Selfie
            </h2>

            <div class="camera-container" id="cameraContainer">
                <div class="camera-placeholder" id="placeholder">
                    <div class="camera-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/>
                            <circle cx="12" cy="13" r="4"/>
                        </svg>
                    </div>
                    <p class="camera-text">Klik "Buka Kamera" untuk memulai</p>
                </div>
                <video id="video" autoplay playsinline></video>
                <canvas id="canvas"></canvas>
                <img id="photoPreview" class="photo-preview" alt="Preview Foto">
            </div>

            <div class="camera-buttons">
                <button class="btn btn-primary" id="btnStartCamera" onclick="startCamera()">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/>
                        <circle cx="12" cy="13" r="4"/>
                    </svg>
                    Buka Kamera
                </button>
                <button class="btn btn-primary" id="btnCapture" onclick="capturePhoto()" style="display: none;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                    </svg>
                    Ambil Foto
                </button>
                <button class="btn btn-danger" id="btnRetake" onclick="retakePhoto()" style="display: none;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="1 4 1 10 7 10"/>
                        <path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"/>
                    </svg>
                    Foto Ulang
                </button>
            </div>
        </div>

        <!-- GPS Info -->
        <div class="gps-card">
            <h2 class="section-title">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                    <circle cx="12" cy="10" r="3"/>
                </svg>
                Lokasi GPS
            </h2>

            <div class="gps-status" id="gpsStatus">
                <div class="gps-icon-status">
                    <div class="spinner show" id="gpsSpinner"></div>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="gpsIcon" style="display: none;">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                        <circle cx="12" cy="10" r="3"/>
                    </svg>
                </div>
                <p id="gpsStatusText">Mengambil lokasi GPS...</p>
            </div>

            <div class="gps-details" id="gpsDetails">
                <div class="gps-item">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="2" y1="12" x2="22" y2="12"/>
                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                    </svg>
                    <div class="gps-item-content">
                        <div class="gps-label">Latitude</div>
                        <div class="gps-value" id="latitude">-</div>
                    </div>
                </div>

                <div class="gps-item">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="2" y1="12" x2="22" y2="12"/>
                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                    </svg>
                    <div class="gps-item-content">
                        <div class="gps-label">Longitude</div>
                        <div class="gps-value" id="longitude">-</div>
                    </div>
                </div>

                <div class="gps-item">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                        <circle cx="12" cy="10" r="3"/>
                    </svg>
                    <div class="gps-item-content">
                        <div class="gps-label">Akurasi</div>
                        <div class="gps-value" id="accuracy">-</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Section -->
        <div class="submit-section">
            <div class="form-group">
                <label for="keterangan">Keterangan (Opsional)</label>
                <textarea id="keterangan" placeholder="Tambahkan keterangan jika diperlukan..."></textarea>
            </div>

            <button class="btn-submit" id="btnSubmit" onclick="submitAbsensi()" disabled>
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
                <span id="submitText">Submit Absensi</span>
                <div class="spinner" id="submitSpinner"></div>
            </button>

            <button class="btn-back" onclick="goBack()">Kembali ke Dashboard</button>
        </div>
    </div>

    <script>
        let stream = null;
        let photoData = null;
        let gpsData = null;
        let isTimeValid = false;

        // Check time validity
        function checkTimeValidity() {
            const now = new Date();
            const hours = now.getHours();
            const minutes = now.getMinutes();
            const currentTime = hours * 60 + minutes; // Convert to minutes
            
            const startTime = 7 * 60; // 07:00 in minutes
            const endTime = 12 * 60;  // 10:00 in minutes

            const timeWarning = document.getElementById('timeWarning');
            const warningText = document.getElementById('warningText');
            const btnStartCamera = document.getElementById('btnStartCamera');

            if (currentTime >= startTime && currentTime <= endTime) {
                // Valid time
                isTimeValid = true;
                timeWarning.classList.remove('error');
                timeWarning.classList.add('show');
                warningText.textContent = 'Waktu absensi: 07:00 - 10:00. Anda dapat melakukan absensi sekarang.';
                btnStartCamera.disabled = false;
                return true;
            } else {
                // Invalid time
                isTimeValid = false;
                timeWarning.classList.add('error', 'show');
                if (currentTime < startTime) {
                    warningText.textContent = '⚠️ Belum waktunya absen! Waktu absensi dimulai pukul 07:00 WIB.';
                } else {
                    warningText.textContent = '⚠️ Waktu absensi telah berakhir! Waktu absensi sampai pukul 10:00 WIB.';
                }
                btnStartCamera.disabled = true;
                return false;
            }
        }

        // Update time display
        function updateTime() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('displayTime').textContent = `${hours}:${minutes}:${seconds}`;
            
            // Update date
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('displayDate').textContent = now.toLocaleDateString('id-ID', options);
            
            // Check time validity every minute
            if (seconds === '00') {
                checkTimeValidity();
            }
        }

        // Start camera
        async function startCamera() {
            if (!isTimeValid) {
                alert('Maaf, Anda hanya dapat melakukan absensi pada jam 07:00 - 10:00 WIB.');
                return;
            }

            try {
                const constraints = {
                    video: {
                        facingMode: 'user', // Front camera for selfie
                        width: { ideal: 1280 },
                        height: { ideal: 720 }
                    }
                };

                stream = await navigator.mediaDevices.getUserMedia(constraints);
                const video = document.getElementById('video');
                video.srcObject = stream;

                document.getElementById('placeholder').style.display = 'none';
                video.style.display = 'block';
                document.getElementById('btnStartCamera').style.display = 'none';
                document.getElementById('btnCapture').style.display = 'inline-flex';
            } catch (error) {
                console.error('Error accessing camera:', error);
                alert('Tidak dapat mengakses kamera. Pastikan Anda memberikan izin akses kamera.');
            }
        }

        // Capture photo
        function capturePhoto() {
            const video = document.getElementById('video');
            const canvas = document.getElementById('canvas');
            const context = canvas.getContext('2d');

            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.drawImage(video, 0, 0);

            photoData = canvas.toDataURL('image/jpeg', 0.8);

            // Show preview
            const preview = document.getElementById('photoPreview');
            preview.src = photoData;
            preview.classList.add('show');

            // Hide video, show preview
            video.style.display = 'none';
            document.getElementById('btnCapture').style.display = 'none';
            document.getElementById('btnRetake').style.display = 'inline-flex';

            // Stop camera
            if (stream) {
                stream.getTracks().forEach(track => track.stop());
            }

            checkSubmitButton();
        }

        // Retake photo
        function retakePhoto() {
            photoData = null;
            document.getElementById('photoPreview').classList.remove('show');
            document.getElementById('btnRetake').style.display = 'none';
            
            startCamera();
            checkSubmitButton();
        }

        // Get GPS location
        function getGPSLocation() {
            const gpsStatus = document.getElementById('gpsStatus');
            const gpsStatusText = document.getElementById('gpsStatusText');
            const gpsSpinner = document.getElementById('gpsSpinner');
            const gpsIcon = document.getElementById('gpsIcon');
            const gpsDetails = document.getElementById('gpsDetails');

            if ('geolocation' in navigator) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        gpsData = {
                            latitude: position.coords.latitude,
                            longitude: position.coords.longitude,
                            accuracy: position.coords.accuracy
                        };

                        // Update UI
                        gpsStatus.classList.remove('loading');
                        gpsStatus.classList.add('active');
                        gpsStatusText.textContent = '✓ Lokasi GPS berhasil didapatkan';
                        gpsSpinner.classList.remove('show');
                        gpsIcon.style.display = 'block';
                        gpsIcon.setAttribute('stroke', '#10b981');

                        document.getElementById('latitude').textContent = gpsData.latitude.toFixed(6);
                        document.getElementById('longitude').textContent = gpsData.longitude.toFixed(6);
                        document.getElementById('accuracy').textContent = `±${Math.round(gpsData.accuracy)} meter`;

                        gpsDetails.classList.add('show');
                        checkSubmitButton();
                    },
                    (error) => {
                        console.error('GPS Error:', error);
                        gpsStatus.classList.remove('loading');
                        gpsStatus.classList.add('error');
                        gpsStatusText.textContent = '✗ Gagal mendapatkan lokasi GPS';
                        gpsSpinner.classList.remove('show');
                        alert('Tidak dapat mengakses GPS. Pastikan Anda memberikan izin akses lokasi.');
                    },
                    {
                        enableHighAccuracy: true,
                        timeout: 10000,
                        maximumAge: 0
                    }
                );
            } else {
                alert('Browser Anda tidak mendukung GPS.');
            }
        }

        // Check if submit button should be enabled
        function checkSubmitButton() {
            const btnSubmit = document.getElementById('btnSubmit');
            if (photoData && gpsData && isTimeValid) {
                btnSubmit.disabled = false;
            } else {
                btnSubmit.disabled = true;
            }
        }

        // Submit absensi
        async function submitAbsensi() {
            if (!photoData || !gpsData || !isTimeValid) {
                alert('Pastikan Anda sudah mengambil foto dan lokasi GPS terdeteksi!');
                return;
            }

            const btnSubmit = document.getElementById('btnSubmit');
            const submitText = document.getElementById('submitText');
            const submitSpinner = document.getElementById('submitSpinner');
            const keterangan = document.getElementById('keterangan').value;

            // Disable button and show loading
            btnSubmit.disabled = true;
            submitText.textContent = 'Mengirim...';
            submitSpinner.classList.add('show');

            // Prepare data
            const formData = {
                photo: photoData,
                latitude: gpsData.latitude,
                longitude: gpsData.longitude,
                accuracy: gpsData.accuracy,
                keterangan: keterangan,
                timestamp: new Date().toISOString()
            };

            try {
                // Simulasi pengiriman data (ganti dengan AJAX/fetch ke server PHP Anda)
                await new Promise(resolve => setTimeout(resolve, 2000));

                // Uncomment ini untuk mengirim ke server:
                /*
                const response = await fetch('process_absensi.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(formData)
                });
                
                const result = await response.json();
                if (result.success) {
                    alert('✓ Absensi berhasil disimpan!');
                    window.location.href = 'dashboardguru.php';
                } else {
                    throw new Error(result.message);
                }
                */

                // Simulasi sukses
                console.log('Data yang akan dikirim:', formData);
                alert('✓ Absensi berhasil disimpan!\n\n' +
                      'Waktu: ' + new Date().toLocaleString('id-ID') + '\n' +
                      'Lokasi: ' + gpsData.latitude.toFixed(6) + ', ' + gpsData.longitude.toFixed(6));
                
                // Redirect ke dashboard
                window.location.href = 'dashboardguru.php';

            } catch (error) {
                console.error('Error submitting:', error);
                alert('✗ Gagal menyimpan absensi. Silakan coba lagi.');
                
                // Reset button
                btnSubmit.disabled = false;
                submitText.textContent = 'Submit Absensi';
                submitSpinner.classList.remove('show');
            }
        }

        // Go back
        function goBack() {
            if (confirm('Apakah Anda yakin ingin kembali? Data yang belum disimpan akan hilang.')) {
                // Stop camera if active
                if (stream) {
                    stream.getTracks().forEach(track => track.stop());
                }
                window.location.href = 'dashboardguru.php';
            }
        }

        // Initialize
        window.addEventListener('load', () => {
            updateTime();
            setInterval(updateTime, 1000);
            checkTimeValidity();
            getGPSLocation();
        });

        // Cleanup on page unload
        window.addEventListener('beforeunload', () => {
            if (stream) {
                stream.getTracks().forEach(track => track.stop());
            }
        });
    </script>
</body>
</html>