<?
$controllerName = Yii::app()->controller->id;
$actionName = Yii::app()->controller->action->id;
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <link
        href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic,700italic&subset=latin,cyrillic-ext,latin-ext,cyrillic'
        rel='stylesheet' type='text/css'>
    <link href="/min/?g=<?= $controllerName ?>_<?= $actionName ?>_css" rel="stylesheet">
    <!--[if lte IE 8]>
    <link href="/assets/css/iefixes.css" rel="stylesheet">
    <![endif]-->
    <title>Belief & Hope</title>
</head>
<body>


<div id="wrap">
    <div id="head-con">
        <div id="header">
            <div id="logo">
                <a href="/"><img src="/assets/img/logo.png" alt=""></a>
                <?
                $this->widget('application.widgets.LanguageSelector');
                ?>
            </div>

            <?
            $this->widget('application.widgets.Navigation');
            ?>

            <div class="social-bar"><br>
                <a class="webicon facebook small" href="https://www.facebook.com/beliefandhopedotcom"></a>
                <a class="webicon twitter small" href="https://twitter.com/belief_and_hope"></a>
                <a class="webicon youtube small" href="https://www.youtube.com/user/beliefandhopedotcom"></a>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <?= $content ?>
    <div class="push"></div>
</div>

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=turalaliyev"></script>

<div id="watermark">
    <img src="http://d2c8pv72mjay80.cloudfront.net/logos/partners/aws-gsp-logo.png">
    This site will be unavailable due to unpaid hosting bills after 01.02.2014
</div>
<div id="footer">
    <div id="ftlogo"></div>

    <p>&copy; 2013 - <?= date("Y"); ?>  Belief and Hope</p>
</div>
<!--[if lte IE 8]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script src="/assets/js/respond.min.js"></script>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js"></script>
<![endif]-->

<script src="/min/?g=<?= $controllerName ?>_<?= $actionName ?>_js"></script>
</body>
</html>



