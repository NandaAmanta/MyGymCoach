<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekomendasi Latihan - My Gym Coach</title>
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
            color: #333;
            background: #f8f9fa;
        }

        /* Header Section */
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 60px 0;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.05)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 1;
        }

        .hero-content {
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .hero-subtitle {
            font-size: 1.3rem;
            opacity: 0.9;
            margin-bottom: 30px;
        }

        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-top: 40px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            display: block;
            font-size: 2rem;
            font-weight: 700;
            color: #FFD700;
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        /* Navigation Breadcrumb */
        .breadcrumb {
            background: white;
            padding: 20px 0;
            border-bottom: 1px solid #e9ecef;
        }

        .breadcrumb-list {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
            color: #6c757d;
        }

        .breadcrumb-link {
            color: #667eea;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb-link:hover {
            color: #764ba2;
        }

        /* Main Content */
        .main-content {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 40px;
            padding: 40px 0;
            max-width: 1200px;
            margin: 0 auto;
        }

        .article-content {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .article-header {
            padding: 40px 40px 0;
        }

        .article-meta {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
            font-size: 0.9rem;
            color: #6c757d;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .article-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .article-excerpt {
            font-size: 1.2rem;
            color: #6c757d;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .featured-image {
            width: 100%;
            height: 300px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 4rem;
            margin-bottom: 40px;
        }

        .article-body {
            padding: 0 40px 40px;
        }

        .article-body h2 {
            font-size: 1.8rem;
            color: #2c3e50;
            margin: 30px 0 15px;
            padding-bottom: 10px;
            border-bottom: 3px solid #667eea;
            position: relative;
        }

        .article-body h2::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 50px;
            height: 3px;
            background: #764ba2;
        }

        .article-body h3 {
            font-size: 1.4rem;
            color: #34495e;
            margin: 25px 0 12px;
        }

        .article-body p {
            margin-bottom: 20px;
            font-size: 1.1rem;
            line-height: 1.8;
            color: #4a5568;
        }

        .article-body ul, .article-body ol {
            margin: 20px 0;
            padding-left: 30px;
        }

        .article-body li {
            margin-bottom: 10px;
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .highlight-box {
            background: linear-gradient(135deg, #f8f9ff 0%, #e8edff 100%);
            border-left: 5px solid #667eea;
            padding: 25px;
            margin: 30px 0;
            border-radius: 0 10px 10px 0;
            position: relative;
        }

        .highlight-box::before {
            content: '\f0eb';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 1.5rem;
            color: #667eea;
            opacity: 0.3;
        }

        .workout-card {
            background: white;
            border: 2px solid #e9ecef;
            border-radius: 15px;
            padding: 25px;
            margin: 25px 0;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .workout-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .workout-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.15);
            border-color: #667eea;
        }

        .workout-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .workout-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 15px;
            margin: 15px 0;
        }

        .detail-item {
            text-align: center;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .detail-value {
            display: block;
            font-size: 1.2rem;
            font-weight: 600;
            color: #667eea;
        }

        .detail-label {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 2px;
        }

        /* Sidebar */
        .sidebar {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .sidebar-widget {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        .widget-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f1f3f4;
        }

        .tips-list {
            list-style: none;
        }

        .tips-list li {
            padding: 12px 0;
            border-bottom: 1px solid #f1f3f4;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .tips-list li:last-child {
            border-bottom: none;
        }

        .tip-icon {
            color: #667eea;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .progress-widget {
            text-align: center;
        }

        .progress-circle {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: conic-gradient(#667eea 0deg 252deg, #e9ecef 252deg 360deg);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            position: relative;
        }

        .progress-circle::after {
            content: '';
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: white;
            position: absolute;
        }

        .progress-text {
            position: relative;
            z-index: 1;
            font-size: 1.5rem;
            font-weight: 700;
            color: #667eea;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 15px;
            margin: 40px 0;
            padding: 30px 40px;
            background: #f8f9fa;
            border-top: 1px solid #e9ecef;
        }

        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .btn-outline {
            background: transparent;
            color: #667eea;
            border: 2px solid #667eea;
        }

        .btn-outline:hover {
            background: #667eea;
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-content {
                grid-template-columns: 1fr;
                gap: 30px;
                padding: 20px;
            }

            .container {
                padding: 0 15px;
            }

            .hero-title {
                font-size: 2rem;
            }

            .hero-stats {
                flex-direction: column;
                gap: 20px;
            }

            .article-header, .article-body {
                padding: 25px;
            }

            .article-title {
                font-size: 2rem;
            }

            .action-buttons {
                flex-direction: column;
                padding: 20px 25px;
            }

            .workout-details {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">
                    <i class="fas fa-star"></i>
                    Rekomendasi Latihan Personal
                </h1>
                <p class="hero-subtitle">
                    Program latihan yang dirancang khusus berdasarkan profil dan tujuan Anda
                </p>
            </div>
        </div>
    </section>

    <!-- Breadcrumb -->
    <nav class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-list">
                <a href="#" class="breadcrumb-link">
                    <i class="fas fa-home"></i> Beranda
                </a>
                <i class="fas fa-chevron-right"></i>
                <a href="#" class="breadcrumb-link">Expert System</a>
                <i class="fas fa-chevron-right"></i>
                <span>Rekomendasi Latihan</span>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="main-content">
            <!-- Article Content -->
            <article class="article-content">
                <div class="article-header">
                    <div class="article-meta">
                        <div class="meta-item">
                            <i class="fas fa-calendar"></i>
                            <span>{{ date('d F Y') }}</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-user"></i>
                            <span>My Digital Gym Coach</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-tag"></i>
                            <span>Jadwal</span>
                        </div>
                    </div>
                    
                    <h1 class="article-title">
                        Program Latihan Strength Training untuk Pemula
                    </h1>
                    
                    <p class="article-excerpt">
                        Berdasarkan analisis profil Anda, kami merekomendasikan program latihan yang cocok untuk Anda.
                    </p>
                </div>

                <div class="featured-image">
                    <i class="fas fa-dumbbell"></i>
                </div>

                <div class="article-body">
                    <div class="highlight-box">
                        <h3><i class="fas fa-bullseye"></i> Ringkasan Program Anda</h3>
                        <p><strong>Tujuan:</strong> Menambah massa otot dan kekuatan dasar</p>
                        <p><strong>Level:</strong> Pemula</p>
                        <p><strong>Durasi:</strong> 45-60 menit per sesi</p>
                        <p><strong>Frekuensi:</strong> 4x seminggu</p>
                    </div>
                </div>
            </article>

            <!-- Sidebar -->
            <aside class="sidebar">
                <!-- Quick Tips Widget -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">
                        <i class="fas fa-lightbulb"></i>
                        Tips Cepat
                    </h3>
                    <ul class="tips-list">
                        <li>
                            <i class="fas fa-check-circle tip-icon"></i>
                            <span>Konsistensi lebih penting daripada intensitas tinggi</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle tip-icon"></i>
                            <span>Tidur 7-9 jam untuk recovery optimal</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle tip-icon"></i>
                            <span>Makan protein 30 menit setelah latihan</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle tip-icon"></i>
                            <span>Dengarkan tubuh Anda, jangan memaksakan diri</span>
                        </li>
                    </ul>
                </div>

                <!-- Contact Widget -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">
                        <i class="fas fa-headset"></i>
                        Butuh Bantuan?
                    </h3>
                    <p>Tim ahli kami siap membantu Anda mencapai tujuan fitness.</p>
                    <a href="#" class="btn btn-primary" style="width: 100%; justify-content: center; margin-top: 15px;">
                        <i class="fas fa-comment"></i>
                        Hubungi Trainer
                    </a>
                </div>
            </aside>
        </div>
    </div>
</body>
</html>