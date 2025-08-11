<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Başvuru Beyoğlu</title>
    <meta name="description" content="Beyoğlu Belediyesi Kurs Başvuruları, Etkinlik Başvuruları, Akademi Beyoğlu, Spor Başvuruları, Geziler, Atölyeler, Workshoplar ve diğer tüm başvuruları yapabileceğiniz platformumuz hizmetinizde.">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/custom.css">
    <style>
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
            .dashboard-cards {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(160px, 1fr))!important;
                gap: 1rem;
                padding: 0rem;
                text-align: center;
            }
        }


    </style>
</head>
<body>

@include('partials/sidebar')

<main class="main-content">
    <header class="header">
        <div style="display: flex; align-items: center; gap: 1.5rem;">
            <img src="/logokare.png"
                 alt="Avcılar Belediyesi"
                 style="height: 100px; width: auto;">
            <div>
                <h1>Kursiyer</h1>
                <div class="user-info" style="margin-bottom: 0px">
                    <div>
                        <div style="font-weight: 600;">{{$student->name}} {{$student->surname}}</div>
                        <div style="color: var(--text-light); font-size: 0.875rem;"><a>{{$student->identity}}</a></div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="dashboard-cards">

        <div class="dashboard-card" onclick="location.href='{{route('basvuru')}}';">
            <img style="margin-bottom: 6%" src="/books.png" height="55px" alt="">
            <div class="dashboard-card-title">Kurs Başvurusu</div>
            <div class="dashboard-card-description">Kurslarımıza başvuru yapın</div>
        </div>
        <div class="dashboard-card" onclick="location.href='{{route('sports')}}'">
            <img style="margin-bottom: 5%" src="/sports.png" height="60px" alt="">
            <div class="dashboard-card-title">Spor</div>
            <div class="dashboard-card-description">Basketbol, Futbol, Tenis, Koşu vb.</div>
        </div>
        <div class="dashboard-card" onclick="location.href='{{route('etkinlikler')}}';">
            <img style="margin-bottom: 5%" src="/etkinlikler.png" height="55px" alt="">
            <div class="dashboard-card-title">Etkinlikler</div>
            <div class="dashboard-card-description">Gezi, Sinema, Tiyatro, Workshop vb.</div>
        </div>
        <div class="dashboard-card" onclick="location.href='/yuvamiz-avcilar';">
            <img style="margin-bottom: 3%" src="/anaokulu.png" height="65px" alt="">
            <div class="dashboard-card-title">Anaokulu</div>
            <div class="dashboard-card-description">Okul öncesi eğitim için kayıt yaptırın</div>
        </div>
        <div class="dashboard-card" onclick="location.href='{{route('registered')}}';">
            <img style="margin-bottom: 6%" src="/enrollments.png" height="55px" alt="">
            <div class="dashboard-card-title">Başvurularım</div>
            <div class="dashboard-card-description">Mevcut başvurularınızı görüntüleyin</div>
        </div>
        <div class="dashboard-card" onclick="location.href='{{route('certificates')}}';">
            <img style="margin-bottom: 6%" src="/sertifikalar.png" height="55px" alt="">
            <div class="dashboard-card-title">Sertifikalarım</div>
            <div class="dashboard-card-description">Kazandığınız sertifikalarınızı görüntüleyin</div>
        </div>
        <div class="dashboard-card" onclick="location.href='{{route('uploadfile')}}';">
            <img style="margin-bottom: 6%" src="/document.png" height="55px" alt="">
            <div class="dashboard-card-title">Evrak Yükle</div>
            <div class="dashboard-card-description">Belgelerinizi online olarak yükleyin.</div>
        </div>
        <div class="dashboard-card" onclick="location.href='{{route('profile')}}';">
            @if($student->gender == 1) <img style="margin-bottom: 6%" src="/usermale.png" height="55px" alt=""> @endif
            @if($student->gender == 2) <img style="margin-bottom: 6%" src="/userfemale.png" height="55px" alt=""> @endif
            <div class="dashboard-card-title">Profil</div>
            <div class="dashboard-card-description">Bilgilerinizi güncelleyin</div>
        </div>
    </div>

</body>




<script>

    document.querySelectorAll('.nav-item').item(0).classList.add('active');

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
<script>
        // Mevcut JavaScript kodunu buraya ekleyin
        // ...

        // Yeni sayfalar için yönlendirme işlevselliği
        document.querySelectorAll('.dashboard-card').forEach(card => {
            card.addEventListener('click', function() {
                const href = this.getAttribute('onclick').split("'")[1];
                window.location.href = href;
            });
        });
    </script>


</html>
