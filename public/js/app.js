document.addEventListener('DOMContentLoaded', function () {

    /* =====================================================
       LUCIDE ICONS
    ===================================================== */

    if (window.lucide) {
        lucide.createIcons();
    }


    /* =====================================================
       AUTO HIDE ALERT
    ===================================================== */

    const alerts = document.querySelectorAll('.alert-message');

    alerts.forEach(function (alert) {

        setTimeout(function () {

            alert.style.transition =
                'opacity 0.4s ease, transform 0.4s ease';

            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-10px)';

            setTimeout(function () {
                alert.remove();
            }, 400);

        }, 5000);

    });

});