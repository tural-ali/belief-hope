$(document).ready(function () {
    $(".menu-elem").click(function () {
        window.location.href = $(this).data("url");
        return false;
    });

    $(".slide").click(function () {
        window.location.href = $(this).data("href");
        return false;
    });


    addthis.layers({
        'theme': 'transparent',
        'share': {
            'position': 'left',
            'numPreferredServices': 5
        },
        'follow': {
            'services': [
                {'service': 'twitter', 'id': 'belief_and_hope'},
                {'service': 'youtube', 'id': 'beliefandhopedotcom'}
            ]
        }
    });

    $('.carousel').carousel();
});

