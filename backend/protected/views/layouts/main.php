<?php
$bu = Yii::app()->baseURL;
Yii::app()->clientScript->scriptMap = array(
    'jquery.js' => false,
);
?>
<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <link rel="shortcut icon" href="favicon.ico"/>
        <link href="<?= $bu ?>/assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
        <script type="text/javascript">
            var lang = '<?= $bu ?>',
                    baseUrl = '<?= Yii::app()->baseURL ?>';
        </script>
        <title><?= CHtml::encode($this->pageTitle); ?></title>
    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class="page-header-fixed">

        <!-- BEGIN HEADER -->

        <div class="header navbar navbar-inverse navbar-fixed-top">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="navbar-inner">
                <div class="container-fluid">
                    <!-- BEGIN LOGO -->
                    <a class="brand" href="<?= Yii::app()->baseURL ?>">
                        <?= CHtml::encode(Yii::app()->name); ?>
                    </a>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
                        <img src="<?= Yii::app()->request->baseUrl; ?>/assets/img/menu-toggler.png" alt=""/>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <ul class="nav pull-right">
                        <?
                        $avatar = new Gravatar();
                        $imgurl = $avatar->GetGravatarUrl(Yii::app()->user->email);
                        ?>
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <li class="dropdown user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                               data-close-others="true">
                                <img alt="" src="<?= $imgurl ?>"/>
                                <span class="username"><?= YII::app()->user->fullname ?></span>
                                <i class="icon-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:;" id="trigger_fullscreen"><i class="icon-move"></i> Full Screen</a>
                                </li>
                                <li><a href="extra_lock.html"><i class="icon-lock"></i> Lock Screen</a></li>
                                <li><a href="<?= Yii::app()->request->baseUrl; ?>/user/logout"><i class="icon-key"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
            </div>
            <!-- END TOP NAVIGATION BAR -->
        </div>

        <!-- END HEADER -->

        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <?= $content; ?>
        </div>
        <!-- BEGIN FOOTER -->
        <div class="footer">
            <div class="footer-inner">
                2013 &copy; Tural Aliyev.
            </div>
            <div class="footer-tools">
                <span class="go-top">
                    <i class="icon-angle-up"></i>
                </span>
            </div>
        </div>
        <!-- END FOOTER -->


        <!--[if lt IE 9]>
        <script src="<?= Yii::app()->request->baseUrl; ?>/min/?g=core_plugins_ie9_js" type="text/javascript"></script>
        <![endif]-->


    </body>
</html>
