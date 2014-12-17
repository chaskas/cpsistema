<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php //echo $form->textFieldGroup($model,'idProductos',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'Codigo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

		<?php echo $form->textFieldGroup($model,'Nombre_Producto',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

		<?php echo $form->textAreaGroup($model,'Descripcion', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>

		<?php echo $form->textFieldGroup($model,'Marca',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>60)))); ?>

		<?php echo $form->textFieldGroup($model,'Modelo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>60)))); ?>

		<?php echo $form->textFieldGroup($model,'CodModelo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>60)))); ?>

		<?php echo $form->textFieldGroup($model,'Tamano',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>60)))); ?>

		<?php echo $form->textFieldGroup($model,'Capacidad',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>60)))); ?>

		<?php echo $form->textFieldGroup($model,'TiempoDespacho',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'Stock',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php //echo $form->textFieldGroup($model,'URLCatalogo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

		<?php echo $form->textFieldGroup($model,'PrecioNormal',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'PedMin',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php //echo $form->textFieldGroup($model,'Visitado',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php // echo $form->textFieldGroup($model,'Publicado',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php //echo $form->textFieldGroup($model,'Borrado',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php //echo $form->textFieldGroup($model,'Creado',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php //echo $form->textFieldGroup($model,'Actualizado',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php //echo $form->textFieldGroup($model,'EstadoStock_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php //echo $form->textFieldGroup($model,'cruge_user_Prov_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'Categorias_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType' => 'submit',
			'context'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
