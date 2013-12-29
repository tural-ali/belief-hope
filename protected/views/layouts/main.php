<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link href="/min/?g=<?php echo Yii::app()->controller->id . "_" . Yii::app()->controller->action->id; ?>_css"
          rel="stylesheet">
    <title>Belief & Hope</title>
</head>
<body>

<div id="fade">
    <div class="clouds"></div>
    <img src="/assets/img/logo-larg.png"/>
</div>

<div id="wrap">
    <div id="head-con">
        <div id="header">
            <div id="logo">
                <a href="index.html"><img src="/assets/img/logo.png" alt=""></a>
                <?
                $this->widget('application.widgets.LanguageSelector');
                ?>
            </div>

            <?
            $this->widget('application.widgets.Navigation');
            ?>

            <div class="clear"></div>
        </div>
    </div>
    <?= $content ?>

</div>






<div id="footer">
    <div id="ftlogo"></div>
    <p>
        <i class="fa fa-facebook-square"></i>
        <i class="fa fa-envelope-o"></i>
        <i class="fa fa-youtube-square"></i>
    </p>

    <p>All Rights Reserved &copy; 2013</p>
</div>


<script src="/min/?g=<?php echo Yii::app()->controller->id . "_" . Yii::app()->controller->action->id; ?>_js"></script>

</body>
</html>



