<?=
$html;
?>
<center>
    <?
   // CVarDumper::dump($_GET);die();
    $this->widget('CLinkPager', array(
        'currentPage' => $pages->getCurrentPage(),
        'itemCount' => $item_count,
        'pageSize' => $page_size,
        "firstPageLabel" => Yii::t("common", "firstpage"),
        "prevPageLabel" => Yii::t("common", "prevpage"),
        'maxButtonCount' => 5,
        'nextPageLabel' => Yii::t("common", "nextpage"),
        'lastPageLabel' => Yii::t("common", "lastpage"),
        'header' => '',
        'htmlOptions' => array('class' => 'pagination'),
        'selectedPageCssClass' => 'active',
        'hiddenPageCssClass' => 'disabled',
    ));

    ?>
</center>