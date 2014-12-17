
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

                    <?php echo $form->textFieldGroup($model,'FechaIni',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

                    <?php echo $form->textFieldGroup($model,'FechaFin',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

                    <?php echo $form->textFieldGroup($model,'CantMin',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

                    <?php echo $form->textFieldGroup($model,'CantMax',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

                    <?php echo $form->textFieldGroup($model,'Precio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

                    <?php echo $form->textFieldGroup($model,'Productos_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

                    <?php echo $form->textFieldGroup($model,'TipoDesc_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

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