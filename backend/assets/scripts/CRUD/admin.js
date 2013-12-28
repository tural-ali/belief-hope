/**
 * Created by Tural on 9/28/13.
 */
$(document).ready(function () {
    App.init();
    $("#new").click(function () {
        OpenInNewTab($(this).data("href"));
    })
});
