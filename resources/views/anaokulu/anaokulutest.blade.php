<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Başvuru Beyoğlu</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="/css/custom.css">
    <style>
        :root {
            --primary-color: #3b82f6;
            --primary-dark: #2563eb;
            --secondary-color: #10b981;
            --background-color: #f3f4f6;
            --sidebar-color: #1f2937;
            --text-color: #374151;
            --text-light: #6b7280;
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 280px;
            background-color: var(--sidebar-color);
            color: var(--white);
            padding: 2rem 1.5rem;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease-in-out;
        }

        .logo {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background-color: var(--primary-color);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .nav-item {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: var(--text-light);
            text-decoration: none;
            margin-bottom: 0.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .nav-item:hover, .nav-item.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--white);
        }

        .nav-item svg {
            margin-right: 1rem;
        }

        .main-content {
            flex: 1;
            padding: 2rem;
            overflow-y: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: var(--white);
            padding: 1.5rem 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            margin-bottom: 2rem;
        }

        .user-info {
            display: flex;
            align-items: left;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background-color: var(--secondary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-weight: bold;
            margin-left: 1rem;
        }

        .filters {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .filter-item {
            display: flex;
            flex-direction: column;
        }

        .filter-item label {
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-light);
        }

        .filter-item select,
        .filter-item input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            appearance: none;
            background-color: var(--white);
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 1em;
        }

        .filter-item select:focus,
        .filter-item input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .apply-button {
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            padding: 0.75rem;
            border-radius: 8px;
            width: 100%;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .apply-button:hover {
            background-color: var(--primary-dark);
        }

        .sidebar-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--text-color);
            font-size: 1.5rem;
            cursor: pointer;
        }

        .sidebar-close {
            display: none;
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: none;
            border: none;
            color: var(--white);
            font-size: 1.5rem;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }

            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                bottom: 0;
                z-index: 1000;
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .sidebar-close {
                display: block;
            }

            .main-content {
                padding: 1rem;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .user-info {
                margin-top: 0.5rem;
            }

            .sidebar-toggle {
                display: block;
                position: fixed;
                top: 1rem;
                left: 1rem;
                z-index: 1001;
            }

            .filters {
                grid-template-columns: 1fr;
            }

            .pageheader {
                font-size: 1.5em !important;
            }

            .form-group {
                margin-top: 1rem;
            }
        }


    </style>

    <style>

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            position: relative;
        }

        /* Animated background elements */
        .bg-decoration {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
        }

        .bg-decoration:nth-child(1) {
            width: 100px;
            height: 100px;
            background: #fff;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .bg-decoration:nth-child(2) {
            width: 150px;
            height: 150px;
            background: #fff;
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .bg-decoration:nth-child(3) {
            width: 80px;
            height: 80px;
            background: #fff;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 25px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1000px;
            text-align: center;
            position: relative;
            z-index: 10;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .logoo {
            margin-bottom: 30px;
        }

        .logoo-icon {
            font-size: 4rem;
            color: #667eea;
            margin-bottom: 10px;
            display: block;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }

        .logoo h1 {
            color: #333;
            font-size: 1.8rem;
            font-weight: 300;
            margin-bottom: 5px;
        }

        .logoo p {
            color: #666;
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: 500;
            font-size: 1rem;
        }

        .form-group-half {
            flex: 1;
            margin-bottom: 0;
            width: 100%;
        }

        .input-wrapper {
            position: relative;
            margin-top: 0.3rem;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 1.1rem;
            z-index: 2;
        }

        .form-control {
            width: 100%;
            padding: 15px 15px 15px 20px;
            border: 2px solid #e1e5e9;
            border-radius: 15px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .forgot-password {
            text-align: right;
            margin-top: 10px;
        }

        .forgot-password a {
            color: #667eea;
            text-decoration: none;
            font-size: 0.85rem;
            transition: color 0.3s ease;
        }

        .forgot-password a:hover {
            color: #5a67d8;
        }

        .login-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 15px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
            position: relative;
            overflow: hidden;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .login-btn:hover::before {
            left: 100%;
        }

        .divider {
            margin: 30px 0;
            position: relative;
            text-align: center;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e1e5e9;
        }

        .divider span {
            background: rgba(255, 255, 255, 0.95);
            padding: 0 20px;
            color: #999;
            font-size: 0.9rem;
        }

        .social-login {
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .social-btn {
            width: 50px;
            height: 50px;
            border-radius: 15px;
            border: 2px solid #e1e5e9;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1.2rem;
        }

        .social-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .google {
            color: #db4437;
        }

        .facebook {
            color: #4267B2;
        }

        .apple {
            color: #000;
        }

        .register-link {
            margin-top: 25px;
            color: #666;
            font-size: 0.9rem;
        }

        .register-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link a:hover {
            color: #5a67d8;
        }

        .kvkk-checkbox {
            margin: 20px 0;
            text-align: left;
        }

        .checkbox-container {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            cursor: pointer;
            font-size: 0.85rem;
            color: #666;
            line-height: 1.4;
        }

        .checkbox-container input[type="checkbox"] {
            display: none;
        }

        .checkmark {
            width: 18px;
            height: 18px;
            border: 2px solid #e1e5e9;
            border-radius: 4px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .checkbox-container input[type="checkbox"]:checked + .checkmark {
            background: #667eea;
            border-color: #667eea;
        }

        .checkbox-container input[type="checkbox"]:checked + .checkmark::after {
            content: '✓';
            color: white;
            font-size: 12px;
            font-weight: bold;
        }

        .checkbox-text {
            flex: 1;
        }

        #kvkkLink {
            color: #667eea;
            text-decoration: underline;
        }

        #kvkkLink:hover {
            color: #5a67d8;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            animation: fadeIn 0.3s ease;
        }

        .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 30px;
            border-radius: 20px;
            width: 90%;
            max-width: 600px;
            max-height: 80vh;
            overflow-y: auto;
            position: relative;
            animation: slideIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            line-height: 1;
        }

        .close:hover {
            color: #667eea;
        }

        .modal h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        .modal p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 15px;
            text-align: justify;
        }

        .modal-footer {
            text-align: center;
            margin-top: 30px;
        }

        .modal-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .modal-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .form-row {
            display: flex;
            gap: 35px;
            margin-bottom: 25px;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 30px 25px;
            }

            .logo h1 {
                font-size: 1.5rem;
            }

            .form-row {
                flex-direction: column;
                gap: 0;
            }
        }
    </style>

</head>
<body>

@include('partials.sidebar')


<main class="main-content" style="text-align: -webkit-center!important">


    <div class="bg-decoration"></div>
    <div class="bg-decoration"></div>
    <div class="bg-decoration"></div>

    <div class="login-container">
        <div class="logoo">
            <span class="logoo-icon"><img src="https://basvuru.beyoglu.bel.tr/anaokulu.png" width="90px" alt=""></span>
            <h1>Yuvamız Beyoğlu</h1>
            <p>Okul Öncesi Eğitim Ön Başvuru</p>
        </div>

        <form id="loginForm">
            <div class="form-row">
                <div class="form-group form-group-half">
                    <label for="firstName">Hane Toplam Geliri</label>
                    <small>Haneye giren toplam maaş, varsa engelli maaşı, sosyal destek mekanizmaları vb. toplam ücret yazılmalıdır. </small>
                    <div class="input-wrapper">
                        <input type="number" id="firstName" class="form-control" placeholder="Hane toplam gelirinizi girin" required>
                    </div>
                </div>
                <div class="form-group form-group-half">
                    <label for="firstName">Hane Toplam Kişi Sayısı</label>
                    <small>İkamet edilen evde yaşayan varsa anneane, babaanne, dede, teyze, amca, vb. tüm kişiler dahil edilmelidir. </small>
                    <div class="input-wrapper">
                        <input type="number" id="firstName" class="form-control" placeholder="Hane toplam kişi sayısını girin" required>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group form-group-half" style="transform: scale(1);">
                    <label for="lastName">Aile Durumu</label>
                    <select class="form-control" name="cars" id="cars">
                        <option value="volvo">Anne - Baba sağ ve birlikte </option>
                        <option value="saab">Anne - Baba sağ ve ayrı (velayet annede)</option>
                        <option value="opel">Anne - Baba sağ ve ayrı (velayet babada)</option>
                        <option value="audi">Anne vefat etmiş</option>
                        <option value="audi">Baba vefat etmiş</option>
                        <option value="audi">Çocuğun bakımını vasi sağlıyor</option>
                    </select>
                </div>
                <div class="form-group form-group-half" style="transform: scale(1);">
                    <label for="lastName">Ebeveyn Çalışma Durumu</label>
                    <select class="form-control" name="cars" id="cars">
                        <option value="volvo">Hem anne hem baba çalışıyor </option>
                        <option value="saab">Hem anne hem baba çalışmıyor </option>
                        <option value="opel">Baba çalışıyor, anne işsiz</option>
                        <option value="audi">Anne çalışıyor baba işsiz</option>
                        <option value="audi">Tek ebveyn var ve çalışmıyor </option>
                        <option value="audi">Anne veya Baba BEYOĞLU BELEDİYESİ PERSONELİ</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group form-group-half" style="transform: scale(1);">
                    <label for="lastName">Şehit / Gazi Durumu</label>
                    <select class="form-control" name="cars" id="cars">
                        <option value="volvo">Ailede gazi ya da şehit bulunmuyor</option>
                        <option value="saab">Anne gazi</option>
                        <option value="opel">Baba gazi</option>
                        <option value="audi">Anne şehit</option>
                        <option value="audi">Baba şehit</option>
                    </select>
                </div>
                <div class="form-group form-group-half" style="transform: scale(1);">
                    <label for="lastName">Ailede Engelli Sayısı</label>
                    <select class="form-control" name="cars" id="cars">
                        <option value="volvo">Yok</option>
                        <option value="saab">1</option>
                        <option value="opel">2 ve üzeri</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group form-group-half" style="transform: scale(1);">
                    <label for="lastName">Ebeveylerinin üzerine sabıka bulunma durumu</label>
                    <select class="form-control" name="cars" id="cars">
                        <option value="volvo">Anne veya baba ceza evinde </option>
                        <option value="saab">Hem anne hem baba ceza evinde </option>
                    </select>
                </div>
                <div class="form-group form-group-half" style="transform: scale(1);">
                    <label for="lastName">Ailede doktor onaylı kronik rahatsızlık veya kanser öyküsü bulunma durumu</label>
                    <select class="form-control" name="cars" id="cars">
                        <option value="volvo">Ailede doktor onaylı kronik rahatsızlık veya kanser öyküsü yok</option>
                        <option value="saab">Kanser, genetik bozukluklar, organ yetmezlikleri, kan hastalıkları,raporlu bir kronik hastalık</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group form-group-half" style="transform: scale(1);">
                    <label for="lastName">İkamet Edilen Konut</label>
                    <select class="form-control" name="cars" id="cars">
                        <option value="volvo">Mal Sahibiyim (Kredi borcu yok) </option>
                        <option value="saab">Mal Sahibiyim (Kredi borcu var) </option>
                        <option value="saab">Bedelsiz oturuyorum</option>
                        <option value="saab">Kira ödüyorum</option>
                    </select>
                </div>
                <div class="form-group form-group-half" style="transform: scale(1);">
                    <label for="lastName">Ailede anne ve baba üzerine bulunan toplam tapu sayısı </label>
                    <select class="form-control" name="cars" id="cars">
                        <option value="volvo">Yok</option>
                        <option value="saab">1</option>
                        <option value="saab">2 ve üzeri</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group form-group-half" style="transform: scale(1);">
                    <label for="lastName">Hane üyeleri üzerine bulunan toplam araç sayısı </label>
                    <select class="form-control" name="cars" id="cars">
                        <option value="volvo">Yok</option>
                        <option value="volvo">1</option>
                        <option value="saab">2 ve üzeri</option>
                    </select>
                </div>
                <div class="form-group form-group-half" style="transform: scale(1);">
                    <label for="lastName">Hanede bulunan çocuk sayısı</label>
                    <select class="form-control" name="cars" id="cars">
                        <option value="volvo">1</option>
                        <option value="saab">2</option>
                        <option value="saab">3</option>
                        <option value="saab">4 ve üzeri</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group form-group-half" style="transform: scale(1);">
                    <label for="lastName">Çocuğun kronik hastalığı var mı?</label>
                    <select class="form-control" name="cars" id="cars">
                        <option value="volvo">Yok</option>
                        <option value="volvo">Var</option>
                    </select>
                </div>
                <div class="form-group form-group-half" style="transform: scale(1);">
                    <label for="lastName">Çocuğun alerjisi var mı?</label>
                    <select class="form-control" name="cars" id="cars">
                        <option value="volvo">Yok</option>
                        <option value="volvo">Var</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group form-group-half" style="transform: scale(1);">
                    <label for="lastName">Çocuğun epilepsisi var mı?</label>
                    <select class="form-control" name="cars" id="cars">
                        <option value="volvo">Yok</option>
                        <option value="volvo">Var</option>
                    </select>
                </div>
                <div class="form-group form-group-half" style="transform: scale(1);">
                    <label for="lastName">Çocuğun tuvalet eğitimi var mı?</label>
                    <select class="form-control" name="cars" id="cars">
                        <option value="volvo">Yok</option>
                        <option value="volvo">Var</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="tcNo">Öğrenci TC Kimlik No:</label>
                <div class="input-wrapper">
                    <input type="text" id="tcNo" class="form-control" placeholder="11 haneli TC kimlik numaranızı girin"
                           maxlength="11" required>
                </div>
            </div>

            <div class="form-group">
                <label for="birthDate">Doğum Tarihi</label>
                <div class="input-wrapper">
                    <input type="date" id="birthDate" class="form-control" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group form-group-half">
                    <label for="firstName">Ad</label>
                    <div class="input-wrapper">
                        <input type="text" id="firstName" class="form-control" placeholder="Adınızı girin" required>
                    </div>
                </div>
                <div class="form-group form-group-half">
                    <label for="lastName">Soyad</label>
                    <div class="input-wrapper">
                        <input type="text" id="lastName" class="form-control" placeholder="Soyadınızı girin" required>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group form-group-half" style="transform: scale(1);">
                    <label for="lastName">Soyad</label>
                    <select class="form-control" name="cars" id="cars">
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="opel">Opel</option>
                        <option value="audi">Audi</option>
                    </select>
                </div>
                <div class="form-group form-group-half" style="transform: scale(1);">
                    <label for="lastName">Soyad</label>
                    <select class="form-control" name="cars" id="cars">
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="opel">Opel</option>
                        <option value="audi">Audi</option>
                    </select>
                </div>
            </div>

            <div class="kvkk-checkbox">
                <label class="checkbox-container">
                    <input type="checkbox" id="kvkkAccept" required>
                    <span class="checkmark"></span>
                    <span class="checkbox-text">
                        <a href="#" id="kvkkLink" onclick="openKvkkModal()">KVKK metnini</a> okudum, anladım ve kabul ediyorum.
                    </span>
                </label>
            </div>

            <button type="submit" class="login-btn">
                Başvuru Yap
            </button>
        </form>

        <div class="divider">
            <span>veya</span>
        </div>

        <div class="social-login">
            <div class="social-btn google" onclick="showAlert('Google ile giriş özelliği yakında aktif olacak!')">
                G
            </div>
            <div class="social-btn facebook" onclick="showAlert('Facebook ile giriş özelliği yakında aktif olacak!')">
                f
            </div>
            <div class="social-btn apple" onclick="showAlert('Apple ile giriş özelliği yakında aktif olacak!')">
                🍎
            </div>
        </div>

        <div class="register-link">
            Hesabınız yok mu? <a href="#" onclick="showAlert('Kayıt sayfasına yönlendiriliyorsunuz...')">Kayıt Ol</a>
        </div>
    </div>

    <!-- KVKK Modal -->
    <div id="kvkkModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeKvkkModal()">&times;</span>
            <h2>📋 Kişisel Verilerin Korunması Kanunu (KVKK) Metni</h2>

            <p><strong>1. Veri Sorumlusu</strong></p>
            <p>EduPortal Eğitim Platformu olarak, 6698 sayılı Kişisel Verilerin Korunması Kanunu ("KVKK") kapsamında
                veri sorumlusu sıfatıyla hareket etmekteyiz.</p>

            <p><strong>2. Toplanan Kişisel Veriler</strong></p>
            <p>Sistemimize giriş yapabilmeniz için TC Kimlik Numaranız ve doğum tarihiniz işlenmektedir. Bu veriler
                kimlik teyidi ve güvenlik amacıyla kullanılmaktadır.</p>

            <p><strong>3. Verilerin İşlenme Amacı</strong></p>
            <p>• Öğrenci kimlik doğrulaması<br>
                • Sistem güvenliğinin sağlanması<br>
                • Eğitim hizmetlerinin sunulması<br>
                • Yasal yükümlülüklerin yerine getirilmesi</p>

            <p><strong>4. Verilerin Aktarımı</strong></p>
            <p>Kişisel verileriniz, yasal zorunluluklar dışında üçüncü kişilerle paylaşılmamaktadır. Veriler yalnızca
                eğitim kurumumuz bünyesinde yetkili personel tarafından işlenmektedir.</p>

            <p><strong>5. Veri Sahibinin Hakları</strong></p>
            <p>KVKK kapsamında sahip olduğunuz haklar:<br>
                • Kişisel verilerinizin işlenip işlenmediğini öğrenme<br>
                • İşlenen veriler hakkında bilgi talep etme<br>
                • Verilerin eksik veya yanlış işlenmiş olması halinde düzeltilmesini isteme<br>
                • Verilerin silinmesini veya yok edilmesini isteme<br>
                • İşlenen verilerin aktarıldığı üçüncü kişilere yukarıdaki işlemlerin bildirilmesini isteme</p>

            <p><strong>6. İletişim</strong></p>
            <p>KVKK kapsamındaki taleplerinizi <strong>kvkk@eduportal.edu.tr</strong> adresine iletebilirsiniz.</p>

            <div class="modal-footer">
                <button class="modal-btn" onclick="closeKvkkModal()">Anladım</button>
            </div>
        </div>
    </div>


</main>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    function createIcons() {
        lucide.createIcons({
            attrs: {
                class: ["lucide-icon"]
            }
        });
    }

    document.addEventListener('DOMContentLoaded', createIcons);
</script>

<script>
    document.getElementById('loginForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const tcNo = document.getElementById('tcNo').value;
        const birthDate = document.getElementById('birthDate').value;
        const kvkkAccept = document.getElementById('kvkkAccept').checked;

        // TC Kimlik No validasyonu
        if (tcNo.length !== 11 || !/^\d+$/.test(tcNo)) {
            showAlert('Lütfen geçerli bir 11 haneli TC Kimlik Numarası girin.');
            return;
        }

        if (!kvkkAccept) {
            showAlert('KVKK metnini okuyup kabul etmeniz gerekmektedir.');
            return;
        }

        if (tcNo && birthDate && kvkkAccept) {
            // Basit demo animasyonu
            const btn = document.querySelector('.login-btn');
            btn.innerHTML = '✅ Giriş yapılıyor...';
            btn.style.background = '#48bb78';

            setTimeout(() => {
                const maskedTc = tcNo.substring(0, 3) + '*****' + tcNo.substring(8);
                showAlert('Başarıyla giriş yaptınız! Hoş geldiniz ' + maskedTc);
                btn.innerHTML = 'Giriş Yap';
                btn.style.background = 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)';
                document.getElementById('loginForm').reset();
            }, 1500);
        }
    });

    // TC Kimlik No sadece rakam girişi
    document.getElementById('tcNo').addEventListener('input', function (e) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    function openKvkkModal() {
        document.getElementById('kvkkModal').style.display = 'block';
        document.body.style.overflow = 'hidden';
    }

    function closeKvkkModal() {
        document.getElementById('kvkkModal').style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    // Modal dışına tıklayınca kapatma
    window.onclick = function (event) {
        const modal = document.getElementById('kvkkModal');
        if (event.target === modal) {
            closeKvkkModal();
        }
    }

    function showAlert(message) {
        alert(message);
    }

    // Input focus efektleri
    document.querySelectorAll('.form-control').forEach(input => {
        input.addEventListener('focus', function () {
            this.parentNode.parentNode.style.transform = 'scale(1.02)';
        });

        input.addEventListener('blur', function () {
            this.parentNode.parentNode.style.transform = 'scale(1)';
        });
    });

    // Klavye desteği
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Enter') {
            const form = document.getElementById('loginForm');
            const tcNo = document.getElementById('tcNo').value;
            const birthDate = document.getElementById('birthDate').value;
            const kvkkAccept = document.getElementById('kvkkAccept').checked;

            if (tcNo && birthDate && kvkkAccept) {
                form.dispatchEvent(new Event('submit'));
            }
        }

        // ESC tuşu ile modal kapatma
        if (e.key === 'Escape') {
            closeKvkkModal();
        }
    });
</script>

<script>

    document.querySelectorAll('.nav-item').item(8).classList.add('active');

    // Sidebar toggle işlevselliği
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebarClose = document.getElementById('sidebarClose');
    const sidebar = document.getElementById('sidebar');

    function toggleSidebar() {
        sidebar.classList.toggle('active');
        if (sidebar.classList.contains('active')) {
            sidebarToggle.style.display = 'none';
        } else {
            sidebarToggle.style.display = 'block';
        }
    }

    sidebarToggle.addEventListener('click', toggleSidebar);
    sidebarClose.addEventListener('click', toggleSidebar);

    // Sidebar dışına tıklandığında sidebar'ı kapat (mobil görünümde)
    document.addEventListener('click', (event) => {
        const isClickInsideSidebar = sidebar.contains(event.target);
        const isClickOnToggle = sidebarToggle.contains(event.target);

        if (!isClickInsideSidebar && !isClickOnToggle && window.innerWidth <= 768 && sidebar.classList.contains('active')) {
            toggleSidebar();
        }
    });
</script>


</body>
</html>
