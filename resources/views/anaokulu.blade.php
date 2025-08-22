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
                <h1 class="pageheader">Yuvamız Avcılar</h1>
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

        <div style="text-align: center">
            <img src="/anaokulu.png" style="height: 100px" alt="">
        </div>
        <br>
        <p style="text-align: center">Yuvamız Beyoğlu başvuruları tamamlanmıştır. Yoğun ilginize teşekkür ederiz.</p>

        <div style="text-align: center; margin-top: 2rem">
            <img src="heart.png" style="width: 100px" alt="">
        </div>
    </div>

    {{--<div id="courses" class="courses">


    </div>--}}
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

    document.querySelectorAll('.nav-item').item(8).classList.add('active');

    function getWeekDay($number){
        if ($number === 1)
            return "Pazartesi";
        else if ($number === 2)
            return "Salı";
        else if ($number === 3)
            return "Çarşamba";
        else if ($number === 4)
            return "Perşembe";
        else if ($number === 5)
            return "Cuma";
        else if ($number === 6)
            return "Cumartesi";
        else if ($number === 7)
            return "Pazar";

    }

    const courses = [
            @foreach($kindergartens as $kindergarten)
        {
            id: {{$kindergarten->id}},
            name: "{{$kindergarten->title}}",
            instructor: "{{$kindergarten->address}}",
            startDate: "{{$kindergarten->start_date}}",
            endDate: "{{$kindergarten->end_date}}",
            quota: {{$kindergarten->quota}},
            school: "{{$kindergarten->address}}",
            requirements: "@if($kindergarten->ageRangeMin != null) {{$kindergarten->ageRangeMin}} - {{$kindergarten->ageRangeMax}} yaşında @endif
                @if($kindergarten->ikamet_only == 1), ilçemizde ikamet eden @endif
                @if($kindergarten->gender == "Male"), erkek @elseif($kindergarten->gender == "Female"), kadın @endif
                @if($kindergarten->disabled_only == 1), engelli @endif
                çocuklarınız için başvurabilirsiniz.",
            description: "{{$kindergarten->statement}}",
            gender: "{{$kindergarten->gender}}",
            phone: "{{$kindergarten->phone}}",
            email: "{{$kindergarten->email}}"
        },

        @endforeach

    ];

    function createCourseCard(course) {
        return `
                <div style="position: relative" class="course-card">
<div class="swiper-container" onclick="openLargeSlider(${course.id})">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img src="images/kindergarten/anaokulu.jpg" alt="${course.name} 1"></div>
                            <div class="swiper-slide"><img src="images/kindergarten/anaokulu2.jpg" alt="${course.name} 1"></div>
                            <div class="swiper-slide"><img src="images/kindergarten/anaokulu3.jpg" alt="${course.name} 1"></div>
                            <div class="swiper-slide"><img src="images/kindergarten/anaokulu4.jpg" alt="${course.name} 1"></div>
                        </div>
                    </div>
                    <div class="course-title">${course.name}</div>
                    <div class="course-instructor">${course.instructor}</div>
                    <div class="course-details">
                        <div class="course-detail">
                            <span>Başlangıç Tarihi:</span>
                            <span>${course.startDate}</span>
                        </div>
                        <div class="course-detail">
                            <span>Bitiş Tarihi:</span>
                            <span>${course.endDate}</span>
                        </div>
                        <div class="course-detail">
                            <span>Kontenjan:</span>
                            <span>${course.quota} kişi</span>
                        </div>
                        <div class="course-detail">
                            <span>İletişim Numarası:</span>
                            <span>${course.phone}</span>
                        </div>
                        <div class="course-detail">
                            <span>E-posta:</span>
                            <span>${course.email}</span>
                        </div>
                    </div>
                    <button class="apply-button" onclick="openPopup(${course.id})">Detaylar</button>
                </div>
            `;
    }

    function renderCourses(filteredCourses) {
        const coursesContainer = document.getElementById('courses');
        coursesContainer.innerHTML = filteredCourses.map(createCourseCard).join('');
        initializeSwiper(); // Swiper'ı başlat
    }

    function initializeSwiper() {
        new Swiper('.swiper-container', {
            pagination: {
                el: '.swiper-pagination',
            },
            loop: true,
        });
    }

    function filterCourses() {
        const search = document.getElementById('search').value.toLowerCase();

        const filteredCourses = courses.filter(course =>
            (search === '' || course.name.toLowerCase().includes(search) || course.instructor.toLowerCase().includes(search))
        );

        renderCourses(filteredCourses);
    }

    // İlk yükleme
    document.addEventListener('DOMContentLoaded', () => {
        renderCourses(courses);
    });


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

    // Popup işlevselliği
    const popupOverlay = document.getElementById('popupOverlay');
    const popupClose = document.getElementById('popupClose');
    const popupTitle = document.getElementById('popupTitle');
    const popupInstructor = document.getElementById('popupInstructor');
    const popupDetails = document.getElementById('popupDetails');
    const popupRequirements = document.getElementById('popupRequirements');
    const popupDescription = document.getElementById('popupDescription');
    const popupApplyButton = document.getElementById('popupApplyButton');

    function openPopup(courseId) {
        const course = courses.find(c => c.id === courseId);
        if (course) {
            popupTitle.innerHTML = course.name;
            popupInstructor.textContent = course.instructor;
            popupDetails.innerHTML = `
                    <div class="course-details">
                        <div class="course-detail">
                            <span>Başlangıç Tarihi:</span>
                            <span>${course.startDate}</span>
                        </div>
                        <div class="course-detail">
                            <span>Bitiş Tarihi:</span>
                            <span>${course.endDate}</span>
                        </div>
                        <div class="course-detail">
                            <span>Kontenjan:</span>
                            <span>${course.quota} kişi</span>
                        </div>
                        <div class="course-detail">
                            <span>İletişim Numarası:</span>
                            <span>${course.phone}</span>
                        </div>
                        <div class="course-detail">
                            <span>E-posta Adresi:</span>
                            <span>${course.email}</span>
                        </div>
                    </div>
                `;
            popupRequirements.textContent = course.requirements;
            popupDescription.textContent = course.description;
            popupApplyButton.value = course.id;
            popupOverlay.classList.add('active');
        }
    }

    function closePopup() {
        popupOverlay.classList.remove('active');
    }

    popupClose.addEventListener('click', closePopup);
    popupOverlay.addEventListener('click', (event) => {
        if (event.target === popupOverlay) {
            closePopup();
        }
    });

    popupApplyButton.addEventListener('click', () => {

        let kindergartenid = document.getElementById('popupApplyButton').value;

        let parent1 = document.getElementById('popupApplyButton').previousElementSibling.firstElementChild.value;
        let parent2 = document.getElementById('popupApplyButton').previousElementSibling.lastElementChild.value;

        if (parent1 === '' || parent2 === '')
            return null;

        let token = '@csrf';
        token = token.substr(42, 40);
        $.ajax({
            type: "post",
            url: `{{ url('/insertkindergartenenroll/') }}`,
            data: { _token: token, kindergartenid: kindergartenid, parent1: parent1, parent2: parent2},
            success: function (data) {
                if (data === "ok") {
                    window.location.href = "{{route('anaokulu')}}"
                } else {
                    alert(data);
                }
            },
            error: function(err) {
                console.log( $($(err.responseText)[1]).text() )
                debugger;
            }
        });

        closePopup();
    });

    // Büyük slider işlevselliği
    const largeSliderOverlay = document.getElementById('largeSliderOverlay');
    const largeSliderClose = document.getElementById('largeSliderClose');
    const largeSliderWrapper = document.getElementById('largeSliderWrapper');
    let largeSwiper;

    function openLargeSlider(courseId) {
        const course = courses.find(c => c.id === courseId);
        if (course) {
            largeSliderWrapper.innerHTML = `
                    <div class="swiper-slide"><img src="images/kindergarten/anaokulu.jpg" alt="1"></div>
                    <div class="swiper-slide"><img src="images/kindergarten/anaokulu2.jpg" alt="2"></div>
                    <div class="swiper-slide"><img src="images/kindergarten/anaokulu3.jpg" alt="3"></div>
                    <div class="swiper-slide"><img src="images/kindergarten/anaokulu4.jpg" alt="4"></div>
                `;
            largeSliderOverlay.classList.add('active');
            initializeLargeSwiper();
        }
    }

    function closeLargeSlider() {
        largeSliderOverlay.classList.remove('active');
        if (largeSwiper) {
            largeSwiper.destroy();
        }
    }

    function initializeLargeSwiper() {
        largeSwiper = new Swiper('.large-slider-container', {
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            loop: true,
        });
    }

    largeSliderClose.addEventListener('click', closeLargeSlider);
    largeSliderOverlay.addEventListener('click', (event) => {
        if (event.target === largeSliderOverlay) {
            closeLargeSlider();
        }
    });
</script>

<script>
    document.getElementById('velidogum').addEventListener('input', function(e) {
        let value = this.value.replace(/\D/g, '');
        let formattedDate = '';

        if (value.length > 0) {
            formattedDate += value.substring(0, 2);
            if (value.length > 2) {
                formattedDate += '.' + value.substring(2, 4);
                if (value.length > 4) {
                    formattedDate += '.' + value.substring(4, 8);
                }
            }
        }

        this.value = formattedDate;
    });
</script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>
</html>
