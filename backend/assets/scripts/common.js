function OpenInNewTab(url) {
    var win = window.open(url, '_blank');
    win.focus();
}

$(document).ready(function () {
    var closedUl = $('.page-sidebar-menu li ul li.active').closest('ul');
    if (!closedUl.is(":visible"))
        closedUl.show();
});
