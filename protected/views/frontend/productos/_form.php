<?php
/* @var $this ProductosController */
/* @var $model Productos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'productos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Codigo'); ?>
		<?php echo $form->textField($model,'Codigo',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Codigo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Nombre_Producto'); ?>
		<?php echo $form->textField($model,'Nombre_Producto',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Nombre_Producto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Descripcion'); ?>
		<?php echo $form->textArea($model,'Descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Marca'); ?>
		<?php echo $form->textField($model,'Marca',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'Marca'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Modelo'); ?>
		<?php echo $form->textField($model,'Modelo',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'Modelo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CodModelo'); ?>
		<?php echo $form->textField($model,'CodModelo',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'CodModelo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Tamano'); ?>
		<?php echo $form->textField($model,'Tamano',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'Tamano'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Capacidad'); ?>
		<?php echo $form->textField($model,'Capacidad',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'Capacidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TiempoDespacho'); ?>
		<?php echo $form->textField($model,'TiempoDespacho'); ?>
		<?php echo $form->error($model,'TiempoDespacho'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Stock'); ?>
		<?php echo $form->textField($model,'Stock'); ?>
		<?php echo $form->error($model,'Stock'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'URLCatalogo'); ?>
		<?php echo $form->textField($model,'URLCatalogo',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'URLCatalogo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PrecioNormal'); ?>
		<?php echo $form->textField($model,'PrecioNormal'); ?>
		<?php echo $form->error($model,'PrecioNormal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PedMin'); ?>
		<?php echo $form->textField($model,'PedMin'); ?>
		<?php echo $form->error($model,'PedMin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Visitado'); ?>
		<?php echo $form->textField($model,'Visitado'); ?>
		<?php echo $form->error($model,'Visitado'); ?>
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
		<?php echo $form->labelEx($model,'EstadoStock_id'); ?>
		<?php echo $form->textField($model,'EstadoStock_id'); ?>
		<?php echo $form->error($model,'EstadoStock_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cruge_user_Prov_id'); ?>
		<?php echo $form->textField($model,'cruge_user_Prov_id'); ?>
		<?php echo $form->error($model,'cruge_user_Prov_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Categorias_id'); ?>
		<?php echo $form->textField($model,'Categorias_id'); ?>
		<?php echo $form->error($model,'Categorias_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->