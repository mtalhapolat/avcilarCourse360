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
                <h1 class="pageheader">Akademi Beyoğlu</h1>
                <div class="user-info" style="margin-bottom: 0px">
                    <div>
                        <div style="font-weight: 600;">{{$student->name}} {{$student->surname}}</div>
                        <div style="color: var(--text-light); font-size: 0.875rem;"><a>{{$student->identity}}</a></div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <h2 style="margin-bottom: 1rem; font-size: 1.5rem; font-weight: 600;">Akademi Beyoğlu Kurslar ve Etkinlikler</h2>
    <p>Başvuruya açık toplam <b>{{$events->count()}}</b> Akademi Beyoğlu kurs ve etkinliğimiz bulunmaktadır.</p> <br>
    <div class="filters" @if($request->s != null) style="display: none" @endif>
        <div class="filter-item" style="display: none">
            <label for="field">Etkinlik Kategorisi</label>
            <select id="field">
                @foreach($categories as $category)
                    <option value="{{$category->title}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="filter-item">
            <label for="search">Kurs / Etkinlik Ara</label>
            <input type="text" id="search" placeholder="Kurs / Etkinlik adı giriniz.">
        </div>
    </div>
    @if($request->s != null) Tüm kurs / etkinlikleri listelemek için <a href="/akademi-beyoglu">tıklayınız</a> <br> <br> @endif
    <div id="courses" class="courses">
        <!-- Ders kartları burada dinamik olarak oluşturulacak -->
    </div>
</main>
<div class="popup-overlay" id="popupOverlay">
    <div class="popup-content">
        <button class="popup-close" id="popupClose">✕</button>
        <h2 class="popup-title" id="popupTitle"></h2>
        <div class="popup-text" id="popupInstructor"></div>
        <h3 class="popup-subtitle">Etkinlik Bilgileri</h3>
        <div id="popupDetails"></div>
        <h3 class="popup-subtitle">Başvuru Şartları</h3>
        <div class="popup-text" id="popupRequirements" style="font-size: 0.875rem"></div>
        <h3 class="popup-subtitle">Etkinlik Açıklaması</h3>
        <div class="popup-text" id="popupDescription" style="font-size: 0.875rem"></div>
        <button class="popup-apply-button" value="0" id="popupApplyButton">Etkinliğe Katıl</button>
    </div>
</div>

<div class="popup-overlay" id="popupOverlayLesson">
    <div class="popup-content">
        <button class="popup-close" id="popupClose">✕</button>
        <h2 class="popup-title" id="popupTitle"></h2>
        <div class="popup-text" id="popupInstructor"></div>
        <h3 class="popup-subtitle">Kurs Bilgileri</h3>
        <div id="popupDetails"></div>
        <h3 class="popup-subtitle" style="font-size: 1rem!important">Başvuru Şartları</h3>
        <div class="popup-text" id="popupRequirements" style="font-size: 0.875rem"></div>
        <h3 class="popup-subtitle" style="font-size: 1rem!important">Kurs Açıklaması</h3>
        <div class="popup-text" id="popupDescription" style="font-size: 0.875rem"></div>
        <button class="popup-apply-button" value="0" id="popupApplyButton">Başvuruyu Tamamla</button>
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

    document.querySelectorAll('.nav-item').item(2).classList.add('active');

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
            @foreach($events as $event)
            @if($request->s != null) @if($request->s != $event->id) @continue @endif @endif
        {
            id: {{$event->id}},
            name: "{{$event->title}}",
            instructor: "{{$event->place}}",
            totalHours: "{{$event->event_duration}}",
            startDate: "{{ \Carbon\Carbon::parse($event->date_start)->format('d.m.Y') }}",
            endDate: "{{ \Carbon\Carbon::parse($event->date_end)->format('d.m.Y') }}",
            eventTime: "{{substr($event->event_time, 0, 5)}}",
            duration: "{{$event->event_duration}}",
            quota: {{$event->quota}},
            addquota: {{$event->addquota}},
            enrollcount: {{\App\Models\Events::getEnrollCount($event->id)}},
            school: "{{$event->place}}",
            field: "{{\App\Models\Events::getCategory($event->category_id)->title}}",
            requirements: "@if($event->ageRangeMin != null) {{$event->ageRangeMin}} - {{$event->ageRangeMax}} yaşında @endif
                @if($event->ikamet_only == 1), ilçemizde ikamet eden @endif
                @if($event->gender == "Male"), erkek @elseif($event->gender == "Female"), kadın @endif
                @if($event->student_only == 1), öğrenci @endif
                @if($event->disabled_only == 1), engelli @endif
                kursiyerler katılabilir.",
            description: "{{$event->statement}}",
            gender: "{{$event->gender}}",
            icon: "{{$event->icon}}"
        },
        @endforeach

            @foreach($lessons as $lesson)
            @if($request->s != null) @if($request->s != $lesson->id) @continue @endif @endif
        {
            id: {{$lesson->id}},
            name: "{{\App\Models\lesson::getBranch($lesson->id)->title}}",
            instructor: "{{\App\Models\lesson::getCenter($lesson->id)->title}}",
            totalHours: "{{$lesson->hours}}",
            startDate: "{{ \Carbon\Carbon::parse($lesson->date_start)->format('d.m.Y') }}",
            endDate: "{{ \Carbon\Carbon::parse($lesson->date_end)->format('d.m.Y') }}",
            quota: {{$lesson->quota}},
            addquota: {{$lesson->addquota}},
            enrollcount: {{\App\Models\lesson::getEnrollCount($lesson->id)}},
            lessonNo: {{$lesson->lesson_no}},
            lessonType: @if($lesson->lesson_type == 1) 'Sertifika' @elseif($lesson->lesson_type == 2) 'Katılım' @elseif($lesson->lesson_type == 3) 'Belgesiz' @endif,
            schedule: [
                    @foreach($lesson->getLessonDays($lesson->id) as $lessonday)
                { day: getWeekDay({{$lessonday->day}}), time: "{{substr($lessonday->time_start, 0, 5)}} - {{substr($lessonday->time_end, 0, 5)}}" },
                @endforeach
            ],
            school: "{{\App\Models\lesson::getCenter($lesson->id)->title}}",
            field: "{{\App\Models\branch::getArea($lesson->branch_id)->title}}",
            branch: "{{\App\Models\lesson::getBranch($lesson->id)->title}}",
            requirements: "@if($lesson->ageRangeMin != null) {{$lesson->ageRangeMin}} - {{$lesson->ageRangeMax}} yaşında @endif
                @if($lesson->ikamet_only == 1), ilçemizde ikamet eden @endif
                @if($lesson->gender == "Male"), erkek @elseif($lesson->gender == "Female"), kadın @endif
                @if($lesson->student_only == 1), öğrenci @endif
                @if($lesson->disabled_only == 1), engelli @endif
                @if($lesson->education != null), Öğrenim durumu {{\App\Models\student::getEducation($lesson->education)}} @endif
                @if($lesson->graduate != null), @if($lesson->graduate == 1) Mezun @else Mezun olmayan @endif @endif
                kursiyerler başvurabilir.",
            description: "{{$lesson->statement}}",
            gender: "{{$lesson->gender}}"
        },
        @endforeach

    ];



    function createCourseCard(course) {

        if (course.lessonNo == null) {
            if (course.enrollcount < course.quota + course.addquota){
                return `
                <div style="position: relative" class="course-card">
                    <div class="course-title">${course.name}</div>
                    <div class="course-instructor">${course.instructor}</div>
                    <div class="course-details">
                        <div class="course-detail">
                            <span>Başlama Tarihi:</span>
                            <span>${course.startDate}</span>
                        </div>
                        <div class="course-detail">
                            <span>Bitiş Tarihi:</span>
                            <span>${course.endDate}</span>
                        </div>
                        <div class="course-detail">
                            <span>Saati:</span>
                            <span>${course.eventTime}</span>
                        </div>
                        <div class="course-detail">
                            <span>Süresi:</span>
                            <span>${course.duration} saat</span>
                        </div>
                        <div class="course-detail">
                            <span>Kontenjan:</span>
                            <span>${course.enrollcount}/${course.quota}</span>
                        </div>
                    </div>
                    <button class="apply-button" onclick="openPopup(${course.id})">Detaylar</button>
                </div>
            `;
            } else {
                return `
                <div style="position: relative" class="course-card">
                    <div class="course-title">${course.name}</div>
                    <div class="course-instructor">${course.instructor}</div>
                    <div class="course-details">
                        <div class="course-detail">
                            <span>Etkinlik Başlama Tarihi:</span>
                            <span>${course.startDate}</span>
                        </div>
                        <div class="course-detail">
                            <span>Etkinlik Bitiş Tarihi:</span>
                            <span>${course.endDate}</span>
                        </div>
                        <div class="course-detail">
                            <span>Etkinlik Saati:</span>
                            <span>${course.eventTime}</span>
                        </div>
                        <div class="course-detail">
                            <span>Etkinlik Süresi:</span>
                            <span>${course.duration} saat</span>
                        </div>
                        <div class="course-detail">
                            <span>Kontenjan:</span>
                            <span>${course.enrollcount}/${course.quota}</span>
                        </div>
                    </div>
                    <button class="apply-button" style="background-color: #2d3748" >Kontenjan Doldu</button>
                </div>
            `;
            }
        } else {
            if(course.gender === 'Male' || course.gender === 'Female') {
                if (course.enrollcount < course.quota + course.addquota) {
                    return `
                <div style="position: relative" class="course-card">

                    <img style="position: absolute; right: 3%; top: 5%; width: 25px" src="${course.gender}.png" alt="">
                    <div class="course-title">${course.name}</div>
                    <div class="course-instructor">${course.instructor}</div>
                    <div class="course-details">
                        <div class="course-detail">
                            <span>Kurs numarası:</span>
                            <span>${course.lessonNo}</span>
                        </div>
                        <div class="course-detail">
                            <span>Toplam Ders Saati:</span>
                            <span>${course.totalHours} saat</span>
                        </div>
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
                            <span>${course.enrollcount}/${course.quota}</span>
                        </div>
                        <div class="course-detail">
                            <span>Kurs Tipi:</span>
                            <span>${course.lessonType}</span>
                        </div>
                    </div>
                    <div class="course-schedule">
                        <div class="schedule-title">Ders Programı</div>
                        ${course.schedule.map(slot => `
                            <div class="schedule-item">
                                <span>${slot.day}:</span>
                                <span>${slot.time}</span>
                            </div>
                        `).join('')}
                    </div>
                    <button class="apply-button" onclick="openPopupLesson(${course.id})">Başvur</button>
                </div>
            `;
                } else {
                    return `
                <div style="position: relative" class="course-card">

                    <img style="position: absolute; right: 3%; top: 5%; width: 25px" src="${course.gender}.png" alt="">
                    <div class="course-title">${course.name}</div>
                    <div class="course-instructor">${course.instructor}</div>
                    <div class="course-details">
                        <div class="course-detail">
                            <span>Kurs numarası:</span>
                            <span>${course.lessonNo}</span>
                        </div>
                        <div class="course-detail">
                            <span>Toplam Ders Saati:</span>
                            <span>${course.totalHours} saat</span>
                        </div>
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
                            <span>${course.enrollcount}/${course.quota}</span>
                        </div>
                        <div class="course-detail">
                            <span>Kurs Tipi:</span>
                            <span>${course.lessonType}</span>
                        </div>
                    </div>
                    <div class="course-schedule">
                        <div class="schedule-title">Ders Programı</div>
                        ${course.schedule.map(slot => `
                            <div class="schedule-item">
                                <span>${slot.day}:</span>
                                <span>${slot.time}</span>
                            </div>
                        `).join('')}
                    </div>
                    <button class="apply-button" style="background-color: #2d3748" >Kontenjan Doldu</button>
                </div>
            `;
                }
            } else {
                if (course.enrollcount < (course.quota + course.addquota)) {
                    return `
                <div style="position: relative" class="course-card">
                    <div class="course-title">${course.name}</div>
                    <div class="course-instructor">${course.instructor}</div>
                    <div class="course-details">
                        <div class="course-detail">
                            <span>Kurs numarası:</span>
                            <span>${course.lessonNo}</span>
                        </div>
                        <div class="course-detail">
                            <span>Toplam Ders Saati:</span>
                            <span>${course.totalHours} saat</span>
                        </div>
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
                            <span>${course.enrollcount}/${course.quota}</span>
                        </div>
                        <div class="course-detail">
                            <span>Kurs Tipi:</span>
                            <span>${course.lessonType}</span>
                        </div>
                    </div>
                    <div class="course-schedule">
                        <div class="schedule-title">Ders Programı</div>
                        ${course.schedule.map(slot => `
                            <div class="schedule-item">
                                <span>${slot.day}:</span>
                                <span>${slot.time}</span>
                            </div>
                        `).join('')}
                    </div>
                    <button class="apply-button" onclick="openPopupLesson(${course.id})">Başvur</button>
                </div>
            `;
                } else {
                    return `
                <div style="position: relative" class="course-card">
                    <div class="course-title">${course.name}</div>
                    <div class="course-instructor">${course.instructor}</div>
                    <div class="course-details">
                        <div class="course-detail">
                            <span>Kurs numarası:</span>
                            <span>${course.lessonNo}</span>
                        </div>
                        <div class="course-detail">
                            <span>Toplam Ders Saati:</span>
                            <span>${course.totalHours} saat</span>
                        </div>
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
                            <span>${course.enrollcount}/${course.quota}</span>
                        </div>
                        <div class="course-detail">
                            <span>Kurs Tipi:</span>
                            <span>${course.lessonType}</span>
                        </div>
                    </div>
                    <div class="course-schedule">
                        <div class="schedule-title">Ders Programı</div>
                        ${course.schedule.map(slot => `
                            <div class="schedule-item">
                                <span>${slot.day}:</span>
                                <span>${slot.time}</span>
                            </div>
                        `).join('')}
                    </div>
                    <button class="apply-button" style="background-color: #2d3748">Kontenjan Doldu</button>
                </div>
            `;
                }
            }
        }

    }

    function renderCourses(filteredCourses) {
        const coursesContainer = document.getElementById('courses');
        coursesContainer.innerHTML = filteredCourses.map(createCourseCard).join('');
    }

    function filterCourses() {
        const search = document.getElementById('search').value.toLowerCase();
        const field = document.getElementById('field').value;
        const filteredCourses = courses.filter(course =>
            (field === '' || course.field === field) &&
            (search === '' || course.name.toLowerCase().includes(search) || course.instructor.toLowerCase().includes(search))
        );

        renderCourses(filteredCourses);
    }

    // İlk yükleme
    document.addEventListener('DOMContentLoaded', () => {
        renderCourses(courses);
    });

    // Filtreleme olaylarını dinle
    document.getElementById('search').addEventListener('input', filterCourses);
    document.getElementById('field').addEventListener('change', filterCourses);

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
    const popupOverlayLesson = document.getElementById('popupOverlayLesson');
    const popupClose = document.getElementById('popupClose');
    const popupClose2 = document.getElementById('popupClose2');
    const popupTitle = document.getElementById('popupTitle');
    const popupTitle2 = document.getElementById('popupTitle2');
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
                            <span>Başlama Tarihi:</span>
                            <span>${course.startDate}</span>
                        </div>
                        <div class="course-detail">
                            <span>Bitiş Tarihi:</span>
                            <span>${course.endDate}</span>
                        </div>
                        <div class="course-detail">
                            <span>Saati:</span>
                            <span>${course.eventTime}</span>
                        </div>
                        <div class="course-detail">
                            <span>Süresi:</span>
                            <span>${course.totalHours}</span>
                        </div>
                        <div class="course-detail">
                            <span>Kontenjan:</span>
                            <span>${course.enrollcount}/${course.quota}</span>
                        </div>
                    </div>
                `;
            popupRequirements.textContent = course.requirements;
            popupDescription.textContent = course.description;
            popupApplyButton.value = course.id;
            popupOverlay.classList.add('active');
        }
    }

    function openPopup2(courseId) {
        let token = '@csrf';
        token = token.substr(42, 40);
        $.ajax({
            type: "get",
            url: `/getBranchInfo`,
            data: { _token: token, courseId: courseId},
            success: function (data) {
                if (data) {
                    popupTitle2.innerHTML = data[0];
                    popupDescription2.innerHTML = `
                    <div class="course-details">
                        <div class="course-detail">
                            <p style="font-size: 19px">${data[1]}</p>
                        </div>
                    </div>
                `;
                    popupBranchInfo.classList.add('active');
                } else {
                    popupTitle2.innerHTML = 'Hata';
                    popupDescription2.innerHTML = `
                    <div class="course-details">
                        <div class="course-detail">
                            <p style="font-size: 19px">${data}</p>
                        </div>
                    </div>
                `;
                    popupBranchInfo.classList.add('active');
                }
            },
            error: function(err) {
                console.log( $($(err.responseText)[1]).text() )
                debugger;
            }
        });
    }

    function openPopup3(courseId) {
        let token = '@csrf';
        token = token.substr(42, 40);
        $.ajax({
            type: "get",
            url: `/getBranchInfo`,
            data: { _token: token, courseId: courseId},
            success: function (data) {
                if (data) {
                    popupTitle2.innerHTML = data[0];
                    popupDescription2.innerHTML = `
                    <div class="course-details">
                        <div class="course-detail">
                            <p style="font-size: 19px">Tebrikler. Kurs başvurunuz alınmıştır. Başvurunuzun durumu hakkında sms ile bilgilendirme yapılacaktır.</p>
                        </div>
                    </div>
                `;
                    popupBranchInfo.classList.add('active');
                } else {
                    alert(data);
                }
            },
            error: function(err) {
                console.log( $($(err.responseText)[1]).text() )
                debugger;
            }
        });
    }

    function openPopup4(courseId) {
        popupTitle2.innerHTML = 'Tebrikler';
        popupDescription2.innerHTML = `
                    <div class="course-details">
                        <div class="course-detail" style="text-align: center!important">
                            <p style="font-size: 19px; text-align: center!important"">Etkinlik başvurunuz alınmıştır. Başvurunuzun durumu hakkında sms ile bilgilendirme yapılacaktır.</p>
                        </div>
                    </div>
                `;
        popupBranchInfo.classList.add('active');
    }

    function openPopupLesson(courseId) {
        const course = courses.find(c => c.id === courseId);
        if (course) {
            popupTitle.innerHTML = course.name + ' <svg onclick="openPopup2('+courseId+')" style="cursor:pointer;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>';
            popupInstructor.textContent = course.instructor;
            popupDetails.innerHTML = `
                    <div class="course-details">
                        <div class="course-detail">
                            <span>Kurs Numarası:</span>
                            <span>${course.lessonNo}</span>
                        </div>
                        <div class="course-detail">
                            <span>Toplam Ders Saati:</span>
                            <span>${course.totalHours} saat</span>
                        </div>
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
                            <span>${course.quota}</span>
                        </div>
                    </div>
                    <div class="course-schedule">
                        <div class="schedule-title">Ders Programı</div>
                        ${course.schedule.map(slot => `
                            <div class="schedule-item">
                                <span>${slot.day}:</span>
                                <span>${slot.time}</span>
                            </div>
                        `).join('')}
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
    function closePopup2() {
        popupBranchInfo.classList.remove('active');
    }

    popupClose.addEventListener('click', closePopup);
    popupClose2.addEventListener('click', closePopup2);
    popupOverlay.addEventListener('click', (event) => {
        if (event.target === popupOverlay) {
            closePopup();
        }
    });
    popupBranchInfo.addEventListener('click', (event) => {
        if (event.target === popupBranchInfo) {
            closePopup();
        }
    });

    popupApplyButton.addEventListener('click', () => {

        let eventid = document.getElementById('popupApplyButton').value;
        let token = '@csrf';
        token = token.substr(42, 40);


        const course = courses.find(cc => cc.id == eventid);

        if (course.lessonType == null) {
            $.ajax({
                type: "post",
                url: `{{ url('/inserteventenroll/') }}`,
                data: { _token: token, eventid: eventid},
                success: function (data) {
                    if (data === "ok") {
                        openPopup4(eventid);
                    } else {
                        popupTitle2.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-frown"><circle cx="12" cy="12" r="10"/><path d="M16 16s-1.5-2-4-2-4 2-4 2"/><line x1="9" x2="9.01" y1="9" y2="9"/><line x1="15" x2="15.01" y1="9" y2="9"/></svg>';
                        popupDescription2.innerHTML = `
                    <div class="course-details" style="justify-items: center">
                        <div class="course-detail" style="text-align: center!important">
                            <p style="font-size: 19px">${data}</p>
                        </div>
                    </div>
                `;
                        popupBranchInfo.classList.add('active');
                    }
                },
                error: function(err) {
                    console.log( $($(err.responseText)[1]).text() )
                    debugger;
                }
            });
        } else {
            $.ajax({
                type: "post",
                url: `{{ url('/insertenroll/') }}`,
                data: { _token: token, lessonid: eventid},
                success: function (data) {
                    if (data === "ok") {
                        openPopup3(eventid);
                        //window.location.href = "{{route('registered')}}"
                    } else {
                        popupTitle2.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-frown"><circle cx="12" cy="12" r="10"/><path d="M16 16s-1.5-2-4-2-4 2-4 2"/><line x1="9" x2="9.01" y1="9" y2="9"/><line x1="15" x2="15.01" y1="9" y2="9"/></svg> Dikkat';
                        popupDescription2.innerHTML = `
                    <div class="course-details">
                        <div class="course-detail">
                            <p style="font-size: 19px">${data}</p>
                        </div>
                    </div>
                `;
                        popupBranchInfo.classList.add('active');
                    }
                },
                error: function(err) {
                    console.log( $($(err.responseText)[1]).text() )
                    debugger;
                }
            });
        }





        closePopup();
    });
</script>

<script src="/js/custom.js"></script>

</body>
</html>
