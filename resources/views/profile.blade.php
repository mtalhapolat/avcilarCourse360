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
        .invalid {
            border-color: red;
        }

        /* Add new style for conditional fields */
        .conditional-field {
            display: none;
            margin-left: 20px;
            border-left: 2px solid var(--primary-color);
            padding-left: 15px;
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
                <h1 class="pageheader">Kişisel Bilgiler</h1>
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
        <h2 class="section-title">Hesap Bilgileri</h2>
        <div class="profile-info" id="profileInfo">
            <div class="info-group">
                <label>Ad Soyad:</label>
                <span>{{$student->name}} {{$student->surname}}</span>
            </div>
            <div class="info-group">
                <label>T.C. Kimlik No:</label>
                <span style="text-decoration: none!important;">{{$student->identity}}</span>
            </div>
            <div class="info-group">
                <label>E-posta:</label>
                <span>{{$student->email}}</span>
            </div>
            <div class="info-group">
                <label>Telefon:</label>
                <span style="text-decoration: none">{{$student->phone}}</span>
            </div>
            <div class="info-group">
                <label>Adres:</label>
                <span>{{$student->address}}</span>
            </div>
            <div class="info-group">
                <label>Eğitim Durumu:</label>
                <span>@if($student->education != null || $student->education != "") {{\App\Models\student::getEducation($student->education)}} @endif</span>
            </div>
            <div class="info-group">
                <label>Mezuniyet:</label>
                <span>@if($student->graduate == '1') Öğrenci @elseif($student->graduate == '2') Mezun @endif</span>
            </div>
            <div class="info-group">
                <label>Çalışma:</label>
                <span>{{$student->working}}</span>
            </div>
            <div class="info-group">
                <label>Engellilik Durumu:</label>
                <span>{{$student->disability ?? 'Hayır'}}</span>
            </div>
            <div class="info-group conditional-field disability-type-field" style="{{$student->disability == 'Evet' ? 'display: grid;' : ''}}">
                <label>Engel Türü:</label>
                <span>{{$student->disability_type ?? ''}}</span>
            </div>
            <div class="info-group conditional-field disability-diagnosis-field" style="{{$student->disability == 'Evet' ? 'display: grid;' : ''}}">
                <label>Hastalık Tanısı:</label>
                <span>{{$student->disability_diagnosis ?? ''}}</span>
            </div>
            <div class="info-group">
                <label>Acil Durumda Aranacak Numara:</label>
                <span>{{$student->emergency}}</span>
            </div>
            @if(\Carbon\Carbon::parse(now())->format('Y') - \Carbon\Carbon::parse($student->birthday)->format('Y') < 18)
                <div class="info-group">
                    <label>Veli Ad Soyad:</label>
                    <span>{{$student->parent_name}}</span>
                </div>
                <div class="info-group">
                    <label>Veli Kimlik No:</label>
                    <span>{{$student->parent_identity}}</span>
                </div>
                <div class="info-group">
                    <label>Veli Telefon:</label>
                    <span>{{$student->parent_phone}}</span>
                </div>
            @endif
        </div>
        <button id="editProfileButton" class="edit-profile-button">Bilgileri Düzenle</button>
        <button id="saveProfileButton" class="save-profile-button" style="display: none;">Kaydet</button>
        <button id="cancelEditButton" class="cancel-edit-button" style="display: none;">İptal</button>
    </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

    document.querySelectorAll('.nav-item').item(7).classList.add('active');


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

    // Profil düzenleme işlevselliği
    const editProfileButton = document.getElementById('editProfileButton');
    const saveProfileButton = document.getElementById('saveProfileButton');
    const cancelEditButton = document.getElementById('cancelEditButton');
    const profileInfo = document.getElementById('profileInfo');

    let originalProfileInfo = '';

    function makeEditable() {
        originalProfileInfo = profileInfo.innerHTML;
        const infoGroups = profileInfo.querySelectorAll('.info-group');

        infoGroups.forEach((group, index) => {
            const label = group.querySelector('label').textContent;
            const value = group.querySelector('span').textContent;

            if (index < 2) { // Ad Soyad ve T.C. Kimlik No
                group.innerHTML = `
                        <label>${label}</label>
                        <input type="text" class="editable-field non-editable" value="${value}" readonly>
                    `;
            } else {
                if (index === 2) {
                    group.innerHTML = `
                        <label>${label}</label>
                        <input type="email" class="editable-field" required value="${value}">
                    `;
                } else if (index === 3) {
                    group.innerHTML = `
                        <label>${label}</label>
                        <input type="tel" class="editable-field" value="${value}" required pattern="[0-9]{10,11}" maxlength="11" title="Lütfen telefon numarası giriniz">
                    `;
                } else if (index === 5) {
                    const options = ['' @foreach($educations as $education) , '{{$education->title}}' @endforeach];
                    const selectHtml = options.map((option, index) =>
                        `<option value="${index === 0 ? '' : index}" ${index == '{{$student->education}}' ? 'selected' : ''}>${option}</option>`
                    ).join('');
                    group.innerHTML = `
                        <label>${label}</label>
                        <select class="editable-field" required>${selectHtml}</select>
                    `;
                } else if (index === 6) {
                    const options = ['', 'Öğrenci', 'Mezun'];
                    const selectHtml = options.map((option, index) =>
                        `<option value="${index === 0 ? '' : index}" ${index == '{{$student->graduate}}' ? 'selected' : ''}>${option}</option>`
                    ).join('');
                    group.innerHTML = `
                        <label>${label}</label>
                        <select class="editable-field" required>${selectHtml}</select>
                    `;
                } else if (index === 7) {
                    const options = ['', 'Çalışıyor', 'Çalışmıyor'];
                    const selectHtml = options.map(option =>
                        `<option value="${option}" ${option === value ? 'selected' : ''}>${option}</option>`
                    ).join('');
                    group.innerHTML = `
                        <label>${label}</label>
                        <select class="editable-field" required>${selectHtml}</select>
                    `;
                } else if (index === 8) { // Engellilik Durumu
                    const options = ['Hayır', 'Evet'];
                    const currentValue = value.trim() || 'Hayır'; // Boş değer için varsayılan "Hayır" kullan
                    const selectHtml = options.map(option =>
                        `<option value="${option}" ${option === currentValue ? 'selected' : ''}>${option}</option>`
                    ).join('');
                    group.innerHTML = `
                        <label>${label}</label>
                        <select class="editable-field disability-select" required>${selectHtml}</select>
                    `;
                } else if (index === 9) { // Engel Türü
                    const options = ['', 'Zihinsel Engelli', 'İşitme Engeli', 'Görme Engeli', 'Ortopedik Engelli', 'Dil ve Konuşma Engelli', 'Süreğen Hastalık'];
                    const selectHtml = options.map(option =>
                        `<option value="${option}" ${option === value ? 'selected' : ''}>${option}</option>`
                    ).join('');
                    group.innerHTML = `
                        <label>${label}</label>
                        <select class="editable-field" required>${selectHtml}</select>
                    `;
                    group.classList.add('conditional-field', 'disability-type-field');

                    // Varsayılan olarak gizli, Engellilik Durumu "Evet" olursa .change() event ile görünür olacak
                    group.style.display = 'none';
                } else if (index === 10) { // Hastalık Tanısı
                    group.innerHTML = `
                        <label>${label}</label>
                        <input type="text" class="editable-field" value="${value}">
                    `;
                    group.classList.add('conditional-field', 'disability-diagnosis-field');

                    // Varsayılan olarak gizli, Engellilik Durumu "Evet" olursa .change() event ile görünür olacak
                    group.style.display = 'none';
                } else {
                    group.innerHTML = `
                        <label>${label}</label>
                        <input type="text" class="editable-field" required value="${value}">
                    `;
                }
            }
        });

        // Add event listener for disability select
        const disabilitySelect = profileInfo.querySelector('.disability-select');
        if (disabilitySelect) {
            // İlk olarak, mevcut değere göre görünürlük ayarla
            const disabilityTypeField = profileInfo.querySelector('.disability-type-field');
            const disabilityDiagnosisField = profileInfo.querySelector('.disability-diagnosis-field');

            if (disabilitySelect.value === 'Evet') {
                disabilityTypeField.style.display = 'grid';
                disabilityDiagnosisField.style.display = 'grid';
            } else {
                disabilityTypeField.style.display = 'none';
                disabilityDiagnosisField.style.display = 'none';
            }

            // Değişiklik dinleyicisi ekle
            disabilitySelect.addEventListener('change', function() {
                if (this.value === 'Evet') {
                    disabilityTypeField.style.display = 'grid';
                    disabilityDiagnosisField.style.display = 'grid';
                } else {
                    disabilityTypeField.style.display = 'none';
                    disabilityDiagnosisField.style.display = 'none';
                }
            });
        }

        editProfileButton.style.display = 'none';
        saveProfileButton.style.display = 'inline-block';
        cancelEditButton.style.display = 'inline-block';
    }

    function saveChanges() {
        const infoGroups = profileInfo.querySelectorAll('.info-group');
        const inputArray = {};
        let s = 0;
        let isValid = true;
        let firstInvalidField = null;

        infoGroups.forEach((group, index) => {
            const label = group.querySelector('label').textContent;
            const input = group.querySelector('input') || group.querySelector('select');

            // Skip validation for conditional fields if disability is set to "Hayır"
            const isConditionalField = group.classList.contains('conditional-field');

            // Güvenli kontrol - null referans hatasını önler
            let disabilityValue = 'Hayır';
            if (infoGroups[8]) {
                const disabilitySelect = infoGroups[8].querySelector('select');
                const disabilitySpan = infoGroups[8].querySelector('span');
                disabilityValue = disabilitySelect ? disabilitySelect.value :
                    (disabilitySpan ? disabilitySpan.textContent : 'Hayır');
            }

            if (isConditionalField && disabilityValue === 'Hayır') {
                // Skip validation for these fields
            } else if (input.hasAttribute('required') && !input.value.trim()) {
                isValid = false;
                input.classList.add('invalid');
                if (!firstInvalidField) firstInvalidField = input;
            } else if (index === 3) {
                validatePhoneNumber(input);
                if (input.validity.customError) {
                    isValid = false;
                    input.classList.add('invalid');
                    if (!firstInvalidField) firstInvalidField = input;
                } else {
                    input.classList.remove('invalid');
                }
            } else {
                input.classList.remove('invalid');
            }
        });

        if (!isValid) {
            firstInvalidField.focus();
            return;
        }

        infoGroups.forEach((group) => {
            const label = group.querySelector('label').textContent;
            const input = group.querySelector('input') || group.querySelector('select');

            if (input.value === null)
                inputArray[s] = 0;
            else
                inputArray[s] = input.value;
            s = s+1;

            if (label === 'Mezuniyet:') {
                if (input.value === '1')
                    deger = 'Öğrenci';
                else
                    deger = 'Mezun';
                group.innerHTML = `
                    <label>${label}</label>
                    <span>${deger}</span>
                `;
            }else if (label === 'Eğitim Durumu:') {
                if (input.value === '0')
                    deger = '';
                else if(input.value === '1')
                    deger = 'Okuryazar Değilim';
                else if(input.value === '2')
                    deger = 'Okuryazar';
                else if(input.value === '3')
                    deger = 'İlkokul';
                else if(input.value === '4')
                    deger = 'Ortaokul';
                else if(input.value === '5')
                    deger = 'Lise';
                else if(input.value === '6')
                    deger = 'Ön Lisans';
                else if(input.value === '7')
                    deger = 'Lisans';
                else if(input.value === '8')
                    deger = 'Yüksek Lisans';
                else if(input.value === '9')
                    deger = 'Doktora';

                group.innerHTML = `
                    <label>${label}</label>
                    <span>${deger}</span>
                `;
            } else if (label === 'Engellilik Durumu:') {
                group.innerHTML = `
                    <label>${label}</label>
                    <span>${input.value}</span>
                `;

                // Handle conditional fields display in view mode
                const disabilityTypeField = profileInfo.querySelector('.disability-type-field');
                const disabilityDiagnosisField = profileInfo.querySelector('.disability-diagnosis-field');

                if (input.value === 'Evet') {
                    disabilityTypeField.style.display = 'grid';
                    disabilityDiagnosisField.style.display = 'grid';
                } else {
                    disabilityTypeField.style.display = 'none';
                    disabilityDiagnosisField.style.display = 'none';
                }
            } else {
                group.innerHTML = `
                    <label>${label}</label>
                    <span>${input.value}</span>
                `;
            }
        });

        let token = '@csrf';
        token = token.substr(42, 40);
        $.ajax({
            type: "post",
            url: `{{ url('/profileupdate/') }}`,
            data: { _token: token, inputArray: inputArray},
            success: function (data) {
                if (data === "ok") {
                    console.log("Profil güncellendi.");
                } else {
                    alert("Profil güncellenirken hata.");
                }
            },
            error: function(err) {
                console.log( $($(err.responseText)[1]).text() )
                debugger;
            }
        });

        const phoneInput = profileInfo.querySelector('input[type="tel"]');
        if (phoneInput) {
            phoneInput.addEventListener('input', function() {
                this.value = this.value.replace(/\D/g, '').slice(0, 11);
                validatePhoneNumber(this);
            });
        }

        editProfileButton.style.display = 'inline-block';
        saveProfileButton.style.display = 'none';
        cancelEditButton.style.display = 'none';
    }

    function cancelEdit() {
        profileInfo.innerHTML = originalProfileInfo;
        editProfileButton.style.display = 'inline-block';
        saveProfileButton.style.display = 'none';
        cancelEditButton.style.display = 'none';
    }

    function validatePhoneNumber(input) {
        const phoneNumber = input.value.replace(/\D/g, '');
        if (phoneNumber.length === 10 || phoneNumber.length === 11) {
            input.setCustomValidity('');
        } else {
            input.setCustomValidity('Lütfen 10 veya 11 haneli telefon numarası giriniz');
        }
    }

    editProfileButton.addEventListener('click', makeEditable);
    saveProfileButton.addEventListener('click', saveChanges);
    cancelEditButton.addEventListener('click', cancelEdit);
</script>
</body>
</html>
