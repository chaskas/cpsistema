<?php
/* @var $this CategoriasController */
/* @var $model Categorias */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'categorias-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idCategorias'); ?>
		<?php echo $form->textField($model,'idCategorias'); ?>
		<?php echo $form->error($model,'idCategorias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Nombre_Categoria'); ?>
		<?php echo $form->textField($model,'Nombre_Categoria',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Nombre_Categoria'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Orden'); ?>
		<?php echo $form->textField($model,'Orden'); ?>
		<?php echo $form->error($model,'Orden'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Publicado'); ?>
		<?php echo $form->textField($model,'Publicado'); ?>
		<?php echo $form->error($model,'Publicado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Borrado'); ?>
		<?php echo $form->textField($model,'Borrado'); ?>
		<?php echo $form->error($model,'Borrado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Creado'); ?>
		<?php echo $form->textField($model,'Creado'); ?>
		<?php echo $form->error($model,'Creado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Actualizado'); ?>
		<?php echo $form->textField($model,'Actualizado'); ?>
		<?php echo $form->error($model,'Actualizado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Categorias_Parent_id'); ?>
		<?php echo $form->textField($model,'Categorias_Parent_id'); ?>
		<?php echo $form->error($model,'Categorias_Parent_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->