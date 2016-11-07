$(document).ready(function () {
    new initSmoothScrolling();
});


var initSmoothScrolling = (function ($) {
    function initSmoothScrolling() {
        $('a[href^="#"]').on('click', function (event) {
            var target;
            target = $($(this).attr('href'));
            if (target.length) {
                event.preventDefault();
                return $('html, body').animate({
                    scrollTop: target.offset().top
                }, 500);
            }
        });
    }

    return initSmoothScrolling;
})(jquery);