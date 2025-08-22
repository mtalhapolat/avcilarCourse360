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

        @media (max-width: 1024px) {
            .certificates-table {
                font-size: 0.875rem;
            }
            .certificate-icon {
                width: 32px;
                height: 32px;
            }
            .certificate-icon svg {
                width: 16px;
                height: 16px;
            }
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
            .certificates-table, .certificates-table tbody, .certificates-table tr, .certificates-table td {
                display: block;
            }
            .certificates-table tr {
                margin-bottom: 1rem;
                border: 1px solid #e5e7eb;
                border-radius: 8px;
            }
            .certificates-table td {
                position: relative;
                padding-left: 50%;
                text-align: right;
            }
            .certificates-table td::before {
                content: attr(data-label);
                position: absolute;
                left: 1rem;
                width: 45%;
                text-align: left;
                font-weight: 600;
            }
            .certificate-icon {
                display: none;
            }
            .certificates-table-header {
                display: none!important;
            }
        }


    </style>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

@include('partials/sidebar')

<main class="main-content">
    <header class="header">
        <div style="display: flex; align-items: center; gap: 1.5rem;">
            <img src="logokare.png"
                 alt="Avcılar Belediyesi"
                 style="height: 100px; width: auto;">
            <div>
                <h1 class="pageheader">Sertifikalarım</h1>
                <div class="user-info" style="margin-bottom: 0px">
                    <div>
                        <div style="font-weight: 600;">{{$student->name}} {{$student->surname}}</div>
                        <div style="color: var(--text-light); font-size: 0.875rem;"><a>{{$student->identity}}</a></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @if($certificates->count() > 0)
    <p>Tebrikler. <b>{{$certificates->count()}}</b> kursu başarılı bir şekilde tamamladınız.</p>
    @endif

    <div class="profile-content">
        @if($certificates->count() == 0)
        <a >Henüz sertifika veya katılım belgesi kazanmadınız.</a> <br>
        <a>Kurslarınızı başarılı bir şekilde tamamlayarak belge kazanabilirsiniz.</a> <br>
        <button class="edit-profile-button" onclick="window.location.href='{{route('basvuru')}}'">Kursa Kayıt Ol</button>
        @else


            <table class="certificates-table">
                <thead>
                <tr class="certificates-table-header">
                    <th>Öğrenci Adı Soyadı</th>
                    <th>Program Adı</th>
                    <th>Program Süresi</th>
                    <th>Kurs Merkezi</th>
                    <th>Sertifika Tarihi</th>
                    <th>Türü</th>
                    <th>İndir</th>
                </tr>
                </thead>
                <tbody id="certificatesTableBody">
                <!-- Sertifikalar buraya eklenecek -->
                </tbody>
            </table>



        @endif
    </div>
</main>

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

    document.addEventListener('click', (event) => {
        const isClickInsideSidebar = sidebar.contains(event.target);
        const isClickOnToggle = sidebarToggle.contains(event.target);

        if (!isClickInsideSidebar && !isClickOnToggle && window.innerWidth <= 768 && sidebar.classList.contains('active')) {
            toggleSidebar();
        }
    });

    // Sertifika verilerini oluştur (normalde bu veriler bir API'den gelir)
    const certificates = [
        @foreach($certificates as $certificate)
        { name: "{{$certificate->student_name}} {{$certificate->student_surname}}", id: "{{$certificate->student_identity}}", program: "{{$certificate->branch}}", duration: "{{$certificate->hours}} saat", institution: "{{$certificate->center}}", date: "{{\Carbon\Carbon::parse($certificate->date_end)->format('d.m.Y')}}", lessontype: "@if($certificate->lesson_type == 1) Sertifika @else Katılım @endif", enroll_id: "{{$certificate->enroll_id}}", success_statu: "{{$certificate->success_statu}}" },
        @endforeach
    ];

    // Sertifikaları tabloya ekle
    const certificatesTableBody = document.getElementById('certificatesTableBody');

    certificates.forEach(cert => {
        const row = document.createElement('tr');
        row.className = 'certificate-row';
        if (cert.success_statu == '2') {
            row.innerHTML = `
                <td data-label="Öğrenci Adı Soyadı">${cert.name}</td>
                <td data-label="Program Adı">${cert.program}</td>
                <td data-label="Program Süresi">${cert.duration}</td>
                <td data-label="Kurs Merkezi">${cert.institution}</td>
                <td data-label="Sertifika Tarihi">${cert.date}</td>
                <td data-label="Türü">${cert.lessontype}</td>
                <td data-label="İndir"><span style="cursor: pointer" onclick="downloadCrt1(${cert.enroll_id})"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-down"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M12 18v-6"/><path d="m9 15 3 3 3-3"/></svg></span></td>
            `;
        } else {
            row.innerHTML = `
                <td data-label="Öğrenci Adı Soyadı">${cert.name}</td>
                <td data-label="Program Adı">${cert.program}</td>
                <td data-label="Program Süresi">${cert.duration}</td>
                <td data-label="Kurs Merkezi">${cert.institution}</td>
                <td data-label="Sertifika Tarihi">${cert.date}</td>
                <td data-label="Türü">${cert.lessontype}</td>
                <td data-label="İndir"><a href="https://www.turkiye.gov.tr/meb-sertifika-bilgileri-sorgulama" target="_blank" style="text-decoration: none;">e-Devlet</a></td>
            `;
        }

        certificatesTableBody.appendChild(row);
    });


    const { jsPDF } = window.jspdf;

    async function downloadCrt(id) {

        try {
            const backgroundImage = '/sertifika1.jpg';

            const doc = new jsPDF({
                orientation: 'landscape',
                unit: 'mm',
                format: 'a4'
            });

            // Tarih ve imza
            const currentDate = new Date().toLocaleDateString('tr-TR');

            // Add background image
            doc.addImage(backgroundImage, 'JPEG', 0, 0, 297, 210);

            // Türkçe karakterleri destekleyen font ekleme
            doc.addFont('https://raw.githubusercontent.com/googlefonts/noto-fonts/main/hinted/ttf/NotoSans/NotoSans-Regular.ttf', 'NotoSans', 'normal');
            doc.setFont('NotoSans');

            // Sertifika başlığı
            doc.setFontSize(28);
            doc.setTextColor(0, 0, 0); // Set text color to black
            doc.text('HASAN YILMAZ', 148.5, 115, { align: 'center' });


            // Sertifika detayları
            doc.setFontSize(14);
            doc.text('16.05.2022', 158, 135);
            doc.text('16.05.2022', 191, 135);
            doc.text('150', 94, 143);


            // PDF'i indir
                doc.save('Sertifika.pdf');

                // $('#loading-spinner').hide();


        } catch (error) {
            console.error('Error generating certificate:', error);
            alert('Sertifika oluşturulurken bir hata oluştu. Lütfen tekrar deneyin.');
        }


    };



    async function downloadCrt1(id) {

        let token = '@csrf';
        token = token.substr(42, 40);
        $.ajax({
            type: "get",
            url: `/getCertificate`,
            data: { _token: token, enrollId: id},
            success: function (data) {

                try {
                    const backgroundImage = '/besmek.jpg';

                    const doc = new jsPDF({
                        orientation: 'landscape',
                        unit: 'mm',
                        format: 'a4'
                    });

                    // Tarih ve imza
                    const currentDate = new Date().toLocaleDateString('tr-TR');

                    // Add background image
                    doc.addImage(backgroundImage, 'JPEG', 0, 0, 297, 210);

                    // Türkçe karakterleri destekleyen font ekleme
                    doc.addFont('Barlow-italic.ttf', 'Barlow', 'normal');
                    doc.setFont('Barlow');

                    // Sertifika başlığı
                    doc.setFontSize(26);
                    doc.setTextColor(66, 65, 67); // Set text color to black
                    doc.text('Sayın ' + data[0] + ',', 148.5, 115, { align: 'center', fontStyle: 'italic' });


                    // Sertifika detayları
                    doc.setFontSize(15);
                    doc.setTextColor(66, 65, 67); // Set text color to black
                    doc.text("T.C. Beyoğlu Belediyesi Enstitü Beyoğlu BESMEK 'te " + data[1] + " - " + data[2], 148.5, 125, { align: 'center' });
                    doc.text("tarihleri arasında düzenlenen " + data[3] + " saatlik " + data[4] + " programını", 148.5, 133, { align: 'center'});
                    doc.text("başarıyla tamamlayarak bu belgeyi almaya hak kazanmıştır.", 148.5, 141, { align: 'center' });


                    // PDF'i indir
                    doc.save('Sertifika.pdf');

                    // $('#loading-spinner').hide();


                } catch (error) {
                    console.error('Error generating certificate:', error);
                    alert('Sertifika oluşturulurken bir hata oluştu. Lütfen tekrar deneyin.');
                }

            },
            error: function(err) {
                console.log( err )
                debugger;
            }
        });





    };


</script>
</body>
</html>
