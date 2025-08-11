<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Başvuru Beyoğlu</title>
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

<main class="main-content">
    <header class="header">
        <div style="display: flex; align-items: center; gap: 1.5rem;">
            <img src="/logokare.png"
                 alt="Avcılar Belediyesi"
                 style="height: 100px; width: auto;">
            <div>
                <h1 class="pageheader">Başvurularım</h1>
                <div class="user-info" style="margin-bottom: 0px">
                    <div>
                        <div style="font-weight: 600;">{{$student->name}} {{$student->surname}}</div>
                        <div style="color: var(--text-light); font-size: 0.875rem;"><a>{{$student->identity}}</a></div>
                    </div>
                </div>
            </div>


        </div>

    </header>
    <h2 style="margin-bottom: 1rem; font-size: 1.5rem; font-weight: 600;">Kayıt Olduğum Kurslar</h2>
    <div id="courses" class="courses">
        @if(sizeof($enrollments) == 0)
            <a>Henüz herhangi bir kursa katılmadınız.</a>
        @else
        @foreach($enrollments as $enroll)
        <div class="course-card">
            <div class="course-title">{{$enroll->getLesson($enroll->lesson_id)->getBranch($enroll->getLesson($enroll->lesson_id)->id)->title}}</div>
            <div class="course-instructor">{{$enroll->getLesson($enroll->lesson_id)->getCenter($enroll->getLesson($enroll->lesson_id)->id)->title}}</div>
            <div class="course-details">
                <div class="course-detail">
                    <span>Kurs Numarası:</span>
                    <span>{{$enroll->getLesson($enroll->lesson_id)->lesson_no}}</span>
                </div>
                <div class="course-detail">
                    <span>Toplam Ders Saati:</span>
                    <span>{{$enroll->getLesson($enroll->lesson_id)->hours}} saat</span>
                </div>
                <div class="course-detail">
                    <span>Başlangıç Tarihi:</span>
                    <span>{{ \Carbon\Carbon::parse($enroll->getLesson($enroll->lesson_id)->date_start)->format('d.m.Y') }}</span>
                </div>
                <div class="course-detail">
                    <span>Bitiş Tarihi:</span>
                    <span>{{ \Carbon\Carbon::parse($enroll->getLesson($enroll->lesson_id)->date_end)->format('d.m.Y') }}</span>
                </div>
                <div class="course-detail">
                    <span>Kontenjan:</span>
                    <span>{{\App\Models\enroll::getLessonEnrollCount($enroll->id)}}/{{$enroll->getLesson($enroll->lesson_id)->quota}}</span>
                </div>
            </div>
            <div class="course-schedule">
                <div class="schedule-title">Ders Programı</div>
                @foreach($enroll->getLesson($enroll->lesson_id)->getLessonDays($enroll->lesson_id) as $lessonday)
                <div class="schedule-item">
                    <span>{{$enroll->getLesson($enroll->lesson_id)->getWeekDay($lessonday->day)}}:</span>
                    <span>{{substr($lessonday->time_start, 0, 5)}} - {{substr($lessonday->time_end, 0, 5)}}</span>
                </div>
                @endforeach
            </div>
            <div class="course-schedule">
                <div class="schedule-title">Başvuru Tarihi: {{substr($enroll->created_at, 0, 10)}}</div>
                <div class="schedule-title">Durumu:
                    @if($enroll->statu == 0)
                        <span style="color: orangered">Onay Bekliyor</span>
                    @elseif($enroll->statu == 1)
                        <span style="color: #019b05">Onaylandı</span>
                    @elseif($enroll->statu == 2)
                        <span style="color: #000000">İptal Edildi</span>
                    @endif
                </div>
            </div>
            @if($enroll->statu == 0)
                <button class="apply-button" onclick="cancelEnroll({{$enroll->getLesson($enroll->lesson_id)->id}})">Başvuruyu İptal Et</button>
            @elseif($enroll->statu == 1)
                @if($enroll->success_statu == 1)
                    <button class="apply-button" style="background-color: #42b135" disabled >MEB Sertifika Haketti</button>
                @elseif($enroll->success_statu == 2)
                    <button class="apply-button" style="background-color: #42b135" disabled >Katılım Belgesi Haketti</button>
                @elseif($enroll->success_statu == 3)
                    <button class="apply-button" disabled >Devamsızlık</button>
                @elseif($enroll->success_statu == 4)
                    <button class="apply-button" disabled >Sınava Girmedi</button>
                @elseif($enroll->success_statu == 5)
                    <button class="apply-button" disabled >Sınav Başarısız</button>
                @elseif($enroll->success_statu == 6)
                    <button class="apply-button" disabled >Kurs Kapandı</button>
                @else
                    <button class="apply-button" disabled >Kesin Kaydınız Yapıldı</button>
                @endif
            @else
                <button class="apply-button" style="background-color: #0b2e13; cursor: " disabled >İptal Edildi</button>
            @endif
            @if(\Illuminate\Support\Facades\DB::table('lesson_documents')->where('lesson_id', $enroll->lesson_id)->first() && $enroll->statu == 1)
            <button class="apply-button" style="background-color: #9a2929; margin-top: 0.5rem" disabled ><a style="color: white; text-decoration: none" href="uploads/lesson_documents/{{\Illuminate\Support\Facades\DB::table('lesson_documents')->where('lesson_id', $enroll->lesson_id)->first()->document_url}}" target="_blank">Sınav Sonuçları</a></button>
            @endif
        </div>
        @endforeach
        @endif

    </div>

    <br><br>
    <hr>
    <br><br>

    <h2 style="margin-bottom: 1rem; font-size: 1.5rem; font-weight: 600;">Kayıt Olduğum Etkinlikler</h2>
    <div id="courses" class="courses">
        @if(sizeof($eventenrollments) == 0)
            <a>Henüz herhangi bir etkinliğe katılmadınız.</a>
        @else
        @foreach($eventenrollments as $eventenroll)
            <div class="course-card" style="position:relative;">
                <img style="position: absolute; right: 3%; top: 5%; width: 35px" src="{{$eventenroll->getEvent($eventenroll->event_id)->icon}}" alt="">
                <div class="course-title">{{$eventenroll->getEvent($eventenroll->event_id)->title}}</div>
                <div class="course-instructor">{{$eventenroll->getEvent($eventenroll->event_id)->place}}</div>
                <div class="course-details">
                    <div class="course-detail">
                        <span>Etkinlik Tarihi:</span>
                        <span>{{substr($eventenroll->getEvent($eventenroll->event_id)->date_start, 0, 10)}}</span>
                    </div>
                    <div class="course-detail">
                        <span>Saat:</span>
                        <span>{{$eventenroll->getEvent($eventenroll->event_id)->event_time}}</span>
                    </div>
                    <div class="course-detail">
                        <span>Etkinlik Süresi:</span>
                        <span>{{$eventenroll->getEvent($eventenroll->event_id)->event_duration}}</span>
                    </div>
                    <div class="course-detail">
                        <span>Kontenjan:</span>
                        <span>{{$eventenroll->getEvent($eventenroll->event_id)->quota}}</span>
                    </div>
                </div>
                <div class="course-schedule">
                    <div class="schedule-title">Başvuru Tarihi: {{substr($eventenroll->created_at, 0, 10)}}</div>
                    <div class="schedule-title">Durumu:
                        @if($eventenroll->statu == '0')
                            <span style="color: orangered">Onay Bekliyor</span>
                        @elseif($eventenroll->statu == '1')
                            <span style="color: #019b05">Onaylandı</span>
                        @elseif($eventenroll->statu == '2')
                            <span style="color: #000000">İptal Edildi</span>
                        @endif
                    </div>
                </div>
                @if($eventenroll->statu == '0')
                    <button class="apply-button" onclick="cancelEventEnroll({{$eventenroll->getEvent($eventenroll->event_id)->id}})">Başvuruyu İptal Et</button>
                @elseif($eventenroll->statu == '1')
                    <button class="apply-button" style="cursor: none" disabled >Kesin Kaydınız Yapıldı</button>
                @else
                    <button class="apply-button" style="background-color: #0b2e13; cursor: none" disabled >İptal Edildi</button>
                @endif
            </div>
        @endforeach
        @endif
    </div>

</main>
<div class="popup-overlay" id="popupOverlay">
    <div class="popup-content">
        <button class="popup-close" id="popupClose">✕</button>
        <h2 class="popup-title" id="popupTitle"></h2>
        <div class="popup-text" id="popupInstructor"></div>
        <h3 class="popup-subtitle">Kurs Bilgileri</h3>
        <div id="popupDetails"></div>
        <h3 class="popup-subtitle">Başvuru Şartları</h3>
        <div class="popup-text" id="popupRequirements"></div>
        <h3 class="popup-subtitle">Kurs Açıklaması</h3>
        <div class="popup-text" id="popupDescription"></div>
        <button class="popup-apply-button" id="popupApplyButton">Başvur</button>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

    document.querySelectorAll('.nav-item').item(5).classList.add('active');

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
    const enrollCancelButton = document.getElementById('enrollCancelButton');

    function openPopup(courseId) {
        const course = courses.find(c => c.id === courseId);
        if (course) {
            popupDetails.innerHTML = ` TTTTT `;
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
        alert('Başvurunuz alınmıştır. Teşekkür ederiz!');
        closePopup();
    });


    function cancelEnroll(courseId) {

        let lessonid = courseId;
        let token = '@csrf';
        token = token.substr(42, 40);
        $.ajax({
            type: "post",
            url: `{{ url('/cancellenroll/') }}`,
            data: { _token: token, lessonid: lessonid},
            success: function (data) {
                if (data === "ok") {
                    window.location.href = "{{route('registered')}}"
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
    }

    function cancelEventEnroll(eventId) {

        let eventid = eventId;
        let token = '@csrf';
        token = token.substr(42, 40);
        $.ajax({
            type: "post",
            url: `{{ url('/cancelleventenroll/') }}`,
            data: { _token: token, eventid: eventid},
            success: function (data) {
                if (data === "ok") {
                    window.location.href = "{{route('registered')}}"
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
    }


</script>
</body>
</html>
