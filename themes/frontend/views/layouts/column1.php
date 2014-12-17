<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<?php $this->renderPartial('//layouts/_destacados') ?>

<div class="row margin-bottom-40 ">
<?php $this->renderPartial('//layouts/_sidebar') ?>
<?php echo $content; ?>
</div>

<?php $this->renderPartial('//layouts/_promo') ?>
<?php $this->endContent(); ?>