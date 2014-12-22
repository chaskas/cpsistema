<?php
/* @var $this OrdencompraHasProductosController */
/* @var $model OrdencompraHasProductos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idOrdenProductos'); ?>
		<?php echo $form->textField($model,'idOrdenProductos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'OrdenCompra_id'); ?>
		<?php echo $form->textField($model,'OrdenCompra_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Productos_id'); ?>
		<?php echo $form->textField($model,'Productos_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Cantidad'); ?>
		<?php echo $form->textField($model,'Cantidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PrecioUnitario'); ?>
		<?php echo $form->textField($model,'PrecioUnitario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TiempoDespacho'); ?>
		<?php echo $form->textField($model,'TiempoDespacho'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TipoDescId'); ?>
		<?php echo $form->textField($model,'TipoDescId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->