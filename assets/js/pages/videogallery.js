$(document).ready(function () {
    $('.video').mouseenter(function (e) {
        $(this).children('a').children('span').fadeOut(200);

    }).mouseleave(function (e) {
            $(this).children('a').children('span').fadeIn(200);
        });
});