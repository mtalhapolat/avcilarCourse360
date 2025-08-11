<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Başvuru Beyoğlu</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
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
            .formheader {
                font-size: 1.5em!important;
            }
        }


    </style>
    <style>

        .form-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 500px; /* Form genişliğini artırdık */
        }
        .formheader {
            text-align: center;
            color: #333;
            font-size: 28px; /* Başlık boyutunu büyüttük */
        }
        .step {
            display: none;
            animation: fadeIn 0.5s;
        }
        .step.active {
            display: block;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        label {
            display: block;
            margin-top: 15px;
            color: #666;
        }
        input {
            width: 100%;
            padding: 12px; /* Input alanlarını büyüttük */
            margin-top: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px; /* Input yazı boyutunu büyüttük */
            text-transform: uppercase;
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
        .progress-bar {
            width: 100%;
            height: 12px; /* İlerleme çubuğunu büyüttük */
            background-color: #ddd;
            border-radius: 6px;
            margin-top: 30px;
            overflow: hidden;
        }
        .progress {
            width: 0;
            height: 100%;
            background-color: #4CAF50;
            transition: width 0.5s;
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

    <style>
        #loading-spinner {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 9999;
        }
        .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
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
                <h1 class="pageheader">Başvuru</h1>
                <div class="user-info" style="margin-bottom: 0px">
                    <div>
                        <div style="font-weight: 600;">{{$student->name}} {{$student->surname}}</div>
                        <div style="color: var(--text-light); font-size: 0.875rem;"><a>{{$student->identity}}</a></div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="form-container">
        <div style="text-align: center">
            <img src="/volleyball.png" alt="" style="width: 85px">
        </div>
        <h1 class="formheader">Voleybol Turnuvası</h1> <br>

    @if($enroll_details != null)
            <h3>BAŞVURUM</h3> <br>
    @foreach($enroll_details as $key => $enroll_detail)

        @php $person = json_decode($enroll_detail->form_field_value, true) @endphp
        @if(is_array($person))
            <h4>{{$key}}. Oyuncu</h4>
        {{$person[0] . ' ' . $person[1] . ' (' . $person[2] . ')'}}
        @else
            <h4>Takım Adı</h4> {{$enroll_detail->form_field_value}}
        @endif
        <br> <br>

    @endforeach

        <h4>Başvuru Durumu: @if($enroll->statu == 0) <span style="color: #aca407">Onay Bekliyor</span> @elseif($enroll->statu == 1) <span style="color: #4CAF50">Onaylandı</span> @elseif($enroll->statu == 2) <span style="color: #8B0000">İptal Edildi</span> @endif</h4>

        @elseif(\Carbon\Carbon::parse($student->birthday)->age < 18)

        <p>Turnuvaya 18 yaş ve üzerindeki kişiler katılabilmektedir.</p>

        @elseif($student->town != 'beyoğlu')

        <p>Başvuruyu yalnızca Beyoğlu'nda ikamet eden kişiler yapabilmektedir. </p> <br>
        <p>Takımda en az 1 kişinin Beyoğlu'nda ikamet etmesi yeterlidir. Başvuruyu Beyoğlu'nda ikamet eden kişi yapmalıdır.</p>

        @elseif($student->phone == null)

            Başvuru yapmak için öncelikle kişisel bilgilerinizi doldurmalısınız. <br> <br> <button class='apply-button' style='width: 160px'><a href='/profile' style='text-decoration: none; color: white'>Profil Güncelle</a></button>

        @else
                <form id="basketballForm">
                    <input type="hidden" name="formid" value="2">
                    <div class="step active" data-step="1">
                        <label for="field_6_" style="font-weight: bold;">Takım Adı:</label>
                        <input type="text" id="field_6_" name="field_6_" required>
                    </div>
                    <div class="step" data-step="2">
                        <h3>Kaptan (1. Oyuncu)</h3>
                        <label for="field_7_name">Adı:</label>
                        <input type="text" id="field_7_name" name="field_7_name" value="{{$student->name}}" required readonly="readonly">
                        <label for="field_7_surname">Soyadı:</label>
                        <input type="text" id="field_7_surname" name="field_7_surname" value="{{$student->surname}}" required readonly="readonly">
                        <label for="field_7_identity">Kimlik Numarası:</label>
                        <input type="text" id="field_7_identity" name="field_7_identity" required pattern="\d{11}" value="{{$student->identity}}" title="11 haneli TC Kimlik Numarası" required readonly="readonly">
                        <label for="field_7_birthday">Doğum Tarihi:</label>
                        <input type="date" id="field_7_birthday" name="field_7_birthday" value="{{$student->birthday}}" required readonly="readonly">
                    </div>
                    <div class="step" data-step="3">
                        <h3>2. Oyuncu</h3>
                        <label for="field_8_name">Adı:</label>
                        <input type="text" id="field_8_name" name="field_8_name" required>
                        <label for="field_8_surname">Soyadı:</label>
                        <input type="text" id="field_8_surname" name="field_8_surname" required>
                        <label for="field_8_identity">Kimlik Numarası:</label>
                        <input type="text" id="field_8_identity" name="field_8_identity"  pattern="\d{11}" title="11 haneli TC Kimlik Numarası" required>
                        <label for="field_8_birthday">Doğum Tarihi:</label>
                        <input type="date" id="field_8_birthday" name="field_8_birthday" required>
                    </div>
                    <div class="step" data-step="4">
                        <h3>3. Oyuncu</h3>
                        <label for="field_9_name">Adı:</label>
                        <input type="text" id="field_9_name" name="field_9_name" required>
                        <label for="field_9_surname">Soyadı:</label>
                        <input type="text" id="field_9_surname" name="field_9_surname" required>
                        <label for="field_9_identity">Kimlik Numarası:</label>
                        <input type="text" id="field_9_identity" name="field_9_identity"  pattern="\d{11}" title="11 haneli TC Kimlik Numarası" required>
                        <label for="field_9_birthday">Doğum Tarihi:</label>
                        <input type="date" id="field_9_birthday" name="field_9_birthday" required>
                    </div>
                    <div class="step" data-step="5">
                        <h3>4. Oyuncu</h3>
                        <label for="field_10_name">Adı:</label>
                        <input type="text" id="field_10_name" name="field_10_name" required>
                        <label for="field_10_surname">Soyadı:</label>
                        <input type="text" id="field_10_surname" name="field_10_surname" required>
                        <label for="field_10_identity">Kimlik Numarası:</label>
                        <input type="text" id="field_10_identity" name="field_10_identity"  pattern="\d{11}" title="11 haneli TC Kimlik Numarası" required>
                        <label for="field_10_birthday">Doğum Tarihi:</label>
                        <input type="date" id="field_10_birthday" name="field_10_birthday" required>
                    </div>
                    <div class="step" data-step="6">
                        <h3>5. Oyuncu</h3>
                        <label for="field_11_name">Adı:</label>
                        <input type="text" id="field_11_name" name="field_11_name" required>
                        <label for="field_11_surname">Soyadı:</label>
                        <input type="text" id="field_11_surname" name="field_11_surname" required>
                        <label for="field_11_identity">Kimlik Numarası:</label>
                        <input type="text" id="field_11_identity" name="field_11_identity"  pattern="\d{11}" title="11 haneli TC Kimlik Numarası" required>
                        <label for="field_11_birthday">Doğum Tarihi:</label>
                        <input type="date" id="field_11_birthday" name="field_11_birthday" required>
                    </div>
                    <div class="step" data-step="7">
                        <h3>6. Oyuncu</h3>
                        <label for="field_12_name">Adı:</label>
                        <input type="text" id="field_12_name" name="field_12_name" required>
                        <label for="field_12_surname">Soyadı:</label>
                        <input type="text" id="field_12_surname" name="field_12_surname" required>
                        <label for="field_12_identity">Kimlik Numarası:</label>
                        <input type="text" id="field_12_identity" name="field_12_identity"  pattern="\d{11}" title="11 haneli TC Kimlik Numarası" required>
                        <label for="field_12_birthday">Doğum Tarihi:</label>
                        <input type="date" id="field_12_birthday" name="field_12_birthday" required>
                    </div>
                    <div class="step" data-step="8">
                        <h3>7. Oyuncu (Yedek)</h3>
                        <label for="field_13_name">Adı:</label>
                        <input type="text" id="field_13_name" name="field_13_name" >
                        <label for="field_13_surname">Soyadı:</label>
                        <input type="text" id="field_13_surname" name="field_13_surname" >
                        <label for="field_13_identity">Kimlik Numarası:</label>
                        <input type="text" id="field_13_identity" name="field_13_identity"  pattern="\d{11}" title="11 haneli TC Kimlik Numarası">
                        <label for="field_13_birthday">Doğum Tarihi:</label>
                        <input type="date" id="field_13_birthday" name="field_13_birthday" >
                    </div>
                    <div class="progress-bar">
                        <div class="progress"></div>
                    </div>
                    <div class="buttons">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)" disabled>Geri</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">İleri</button>
                    </div>
                </form>
            <br> <br>

            <svg style="margin-bottom: -5px" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e20303" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/></svg>
            <span>HASKÖY SPOR TESİSLERİ</span> <br>

            <img src="/calendar.png" width="25px" style="margin-bottom: -6px; margin-right: 5px; margin-top: 1rem" alt="">19 MAYIS PAZARTESİ 13.00
            <br> <br>
        <span style="color: red; font-weight: bold">ÖNEMLİ</span>
        <p>Takımdaki tüm oyuncuların 18 yaş ve üzerinde olması gerekmektedir. Yalnızca 18 yaş ve üzerinde olan katılımcıların başvurusu kabul edilecektir.</p>
                <div id="successMessage" style="display: none;">
                    <div class="success-banner">Başvurunuz Alındı</div>
                    <p class="thank-you-message">Turnuvaya katılımınız için teşekkür ederiz. Başarılar.</p>
                </div>
            <canvas id="confetti"></canvas>
            <br> <br>
    @endif
    </div>

</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
<script>
    let currentStep = 1;
    const totalSteps = 8;

    function nextPrev(n) {
        const steps = document.querySelectorAll('.step');
        const currentStepElement = document.querySelector(`.step[data-step="${currentStep}"]`);
        const nextStepElement = document.querySelector(`.step[data-step="${currentStep + n}"]`);

        if (n === 1 && !validateStep(currentStepElement)) return false;

        currentStepElement.classList.remove('active');
        currentStep += n;

        if (currentStep > totalSteps) {
            submitForm();
            return false;
        }

        nextStepElement.classList.add('active');
        updateButtons();
        updateProgressBar();
    }

    function validateStep(step) {
        const inputs = step.querySelectorAll('input[required]');
        let isValid = true;
        inputs.forEach(input => {
            if (!input.checkValidity()) {
                input.reportValidity();
                isValid = false;
            }
        });

        // Kimlik numarası kontrolü
        if (isValid && step.querySelector('input[name$="Id"]')) {
            isValid = validateUniqueIds();
        }

        return isValid;
    }

    function validateUniqueIds() {
        const idInputs = document.querySelectorAll('input[name$="Id"]');
        const ids = new Set();
        for (let input of idInputs) {
            if (input.value && ids.has(input.value)) {
                alert('Her oyuncunun kimlik numarası benzersiz olmalıdır!');
                input.focus();
                return false;
            }
            if (input.value) {
                ids.add(input.value);
            }
        }
        return true;
    }

    function updateButtons() {
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        prevBtn.disabled = currentStep === 1;
        nextBtn.innerHTML = currentStep === totalSteps ? 'Gönder' : 'İleri';
    }

    function updateProgressBar() {
        const progress = document.querySelector('.progress');
        const percentage = ((currentStep - 1) / (totalSteps - 1)) * 100;
        progress.style.width = `${percentage}%`;
    }

    function submitForm() {
        if (!validateUniqueIds()) {
            return;
        }
        $('#loading-spinner').show();
        const formData = new FormData(document.getElementById('basketballForm'));

        const formObject = Object.fromEntries(formData.entries());
        console.log('Form Bilgileri:', formObject);

        // AJAX isteği
        fetch('/insertformanswer', {
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
                    document.querySelector('.progress-bar').style.display = 'none';

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


    // Doğum tarihi için maksimum değer ayarlama
    const today = new Date().toISOString().split('T')[0];
    const birthdateInputs = document.querySelectorAll('input[type="date"]');
    birthdateInputs.forEach(input => {
        input.max = today;
    });
</script>

<script>

    document.querySelectorAll('.nav-item').item(11).classList.add('active');


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


</script>
</body>
</html>
