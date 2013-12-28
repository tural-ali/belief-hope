var form = false;

$(document).on("change", ".meals", function () {
    enableCheckedPrices();
});


$(document).ready(function () {
    enableCheckedPrices();
    $("#menu-form").submit(
        function (e) {
            e.preventDefault();

            enableCheckedPrices();
            form = this;
            beforeAjax();
        }
    )


});

var afterAjax = function afterAjax() {
    enableCheckedPrices();
    $("input:checkbox").uniform();
};

var beforeAjax = function beforeAjax() {
    var checkedMeals = new Array(), uncheckedMeals = new Array();
    $('input[type=checkbox].meals').each(function () {
        var id = parseInt($(this).val());
        if (this.checked) {
            if (type == 1)
                checkedMeals.push({
                    "id": id,
                    "price": parseFloat($("#mp_" + id).val())
                });
            if (type == 2)
                checkedMeals.push({
                    "id": id
                });
        }
        else
            uncheckedMeals.push(id);

    });

    var data = {
        "checkedMeals": checkedMeals,
        "uncheckedMeals": uncheckedMeals,
        "menuID": menuID,
        "menuType": type
    };
    $.post("/backend/menu/addmeal/", data, function (data) {
        console.log("done");
        if (form)
            form.submit();
        else
            return true;
    });
};

$(document).on("change", "#mcb_all", function (e) {
    e.preventDefault();
    var res;
    if (this.checked)
        res = true;
    else
        res = false;
    $('.meals').each(function () {
        $(this).prop('checked', res);
    });
    enableCheckedPrices();
});

function enableCheckedPrices() {
    $('input[type=checkbox]').each(function () {
        $(this).uniform.update();
        var id = parseInt($(this).val());
        if (this.checked) {
            if (type == 1)
                $("#mp_" + id).removeAttr("disabled");
        }
        else
            $("#mp_" + id).attr("disabled", "disabled");
    });
}
