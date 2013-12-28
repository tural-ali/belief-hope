$(document).ready(function () {
    refreshUniform();

    $('input[name="Menu[type]"]').change(function () {
        var value = parseInt($(this).val());
        if (value == 2)
            $("#Menu_price").show();
        else
            $("#Menu_price").hide();
    });
});
function refreshUniform() {
    $('input[type=radio]').each(function () {
        $(this).uniform.update();
    });
}
