$(document).ready(function () {
    $(".menu-elem").click(function () {
        window.location.href = $(this).data("url");
        return false;
    });

    $(".slide").click(function () {
        window.location.href = $(this).data("href");
        return false;
    })
});

