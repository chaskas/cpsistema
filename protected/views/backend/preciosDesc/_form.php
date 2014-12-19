<?php
Yii::app()->clientScript->registerScript('flash', '
    var $tipo = $(\'#tipo\'), $rango = $(\'#rango\'), $max = $(\'#max\');
$tipo.change(function () {
    if ($tipo.val() == \'2\') {
        $rango.removeAttr(\'disabled\');
        $max.removeAttr(\'disabled\');

    } else {
        $rango.attr(\'disabled\', \'disabled\').val(\'\');
        $max.attr(\'disabled\', \'disabled\').val(\'\');
    }
}).trigger(\'change\');
'); ?>


<div class="portlet-body">
    <div class="form-body">

        <?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
            'id'=>'precios-desc-form',
            'type' => 'horizontal',
            'enableAjaxValidation'=>false,
            'htmlOptions'=>array(
                'class'=>'well',
            )
        )); ?>

        <p class="help-block">Campos con <span class="required">*</span> son obligatorios</p>

        <?php echo $form->errorSummary($model); ?>

        <?php echo $form->textFieldGroup($model,'Precio',
            array(
                'widgetOptions'=>array(
                    'htmlOptions'=>array('class'=>'span5','maxlength'=>255),

                ),
                'wrapperHtmlOptions' => array( 'class' => 'col-sm-5'),
                'labelOptions' => array( 'class' => 'col-sm-2'),
                'prepend' => '<i class="fa fa-usd"></i>',
            )
        ); ?>
        <?php echo $form->dropDownListGroup($model, 'TipoDesc_id',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'widgetOptions' => array(
                    'data' =>  CHtml::listData(Tipodesc::model()->findAll('Publicado=:p',array(':p'=>1)
                        ),'idTipoDesc' ,'Nombre_Tipo_Descuento'),
                    'htmlOptions' => array("id" => 'tipo'),
                ),
                'labelOptions' => array( 'class' => 'col-sm-2',)
            )
        );?>

        <?php echo $form->textFieldGroup($model,'CantMin',
            array(
                'widgetOptions'=>array(
                    'htmlOptions'=>array('class'=>'span5','maxlength'=>255)
                ),
                'wrapperHtmlOptions' => array( 'class' => 'col-sm-5'),
                'labelOptions' => array( 'class' => 'col-sm-2')
            )
        ); ?>

        <?php echo $form->textFieldGroup($model,'CantMax',
            array(
                'widgetOptions'=>array(
                    'htmlOptions'=>array('class'=>'span5','maxlength'=>255,'id'=> 'max')
                ),
                'wrapperHtmlOptions' => array( 'class' => 'col-sm-5'),
                'labelOptions' => array( 'class' => 'col-sm-2')
            )
        ); ?>

        <?php echo $form->dateRangeGroup(
            $model,
            'rango',
            array(
                'widgetOptions' => array(
                    'htmlOptions'=>array('id'=>'rango', 'disabled' => 'disabled', 'required' =>'required'),
                    'options' => array(
                        'language' => 'es',
                        'timePicker' => true,
                        'showDropdowns' => true,
                        'timePickerIncrement'=>'30',
                        'format'=> 'DD/MM/YYYY h:mm',
                        'minDate' => $model->FechaIni,
                        'startDate' => $model->FechaIni,
                    ),
                ),
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'hint' => 'Fecha a partir de la cual estará vigente el precio.',
                'prepend' => '<i class="fa fa-calendar"></i>',
                'labelOptions' => array( 'class' => 'col-sm-2')
            )
        ); ?>


        <?php /* echo $form->dateTimePickerGroup(
            $model,
            'FechaFin',
            array(
                'widgetOptions' => array(
                    'htmlOptions'=>array('data-date-format'=>'dd/mm/yyyy hh:mm'),
                    'options' => array(
                        'language' => 'es',
                        'weekStart' => '1',
                        'startDate' => $model->FechaIni,
                        'clearBtn'=> 'true',
                        'autoclose'=> 'true',
                        'todayHighlight'=> 'true',

                    ),
                ),
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'hint' => 'Fecha a partir de la cual estará vigente el precio.',
                'prepend' => '<i class="glyphicon glyphicon-calendar"></i>',
                'labelOptions' => array( 'class' => 'col-sm-2')
            )
        ); */?>

        <?php echo $form->dropDownListGroup($model, 'Publicado',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'widgetOptions' => array(
                    'data' =>array('0' => 'No Publicado', '1' => 'Publicado'),
                    'htmlOptions' => array(),
                ),
                'labelOptions' => array( 'class' => 'col-sm-2',)
            )
        );?>


        <?php echo CHtml::hiddenField('PreciosDesc[Productos_id]' , $model->isNewRecord ? $_GET['pid']:$model->Productos_id); ?>

        <div class="form-actions">
            <?php $this->widget('booster.widgets.TbButton', array(
                'buttonType'=>'submit',
                'context'=>'primary',
                'label'=>$model->isNewRecord ? 'Create' : 'Save',
            )); ?>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>