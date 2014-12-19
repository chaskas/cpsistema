
<div class="portlet-body">
    <div class="form-body">

        <?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
            'id'=>'evaluacionpr-form',
            'type' => 'horizontal',
            'enableAjaxValidation'=>false,
            'htmlOptions'=>array(
                'class'=>'well',
            )
        )); ?>

        <p class="help-block">Campos con <span class="required">*</span> son obligatorios</p>

        <?php echo $form->errorSummary($model); ?>

                    <?php echo $form->textFieldGroup($model,'TiempoRespuesta',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

                    <?php echo $form->textFieldGroup($model,'TiempoEnvio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

                    <?php echo $form->textFieldGroup($model,'CalidadProd',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

                    <?php echo $form->textFieldGroup($model,'TiempoFact',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

                    <?php echo $form->textAreaGroup($model,'Comentario', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>

                    <?php echo $form->textAreaGroup($model,'Respuesta', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>

                    <?php echo $form->textFieldGroup($model,'OrdenCompra_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

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