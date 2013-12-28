<?php
$this->beginContent('//layouts/main');
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$minParam = $baseUrl . '/min/?g=';
if (!empty(Yii::app()->controller->module->id))
    $minParam .= Yii::app()->controller->module->id . "_";
if (!empty(Yii::app()->controller->id))
    $minParam .= Yii::app()->controller->id . "_";
if (!empty(Yii::app()->controller->action->id))
    $minParam .= Yii::app()->controller->action->id;

$cs->registerCssFile($minParam . '_css');
?>
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar nav-collapse collapse">
    <?
    $nav = new Navigation();
    echo $nav->generateMenu(1, "page-sidebar-menu", Yii::app()->request->url, 0);
    ?>
</div>
<!-- END SIDEBAR -->


<!-- BEGIN PAGE -->
<div class="page-content">
    <?php echo $content; ?>
</div>
<!-- END PAGE -->


<?php
$cs->registerScriptFile($minParam . '_js', CClientScript::POS_HEAD);
$this->endContent(); ?>
