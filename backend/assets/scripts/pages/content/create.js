var form;

$(document).ready(function () {
    $("#content-form").submit(
        function (e) {
            e.preventDefault();
            form = this;
            beforeAjax();
        }
    )


});


var afterAjax = function afterAjax() {
    $("input:checkbox").uniform();
};

var beforeAjax = function beforeAjax() {
    var checkedVideos = new Array(), uncheckedVideos = new Array();
    $('input[type=checkbox].videos').each(function () {
        var id = parseInt($(this).val());
        if (this.checked)
            checkedVideos.push(id);

        else
            uncheckedVideos.push(id);

    });
    var data = {
        "checkedVideos": checkedVideos,
        "uncheckedVideos": uncheckedVideos,
        "contentID": contentID
    };
    $.post("/backend/content/addvideo/", data, function (data) {
        console.log("done");
        if (form)
            form.submit();
        else
            return true;
    });
};

$(document).on("change", "#vcb_all", function (e) {
    e.preventDefault();
    var res;
    if (this.checked)
        res = true;
    else
        res = false;
    $('.videos').each(function () {
        $(this).prop('checked', res);
    });
    $("input:checkbox").uniform();
});
