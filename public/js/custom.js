$(document).ready(function() {
    // Sayfa yüklenirken spinner'ı göster
    // $('#loading-spinner').show();

    // Sayfa tamamen yüklendiğinde spinner'ı gizle
    $(window).on('load', function() {
        $('#loading-spinner').hide();
    });

    // AJAX başladığında spinner'ı göster
    $(document).ajaxStart(function() {
        $('#loading-spinner').show();
    });

    // AJAX bittiğinde spinner'ı gizle
    $(document).ajaxStop(function() {
        $('#loading-spinner').hide();
    });

    // Tüm form submit işlemlerini yakala
    $('formm').submit(function() {
        $('#loading-spinner').show();
    });

    // Tüm linkleri yakala
    $('buttonn').click(function(e) {
        // Eğer link aynı sayfada değilse (yani yeni bir sayfa yüklenecekse)
        if (this.hostname !== window.location.hostname || this.pathname !== window.location.pathname) {
            if (this.id !== 'downloadBtn')
                $('#loading-spinner').show();
        }
    });
});


