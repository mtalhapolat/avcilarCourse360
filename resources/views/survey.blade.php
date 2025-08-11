<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Başvuru Beyoğlu</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
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
        .courses {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }
        .course-card {
            background-color: var(--white);
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 1.5rem;
            transition: all 0.3s ease;
        }
        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .course-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-color);
        }
        .course-instructor {
            color: var(--text-light);
            margin-bottom: 1rem;
        }
        .course-details {
            margin-bottom: 1rem;
        }
        .course-detail {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }
        .course-schedule {
            border-top: 1px solid #e5e7eb;
            padding-top: 1rem;
            margin-bottom: 1rem;
        }
        .schedule-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-color);
        }
        .schedule-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.25rem;
            font-size: 0.875rem;
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
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }
        .popup-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        .popup-content {
            background-color: var(--white);
            padding: 2rem;
            border-radius: 12px;
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transform: scale(0.9);
            opacity: 0;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }
        .popup-overlay.active .popup-content {
            transform: scale(1);
            opacity: 1;
        }
        .popup-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-color);
        }
        .popup-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--text-color);
        }
        .popup-subtitle {
            font-size: 1.2rem;
            font-weight: 600;
            margin-top: 1.5rem;
            margin-bottom: 0.5rem;
            color: var(--text-color);
        }
        .popup-text {
            margin-bottom: 1rem;
            color: var(--text-light);
        }
        .popup-apply-button {
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
            transition: background-color 0.3s ease;
            margin-top: 1rem;
        }
        .popup-apply-button:hover {
            background-color: var(--primary-dark);
        }
        /* Yeni kartlar için ek stiller */
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            padding: 0rem;
            text-align: center;
        }
        .dashboard-card {
            background-color: var(--white);
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 1.5rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .dashboard-card-title {
            font-size: 1.18rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-color);

        }
        .dashboard-card-description {
            color: var(--text-light);
            margin-bottom: 1rem;
        }
        .dashboard-card-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
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
                font-size: 1.5em!important;
            }
            .dashboard-cards {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr))!important;
                gap: 1rem;
                padding: 0rem;
                text-align: center;
            }
        }
        .swiper-container {
            width: 100%;
            height: 200px;
            margin-bottom: 1rem;
            border-radius: 8px;
            overflow: hidden;
        }
        .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .swiper-container:hover {
            cursor: pointer;
        }
        .large-slider-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 2000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }
        .large-slider-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        .large-slider-container {
            width: 90%;
            max-width: 1200px;
            height: 80vh;
        }
        .large-slider-container .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        .large-slider-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: none;
            border: none;
            font-size: 2rem;
            color: var(--white);
            cursor: pointer;
            z-index: 2001;
        }

        .profile-content {
            background-color: var(--white);
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 2rem;
            margin-top: 2rem;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 24px; /* Buton boyutunu büyüttük */
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px; /* Buton yazı boyutunu büyüttük */
        }
        button:hover {
            background-color: #45a049;
        }
        button:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
        }

        #confetti {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 9999;
        }
        .success-banner {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 24px;
            margin-top: 20px;
            border-radius: 4px;
        }
        .thank-you-message {
            text-align: center;
            margin-top: 10px;
            font-size: 18px;
            color: #333;
        }


    </style>
</head>
<body>

@include('partials/sidebar')

<main class="main-content">
    <header class="header">
        <div style="display: flex; align-items: center; gap: 1.5rem;">
            <img src="https://beyoglu.bel.tr/wp-content/uploads/2020/05/header-logo-3.png"
                 alt="Beyoğlu Belediyesi"
                 style="height: 80px; width: auto;">
            <div>
                <h1 class="pageheader">Anket</h1>
                <div class="user-info" style="margin-bottom: 0px">
                    <div>
                        <div style="font-weight: 600;">{{$student->name}} {{$student->surname}}</div>
                        <div style="color: var(--text-light); font-size: 0.875rem;"><a>{{$student->identity}}</a></div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="profile-content">
        <h2 style="margin-bottom: 1rem; font-size: 1.5rem; font-weight: 600;">Beyoğlu Halkı Karar Veriyor</h2>

        <a>Yeni ek hizmet binamız için renk seçimi yapın. Beyoğlu halkının katıldığı bu anket sonucuna göre belirlenecektir. </a> <br>
    </div>

    <br>

    @if($answercheck == null)

    <form id="surveyForm" action="#">
    <div class="dashboard-cards" id="surveybody">
        <label class="dashboard-card">
            <img style="margin-bottom: 6%" src="/bina1.jpeg" width="100%" alt=""> <br>
            <div class="dashboard-card-description">1. Tasarım</div>
            <input type="radio" id="tasarim1" name="survey" value="tasarim1" required>
        </label>
        <label class="dashboard-card">
            <img style="margin-bottom: 6%" src="/bina2.jpeg" width="100%" alt=""> <br>
            <div class="dashboard-card-description">2. Tasarım</div>
            <input type="radio" id="tasarim2" name="survey" value="tasarim2" required>
        </label>
        <label class="dashboard-card" >
            <img style="margin-bottom: 5%" src="/bina3.jpeg" width="100%" alt=""> <br>
            <div class="dashboard-card-description">3. Tasarım</div>
            <input type="radio" id="tasarim3" name="survey" value="tasarim3" required>
        </label>

    </div>
    <div class="buttons" style="justify-content: center!important">
        <button type="button" id="nextBtn" onclick="submitForm();">Anketi Tamamla</button>
    </div>

    </form>


    <div id="successMessage" style="display: none;">
        <div class="success-banner">Ankete Katıldığınız İçin Teşekkürler!</div>
        <p class="thank-you-message" id="successtext"></p>

        <div style="text-align: center; margin-top: 2rem">
            <img src="heart.png" style="width: 100px" alt="">
        </div>
    </div>

    @else
        <div id="successMessage" >
            <div class="success-banner">Ankete Katıldığınız İçin Teşekkürler!</div>
            <p class="thank-you-message" id="successtext"></p>

            <div style="text-align: center; margin-top: 2rem">
                @if($answercheck->answer == 'tasarim1')
                    <img src="bina1.jpeg" style="width: 50%" alt="">
                @elseif($answercheck->answer == 'tasarim2')
                    <img src="bina2.jpeg" style="width: 50%" alt="">
                @elseif($answercheck->answer == 'tasarim3')
                    <img src="bina3.jpeg" style="width: 50%" alt="">
                @endif

            </div>
        </div>
    @endif

    <canvas id="confetti"></canvas>

</main>
<div class="popup-overlay" id="popupOverlay">
    <div class="popup-content">
        <button class="popup-close" id="popupClose">✕</button>
        <h2 class="popup-title" id="popupTitle"></h2>
        <div class="popup-text" id="popupInstructor"></div>
        <h3 class="popup-subtitle">Anaokulu Bilgileri</h3>
        <div id="popupDetails"></div>
        <h3 class="popup-subtitle">Başvuru Şartları</h3>
        <div class="popup-text" id="popupRequirements" style="font-size: 0.875rem"></div>
        <h3 class="popup-subtitle">Açıklama</h3>
        <div class="popup-text" id="popupDescription" style="font-size: 0.875rem"></div>
        <h3 class="popup-subtitle">Veli Bilgisi</h3>
        <div class="velikimlik">
            <input type="text" name="velitc" style="padding: 8px; font-size: 16px" placeholder="T.C. Kimlik No" required>
            <input type="text" name="velidogum" id="velidogum" class="dogumTarihi" style="padding: 8px; font-size: 16px" placeholder="Doğum Tarihi" required>
        </div>
        <button type="submit" class="popup-apply-button" value="0" id="popupApplyButton">Anaokuluna Kaydol</button>
    </div>
</div>

<div class="large-slider-overlay" id="largeSliderOverlay">
    <button class="large-slider-close" id="largeSliderClose">✕</button>
    <div class="large-slider-container">
        <div class="swiper-wrapper" id="largeSliderWrapper">
            <!-- Büyük slider fotoğrafları burada dinamik olarak oluşturulacak -->
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
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


    function submitForm() {

        $('#loading-spinner').show();
        const formData = new FormData(document.getElementById('surveyForm'));

        const formObject = Object.fromEntries(formData.entries());
        console.log('Form Bilgileri:', formObject);

        // AJAX isteği
        fetch('/insertsurveyanswer', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    $('#loading-spinner').hide();
                    console.log(formData);
                    // Konfeti animasyonu
                    confetti({
                        particleCount: 100,
                        spread: 70,
                        origin: { y: 0.6 }
                    });

                    // Butonları ve ilerleme çubuğunu gizle
                    document.querySelector('.buttons').style.display = 'none';
                    document.querySelector('#surveybody').style.display = 'none';


                    // Başarı mesajını göster
                    document.getElementById('successMessage').style.display = 'block';
                } else {
                    $('#loading-spinner').hide();
                    alert(data.message);
                }
            })
            .catch(error => {
                $('#loading-spinner').hide();
                console.error('Error:', error);
                alert('Bir hata oluştu. Lütfen tekrar deneyin.');
            });
    }


</script>


<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>
</html>
