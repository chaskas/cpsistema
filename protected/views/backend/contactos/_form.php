
<div class="portlet-body">
    <div class="form-body">

        <?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
            'id'=>'contactos-form',
            'type' => 'horizontal',
            'enableAjaxValidation'=>false,
            'htmlOptions'=>array(
                'class'=>'well',
            )
        )); ?>

        <p class="help-block">Campos con <span class="required">*</span> son obligatorios</p>

        <?php echo $form->errorSummary($model); ?>

                    <?php echo $form->textFieldGroup($model,'Asunto',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

                    <?php echo $form->textAreaGroup($model,'Mensaje', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>

                    <?php echo $form->textFieldGroup($model,'Leido',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

                    <?php echo $form->textFieldGroup($model,'Atendido',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

                    <?php echo $form->textFieldGroup($model,'Creado',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

                    <?php echo $form->textFieldGroup($model,'cruge_user_Prov_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

                    <?php echo $form->textFieldGroup($model,'cruge_user_Empr_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

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