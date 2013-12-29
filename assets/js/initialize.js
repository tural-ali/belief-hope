var time = 1000;

$(window).load((function () {
    $('#fade .clouds').fadeIn(time * 2);
    setTimeout(function () {
        $('#fade img').fadeIn(time * 2);
    }, time);

    setTimeout(function () {
        $('#fade').fadeOut(time * 2);
    }, time * 4);

    setTimeout(function () {
        $('#wrap').fadeIn(time * 2);
        $('#footer').fadeIn(time * 2);
    }, time * 6);

}));


$(document).ready(function () {
    $(".menu-elem").click(function () {
        window.location.href = $(this).data("url");
        return false;
    })
});

