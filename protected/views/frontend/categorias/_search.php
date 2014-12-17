<?php
/* @var $this CategoriasController */
/* @var $model Categorias */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idCategorias'); ?>
		<?php echo $form->textField($model,'idCategorias'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Nombre_Categoria'); ?>
		<?php echo $form->textField($model,'Nombre_Categoria',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Orden'); ?>
		<?php echo $form->textField($model,'Orden'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Publicado'); ?>
		<?php echo $form->textField($model,'Publicado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Borrado'); ?>
		<?php echo $form->textField($model,'Borrado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Creado'); ?>
		<?php echo $form->textField($model,'Creado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Actualizado'); ?>
		<?php echo $form->textField($model,'Actualizado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Categorias_Parent_id'); ?>
		<?php echo $form->textField($model,'Categorias_Parent_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->