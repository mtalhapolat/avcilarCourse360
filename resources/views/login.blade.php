<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Avcılar Belediyesi Kurs Başvuruları, Etkinlik Başvuruları, Spor Başvuruları, Geziler, Atölyeler, Workshoplar ve diğer tüm başvuruları yapabileceğiniz platformumuz hizmetinizde.">
    <title>Başvuru Avcılar</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(0deg, #004289 0%, #00438d 35%, #004999 82%, #004da2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .card {
            background-color: #ffffff5e;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 350px;
            padding: 0.8rem;
            margin-bottom: 1rem;
        }
        .card-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .card-title {
            color: #ffffffe8;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }
        .card-description {
            color: #ffffffe8;
            font-size: 0.875rem;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #ffffffe8;
        }
        input {
            width: 330px;
            padding: 0.5rem;
            border: 1px solid #d1d5db;
            border-radius: 0.25rem;
            font-size: 1rem;
            background-color: aliceblue;
        }
        input.error {
            border-color: #ef4444;
            background-color: #fef2f2;
        }
        input.valid {
            border-color: #10b981;
            background-color: #f0fdf4;
        }
        .input-description {
            font-size: 0.75rem;
            color: #ffffffe8;
            margin-top: 0.25rem;
        }
        .error-message {
            font-size: 0.75rem;
            color: #fca5a5;
            margin-top: 0.25rem;
            display: none;
        }
        .valid-message {
            font-size: 0.75rem;
            color: #86efac;
            margin-top: 0.25rem;
            display: none;
        }
        button {
            width: 100%;
            background-color: #10407d;
            color: white;
            border: none;
            padding: 0.75rem;
            border-radius: 0.25rem;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        button:hover {
            background-color: #0c3160;
        }
        button:disabled {
            background-color: #10407d;
            cursor: not-allowed;
        }
        .social-icons {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1rem;
            flex-wrap: wrap;
        }
        .social-icon {
            color: white;
            text-decoration: none;
            transition: opacity 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
        }
        .social-icon:hover {
            opacity: 0.8;
            background-color: rgba(255, 255, 255, 0.2);
        }
        .social-icon svg {
            width: 24px;
            height: 24px;
            fill: currentColor;
        }

        @media (max-width: 768px) {
            body {
                min-height: 90vh!important;
            }
            .social-icons {
                margin-top: 0.2rem!important;
            }
            .card {
                width: 320px;
            }
            input {
                width: 300px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header">
            <img src="https://www.avcilar.bel.tr/public/site-v1/images/avcilar-logo.png" alt="Avcılar Belediyesi" width="60%" height="auto" style="margin-bottom: 0rem;">
            <h1 class="card-title">Kursiyer Girişi</h1>
            <p class="card-description">TC Kimlik No ve doğum tarihiniz ile giriş yapın.</p>
        </div>
        <form id="loginFormm" action="{{route('authenticate')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tcKimlik">T.C. Kimlik No</label>
                <input type="text" id="tcKimlik" name="identity" placeholder="11111111111" maxlength="11" required>
                <p class="input-description">11 haneli TC Kimlik Numaranızı giriniz.</p>
                <p class="error-message" id="tcError">Geçersiz TC Kimlik Numarası!</p>
                <p class="valid-message" id="tcValid">TC Kimlik Numarası geçerli.</p>
            </div>
            <div class="form-group">
                <label for="dogumTarihi">Doğum Tarihi</label>
                <input type="text" id="dogumTarihi" name="birthday" placeholder="GG.AA.YYYY" maxlength="10" required>
                <p class="input-description">Doğum tarihinizi GG.AA.YYYY formatında giriniz.</p>
                <p class="error-message" id="dateError">Geçersiz Doğum Tarihi!</p>
            </div>
            @if($errors->any())
                <a style="color: yellow">{!! implode('', $errors->all('<div>:message</div>')) !!}</a>
                <br>
            @endif
            <button type="submit" id="submitbutton">
                Giriş Yap
                <span id="spinner" class="spinner"></span>
            </button>
        </form>
    </div>
    <div class="social-icons">
        <a href="https://www.facebook.com/avcilarbldbaskanligi" class="social-icon" aria-label="Facebook">
            <svg viewBox="0 0 320 512"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg>
        </a>
        <a href="https://instagram.com/avcilarbelediyesi" class="social-icon" aria-label="Instagram">
            <svg viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
        </a>
        <a href="https://x.com/avcilarbel" class="social-icon" aria-label="Twitter">
            <svg viewBox="0 0 512 512"><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/></svg>
        </a>
        <a href="https://tr.linkedin.com/company/avcilarbelediyesi" class="social-icon" aria-label="LinkedIn">
            <svg viewBox="0 0 448 512"><path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"/></svg>
        </a>
        <a href="https://www.youtube.com/channel/UC2yj8KDx7l4NR6--ugNmBUA" class="social-icon" aria-label="YouTube">
            <svg viewBox="0 0 576 512"><path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"/></svg>
        </a>
        <a href="https://wa.me/904446989?text=Merhaba" class="social-icon" aria-label="WhatsApp">
            <svg viewBox="0 0 448 512"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
        </a>
    </div>
</div>

<script>
    // TC Kimlik numarası doğrulama fonksiyonu
    function validateTC(tcNumber) {
        // Temel kontroller
        if (!tcNumber || tcNumber.length !== 11) return false;
        if (tcNumber[0] === '0') return false;
        if (!/^\d+$/.test(tcNumber)) return false;

        // Rakamları diziye çevir
        const digits = tcNumber.split('').map(Number);

        // 10. hane kontrolü (çift ve tek pozisyonlar)
        const oddSum = digits[0] + digits[2] + digits[4] + digits[6] + digits[8];
        const evenSum = digits[1] + digits[3] + digits[5] + digits[7];
        const tenthDigit = ((oddSum * 7) - evenSum) % 10;

        if (digits[9] !== tenthDigit) return false;

        // 11. hane kontrolü (ilk 10 hanenin toplamı)
        const eleventhDigit = (digits[0] + digits[1] + digits[2] + digits[3] + digits[4] +
            digits[5] + digits[6] + digits[7] + digits[8] + digits[9]) % 10;

        return digits[10] === eleventhDigit;
    }

    // Tarih formatı doğrulama fonksiyonu
    function validateDate(dateString) {
        const regex = /^\d{2}\.\d{2}\.\d{4}$/;
        if (!regex.test(dateString)) return false;

        const parts = dateString.split('.');
        const day = parseInt(parts[0], 10);
        const month = parseInt(parts[1], 10);
        const year = parseInt(parts[2], 10);

        if (month < 1 || month > 12) return false;
        if (day < 1 || day > 31) return false;
        if (year < 1900 || year > new Date().getFullYear()) return false;

        // Ay bazında gün kontrolü
        const daysInMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

        // Artık yıl kontrolü
        if (month === 2 && ((year % 4 === 0 && year % 100 !== 0) || year % 400 === 0)) {
            return day <= 29;
        }

        return day <= daysInMonth[month - 1];
    }

    // Input element referansları
    const tcInput = document.getElementById('tcKimlik');
    const dateInput = document.getElementById('dogumTarihi');
    const submitButton = document.getElementById('submitbutton');
    const tcError = document.getElementById('tcError');
    const tcValid = document.getElementById('tcValid');
    const dateError = document.getElementById('dateError');

    // Form durumunu kontrol eden fonksiyon
    function checkFormValidity() {
        const tcIsValid = validateTC(tcInput.value);
        const dateIsValid = validateDate(dateInput.value);

        submitButton.disabled = !(tcIsValid && dateIsValid);
    }

    // TC Kimlik input kontrolü
    tcInput.addEventListener('input', function(e) {
        // Sadece rakam girişine izin ver
        this.value = this.value.replace(/\D/g, '').slice(0, 11);

        const isValid = validateTC(this.value);

        if (this.value.length === 11) {
            if (isValid) {
                this.classList.remove('error');
                this.classList.add('valid');
                tcError.style.display = 'none';
                tcValid.style.display = 'block';
            } else {
                this.classList.remove('valid');
                this.classList.add('error');
                tcValid.style.display = 'none';
                tcError.style.display = 'block';
            }
        } else {
            this.classList.remove('valid', 'error');
            tcError.style.display = 'none';
            tcValid.style.display = 'none';
        }

        checkFormValidity();
    });

    // Doğum tarihi input kontrolü
    dateInput.addEventListener('input', function(e) {
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

        const isValid = validateDate(this.value);

        if (this.value.length === 10) {
            if (isValid) {
                this.classList.remove('error');
                this.classList.add('valid');
                dateError.style.display = 'none';
            } else {
                this.classList.remove('valid');
                this.classList.add('error');
                dateError.style.display = 'block';
            }
        } else {
            this.classList.remove('valid', 'error');
            dateError.style.display = 'none';
        }

        checkFormValidity();
    });

    // Form submit kontrolü
    window.onload = function () {
        document.getElementById("loginFormm").onsubmit = function onSubmit(event) {
            const tcIsValid = validateTC(tcInput.value);
            const dateIsValid = validateDate(dateInput.value);

            if (!tcIsValid || !dateIsValid) {
                event.preventDefault();
                alert('Lütfen geçerli TC Kimlik Numarası ve doğum tarihi giriniz.');
                return false;
            }

            const button = document.getElementById('submitbutton');
            const spinner = document.getElementById('spinner');

            // Butonu devre dışı bırak
            button.disabled = true;
            // Spinner'ı göster
            spinner.style.display = 'inline-block';
            // Buton metnini değiştir
            button.textContent = 'Giriş yapılıyor...';
        }

        // Sayfa yüklendiğinde form geçerliliğini kontrol et
        checkFormValidity();
    }
</script>

</body>
</html>
