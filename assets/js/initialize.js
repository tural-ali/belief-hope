$(document).ready(function () {
    $(".menu-elem").click(function () {
        window.location.href = $(this).data("url");
        return false;
    });

    $(".item").click(function () {
        window.location.href = $(this).data("href");
        return false;
    });


    addthis.layers({
        'theme': 'transparent',
        'share': {
            'position': 'left',
            'numPreferredServices': 5
        }
    });

    $('.carousel').carousel();
});

