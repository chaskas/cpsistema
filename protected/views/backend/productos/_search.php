<?php $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
        'id' => 'inlineForm',
        'type' => 'inline',
        'htmlOptions' => array('class' => 'well'),
    )
);
?>
		<?php //echo $form->textFieldGroup($model,'idProductos',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'Codigo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

		<?php echo $form->textFieldGroup($model,'Nombre_Producto',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

<?php echo $form->dropDownListGroup($model, 'Categorias_id',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'data' =>  CHtml::listData(Categorias::model()->findAll('Publicado=:p and idCategorias <> :id', array(':p'=>1,
                    ':id'=> isset($_GET['id']) ? $_GET['id'] : 0)
            ),'idCategorias' ,'Nombre_Categoria'),
            'htmlOptions' => array('prompt'=>'Categoría',)
        ),
    )
);
/*

;?>
		<?php echo $form->textFieldGroup($model,'Marca',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>60)))); ?>

		<?php echo $form->textFieldGroup($model,'Modelo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>60)))); ?>

		<?php echo $form->textFieldGroup($model,'CodModelo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>60)))); ?>

		<?php echo $form->textFieldGroup($model,'Tamano',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>60)))); ?>

		<?php echo $form->textFieldGroup($model,'Capacidad',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>60)))); ?>

		<?php echo $form->textFieldGroup($model,'TiempoDespacho',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>



<?php echo $form->textFieldGroup($model,'Stock',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php //echo $form->textFieldGroup($model,'URLCatalogo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

		<?php echo $form->textFieldGroup($model,'PrecioNormal',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php //echo $form->textFieldGroup($model,'PedMin',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php //echo $form->textFieldGroup($model,'Visitado',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php // echo $form->textFieldGroup($model,'Publicado',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php //echo $form->textFieldGroup($model,'Borrado',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php //echo $form->textFieldGroup($model,'Creado',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php //echo $form->textFieldGroup($model,'Actualizado',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php //echo $form->textFieldGroup($model,'EstadoStock_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php //echo $form->textFieldGroup($model,'cruge_user_Prov_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>






    <?php */ echo $form->dropDownListGroup($model, 'Publicado',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            'widgetOptions' => array(
                'data' =>array('' => 'Estado','0' => 'No Publicado', '1' => 'Publicado'),
            ),
            'labelOptions' => array( 'class' => 'col-sm-2',)
        )
    );?>

<?php $this->widget('booster.widgets.TbButtonAwesome', array(
    'buttonType' => 'submit',
    'context'=>'primary',
    'htmlOptions' => array('class' => 'grey-gallery btn-circle'),
    'label'=>'Filtrar',
    'icon' => 'filter',
    'size' => 'small',
)); ?>


<?php $this->widget('booster.widgets.TbButtonAwesome', array(
    'buttonType' => 'button',
    'context'=>'primary',
    'htmlOptions' => array('class' => 'limpiar grey-gallery btn-circle'),
    'label'=>'Resetear',
    'icon' => 'reply',
    'size' => 'small',

)); ?>
<?php $this->endWidget(); ?>
