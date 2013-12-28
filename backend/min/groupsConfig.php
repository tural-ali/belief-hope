<?php
/*PATH VARIABLES */

$path["root"] = "//assets/";
$path["plug-ins"] = $path["root"] . "plugins/";

$pathJS["root"] = $path["root"] . "scripts/";
$pathJS["pages"] = $pathJS["root"] . "pages/";
$pathJS["mandatory"] = $pathJS["root"] . "mandatory/";
$pathJS["blocks"] = $pathJS["root"] . "blocks/";
$pathJS["CRUD"] = $pathJS["root"] . "CRUD/";

$pathCSS["root"] = $path["root"] . "css/";
$pathCSS["pages"] = $pathCSS["root"] . "pages/";
$pathCSS["mandatory"] = $pathCSS["root"] . "mandatory/";
$pathCSS["blocks"] = $pathCSS["root"] . "blocks/";


$css = array(
    'mandatory' => array(
        $path["plug-ins"] . 'bootstrap/css/bootstrap.min.css',
        $path["plug-ins"] . "chosen/chosen.min.css",
        $path["plug-ins"] . 'bootstrap/css/bootstrap-responsive.min.css',
        $path["plug-ins"] . 'font-awesome/css/font-awesome.min.css',
        $pathCSS["root"] . "style-metro.css",
        $pathCSS["root"] . "style.css",
        $pathCSS["root"] . "style-responsive.css",
        $path["plug-ins"] . "uniform/css/uniform.default.css",

    ),
    'user_login' => array(
        $pathCSS["root"] . "pages/login-soft.css",
        $path["plug-ins"] . "select2/select2_metro.css"
    ),

    'dashboard_index' => array(
        $path["plug-ins"] . "gritter/css/jquery.gritter.css",
        $path["plug-ins"] . "bootstrap-daterangepicker/daterangepicker.css",
        $path["plug-ins"] . "fullcalendar/fullcalendar/fullcalendar.css",
        $path["plug-ins"] . "jqvmap/jqvmap/jqvmap.css",
        $path["plug-ins"] . "jquery-easy-pie-chart/jquery.easy-pie-chart.css",
        $pathCSS["root"] . "pages/tasks.css"
    ),
    'page_admin' => array(
        $path["plug-ins"] . "data-tables/DT_bootstrap.css"
    ),

    'slideshow_admin' => array(
        $path["plug-ins"] . "data-tables/DT_bootstrap.css"
    ),

    'page_create' => array(),
    'page_update' => array(),

    'fixes' => array(
        $pathCSS["root"] . "fixes.css"
    ),

    "crud_update" => array(
        $path["plug-ins"] . "bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css"
    ),

    "crud_create" => array(
        $path["plug-ins"] . "bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css"
    ),

    "menu_create" => array(
        $pathCSS["pages"] . "menu/create.css"
    ),
);

$js = array(

    "photo_create" => array(),
    'menu_update' => array(
        $pathJS["pages"] . "menu/update.js"
    ),
    'menu_create' => array(
        $pathJS["pages"] . "menu/create.js"
    ),
    'place_update' => array(
        $pathJS["pages"] . "place/update.js"
    ),
    'service_update' => array(
        $pathJS["pages"] . "service/update.js"
    ),
    'crud_admin' => array(
        $pathJS["root"] . "app.js",
        $pathJS["CRUD"] . "admin.js"
    ),

    'crud_create' => array(
        $path["plug-ins"] . "chosen/chosen.jquery.min.js",
        $path["root"] . "ckeditor/adapters/jquery.js",
        $pathJS["CRUD"] . "chosen.js",
        $pathJS["root"] . "app.js",
        $pathJS["CRUD"] . "create&update.js"
    ),


    'crud_update' => array(
        $path["plug-ins"] . "chosen/chosen.jquery.min.js",
        $path["root"] . "ckeditor/adapters/jquery.js",
        $pathJS["root"] . "app.js",
        $pathJS["CRUD"] . "create&update.js",
        $pathJS["CRUD"] . "chosen.js"
    ),

    'dashboard_index' => array(
        $path["plug-ins"] . "flot/jquery.flot.js",
        $path["plug-ins"] . "flot/jquery.flot.resize.js",
        $path["plug-ins"] . "jquery.pulsate.min.js",
        $path["plug-ins"] . "bootstrap-daterangepicker/date.js",
        $path["plug-ins"] . "bootstrap-daterangepicker/daterangepicker.js",
        $path["plug-ins"] . "gritter/js/jquery.gritter.js",
        $path["plug-ins"] . "fullcalendar/fullcalendar/fullcalendar.min.js",
        $path["plug-ins"] . "jquery-easy-pie-chart/jquery.easy-pie-chart.js",
        $path["plug-ins"] . "jquery.sparkline.min.js",
        $pathJS["root"] . "app.js",
        $pathJS["root"] . "index.js",
        $pathJS["root"] . "tasks.js",
        $pathJS["pages"] . "dashboard/index.js"
    ),

    "core_plugins" => array(
        $path["plug-ins"] . "jquery-1.10.1.min.js",
        $path["plug-ins"] . "jquery-migrate-1.2.1.min.js",
        $path["plug-ins"] . "jquery-ui/jquery-ui-1.10.1.custom.min.js",
        $path["plug-ins"] . "bootstrap/js/bootstrap.min.js",
        $path["plug-ins"] . "bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js",
        $path["plug-ins"] . "jquery-slimscroll/jquery.slimscroll.min.js",
        $path["plug-ins"] . "jquery.blockui.min.js",
        $path["plug-ins"] . "jquery.cookie.min.js",
        $path["plug-ins"] . "uniform/jquery.uniform.min.js",
        $pathJS["root"] . "common.js"
    ),

    "core_plugins_ie9" => array(

        $path["plug-ins"] . "excanvas.min.js",
        $path["plug-ins"] . "respond.min.js"
    ),

    'user_login' => array(
        $path["plug-ins"] . "jquery-validation/dist/jquery.validate.min.js",
        $path["plug-ins"] . 'backstretch/jquery.backstretch.min.js',
        $path["plug-ins"] . 'select2/select2.min.js',
        $pathJS["root"] . "app.js",
        $pathJS["root"] . "login-soft.js",
        $pathJS["pages"] . "user/login.js"
    ),

);

return array(
    'user_login_css' => array_merge($css["mandatory"], $css["user_login"]),

    'dashboard_index_css' => array_merge($css["mandatory"], $css["dashboard_index"]),

    "user_login_js" => $js["user_login"],
    "core_plugins_js" => $js["core_plugins"],

    'dashboard_index_js' => array_merge($js["core_plugins"], $js["dashboard_index"]),


    'video_admin_js' => array_merge($js["core_plugins"], $js["crud_admin"]),
    'video_admin_css' => array_merge($css["mandatory"], $css["fixes"]),

    'video_create_js' => array_merge($js["core_plugins"], $js["crud_create"]),
    'video_create_css' => array_merge($css["mandatory"], $css["fixes"]),

    'video_update_js' => array_merge($js["core_plugins"], $js["crud_update"]),
    'video_update_css' => array_merge($css["mandatory"], $css["fixes"]),

    'request_admin_js' => array_merge($js["core_plugins"], $js["crud_admin"]),
    'request_admin_css' => array_merge($css["mandatory"], $css["fixes"]),

    'request_create_js' => array_merge($js["core_plugins"], $js["crud_create"]),
    'request_create_css' => array_merge($css["mandatory"], $css["fixes"]),

    'request_update_js' => array_merge($js["core_plugins"], $js["crud_update"]),
    'request_update_css' => array_merge($css["mandatory"], $css["fixes"]),

    'request_view_js' => array_merge($js["core_plugins"], $js["crud_view"]),
    'request_view_css' => array_merge($css["mandatory"], $css["fixes"]),

    'content_admin_js' => array_merge($js["core_plugins"], $js["crud_admin"]),
    'content_admin_css' => array_merge($css["mandatory"], $css["fixes"]),

    'content_create_js' => array_merge($js["core_plugins"], $js["crud_create"]),
    'content_create_css' => array_merge($css["mandatory"], $css["fixes"]),

    'content_update_js' => array_merge($js["core_plugins"], $js["crud_update"]),
    'content_update_css' => array_merge($css["mandatory"], $css["fixes"]),

    'photoalbum_admin_js' => array_merge($js["core_plugins"], $js["crud_admin"]),
    'photoalbum_admin_css' => array_merge($css["mandatory"], $css["fixes"]),

    'photoalbum_create_js' => array_merge($js["core_plugins"], $js["crud_create"]),
    'photoalbum_create_css' => array_merge($css["mandatory"], $css["fixes"]),

    'photoalbum_update_js' => array_merge($js["core_plugins"], $js["crud_update"]),
    'photoalbum_update_css' => array_merge($css["mandatory"], $css["fixes"]),


    'photo_admin_js' => array_merge($js["core_plugins"], $js["crud_admin"]),
    'photo_admin_css' => array_merge($css["mandatory"], $css["fixes"]),

    'photo_create_js' => array_merge($js["core_plugins"], $js["crud_create"]),
    'photo_create_css' => array_merge($css["mandatory"], $css["fixes"]),

    'photo_update_js' => array_merge($js["core_plugins"], $js["crud_update"]),
    'photo_update_css' => array_merge($css["mandatory"], $css["fixes"]),

    'photo_admin_js' => array_merge($js["core_plugins"], $js["crud_admin"]),
    'photo_admin_css' => array_merge($css["mandatory"], $css["fixes"]),

    'photo_create_js' => array_merge($js["core_plugins"], $js["crud_create"]),
    'photo_create_css' => array_merge($css["mandatory"], $css["fixes"]),

    'dictionary_admin_js' => array_merge($js["core_plugins"], $js["crud_admin"]),
    'dictionary_admin_css' => array_merge($css["mandatory"], $css["fixes"]),

    'dictionary_create_js' => array_merge($js["core_plugins"], $js["crud_create"]),
    'dictionary_create_css' => array_merge($css["mandatory"], $css["fixes"]),

    'dictionary_update_js' => array_merge($js["core_plugins"], $js["crud_update"]),
    'dictionary_update_css' => array_merge($css["mandatory"], $css["fixes"]),


    "core_plugins_ie9_js" => $js["core_plugins_ie9_js"]

);
