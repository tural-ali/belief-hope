<div class="pull-left">
    <?
    if (isset($_SERVER["HTTP_REFERER"]) && !empty($_SERVER["HTTP_REFERER"]))
        $url = htmlspecialchars($_SERVER["HTTP_REFERER"]);
    else
        $url = Yii::app()->language . "/videogallery/index";
    ?>
    <a href="<?= $url ?>">
        <i style="font-size: 20px" class="fa fa-arrow-left"></i>
    </a>
</div>
<div style="clear: both; text-align: center">
    <?=
    $content
    ?>
</div>

