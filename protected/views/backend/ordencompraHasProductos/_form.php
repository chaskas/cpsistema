<?php
/* @var $this OrdencompraHasProductosController */
/* @var $model OrdencompraHasProductos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ordencompra-has-productos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'OrdenCompra_id'); ?>
		<?php echo $form->textField($model,'OrdenCompra_id'); ?>
		<?php echo $form->error($model,'OrdenCompra_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Productos_id'); ?>
		<?php echo $form->textField($model,'Productos_id'); ?>
		<?php echo $form->error($model,'Productos_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Cantidad'); ?>
		<?php echo $form->textField($model,'Cantidad'); ?>
		<?php echo $form->error($model,'Cantidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PrecioUnitario'); ?>
		<?php echo $form->textField($model,'PrecioUnitario'); ?>
		<?php echo $form->error($model,'PrecioUnitario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TiempoDespacho'); ?>
		<?php echo $form->textField($model,'TiempoDespacho'); ?>
		<?php echo $form->error($model,'TiempoDespacho'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TipoDescId'); ?>
		<?php echo $form->textField($model,'TipoDescId'); ?>
		<?php echo $form->error($model,'TipoDescId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->