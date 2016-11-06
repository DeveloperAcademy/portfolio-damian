$(document).ready(function () {
    new goTop($('#go-top')).init();
});


var goTop = (function () {
    function goTop(object) {
        this.object = object;
    }

    goTop.prototype.init = function () {
        return this.object.on('click', function (event) {
            event.preventDefault();
            return $('html, body').animate({
                scrollTop: target.offset().top
            }, 500);
        });
    };
    return goTop;
})();
