
<div class="portlet-body">
    <div class="form-body">

        <?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
            'id'=>'imgenprod-form',
            'type' => 'horizontal',
            'enableAjaxValidation'=>false,
            'htmlOptions'=>array(
                'class'=>'well',
            )
        )); ?>

        <p class="help-block">Campos con <span class="required">*</span> son obligatorios</p>

        <?php echo $form->errorSummary($model); ?>

                    <?php echo $form->textFieldGroup($model,'Ruta',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

                    <?php echo $form->textFieldGroup($model,'Orden',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

                    <?php echo $form->textFieldGroup($model,'Productos_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

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