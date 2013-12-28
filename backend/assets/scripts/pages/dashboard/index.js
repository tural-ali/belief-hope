jQuery(document).ready(function () {
    App.init(); // initlayout and core plugins
    Index.init();
    Index.initCalendar(); // init index page's custom scripts
    Index.initCharts(); // init index page's custom scripts
    Index.initChat();
    Index.initDashboardDaterange();
    //Index.initIntro();
    Tasks.initDashboardWidget();
});
