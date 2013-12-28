var form = false;

$(document).on("change", ".events", function () {
    refreshUniform();
});


$(document).ready(function () {
    refreshUniform();
    $("#service-form").submit(
        function (e) {
            e.preventDefault();
            refreshUniform();
            form = this;
            beforeAjax();
        }
    )


});

var afterAjax = function afterAjax() {
    refreshUniform();
    $("input:checkbox").uniform();
};

var beforeAjax = function beforeAjax() {
    var checkedEvents = new Array(), uncheckedEvents = new Array();
    $('input[type=checkbox]').each(function () {
        var id = parseInt($(this).val());
        if (this.checked)
            checkedEvents.push({
                "id": id
            });
        else
            uncheckedEvents.push(id);

    });

    var data = {
        "checkedEvents": checkedEvents,
        "uncheckedEvents": uncheckedEvents,
        "serviceID": serviceID
    };
    $.post("/backend/sea/update/", data, function (data) {
        console.log("done");
        if (form)
            form.submit();
        else
            return true;
    });
};

$(document).on("change", "#sec_all", function (e) {
    e.preventDefault();
    var res;
    if (this.checked)
        res = true;
    else
        res = false;
    $('.events').each(function () {
        $(this).prop('checked', res);
    });
    refreshUniform();
});

function refreshUniform() {
    $('input[type=checkbox]').each(function () {
        $(this).uniform.update();
    });
}
