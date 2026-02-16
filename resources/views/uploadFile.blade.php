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

        /* Profil sayfası için ek stiller */
        .profile-content {
            background-color: var(--white);
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 2rem;
            margin-top: 2rem;
        }
        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: var(--text-color);
        }
        .profile-info {
            display: grid;
            gap: 1rem;
        }
        .info-group {
            display: grid;
            grid-template-columns: 150px 1fr;
            align-items: center;
        }
        .info-group label {
            font-weight: 500;
            color: var(--text-light);
        }
        .edit-profile-button, .save-profile-button, .cancel-edit-button {
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
            transition: background-color 0.3s ease;
            margin-top: 2rem;
        }
        .edit-profile-button:hover, .save-profile-button:hover {
            background-color: var(--primary-dark);
        }
        .cancel-edit-button {
            background-color: var(--text-light);
            margin-left: 1rem;
        }
        .cancel-edit-button:hover {
            background-color: var(--text-color);
        }
        .editable-field {
            padding: 0.5rem;
            border: 1px solid var(--text-light);
            border-radius: 4px;
            font-size: 1rem;
            min-width: 150px;
        }
        .non-editable {
            background-color: var(--background-color);
            color: var(--text-light);
        }
        .invalid {
            border-color: red;
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
            .pageheader {
                font-size: 1.5em!important;
            }
        }

    </style>

    <style>
        .form-group {
            margin-bottom: 1rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        .form-group select,
        .form-group input[type="file"] {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            font-size: 1rem;
        }
        .form-group select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }
        .form-group input[type="file"] {
            border: none;
            padding: 0;
        }
        .form-group input[type="file"]::file-selector-button {
            padding: 0.5rem 1rem;
            border: none;
            background-color: #e5e7eb;
            color: #374151;
            font-weight: 500;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .form-group input[type="file"]::file-selector-button:hover {
            background-color: #d1d5db;
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
                <h1 class="pageheader">Evrak Yükle</h1>
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
        <h2 class="section-title">Evrak Yükle</h2>

        <form action="{{route('insertfile')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file">Yüklenecek evrağı seçin:</label>
                <input type="file" id="file" name="file">
            </div>
            <div class="form-group">
                <label for="type">Evrak Türü:</label>
                <select id="type" name="type">
                    <option value="1" @if($request->filetype == 1) selected @endif>Öğrenci Belgesi</option>
                    <option value="2" @if($request->filetype == 2) selected @endif>Mezuniyet Belgesi</option>
                    <option value="3" @if($request->filetype == 3) selected @endif>Sağlık Belgesi</option>
                    <option value="4" @if($request->filetype == 4) selected @endif>Engelli Raporu</option>
                    <option value="5" @if($request->filetype == 5) selected @endif>Çözger Raporu</option>
                </select>
            </div>
            <button type="submit" class="popup-apply-button" >Evrağı Yükle</button>
        </form>
        <br>
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif

    </div>


    <div class="profile-content">
        <h2 class="section-title">Yüklediğim Evraklar</h2>

        <div id="courses" class="courses">
            @if(sizeof($myfiles) == 0)
                <a>Henüz herhangi bir evrak yüklemediniz.</a>
            @else
                @foreach($myfiles as $file)
                    <div class="course-card">
                        <div class="uploadedfile" style="height: 200px; cursor:pointer;" onclick="fileDownload('/uploads/{{$file->url}}');">
                            @if($file->file_type == 'pdf')
                                <img style="object-fit: cover; width: 100%; height: 100%" src="pdf.png" alt="">
                            @else
                                <img style="object-fit: cover; width: 100%; height: 100%" src="/uploads/{{$file->url}}" alt="">
                            @endif
                        </div>
                        <div class="course-title" style="margin-top: 4%">
                            {{\App\Models\student::getFileType($file->type)}}
                        </div>
                        <div class="course-instructor">Geçerlilik Tarihi: {{$file->validity_date}}</div>
                        <div class="course-schedule" style="position: relative">
                            <div class="schedule-title">Yükleme Tarihi: {{substr($file->created_at, 0, 10)}}</div>
                            <div class="schedule-title">Durumu:
                                @if($file->statu == 0)
                                    <span style="color: orangered">İnceleniyor</span>
                                @elseif($file->statu == 1)
                                    <span style="color: #019b05">Onaylandı</span>
                                @elseif($file->statu == 2)
                                    <span style="color: #000000">İptal Edildi</span>
                                @endif
                            </div>
                            @if($file->statu == 0)
                            <div onclick="deleteFile({{$file->id}})" style="position: absolute; right: 0; cursor:pointer;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                            </div>
                            @endif
                        </div>

                        </div>
                @endforeach
            @endif
        </div>

    </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

    function fileDownload(url) {
        open(url);
    }

    function deleteFile(file) {
        let token = '@csrf';
        token = token.substr(42, 40);
        $.ajax({
            type: "post",
            url: `{{ url('/deleteFile') }}`,
            data: { _token: token, fileid: file},
            success: function (data) {
                if (data === "ok") {
                    window.location.href = "{{route('uploadfile')}}"
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


</script>
</body>
</html>
