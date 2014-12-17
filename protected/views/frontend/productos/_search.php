<?php
/* @var $this ProductosController */
/* @var $model Productos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idProductos'); ?>
		<?php echo $form->textField($model,'idProductos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Codigo'); ?>
		<?php echo $form->textField($model,'Codigo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Nombre_Producto'); ?>
		<?php echo $form->textField($model,'Nombre_Producto',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Descripcion'); ?>
		<?php echo $form->textArea($model,'Descripcion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Marca'); ?>
		<?php echo $form->textField($model,'Marca',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Modelo'); ?>
		<?php echo $form->textField($model,'Modelo',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CodModelo'); ?>
		<?php echo $form->textField($model,'CodModelo',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tamano'); ?>
		<?php echo $form->textField($model,'Tamano',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Capacidad'); ?>
		<?php echo $form->textField($model,'Capacidad',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TiempoDespacho'); ?>
		<?php echo $form->textField($model,'TiempoDespacho'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Stock'); ?>
		<?php echo $form->textField($model,'Stock'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'URLCatalogo'); ?>
		<?php echo $form->textField($model,'URLCatalogo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PrecioNormal'); ?>
		<?php echo $form->textField($model,'PrecioNormal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PedMin'); ?>
		<?php echo $form->textField($model,'PedMin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Visitado'); ?>
		<?php echo $form->textField($model,'Visitado'); ?>
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
		<?php echo $form->label($model,'EstadoStock_id'); ?>
		<?php echo $form->textField($model,'EstadoStock_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cruge_user_Prov_id'); ?>
		<?php echo $form->textField($model,'cruge_user_Prov_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Categorias_id'); ?>
		<?php echo $form->textField($model,'Categorias_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->