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
                margin-top: 12%;
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
        }


    </style>


    <style>

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            position: relative;
            overflow: auto;
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
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
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
            font-size: 0.9rem;
        }

        .input-wrapper {
            position: relative;
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
            font-size: 0.8rem;
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
            max-width: 700px;
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

        @media (max-width: 480px) {
            .login-container {
                padding: 30px 25px;
                margin-top: 0%;
            }

            .logo h1 {
                font-size: 1.5rem;
            }

            .sidebar-toggle {
                color: white!important;
            }

            .login-container-basvurularim {
                margin-bottom: 6%!important;
            }
        }

        .login-container-basvurularim {
            cursor: pointer;
        }

    </style>


</head>
<body>

@include('partials.sidebar')

<main class="main-content" style="text-align: -webkit-center!important">

    <div class="bg-decoration"></div>
    <div class="bg-decoration"></div>
    <div class="bg-decoration"></div>

    @if($enrollcheck == 1)
    <div class="login-container login-container-basvurularim" style="padding: 20px!important; margin-bottom: 2%" onclick="window.location.href='/yuvamiz-beyoglu/basvurularim'">
        <div class="logoo" style="margin-bottom: 0px!important">
            <h1>Başvurularım</h1>
            <p>Başvurularınızı görüntülemek veya belge yüklemek için tıklayınız.</p>
        </div>
    </div>
    @endif

    @if(\Carbon\Carbon::parse($student->birthday)->age < 18)

        <div class="login-container" style="text-align: center">
            <p style="font-size: 20px">Başvuru Veli tarafından yapılmalıdır. Veli bilgileriyle Başvuru Beyoğlu sistemine giriş yapmalısınız.</p>

            <div style="text-align: center; margin-top: 2rem">
                <img src="heart.png" style="width: 100px" alt="">
            </div>
        </div>

    @else

    <div class="login-container">
        <div class="logoo">
            <span class="logoo-icon"><img src="/anaokulu.png" width="90px" alt=""></span>
            <h1>Yuvamız Beyoğlu</h1>
            <p>Okul Öncesi Eğitim Ön Kayıt</p>
        </div>

        <form id="loginForm">
            <div class="form-group">
                <label for="tcNo">Öğrenci TC Kimlik No:</label>
                <div class="input-wrapper">
                    <input type="text" id="tcNo" name="tcNo" class="form-control" placeholder="11 haneli TC kimlik numaranızı girin"
                           maxlength="11" required>
                </div>
            </div>

            <div class="form-group">
                <label for="birthDate">Doğum Tarihi</label>
                <div class="input-wrapper">
                    <input type="date" id="birthDate" name="birthDate" class="form-control" required>
                </div>
            </div>

            <div class="kvkk-checkbox">
                <label class="checkbox-container">
                    <input type="checkbox" id="kvkkAccept" name="kvkkAccept">
                    <span class="checkmark"></span>
                    <span class="checkbox-text">
                        <a href="#" id="kvkkLink" onclick="openKvkkModal()">Genel Koşullar</a> metnini okudum, anladım ve kabul ediyorum.
                    </span>
                </label>
            </div>

            <button type="submit" id="submitbutton" class="login-btn">
                Başvuru Yap
            </button>

            <div class="kvkk-checkbox">
                <label class="checkbox-container">
                        <span class="checkbox-text" style="font-style: italic">
                            Kabul Koşulları ve Ücretlendirme bilgilendirme metnini okumak için <a href="#" id="kvkkLink2" onclick="openKvkkModal2()">tıklayınız.</a>
                        </span>
                </label>
            </div>

            <div class="kvkk-checkboxx" style="text-align: left">
                <label class="checkbox-container">
                        <span class="checkbox-text">
                            Paylaşmış olduğunuz kişisel verileriniz, veri sorumlusu Beyoğlu Belediyesi tarafından 6698 sayılı Kişisel Verilerin Korunması Kanunu kapsamında; hizmete ilişkin iş süreçlerinin yürütülmesi amacı başta olmak Aydınlatma Metni 'nde yer alan diğer amaçlarla işlenecek olup ayrıntılı bilgi için <a href="#" id="kvkkLink2" onclick="openKvkkModal3()">"Aydınlatma Metni"</a>'ni inceleyebilirsiniz.
                        </span>
                </label>
            </div>


        </form>

    </div>

    @endif

    <!-- KVKK Modal -->
    <div id="kvkkModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeKvkkModal()">&times;</span>
            <h2>📋 Genel Koşullar</h2>

            <p>Yuvamız Beyoğlu Anaokulları 2025-2026 Eğitim ve Öğretim dönemi ön başvuru süreci başlamıştır.</p>

            <p>2025-2026 yılı Eğitim ve Öğretim dönemi için Yuvamız Beyoğlu Anaokulları;
                1 EKİM 2019 - 30 EYLÜL 2022 tarihleri arasında doğan çocuklara hizmet vermektedir. (2025-2026 Okul Kabul Ay Çizelgesi)</p>

            <p>Merkezlerimiz yılda 9 ay boyunca hizmet vermektedir. Haziran Temmuz ve Ağustos ayında tüm merkezlerimiz kapalıdır.</p>

            <p>Online Başvuruda tarafınızdan alınan bilgiler sistem üzerinden değerlendirilecektir. Gerekli hallerde ikametinizde, uzman meslek elemanlarımız tarafından sosyal inceleme yapılacaktır.</p>

            <p>2025-2026 hizmet dönemi için yapılacak başvurularda aşağıdaki hususların dikkate alınması gerekmektedir.</p>

            <p><strong>1.</strong> Merkezlerimizde servis imkanı bulunmamaktadır. Aileler, çocuklarının ulaşımını kendi imkanları ile sağlamalıdır. Bu nedenle evinize ya da iş yerinize yakın olan merkeze başvuruda bulunmanız gerekmektedir.</p>

            <p><strong>2.</strong> Sadece bir merkez için başvuru yapılabilmektedir. Çoklu başvuru kabul edilmemektedir.</p>

            <p><strong>3.</strong> Merkezlerimiz fiziki koşulları uygunluğuna göre planlamaları dahilinde yarım gün ve tam gün hizmet vermektedir. Başvuru yaptığınız okul ve şubenin detaylarını dikkatlice kontrol ediniz.</p>

            <p><strong>4.</strong> Başvuru yapılırken çocukların özel gereksinimleri mutlaka belirtilmelidir. Özel gereksinimli çocukların yarım gün veya tam günlük programdan yararlanabilecek düzeyde olmaları halinde kabul işlemi gerçekleştirilmektedir.</p>

            <p><strong>5.</strong> Ön başvurularının ardından özel gereksinimi olan çocuklar için uzman meslek elemanlarımız tarafından sosyal inceleme gerçekleştirilmektedir. Yapılan sosyal inceleme sonucunda uygun bulunması halinde merkez kabulü gerçekleştirilir. Gerek görülmesi halinde özel gereksinimi olan çocuklar tarafınızca sağlanan gölge öğretmen eşliğinde merkeze kabul edilecektir.</p>

            <p><strong>6.</strong> Merkezlerimize tuvalet eğitimini tamamlamış ve bez kullanımını bırakmış çocukların kesin kayıt işlemi gerçekleştirilmektedir. Aksi halde kayıt işlemi iptal edilmektedir.</p>

            <p><strong>7.</strong> Ön başvuru sırasında beyan edilen tüm bilgi ve belgelerin başta gelir durumu olmak üzere doğru ve ispatlanabilir olması gerekmektedir. Beyan edilen bilgi ve belgeler doğrultusunda, doğru olmayan herhangi bir bilgiden kaynaklı oluşabilecek tüm hak kayıplarında yasal sorumluluk başvuran kişiye aittir.</p>

            <p><strong>8.</strong> Online başvuru sırasında tarafınızca verilen bilgilere istinaden Belge Yükleme adımında sisteme yüklenen belgelerin kontrolü sağlanacaktır. Belge Yüklenmemesi/Eksik yüklenmesi halinde oluşabilecek olumsuz durumlardan tarafınız sorumlu olacaktır.</p>

            <p><strong>9.</strong> Toplam hane geliri beyan edilirken; ikamet edilen ev içerisinde çalışan her bireyin aldığı maaş, ticari gelir, sosyal destek gelirleri, emeklilik geliri, kira geliri gibi tüm gelirler kapsamında toplam gelir yazılmalıdır.</p>

            <p><strong>10.</strong> Ailede doktor onaylı ve takipli ağır hastalık bilgisi beyanında; ikamet edilen ev içerisinde kanser, genetik bozukluklar, organ yetmezlikleri, kan hastalıkları vb. devamlı ve doktor takipli hastalık süreçleri doktor raporu dahilinde değerlendirilecektir.</p>


            <div class="modal-footer">
                <button class="modal-btn" onclick="closeKvkkModal()">Anladım</button>
            </div>
        </div>
    </div>

    <div id="kvkkModal2" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeKvkkModal2()">&times;</span>
            <h2>Kabul Koşulları ve Ücretlendirme</h2>

            <p>Yuvamız Beyoğlu’nda 2025-2026 Eğitim Dönemi;</p>

            <p>Yuvamız Beyoğlu Anaokulları ihtiyaç sahibi ailelerin çocuklarının okul öncesi hizmetlerden yararlanmakta yaşadığı fırsat eşitsizliğini azaltmak için hayata geçirilmektedir. </p>

            <p>Merkezlerin imkân ve kapasitelerinin sınırlı olması sebebiyle, çocukların bu hizmetten adil bir şekilde yararlanabilmesi için, hiçbir müdahaleye açık olmayan bir puantaj sistemi geliştirilmiştir.</p>

            <p>Bu puantaj sisteminin amacı, kayıtta önceliğin desteğe en çok ihtiyaç duyan ailelerin çocuklarına verilmesini sağlamaktır.</p>

            <p>Puantaj sisteminde, aile geliri başta olmak üzere çok sayıda sosyal ve ekonomik faktör dikkate alınır, en temel faktörler doğrultusunda (ailedeki kişi başı gelir, ebeveynlerin boşanma durumu, ebeveynlerin vefat etmiş olması, ailenin ekonomik koşulları, ikamet edilen evin kira olma durumu, ailede bulunan taşınmaz ve taşınır araç sayıları, ailedeki tutukluluk, kronik hastalık, şehitlik, engellilik gibi dezavantaj durumları) her çocuk için bir puan belirlenir. Sıralama bu puan sistemine göre yapılır. Aileler ön başvuru esnasında verdikleri bilgileri, belgelerle kanıtlamak durumundadır. </p>

            <p>Merkezlere kaydolmak için gerekli şartları sağlayan çocukların; puantaj usulüne göre kayıt öncelikleri belirlenir. </p>

            <p style="font-weight: bold">Kesin kayıt hakkı noter huzurunda yapılacak olan çekilişle belirlenecektir.</p>

            <p>Merkezlere kabul, yarım ücretli, tam ücretli ve ücretsiz olmak üzere 3 kategoride yapılacaktır. Puantaj kapsamında verilen bilgilerden hareketle engelli çocuklarımız ve gerekli durumlarda mesleki çalışmalarımız yapılarak değerlendirilecektir.</p>

            <p>2025 - 2026 eğitim dönemi için arasında verilen hizmet karşılığı ücret, Beyoğlu Belediyesi Meclis Kararı ile;</p>

            <p>Yarım gün </p>

            <p>Tam gün </p>

            <p>Şehit ve Gazi </p>

            <p>Ücretlerimiz 2025-2026 Eğitim Öğretim yılı için belirlenmiş olup 2026 Haziran ayı sonuna kadar geçerlidir. </p>

            <div class="modal-footer">
                <button class="modal-btn" onclick="closeKvkkModal2()">Anladım</button>
            </div>
        </div>
    </div>

    <div id="kvkkModal3" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeKvkkModal3()">&times;</span>
            <h3>BEYOĞLU BELEDİYESİ YUVAMIZ BEYOĞLU ANAOKULLARI
                ÖN BAŞVURU SÜREÇLERİ KAPSAMINDA İŞLENEN KİŞİSEL VERİLERE İLİŞKİN AYDINLATMA METNİ</h3>
            <br>
            <p><b>Veri Sorumlusu:</b> Beyoğlu Belediyesi</p>

            <p><b>Adres:</b> Şahkulu Mah. Meşrutiyet Cad. No:121 34420 Beyoğlu, İSTANBUL </p>

            <p>BEYOĞLU BELEDİYESİ olarak, 6698 sayılı Kişisel Verilerin Korunması Kanunu (“KVKK”), 5393 sayılı Belediye Kanunu, 2828 sayılı Sosyal Hizmet Kanunu ve 5395 sayılı Çocuk Koruma Kanunu, diğer ilgili mevzuat ve yasal düzenlemeler doğrultusunda; Beyoğlu Belediyesi Kadın ve Aile Hizmetleri Müdürlüğü tarafından yürütülen hizmetlerden sizleri faydalandırmak adına siz vatandaşlarımızın kişisel verilerinin işlenmesi, saklanması ve aktarılmasına ilişkin olarak işbu aydınlatma metni hazırlanmıştır.</p>

            <p style="font-weight: bold">Hangi Kişisel Verileriniz İşlenmekte ve Kişisel Verilerinizin İşlenme Amaçları, Hukuki Sebepleri ve Toplama Yöntemleri Nelerdir?</p>

            <p>Yuvamız Beyoğlu Anaokulları Ön Başvuru süreçleri kapsamında sizlere ait; kimlik bilgileriniz(ad, soyad, T.C. kimlik numarası, doğum tarihi, vukuatlı nüfus kayıt örneği), iletişim bilgileriniz (adres bilgisi, ikamet edilen ilçe bilgisi, cep telefonu numarası, e-posta adresi), vatandaş işlem bilgileriniz (Beyoğlu Belediyesi personeli olma durumu bilgisi, Beyoğlu Belediyesi personeli olunması halinde personel sicil numarası, eğitime ilişkin talep bilgileri, velayet hakkı ve velayet belgesi bilgileri, çalışma durumu bilgisi, çalışılan sektör bilgisi, çalışılan kurum bilgisi, SGK bildirgesi, hanenin aylık gelir bilgisi, aylık gelir durumunu gösterir belge, eğitim durumu/seviyesi bilgisi, ikamet edilen konuta ilişkin bilgiler, kira kontratına ilişkin bilgiler, üzerinde bulunan toplam araç sayısı, sahip olunan menkul/gayrimenkullere ilişkin bilgiler, taşınır taşınmaz mal beyanı), işlem güvenliği bilgileriniz(IP adresi bilgileri, internet sitesi giriş çıkış bilgileri, log kaydı, cihaz MAC adresi bilgileri), sağlık bilgileriniz (engellilik raporu, kronik rahatsızlık durum bilgisi, kronik rahatsızlığı gösterir sağlık raporu), ceza mahkumiyeti ve güvenlik tedbiri bilgileriniz (tutukluluk bilgisi, adli sicil kaydı),velisi/vasisi/kanuni temsilcisi olduğunuz çocuğa ait bilgileriniz (ad, soyad, T.C. kimlik numarası, doğum tarihi, şehit-gazi yakınlığı belgesi, anne-baba birlikteliği bilgisi, anne-baba sağ/ölü bilgisi, engellilik/özel durum bilgisi, engellilik durumuna ilişkin açıklama, engel oranı, engellilik raporu) ve diğer aile bireylerine ait bilgileriniz (SGK bildirgesi, aylık gelir durumlarını gösterir belge, hanedeki kişi, çocuk ve öğrenci sayısı, şehit ve gazi durumu bilgisi, engelli sayısı, engelli durumu bilgisi, engelli kişilere ait engellilik raporu, kronik rahatsızlık durumu bilgisi, kronik rahatsızlığı olan kişilere ait kronik rahatsızlığı gösterir sağlık raporu, hane üyeleri üzerinde bulunan toplam araç sayısı, sahip olunan menkul/gayrimenkullere ilişkin bilgiler, taşınır taşınmaz mal beyanı)verileriniz çevrimiçi elektronik formlar, bilgi işlem teknolojileri, belediyecilik sistemleri ve tarafınızca beyan edilen bilgi ve belgeler aracılığıyla toplanacak ve işlenecektir.</p>

            <p>Söz konusu kişisel verileriniz; faaliyetlerin mevzuata uygun yürütülmesi, sosyal hizmet ve sosyal yardım faaliyetlerinin yürütülmesi, sosyal hizmet ve sosyal yardım süreçlerinde öncelik değerlendirmelerinin yapılması, iş faaliyetlerinin yürütülmesi, hizmete ilişkin iş süreçlerinin yürütülmesi, hizmete ilişkin destek süreçlerinin yürütülmesi, vatandaş ilişkileri yönetimi süreçlerinin yürütülmesi, vatandaşların memnuniyetine yönelik faaliyetlerin yürütülmesi, iletişim faaliyetlerinin yürütülmesi, eğitim faaliyetlerinin yürütülmesi ve bilgi işlem güvenliğinin sağlanması amaçlarıyla işlenmektedir.</p>

            <p>Yuvamız Beyoğlu Anaokulları Ön Başvuru süreçleri kapsamında işlenen kimlik, iletişim, vatandaş işlem, velisi/vasisi/kanuni temsilcisi olduğunuz çocuğa ait bilgileriniz ve diğer aile bireylerine ait bilgileriniz KVKK’nın 5. maddesinin 2. fıkrasının (c) bendi “Bir sözleşmenin kurulması veya ifasıyla doğrudan doğruya ilgili olması kaydıyla, sözleşmenin taraflarına ait kişisel verilerin işlenmesinin gerekli olması”,(ç) bendi “Veri sorumlusunun hukuki yükümlülüğünü yerine getirebilmesi için zorunlu olması” ve (f) bendi ‘‘İlgili kişinin temel hak ve özgürlüklerine zarar vermemek kaydıyla, veri sorumlusunun meşru menfaatleri için veri işlenmesinin zorunlu olması” hukuki sebeplerine dayalı olarak işlenecektir.</p>

            <p>Özel nitelikli kişisel veri sıfatını haiz sağlık bilgileriniz, velisi/vasisi/kanuni temsilcisi olduğunuz çocuğa ait bilgileriniz kategorisinde yer alan “engellilik/özel durum bilgisi, engellilik durumuna ilişkin açıklama, engel oranı, engellilik raporu”verileriniz ile diğer aile bireylerine ait bilgilerinizkategorisinde yer alan “engelli kişilere ait engellilik raporu, kronik rahatsızlığı olan kişilere ait kronik rahatsızlığı gösterir sağlık raporu” verilerinizKVKK’nın 6. maddesinin 3. fıkrasının (f) bendi “İstihdam, iş sağlığı ve güvenliği, sosyal güvenlik, sosyal hizmetler ve sosyal yardım alanlarındaki hukuki yükümlülüklerin yerine getirilmesi için zorunlu olması”hukuki sebebine dayalı olarak işlenecektir.</p>

            <p>Özel nitelikli kişisel veri sıfatını haiz ceza mahkumiyeti ve güvenlik tedbiri bilgilerinizKVKK’nın 6. maddesinin 3. fıkrasının (f) bendi “İstihdam, iş sağlığı ve güvenliği, sosyal güvenlik, sosyal hizmetler ve sosyal yardım alanlarındaki hukuki yükümlülüklerin yerine getirilmesi için zorunlu olması”hukuki sebebine dayalı olarak işlenecektir.</p>

            <p>İşlem güvenliği bilgileriniz KVKK’nın 5. maddesinin 2. fıkrasının (a) bendi “Kanunlarda açıkça öngörülmesi’’ ve (ç) bendi “Veri sorumlusunun hukuki yükümlülüğünü yerine getirebilmesi için zorunlu olması” hukuki sebeplerine dayanılarak işlenecektir.</p>

            <p style="font-weight: bold">Kişisel Verileriniz Kimlere ve Hangi Amaçlarla Aktarılabilecektir?</p>

            <p>Kişisel verileriniz;</p>

            <p>●     Yasal düzenlemeler ve tabi olduğumuz mevzuat uyarınca bir mahkeme kararı veya yetkili kılınmış adli veya idari mercilerin talebi üzerine, faaliyetlerin mevzuata uygun yürütülmesi, iş faaliyetlerinin yürütülmesi/denetimi, yetkili kişi, kurum ve kuruluşlara bilgi verilmesi amacıyla Yetkili Kamu Kurum ve Kuruluşlarına,</p>
            <p>●     Hizmete ilişkin iş süreçlerinin yürütülmesi, hizmete ilişkin destek süreçlerinin yürütülmesi amacıyla Beyoğlu Belediyesi İştiraklerine,</p>
            <p>●     Hizmete ilişkin iş süreçlerinin yürütülmesi, hizmete ilişkin destek süreçlerinin yürütülmesi ve işbirliği faaliyetlerinin yürütülmesi amacıyla Kamu Kurum ve Kuruluşları ve Gerçek Kişiler veya Özel Hukuk Tüzel Kişilerine</p>

            <p>KVKK’nın aktarıma ilişkin 8. maddesindeki kurallara uyularak ve gerekli teknik ve idari tedbirler alınarak, sadece ilgili amacın gerçekleşmesi için gerekli olan kadarı aktarılabilecektir.</p>,

            <p style="font-weight: bold">İlgili Kişi Olarak Haklarınız Nelerdir?</p>

            <p>KVKK ve ilgili mevzuat kapsamında kişisel verilerinize ilişkin olarak;</p>

            <p>●     Kişisel verilerinizin işlenip işlenmediğini öğrenme,</p>
            <p>●     Kişisel verileriniz işlenmişse buna ilişkin bilgi talep etme,</p>
            <p>●     Kişisel verilerin işlenme amacını ve bunların amacına uygun kullanılıp kullanılmadığını öğrenme,</p>
            <p>●     Yurt içinde veya yurt dışında kişisel verilerinizin aktarıldığı üçüncü kişileri bilme,</p>
            <p>●     Kişisel verilerinizin eksik veya yanlış işlenmiş olması halinde bunların düzeltilmesini isteme,</p>
            <p>●     KVKK mevzuatında öngörülen şartlar çerçevesinde kişisel verilerinizin silinmesini veya yok edilmesini isteme,</p>
            <p>●     Eksik veya yanlış verilerin düzeltilmesi ile kişisel verilerinizin silinmesi veya yok edilmesini talep ettiğinizde, bu durumun kişisel verilerinizi aktardığımız üçüncü kişilere bildirilmesini isteme,</p>
            <p>●     İşlenen verilerin münhasıran otomatik sistemler vasıtasıyla analiz edilmesi suretiyle kişinin kendisi aleyhine bir sonucun ortaya çıkmasına itiraz etme ve</p>
            <p>●     Kişisel verilerin kanuna aykırı olarak işlenmesi sebebiyle zarara uğramanız halinde bu zararın giderilmesini talep etme</p>

            <p>haklarına sahipsiniz.</p>

            <p style="font-weight: bold">Haklarınızı Nasıl Kullanabilirsiniz?</p>

            <p>Kişisel verileriniz ile ilgili başvuru ve taleplerinizi dilerseniz Beyoğlu Belediyesi internet sitesinde yer alan İlgili Kişi Başvuru Formu aracılığıyla;</p>

            <p>●     Daha önce bildirilen ve belediye sistemlerinde kayıtlı bulunan e-posta adresinizi kullanmak suretiyle iletisim@beyoglu.bel.tr adresine elektronik posta göndererek,</p>
            <p>●     Islak imzalı ve kimliğinizi tevsik edici belgeler ile Beyoğlu Belediyesi Şahkulu Mah. Meşrutiyet Cad. No:121 34420 Beyoğlu - İSTANBUL adresine göndererek,</p>
            <p>●     Geçerli bir kimlik belgesi ile birlikte Beyoğlu Belediyesi’ne bizzat başvurarak,</p>
            <p>●     Mobil imza veya güvenli elektronik imza ile imzalayıp iletisim@beyoglu.bel.tr adresine e-posta gönderilerek,</p>
            <p>●     Kayıtlı elektronik posta (KEP) adresi ve güvenli elektronik imza ya da mobil imza kullanmak suretiyle beyoglubelediyesi@hs01.kep.tr kayıtlı elektronik posta adresimize göndererek,</p>

            <p>Beyoğlu Belediyesi’ne iletebilirsiniz.</p>

            <p>Veri Sorumlusuna Başvuru Usul ve Esasları Hakkında Tebliğ uyarınca, İlgili Kişi’nin, başvurusunda isim, soyisim, başvuru yazılı ise imza, T.C. kimlik numarası, (başvuruda bulunan kişinin yabancı olması halinde uyruğu, pasaport numarası veya varsa kimlik numarası), tebligata esas yerleşim yeri veya iş yeri adresi, varsa bildirime esas elektronik posta adresi, telefon numarası ve faks numarası ile talep konusuna dair bilgilerin bulunması zorunludur.</p>

            <p>İlgili Kişi, yukarıda belirtilen hakları kullanmak için yapacağı ve kullanmayı talep ettiği hakka ilişkin açıklamaları içeren başvuruda talep edilen hususu açık ve anlaşılır şekilde belirtmelidir. Başvuruya ilişkin bilgi ve belgelerin başvuruya eklenmesi gerekmektedir.</p>

            <p>Talep konusunun başvuranın şahsı ile ilgili olması gerekmekle birlikte, başkası adına hareket ediliyor ise başvuruyu yapanın bu konuda yetkili olması ve bu yetkinin belgelendirilmesi (vekâletname) gerekmektedir. Başvurunun özel nitelikli veriler kapsamında olması durumunda ise Kişisel Sağlık Verileri Hakkında Yönetmelik'in 10. maddesi uyarınca başvuruyu yapanın bu konuda özel olarak yetkilendirilmesi gerekmektedir. Ayrıca başvurunun kimlik ve adres bilgilerini içermesi ve başvuruya kimliği doğrulayıcı belgelerin eklenmesi gerekmektedir.</p>

            <p>Yetkisiz üçüncü kişilerin başkası adına yaptığı talepler değerlendirmeye alınmayacaktır.</p>

            <p style="font-weight: bold">Kişisel Verilerinizin İşlenmesine İlişkin Talepleriniz Ne Kadar Sürede Cevaplanır?</p>

            <p>Kişisel verilerinize ilişkin hak talepleriniz değerlendirilerek, en kısa sürede ve en geç 30 gün içerisinde ücretsiz olarak sonuçlandırılacaktır; ancak işlemin ayrıca bir maliyet gerektirmesi halinde Tebliğ’de belirtilen esaslara göre tarafınızdan ücret talep edilebilecektir. Başvurunuza ilişkin gerekçeli cevabımız başvuruda belirttiğiniz adrese elektronik posta veya posta yolu başta olmak üzere eğer mümkünse talebin yapıldığı usul vasıtasıyla size iletilecektir. </p>





            <div class="modal-footer">
                <button class="modal-btn" onclick="closeKvkkModal3()">Anladım</button>
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

        document.getElementById("submitbutton").disabled=true;
        const tcNo = document.getElementById('tcNo').value;
        const birthDate = document.getElementById('birthDate').value;
        const kvkkAccept = document.getElementById('kvkkAccept').checked;
        const btn = document.querySelector('.login-btn');

        // TC Kimlik No validasyonu
        if (tcNo.length !== 11 || !/^\d+$/.test(tcNo)) {
            showAlert('Lütfen geçerli bir 11 haneli TC Kimlik Numarası girin.');
            btn.innerHTML = 'Başvuru Yap';
                            btn.style.background = 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)';
            document.getElementById("submitbutton").disabled=false;
            return;
        }

        if (!kvkkAccept) {
            showAlert('Genel Koşullar metnini okuyup kabul etmeniz gerekmektedir.');
            btn.innerHTML = 'Başvuru Yap';
                            btn.style.background = 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)';
            document.getElementById("submitbutton").disabled=false;
            return;
        }

        if (tcNo && birthDate && kvkkAccept) {
            // Basit demo animasyonu

            btn.innerHTML = 'Bekleyiniz...'

            btn.style.background = '#48bb78';

            setTimeout(() => {
                let token = '@csrf';
                token = token.substr(42, 40);
                $.ajax({
                    type: "post",
                    url: `/formkpsbridge`,
                    data: { _token: token, identity: tcNo, birthday: birthDate},
                    success: function (data) {
                        if (data === "kimlikhata") {
                            alert("Kimlik bilgileri hatalı!");
                            btn.innerHTML = 'Başvuru Yap';
                            btn.style.background = 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)';
                            document.getElementById("submitbutton").disabled=false;
                            window.stop();
                            exit();
                        } else {

                            let token = '@csrf';
                            token = token.substr(42, 40);
                            $.ajax({
                                type: "post",
                                url: `/anaokuluenrollcheck`,
                                data: { _token: token, identity: tcNo},
                                success: function (data) {
                                    if (data === "true") {
                                        window.location.href="/yuvamiz-beyoglu/basvurularim";
                                    } else if(data === "truedifferent") {
                                        alert('Bu öğrencinin başvurusu başka hesap üzerinden yapılmış. Tekrar başvuru yapılamaz.')
                                        window.location.reload();
                                    } else if (data === "false"){

                                    } else {
                                        window.location.reload();
                                    }
                                },
                                error: function(err) {
                                    console.log( "başvuru kontrolde hata" );
                                    window.location.reload();
                                }
                            });

                            sessionStorage.setItem("anaokulu_identity", tcNo);
                            sessionStorage.setItem("anaokulu_birthday", birthDate);
                            sessionStorage.setItem("anaokulu_gender", data['gender']);

                            if (birthDate >= "2019-10-01" && birthDate <= "2020-09-30")
                                sessionStorage.setItem("anaokulu_age", 5);
                            else if (birthDate >= "2020-10-01" && birthDate <= "2020-12-31")
                                sessionStorage.setItem("anaokulu_age", 45);
                            else if (birthDate >= "2021-01-01" && birthDate <= "2021-09-30")
                                sessionStorage.setItem("anaokulu_age", 4);
                            else if (birthDate >= "2021-10-01" && birthDate <= "2021-12-31")
                                sessionStorage.setItem("anaokulu_age", 34);
                            else if (birthDate >= "2022-01-01" && birthDate <= "2022-09-30")
                                sessionStorage.setItem("anaokulu_age", 3);
                            else {
                                alert("1 EKİM 2019 - 9 EYLÜL 2022 tarih aralığında doğan çocuklar kayıt yaptırabilir.");

                            btn.innerHTML = 'Başvuru Yap';
                            btn.style.background = 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)';
                            document.getElementById("submitbutton").disabled=false;
                                window.stop();
                                exit();
                            }
                            window.location.href="/yuvamiz-beyoglu/2?identity="+tcNo;
                        }
                    },
                    error: function(err) {
                        console.log( "kimlik sorgulamada hata" );
                        window.location.href="/yuvamiz-beyoglu";
                        exit;
                        debugger;
                    }
                });

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

    function openKvkkModal2() {
        document.getElementById('kvkkModal2').style.display = 'block';
        document.body.style.overflow = 'hidden';
    }

    function closeKvkkModal2() {
        document.getElementById('kvkkModal2').style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    function openKvkkModal3() {
        document.getElementById('kvkkModal3').style.display = 'block';
        document.body.style.overflow = 'hidden';
    }

    function closeKvkkModal3() {
        document.getElementById('kvkkModal3').style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    // Modal dışına tıklayınca kapatma
    window.onclick = function (event) {
        const modal = document.getElementById('kvkkModal');
        const modal2 = document.getElementById('kvkkModal2');
        const modal3 = document.getElementById('kvkkModal3');
        if (event.target === modal) {
            closeKvkkModal();
        }
        if (event.target === modal2) {
            closeKvkkModal2();
        }
        if (event.target === modal3) {
            closeKvkkModal3();
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


{{--<script>

    identity = document.getElementById('parent_identity').value;
    birthday = document.getElementById('parent_birthday').value;

    let token = '@csrf';
    token = token.substr(42, 40);
    $.ajax({
        type: "post",
        url: `/formkpsbridge`,
        data: { _token: token, identity: identity, birthday: birthday},
        success: function (data) {
            document.getElementById('loading-spinner').style.display = 'none';

        },
        error: function(err) {
            document.getElementById('loading-spinner').style.display = 'none';
            console.log( "hata" );
            exit;
            debugger;
        }
    });
</script>--}}

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
