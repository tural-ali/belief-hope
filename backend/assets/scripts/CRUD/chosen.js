jQuery(document).ready(function () {
    $("select").each(function () {
        var selectBox = $("#" + $(this).attr("id")),
            optionsCount = $("#" + $(this).attr("id") + " option").length;

        if (optionsCount > 11)
            selectBox.chosen({
                no_results_text: "Heç bir nəticə tapılmadı."
            });
    });
});
