
<div class="portlet-body">
    <div class="form-body">
        <?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
            'id'=>'categorias-form',
            'type' => 'horizontal',
            'enableAjaxValidation'=>false,
            'htmlOptions'=>array(
                'class'=>'well',
               )
        )); ?>

        <p class="help-block">Campos con <span class="required">*</span> son obligatorios</p>

        <?php echo $form->errorSummary($model); ?>

                    <?php echo $form->textFieldGroup($model,'Nombre_Categoria',
                        array(
                            'widgetOptions'=>array(
                                'htmlOptions'=>array('class'=>'span5','maxlength'=>255)
                            ),
                            'wrapperHtmlOptions' => array( 'class' => 'col-sm-5'),
                            'labelOptions' => array( 'class' => 'col-sm-2')
                        )
                    ); ?>

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
                    <?php echo $form->dropDownListGroup($model, 'Categorias_Parent_id',
                        array(
                            'wrapperHtmlOptions' => array(
                                'class' => 'col-sm-5',
                            ),
                            'widgetOptions' => array(
                                'data' =>  CHtml::listData(Categorias::model()->findAll('Publicado=:p and idCategorias <> :id', array(':p'=>1,
                                            ':id'=> isset($_GET['id']) ? $_GET['id'] : 0)
                                          ),'idCategorias' ,'Nombre_Categoria'),
                                'htmlOptions' => array('prompt'=>'Sin Padre'),
                            ),
                            'labelOptions' => array( 'class' => 'col-sm-2',)
                        )
                    );?>
        <?php $this->endWidget(); ?>
    </div>
</div>