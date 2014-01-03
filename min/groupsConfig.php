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
    "site_index" => array(),
    "photogallery_index" => array(
        $pathCSS["root"] . "photogallery.css"
    ),
    "videogallery_index" => array(
        $pathCSS["root"] . "videogallery.css"
    ),
    "photogallery_album" => array(
        $path["plug-ins"] . "fancybox/jquery.fancybox.css",
        $path["plug-ins"] . "fancybox/jquery.fancybox-thumbs.css",
        $pathCSS["root"] . "photoalbum.css"
    ),

);


$js = array(
    'mandatory' => array(
        $pathJS["mandatory"] . "jquery-1.10.1.min.js",
        $pathJS["mandatory"] . "jquery-migrate-1.2.1.min.js",
        $pathJS["mandatory"] . "bootstrap.min.js",
        $pathJS["root"] . "initialize.js",
    ),
    "site_index" => array(),

    "photogallery_index" => array(
        $pathJS["pages"] . "photogallery.js"
    ),

    "videogallery_index" => array(
        $pathJS["pages"] . "videogallery.js"
    ),
    "photogallery_album" => array(
        $path["plug-ins"] . "fancybox/jquery.fancybox.pack.js",
        $path["plug-ins"] . "fancybox/jquery.fancybox-thumbs.js",
        $pathJS["pages"] . "photoalbum.js"
    ),


);

return array(
    'site_index_css' => array_merge($css["mandatory"], $css["site_index"]),
    'site_index_js' => array_merge($js["mandatory"], $js["site_index"]),

    'site_events_css' => array_merge($css["mandatory"], $css["site_index"]),
    'site_events_js' => array_merge($js["mandatory"], $js["site_index"]),



    'site_sparkle_css' => array_merge($css["mandatory"], $css["site_index"]),
    'site_sparkle_js' => array_merge($js["mandatory"], $js["site_index"]),

    'site_interviews_css' => array_merge($css["mandatory"], $css["site_index"]),
    'site_interviews_js' => array_merge($js["mandatory"], $js["site_index"]),





    'site_charity_css' => array_merge($css["mandatory"], $css["site_index"]),
    'site_charity_js' => array_merge($js["mandatory"], $js["site_index"]),

    'photogallery_index_css' => array_merge($css["mandatory"], $css["photogallery_index"]),
    'photogallery_index_js' => array_merge($js["mandatory"], $js["photogallery_index"]),

    'photogallery_album_css' => array_merge($css["mandatory"], $css["photogallery_album"]),
    'photogallery_album_js' => array_merge($js["mandatory"], $js["photogallery_album"]),


    'videogallery_index_css' => array_merge($css["mandatory"], $css["videogallery_index"]),
    'videogallery_index_js' => array_merge($js["mandatory"], $js["videogallery_index"]),


    'videogallery_view_css' => array_merge($css["mandatory"], $css["videogallery_index"]),
    'videogallery_view_js' => array_merge($js["mandatory"], $js["videogallery_index"]),

    'site_contact_css' => array_merge($css["mandatory"], $css["site_index"]),
    'site_contact_js' => array_merge($js["mandatory"], $js["site_index"]),

    'content_view_css' => array_merge($css["mandatory"], $css["site_index"], $css["photogallery_album"]),
    'content_view_js' => array_merge($js["mandatory"], $js["site_index"], $js["photogallery_album"]),


);
