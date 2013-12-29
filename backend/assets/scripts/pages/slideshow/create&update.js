(function ($) {
    $.fn.extend({
        limiter: function (limit, elem) {
            $(this).on("keyup focus", function () {
                setCount(this, elem);
            });
            function setCount(src, elem) {
                var chars = src.value.length;
                if (chars > limit) {
                    src.value = src.value.substr(0, limit);
                    chars = limit;
                }
                elem.html(limit - chars);
            }

            setCount($(this)[0], elem);
        }
    });
})(jQuery);
jQuery(document).ready(function () {
    var counter1 = $("#chars_az");
    $("#Slideshow_text_az").limiter(150, counter1);

    var counter2 = $("#chars_en");
    $("#Slideshow_text_en").limiter(150, counter2);

    var counter3 = $("#chars_ru");
    $("#Slideshow_text_ru").limiter(150, counter3);
    App.init();

});

/**
 * Created by Tural on 12/29/13.
 */
