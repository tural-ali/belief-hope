<?
$controllerName = Yii::app()->controller->id;
$actionName = Yii::app()->controller->action->id;
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="/min/?g=<?= $controllerName ?>_<?= $actionName ?>_css" rel="stylesheet">
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if lt IE 8]>
    <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js"></script>
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
                <div class="social-bar">
                    <a class="webicon facebook small" href="#"></a>
                    <a class="webicon twitter small" href="#"></a>
                    <a class="webicon youtube small" href="#"></a>
                </div>
            </div>

            <?
            $this->widget('application.widgets.Navigation');
            ?>

            <div class="clear"></div>
        </div>
    </div>
    <?= $content ?>
    <div class="push"></div>
</div>

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=turalaliyev"></script>


<div id="footer">
    <div id="ftlogo"></div>

    <p>&copy; 2013 - <?= date("Y"); ?>  Belief and Hope</p>
</div>


<script src="/min/?g=<?= $controllerName ?>_<?= $actionName ?>_js"></script>
</body>
</html>



