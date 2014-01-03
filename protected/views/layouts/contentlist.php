<? $this->beginContent('//layouts/main');

$this->widget('application.widgets.Slider');
?>


<div id="container" class="white-trans-border">


    <?= $content ?>


</div>

<?php $this->endContent(); ?>