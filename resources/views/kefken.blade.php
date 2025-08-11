<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Başvuru Beyoğlu</title>
    <link rel="stylesheet" href="/css/custom.css">
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
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
            font-size: 1rem;
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
            text-align: center;
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
            .dashboard-card {
                background-color: var(--white);
                border-radius: 12px;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
                padding: 1rem!important;
                transition: all 0.3s ease;
                cursor: pointer;
                font-size: 0.8rem!important;
            }
            .dashboard-card-title {
                font-size: 1rem!important;
                font-weight: 600;
                margin-bottom: 0.5rem;
                color: var(--text-color);
            }
        }

        /* Yeni kartlar için ek stiller */
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr))!important;
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

        .certificates-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 1rem;
        }
        .certificate-row {
            background-color: #f9fafb;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .certificate-row:hover {
            background-color: #f3f4f6;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .certificate-row td {
            padding: 1rem;
            vertical-align: middle;
            text-align: center;
        }
        .certificate-icon {
            width: 40px;
            height: 40px;
            background-color: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            position: absolute;
            margin-top: -10px;
        }
        .certificate-name {
            font-weight: 600;
            color: var(--text-color);
        }
        .certificate-details {
            color: var(--text-light);
            font-size: 0.875rem;
        }
        .profile-content {
            background-color: var(--white);
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 2rem;
            margin-top: 1rem;
        }


    </style>
</head>
<body>

@include('partials/sidebar')

<div id="loading-spinner" style="display: none; ">
    <div class="spinner"></div>
    <span style="position: absolute">Kaydınız Yapılıyor...</span>
</div>

<main class="main-content">
    <header class="header">
        <div style="display: flex; align-items: center; gap: 1.5rem;">
            <img src="https://beyoglu.bel.tr/wp-content/uploads/2020/05/header-logo-3.png"
                 alt="Beyoğlu Belediyesi"
                 style="height: 80px; width: auto;">
            <div>
                <h1 class="pageheader">Kefken Başvurusu</h1>
                <div class="user-info" style="margin-bottom: 0px">
                    <div>
                        <div style="font-weight: 600;">{{$student->name}} {{$student->surname}}</div>
                        <div style="color: var(--text-light); font-size: 0.875rem;"><a>{{$student->identity}}</a></div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @if($enrollments->count() > 0)

    <h2 style="font-size: 1.5rem; font-weight: 600;">Kefken Başvurum</h2>

    <div class="profile-content" style="margin-bottom: 1rem; overflow: auto">
        <table class="certificates-table">
            <thead>
            <tr class="certificates-table-header">
                <th>Seçilen Grup</th>
                <th>Katılımcı</th>
                <th>Gidiş Tarihi</th>
                <th>Başvuru Tarihi</th>
                <th>Durum</th>
            </tr>
            </thead>
            <tbody id="certificatesTableBody">
            <!-- Sertifikalar buraya eklenecek -->
            @foreach($enrollments as $enrollment)
            @if($enrollment->deleted_at == null)
                <tr class="certificate-row">
                    <td>{{\App\Models\Kefken::getGroup($enrollment->group_id)}}</td>
                    <td>{{$enrollment->student_name}} {{$enrollment->student_surname}}
                        @if($enrollment->student2_name != null) , {{$enrollment->student2_name}} {{$enrollment->student2_surname}}  @endif
                        @if($enrollment->student3_name != null) , {{$enrollment->student3_name}} {{$enrollment->student3_surname}}  @endif
                        @if($enrollment->student4_name != null) , {{$enrollment->student4_name}} {{$enrollment->student4_surname}}  @endif
                        @if($enrollment->student5_name != null) , {{$enrollment->student5_name}} {{$enrollment->student5_surname}}  @endif
                        @if($enrollment->student6_name != null) , {{$enrollment->student6_name}} {{$enrollment->student6_surname}}  @endif
                    </td>
                    <td>@if($enrollment->visit_date != null) {{\Carbon\Carbon::parse($enrollment->visit_date)->format('d.m.Y')}} @endif</td>
                    <td>{{\Carbon\Carbon::parse($enrollment->created_at)->format('d.m.Y H:i')}}</td>
                    <td>@if($enrollment->statu == 0) Onay Bekliyor @elseif($enrollment->statu == 1) Onaylandı @elseif($enrollment->statu == 2) İptal Edildi @endif</td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>

    @endif


    <h2 style="margin-bottom: 1rem; font-size: 1.5rem; font-weight: 600;">Kefken Grupları</h2>

    <div class="dashboard-cards">
        <div class="dashboard-card" onclick="location.href='{{route('kefkenOrtaokul')}}'">
            <img style="margin-bottom: 5%" src="/kefken-ortaokul.png" height="70px" alt="">
            <div class="dashboard-card-title">Ortaokul Grubu</div>
            <div class="dashboard-card-description">10-14 yaş arası ortaokul öğrencilerine özel grup.</div>
        </div>
        <div class="dashboard-card" onclick="location.href='{{route('kefkenLise')}}'">
            <img style="margin-bottom: 5%" src="/kefken-lise.png" height="70px" alt="">
            <div class="dashboard-card-title">Lise Grubu</div>
            <div class="dashboard-card-description">14-18 yaş arası lise öğrencilerine özel grup.</div>
        </div>
        <div class="dashboard-card" onclick="location.href='{{route('kefkenUniversite')}}'">
            <img style="margin-bottom: 5%" src="/kefken-universite.png" height="70px" alt="">
            <div class="dashboard-card-title">Üniversite Grubu</div>
            <div class="dashboard-card-description">18-23 yaş arası üniversite öğrencilerine özel grup.</div>
        </div>


        <div class="dashboard-card" onclick="location.href='{{route('kefkenAnnecocuk')}}'">
            <img style="margin-bottom: 5%" src="/kefken-annecocuk.png" height="70px" alt="">
            <div class="dashboard-card-title">Anne - Çocuk Grubu</div>
            <div class="dashboard-card-description">Anne ve 10 yaş altı çocuğunun beraber katıldığı grup.</div>
        </div>
        {{--
        <div class="dashboard-card" onclick="location.href='{{route('kefkenEmekli')}}'">
            <img style="margin-bottom: 5%" src="/kefken-emekli.png" height="70px" alt="">
            <div class="dashboard-card-title">Emekli Grubu</div>
            <div class="dashboard-card-description">55 yaş üstü emeklilere özel grup. Eşiniz ile beraber katılabilirsiniz.</div>
        </div>

        <div class="dashboard-card" onclick="location.href='{{route('kefkenGunubirlik')}}'">
            <img style="margin-bottom: 5%" src="/kefken.png" height="60px" alt="">
            <div class="dashboard-card-title">Günübirlik</div>
            <div class="dashboard-card-description">Günübirlik düzenlenen gruplar.</div>
        </div>
        --}}
        <div class="dashboard-card" onclick="location.href='{{route('kefkenBalayi')}}'">
            <img style="margin-bottom: 5%" src="/kefken-balayi.png" height="70px" alt="">
            <div class="dashboard-card-title">❤ Balayı ❤</div>
            <div class="dashboard-card-description">Yeni evli çiftlere özel balayı.</div>
        </div>
    </div>

<div class="popup-overlay" id="popupBranchInfo">
    <div class="popup-content">
        <button class="popup-close" id="popupClose2">✕</button>
        <h2 class="popup-title" id="popupTitle2"></h2>
        <div class="popup-text" id="popupDescription2" style="font-size: 0.875rem"></div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


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

    document.querySelectorAll('.nav-item').item(6).classList.add('active');


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

<script src="/js/custom.js"></script>

</body>
</html>
