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
    <title>Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN STYLES -->
    <link
        href="<?= Yii::app()->baseUrl; ?>/min/?g=<?= Yii::app()->controller->id . "_" . Yii::app()->controller->action->id ?>_css"
        rel="stylesheet"
        type="text/css"/>
    <!-- END PAGE STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">

</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">

    <form class="form-vertical login-form" action="" method="post">
        <center><h3 class="form-title">Administrasiya</h3></center>

        <div class="alert alert-error hide">
            <button class="close" data-dismiss="alert"></button>
            <span>Login və parolunuzu daxil edin</span>
        </div>
        <div class="control-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Login</label>

            <div class="controls">
                <div class="input-icon left">
                    <i class="icon-user"></i>
                    <input class="m-wrap placeholder-no-fix" type="text" autocomplete="off" placeholder="Login"
                           name="LoginForm[username]"/>
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label visible-ie8 visible-ie9">Parol</label>

            <div class="controls">
                <div class="input-icon left">
                    <i class="icon-lock"></i>
                    <input class="m-wrap placeholder-no-fix" type="password" autocomplete="off" placeholder="Parol"
                           name="LoginForm[password]"/>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <label class="checkbox">
                <input type="checkbox" name="LoginForm[rememberMe]" value="1"/> Yadda saxla
            </label>
            <button type="submit" class="btn green pull-right">
                Login <i class="m-icon-swapright m-icon-white"></i>
            </button>
        </div>
    </form>
    <!-- END LOGIN FORM -->

</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
    <a href="http://tural.us" target="_blank">2013 &copy; Tural Aliyev</a>
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<script
    src="<?= Yii::app()->baseUrl; ?>/min/?g=core_plugins_js"></script>

<!--[if lt IE 9]>
<script
    src="<?= Yii::app()->baseUrl; ?>/min/?g=core_plugins_ie9_js"></script>
<![endif]-->

<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script
    src="<?= Yii::app()->baseUrl; ?>/min/?g=<?= Yii::app()->controller->id . "_" . Yii::app()->controller->action->id ?>_js"
    type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function () {
        App.init();
        Login.init();
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
