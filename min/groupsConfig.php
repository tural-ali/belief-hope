<?php
/*PATH VARIABLES */

$path["root"] = "//assets/";
$path["plug-ins"] = $path["root"] . "plugins/";

$pathJS["root"] = $path["root"] . "js/";
$pathJS["pages"] = $pathJS["root"] . "pages/";
$pathJS["mandatory"] = $pathJS["root"] . "mandatory/";

$pathCSS["root"] = $path["root"] . "css/";
$pathCSS["pages"] = $pathCSS["root"] . "pages/";
$pathCSS["mandatory"] = $pathCSS["root"] . "mandatory/";


$css = array(
    'mandatory' => array(
        $pathCSS["root"] . "font-awesome.min.css",
        $pathCSS["root"] . "bootstrap.min.css",
        $pathCSS["root"] . "style.css"
    ),
    site_index => array()


);


$js = array(
    'mandatory' => array(
        $pathJS["mandatory"] . "jquery-1.10.1.min.js",
        $pathJS["mandatory"] . "jquery-migrate-1.2.1.min.js",
        $pathJS["mandatory"] . "bootstrap.min.js",
        $pathJS["root"] . "initialize.js",
    ),
    site_index => array()

);

return array(
    'site_index_css' => array_merge($css["mandatory"], $css["site_index"]),
    'site_index_js' => array_merge($js["mandatory"], $js["site_index"]),
    'site_contact_css' => array_merge($css["mandatory"], $css["site_index"]),
    'site_contact_js' => array_merge($js["mandatory"], $js["site_index"]),
    'content_view_css' => array_merge($css["mandatory"], $css["site_index"]),
    'content_view_js' => array_merge($js["mandatory"], $js["site_index"]),

);
