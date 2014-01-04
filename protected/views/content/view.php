<div class="blogpost">
    <div class="con-left">
        <h1><?= $title ?></h1>
    </div>
    <div class="clear"></div>

    <div class="con-date-cat">
        <span><i class="fa fa-calendar"></i><?= $timestamp ?></span>
        <?
        if (isset($category))
            echo " | <span><i class='fa fa-bookmark'></i> " . Yii::t('common', 'category') . ": " . $category . "</span>";
        ?>
    </div>
    <br class="clear"/>

    <div class="ReadableText">

        <?
        if (isset($imgUrl))
            echo "<center><img class='cover-photo' src='$imgUrl' alt=''/></center>";
        echo $content;
        ?>
    </div>
    <div class="clear"></div>
</div>

<?
if (isset($videoHtml))
    echo "<div class='videos'><h1>" . Yii::t("common", "photos") . "</h1>" . $videoHtml . "</div>";



?>


<?
if (isset($galleryHtml))
    echo "<img src='/assets/img/line.png'/>
    <div class='photos'>
    <h1>" . Yii::t("common", "photos") . "</h1>" . $galleryHtml . "</div>";

?>

