<?php $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
        'id' => 'inlineForm',
        'type' => 'inline',
        'htmlOptions' => array('class' => 'well'),
    )
);
?>
	<?php

        $datasourse = array();
        foreach ($model->findAll() as $data){
            array_push($datasourse, CHtml::encode($data->Nombre_Categoria));
        }

        echo $form->typeAheadGroup(
            $model,
            'Nombre_Categoria',
            array(
                'widgetOptions' => array(
                    'options'=>array(
                        'hint' => true,
                        'highlight' => true,
                        'minLength' => 1,
                    ),
                    'datasets' => array(
                        'source' => $datasourse
                    ),
                ),
                'labelOptions' => array(
                    'label' => 'predictor',
                ),

            )
        ); ?>

<?php echo $form->dropDownListGroup($model, 'Publicado',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'data' =>array('' => '','0' => 'No Publicado', '1' => 'Publicado'),
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
            'htmlOptions' => array('prompt'=>'Categoria Padre',)
        ),
        'labelOptions' => array( 'class' => 'col-sm-2',)
    )
);?>


<?php /* echo $form->dateRangeGroup(
    $model,
    'Creado',
    array(
        'widgetOptions' => array(
                'options' => array(
                    'language' => 'es',
                    'format' => 'DD/MM/YYYY',
            ),
        ),
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'
    )
);*/



?>


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

<?php
$this->endWidget(); ?>
