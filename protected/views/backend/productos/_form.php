<div class="portlet-body">
    <div class="form-body"></div>
</div>

<?php  $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'productos-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'class' => 'well',
    )
)); ?>

<p class="help-block">Campos con <span class="required">*</span> son obligatorios</p>


<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldGroup($model, 'Codigo', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 255)), 'wrapperHtmlOptions' => array('class' => 'col-sm-5'), 'labelOptions' => array('class' => 'col-sm-2'))); ?>

<?php echo $form->textFieldGroup($model, 'Nombre_Producto', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 255)), 'wrapperHtmlOptions' => array('class' => 'col-sm-5'), 'labelOptions' => array('class' => 'col-sm-2'))); ?>

<?php echo $form->ckEditorGroup(
    $model,
    'Descripcion',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-10',
        ),
        'widgetOptions' => array(
            'editorOptions' => array(
                'fullpage' => 'js:true',
                /* 'width' => '640', */
                /* 'resize_maxWidth' => '640', */
                /* 'resize_minWidth' => '320'*/
            )
        ),
        'labelOptions' => array('class' => 'col-sm-2')
    )

); ?>

<?php echo $form->textFieldGroup($model, 'Marca', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 255)), 'wrapperHtmlOptions' => array('class' => 'col-sm-5'), 'labelOptions' => array('class' => 'col-sm-2'))); ?>

<?php echo $form->textFieldGroup($model, 'Modelo', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 255)), 'wrapperHtmlOptions' => array('class' => 'col-sm-5'), 'labelOptions' => array('class' => 'col-sm-2'))); ?>

<?php echo $form->textFieldGroup($model, 'CodModelo', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 255)), 'wrapperHtmlOptions' => array('class' => 'col-sm-5'), 'labelOptions' => array('class' => 'col-sm-2'))); ?>

<?php echo $form->textFieldGroup($model, 'Tamano', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 255)), 'wrapperHtmlOptions' => array('class' => 'col-sm-5'), 'labelOptions' => array('class' => 'col-sm-2'))); ?>

<?php echo $form->textFieldGroup($model, 'Capacidad', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 255)), 'wrapperHtmlOptions' => array('class' => 'col-sm-5'), 'labelOptions' => array('class' => 'col-sm-2'))); ?>

<?php echo $form->textFieldGroup($model,
    'TiempoDespacho', array(
        'widgetOptions' => array(
            'htmlOptions' => array(
                'class' => 'span5',
                'maxlength' => 255,
                'type' => 'number',
                'min' => '1'
            )
        ),
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5'
        ), 'labelOptions' => array(
            'class' => 'col-sm-2'
        )
    )
); ?>

<?php echo $form->textFieldGroup($model, 'Stock', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 255)), 'wrapperHtmlOptions' => array('class' => 'col-sm-5'), 'labelOptions' => array('class' => 'col-sm-2'))); ?>

<?php //echo $form->textFieldGroup($model,'URLCatalogo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)),'wrapperHtmlOptions' => array( 'class' => 'col-sm-5'),'labelOptions' => array( 'class' => 'col-sm-2'))); ?>

<?php echo $form->textFieldGroup($model, 'PrecioNormal', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 255)), 'wrapperHtmlOptions' => array('class' => 'col-sm-5'), 'labelOptions' => array('class' => 'col-sm-2'))); ?>

<?php echo $form->textFieldGroup($model, 'PedMin', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 255)), 'wrapperHtmlOptions' => array('class' => 'col-sm-5'), 'labelOptions' => array('class' => 'col-sm-2'))); ?>


<?php echo $form->dropDownListGroup($model, 'Publicado',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'data' => array('0' => 'No Publicado', '1' => 'Publicado'),
            'htmlOptions' => array(),
        ),
        'labelOptions' => array('class' => 'col-sm-2',)
    )
);?>

<?php echo $form->dropDownListGroup($model, 'Categorias_id',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'data' => CHtml::listData(Categorias::model()->findAll('Publicado=:p and Borrado=:b', array(':p' => 1, ':b' => 0)), 'idCategorias', 'Nombre_Categoria'),
            'htmlOptions' => array('prompt' => 'Seleccione Categoria'),
        ),
        'labelOptions' => array('class' => 'col-sm-2',)
    )
);?>

<?php echo $form->dropDownListGroup($model, 'EstadoStock_id',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'data' => CHtml::listData(Estadostock::model()->findAll('Publicado=:p and Borrado=:b', array(':p' => 1, ':b' => 0)), 'idEstadoStock', 'Nombre_Estado'),
            'htmlOptions' => array('prompt' => 'Seleccione Estado Stock'),
        ),
        'labelOptions' => array('class' => 'col-sm-2',)
    )
);?>

<?php //echo $form->textFieldGroup($model,'cruge_user_Prov_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)),'wrapperHtmlOptions' => array( 'class' => 'col-sm-5'),'labelOptions' => array( 'class' => 'col-sm-2'))); ?>


<div class="form-actions">
    <?php $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    )); ?>
</div>

<?php $this->endWidget(); ?>
</div>
</div>