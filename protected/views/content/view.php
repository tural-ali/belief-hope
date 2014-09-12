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
            if ($catID == 6 || $catID == 7 || is_null($catID))
                echo "<img class='cover-photo portrait' src='/uploads/images/resize.php?src=$imgUrl&w=2500&zc=2&a=t'  alt=''/>";
            else
                echo "<center><img class='cover-photo landscape' src='/uploads/images/resize.php?src=$imgUrl&w=650&zc=2&a=t' alt=''/></center>";

        echo $content;
        ?>
    </div>
    <div class="clear"></div>
</div>

<?
if (isset($videoHtml))
    echo "<div class='videos'><h1>" . Yii::t("common", "videos") . "</h1>" . $videoHtml . "</div>";



?>


<?
if (isset($galleryHtml))
    echo "<img src='/assets/img/line.png'/>
    <div class='photos'>
    <h1>" . Yii::t("common", "photos") . "</h1>" . $galleryHtml . "</div>";

?>

