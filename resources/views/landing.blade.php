<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Gym Coach - Expert System untuk Rekomendasi Latihan Personal</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #213555;
            overflow-x: hidden;
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            background: linear-gradient(135deg, #213555 0%, #3E5879 50%, #D8C4B6 100%);
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(245,239,231,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            animation: backgroundMove 20s linear infinite;
        }

        @keyframes backgroundMove {
            0% { transform: translateX(0) translateY(0); }
            100% { transform: translateX(-10px) translateY(-10px); }
        }

        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .hero-text {
            color: #F5EFE7;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            animation: slideInLeft 1s ease-out;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 30px;
            color: #D8C4B6;
            animation: slideInLeft 1s ease-out 0.2s both;
        }

        .hero-description {
            font-size: 1.1rem;
            margin-bottom: 40px;
            line-height: 1.8;
            animation: slideInLeft 1s ease-out 0.4s both;
        }

        .hero-visual {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            animation: slideInRight 1s ease-out 0.6s both;
        }

        .fitness-icons {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            max-width: 400px;
        }

        .fitness-icon {
            background: rgba(245, 239, 231, 0.15);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(216, 196, 182, 0.3);
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            color: #F5EFE7;
            transition: all 0.3s ease;
            animation: float 3s ease-in-out infinite;
        }

        .fitness-icon:nth-child(1) { animation-delay: 0s; }
        .fitness-icon:nth-child(2) { animation-delay: 0.5s; }
        .fitness-icon:nth-child(3) { animation-delay: 1s; }
        .fitness-icon:nth-child(4) { animation-delay: 1.5s; }
        .fitness-icon:nth-child(5) { animation-delay: 2s; }
        .fitness-icon:nth-child(6) { animation-delay: 2.5s; }

        .fitness-icon:hover {
            transform: translateY(-10px) scale(1.05);
            background: rgba(245, 239, 231, 0.25);
            border-color: rgba(216, 196, 182, 0.5);
        }

        .fitness-icon i {
            font-size: 2.5rem;
            margin-bottom: 15px;
            display: block;
        }

        .fitness-icon span {
            font-size: 0.9rem;
            font-weight: 500;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .cta-button {
            display: inline-flex;
            align-items: center;
            gap: 15px;
            background: linear-gradient(135deg, #D8C4B6, #F5EFE7);
            color: #213555;
            padding: 18px 40px;
            font-size: 1.2rem;
            font-weight: 600;
            text-decoration: none;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(216, 196, 182, 0.3);
            position: relative;
            overflow: hidden;
            animation: slideInLeft 1s ease-out 0.8s both;
        }

        .cta-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(33, 53, 85, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(216, 196, 182, 0.4);
        }

        .cta-button:hover::before {
            left: 100%;
        }

        /* Features Section */
        .features {
            padding: 100px 20px;
            background: #F5EFE7;
        }

        .features-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            color: #213555;
            margin-bottom: 20px;
        }

        .section-subtitle {
            text-align: center;
            font-size: 1.2rem;
            color: #3E5879;
            margin-bottom: 60px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 40px;
            margin-top: 60px;
        }

        .feature-card {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(33, 53, 85, 0.1);
            border: 2px solid rgba(216, 196, 182, 0.2);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #213555, #3E5879, #D8C4B6);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(33, 53, 85, 0.15);
        }

        .feature-card:hover::before {
            transform: scaleX(1);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #213555, #3E5879);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            color: #F5EFE7;
            font-size: 1.8rem;
        }

        .feature-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #213555;
            margin-bottom: 15px;
        }

        .feature-description {
            color: #3E5879;
            line-height: 1.7;
        }

        /* How It Works Section */
        .how-it-works {
            padding: 100px 20px;
            background: linear-gradient(135deg, #213555, #3E5879);
            color: #F5EFE7;
        }

        .steps-container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-top: 60px;
        }

        .step-card {
            text-align: center;
            position: relative;
        }

        .step-number {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #D8C4B6, #F5EFE7);
            color: #213555;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0 auto 25px;
            position: relative;
            z-index: 2;
        }

        .step-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .step-description {
            color: #D8C4B6;
            line-height: 1.6;
        }

        /* Support Section */
        .support-section {
            padding: 100px 20px;
            background: linear-gradient(135deg, #F5EFE7 0%, #ffffff 100%);
        }

        .support-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .support-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .support-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #213555;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .support-title i {
            color: #e74c3c;
            animation: heartbeat 2s ease-in-out infinite;
        }

        @keyframes heartbeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .support-description {
            font-size: 1.1rem;
            color: #3E5879;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .support-benefits {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .benefit-item {
            display: flex;
            align-items: center;
            gap: 15px;
            color: #213555;
            font-weight: 500;
        }

        .benefit-item i {
            width: 20px;
            color: #3E5879;
        }

        .support-card {
            background: white;
            padding: 40px;
            border-radius: 25px;
            box-shadow: 0 15px 50px rgba(33, 53, 85, 0.1);
            border: 2px solid rgba(216, 196, 182, 0.2);
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .support-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #e74c3c, #f39c12, #27ae60);
            animation: gradientShift 3s ease-in-out infinite;
        }

        @keyframes gradientShift {
            0%, 100% { background: linear-gradient(90deg, #e74c3c, #f39c12, #27ae60); }
            50% { background: linear-gradient(90deg, #27ae60, #e74c3c, #f39c12); }
        }

        .support-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 70px rgba(33, 53, 85, 0.15);
        }

        .support-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #3E5879, #213555);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            color: #F5EFE7;
            font-size: 2rem;
            position: relative;
        }

        .support-icon::after {
            content: '';
            position: absolute;
            top: -3px;
            left: -3px;
            right: -3px;
            bottom: -3px;
            background: linear-gradient(45deg, #e74c3c, #f39c12, #27ae60, #3498db);
            border-radius: 50%;
            z-index: -1;
            animation: rotate 3s linear infinite;
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .support-card h3 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #213555;
            margin-bottom: 15px;
        }

        .support-card p {
            color: #3E5879;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .support-button {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
            padding: 15px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(231, 76, 60, 0.3);
            position: relative;
            overflow: hidden;
        }

        .support-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .support-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(231, 76, 60, 0.4);
            background: linear-gradient(135deg, #c0392b, #a93226);
        }

        .support-button:hover::before {
            left: 100%;
        }

        .support-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 20px;
            color: #27ae60;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .support-badge i {
            font-size: 1rem;
        }

        /* CTA Section */
        .cta-section {
            padding: 100px 20px;
            background: #D8C4B6;
            text-align: center;
        }

        .cta-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .cta-title {
            font-size: 2.8rem;
            font-weight: 700;
            color: #213555;
            margin-bottom: 20px;
        }

        .cta-text {
            font-size: 1.2rem;
            color: #3E5879;
            margin-bottom: 40px;
            line-height: 1.7;
        }

        .cta-button-large {
            display: inline-flex;
            align-items: center;
            gap: 15px;
            background: linear-gradient(135deg, #213555, #3E5879);
            color: #F5EFE7;
            padding: 20px 50px;
            font-size: 1.3rem;
            font-weight: 600;
            text-decoration: none;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(33, 53, 85, 0.3);
            position: relative;
            overflow: hidden;
        }

        .cta-button-large::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(245, 239, 231, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .cta-button-large:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(33, 53, 85, 0.4);
        }

        .cta-button-large:hover::before {
            left: 100%;
        }

        /* Footer */
        .footer {
            background: #213555;
            color: #F5EFE7;
            padding: 40px 20px;
            text-align: center;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Animations */
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-content {
                grid-template-columns: 1fr;
                gap: 40px;
                text-align: center;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .fitness-icons {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }

            .fitness-icon {
                padding: 20px;
            }

            .fitness-icon i {
                font-size: 2rem;
            }

            .features-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .steps-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .section-title {
                font-size: 2rem;
                color :#D8C4B6;
            }

            .cta-title {
                font-size: 2.2rem;
            }

            .support-content {
                grid-template-columns: 1fr;
                gap: 40px;
                text-align: center;
            }

            .support-title {
                font-size: 2rem;
                justify-content: center;
            }

            .support-card {
                padding: 30px;
            }
        }

        /* Scroll Animation */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title">
                    <i class="fas fa-dumbbell"></i>
                    My Gym Coach
                </h1>
                <p class="hero-subtitle">Expert System untuk Rekomendasi Latihan Personal</p>
                <p class="hero-description">
                    Dapatkan program latihan yang dipersonalisasi khusus untuk Anda! 
                    Sistem expert kami akan menganalisis tujuan, waktu, dan level pengalaman Anda 
                    untuk memberikan rekomendasi latihan yang paling sesuai.
                </p>
                <a href="/app" class="cta-button">
                    <i class="fas fa-rocket"></i>
                    Mulai Sekarang
                </a>
            </div>
            <div class="hero-visual">
                <div class="fitness-icons">
                    <div class="fitness-icon">
                        <i class="fas fa-dumbbell"></i>
                        <span>Strength</span>
                    </div>
                    <div class="fitness-icon">
                        <i class="fas fa-running"></i>
                        <span>Cardio</span>
                    </div>
                    <div class="fitness-icon">
                        <i class="fas fa-heartbeat"></i>
                        <span>Health</span>
                    </div>
                    <div class="fitness-icon">
                        <i class="fas fa-bicycle"></i>
                        <span>Endurance</span>
                    </div>
                    <div class="fitness-icon">
                        <i class="fas fa-swimmer"></i>
                        <span>Flexibility</span>
                    </div>
                    <div class="fitness-icon">
                        <i class="fas fa-apple-alt"></i>
                        <span>Nutrition</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="features-container">
            <h2 class="section-title fade-in">Mengapa Pilih My Gym Coach?</h2>
            <p class="section-subtitle fade-in">
                Sistem expert terdepan yang memberikan rekomendasi latihan berdasarkan analisis mendalam profil dan kebutuhan Anda
            </p>
            
            <div class="features-grid">
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-brain"></i>
                    </div>
                    <h3 class="feature-title">Expert System</h3>
                    <p class="feature-description">
                        Sistem Ahli buatan yang menganalisis jawaban Anda untuk memberikan rekomendasi yang tepat dan personal
                    </p>
                </div>
                
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-user-cog"></i>
                    </div>
                    <h3 class="feature-title">Program Personal</h3>
                    <p class="feature-description">
                        Setiap rekomendasi disesuaikan dengan tujuan, waktu yang tersedia, dan level pengalaman fitness Anda
                    </p>
                </div>
                
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 class="feature-title">Efisien & Cepat</h3>
                    <p class="feature-description">
                        Hanya butuh beberapa pertanyaan sederhana untuk mendapatkan program latihan yang komprehensif
                    </p>
                </div>
                
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="feature-title">Berbasis Ilmu</h3>
                    <p class="feature-description">
                        Rekomendasi berdasarkan prinsip-prinsip ilmu olahraga dan pengalaman trainer profesional
                    </p>
                </div>
                
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="feature-title">Akses Mudah</h3>
                    <p class="feature-description">
                        Interface yang user-friendly dan dapat diakses dari perangkat apapun, kapanpun Anda butuhkan
                    </p>
                </div>
                
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="feature-title">100% Gratis</h3>
                    <p class="feature-description">
                        Dapatkan konsultasi fitness profesional tanpa biaya apapun, commitment kami untuk kesehatan Anda
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works">
        <div class="steps-container">
            <h2 class="section-title fade-in" style="color: #D8C4B6">Cara Kerja Sistem</h2>
            <p class="section-subtitle fade-in" style="color: #beada1">
                Proses sederhana dalam 3 langkah untuk mendapatkan program latihan ideal Anda
            </p>
            
            <div class="steps-grid">
                <div class="step-card fade-in">
                    <div class="step-number">1</div>
                    <h3 class="step-title">Jawab Pertanyaan</h3>
                    <p class="step-description">
                        Jawab beberapa pertanyaan sederhana tentang tujuan fitness, waktu yang tersedia, dan level pengalaman Anda
                    </p>
                </div>
                
                <div class="step-card fade-in">
                    <div class="step-number">2</div>
                    <h3 class="step-title">Analisis Sebagai Ahli</h3>
                    <p class="step-description">
                        Sistem expert kami menganalisis jawaban Anda menggunakan algoritma khusus yang telah teruji
                    </p>
                </div>
                
                <div class="step-card fade-in">
                    <div class="step-number">3</div>
                    <h3 class="step-title">Dapatkan Program</h3>
                    <p class="step-description">
                        Terima rekomendasi program latihan yang dipersonalisasi dan siap untuk Anda jalankan
                    </p>
                </div>
            </div>
        </div>
    </section>

    
    <!-- Support Section -->
    <section class="support-section">
        <div class="support-container">
            <div class="support-content">
                <div class="support-text">
                    <h2 class="support-title fade-in">
                        <i class="fas fa-heart"></i>
                        Dukung Pengembangan
                    </h2>
                    <p class="support-description fade-in">
                        My Gym Coach adalah layanan gratis yang dikembangkan dengan dedikasi untuk membantu 
                        perjalanan fitness Anda. Jika sistem ini bermanfaat, dukungan Anda akan sangat berarti 
                        untuk pengembangan fitur-fitur baru yang lebih canggih.
                    </p>
                    <div class="support-benefits fade-in">
                        <div class="benefit-item">
                            <i class="fas fa-rocket"></i>
                            <span>Pengembangan fitur AI yang lebih pintar</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-plus-circle"></i>
                            <span>Penambahan jenis latihan dan program baru</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-mobile-alt"></i>
                            <span>Aplikasi mobile untuk akses yang lebih mudah</span>
                        </div>
                    </div>
                </div>
                <div class="support-visual fade-in">
                    <div class="support-card">
                        <div class="support-icon">
                            <i class="fas fa-coffee"></i>
                        </div>
                        <h3>Belikan Kami Kopi</h3>
                        <p>Setiap dukungan, sekecil apapun, sangat berarti untuk kami</p>
                        <a href="https://saweria.co/nandaamanta" target="_blank" class="support-button">
                            <i class="fas fa-external-link-alt"></i>
                            Dukung via Saweria
                        </a>
                        <div class="support-badge">
                            <i class="fas fa-shield-check"></i>
                            <span>Aman & Terpercaya</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section" id="start-quiz">
        <div class="cta-content">
            <h2 class="cta-title fade-in">Siap Memulai Perjalanan Fitness Anda?</h2>
            <p class="cta-text fade-in">
                Tidak ada waktu yang lebih baik dari sekarang untuk memulai hidup sehat. 
                Dapatkan program latihan personal Anda dalam hitungan menit!
            </p>
            <a href="/app" class="cta-button-large">
                <i class="fas fa-play"></i>
                Mulai Expert System
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2025 My Gym Coach Expert System. Dibuat dengan ❤️ untuk kesehatan Anda.</p>
        </div>
    </footer>

    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Scroll animation observer
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Observe all fade-in elements
        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });

        
        // Add some interactive animations
        document.querySelectorAll('.fitness-icon').forEach((icon, index) => {
            icon.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.05) rotate(5deg)';
            });
            
            icon.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1) rotate(0deg)';
            });
        });

       
    </script>
</body>
</html>