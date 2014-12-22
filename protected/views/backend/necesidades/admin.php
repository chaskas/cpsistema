<?php
/* @var $this NecesidadesController */
/* @var $model Necesidades */

$controlador = Yii::app()->controller->id;
$menuMas = array();
$this->breadcrumbs=array(
	'Necesidades'=>array('admin'),
	'Administrar'

);
?>

<div class="portlet-title">

    <div class="caption">
        <i class="fa fa-life-ring"></i>
										<span class="caption-subject bold uppercase">
										<?php echo $this->pageTitle; ?> </span>

        <?php // echo Yii::app()->user->id; ?>
        <span class="caption-helper"></span>
    </div>





    <div class="actions btn-set">
        <?php $this->widget('booster.widgets.TbButtonAwesome', array(
            'buttonType' => 'button',
            'htmlOptions' => array('class' => 'btn-default btn-circle', 'onclick' => 'js:history.go(-1)'),
            'label'=>'Volver',
            'icon' => 'chevron-left'

        )); ?>

<!--        --><?php /*$this->widget('booster.widgets.TbButtonAwesome', array(
            'buttonType' => 'button',
            'context'=>'primary',
            'htmlOptions' => array('class' => 'search-button grey btn-circle'),
            'label'=>'Filtros',
            'icon' => 'filter'

        )); */?>


<?php /*$this->widget('booster.widgets.TbButtonAwesome', array(
            'buttonType' => 'button',
            'context'=>'primary',
            'htmlOptions' => array(
                'class' => 'green btn-circle bulk-actions-btn disabled',
                'rel' => $this->createUrl($controlador.'/PublicarChecked'),
            ),
            'label'=>'Publicar',
            'icon' => 'check-square',
            'id' => 'publicar',

        )); */?>




        <?php
        $this->widget(
            'booster.widgets.TbButtonGroupAwesome',
            array(
                //   'size' => 'large',
                'context' => 'primary',
                'buttons' => array(
                    array(
                        'label' => 'Más',
                        'items' => $menuMas,
                        'icon' => 'share',
                        'htmlOptions' => array('class' => 'blue-steel btn-circle'),
                        'dropdownOptions' => array('class' => 'dropdown-menu pull-right'),

                    ),
                ),
            )
        );
        ?>
    </div>
</div>



<div class="portlet-body">
<?php $this->widget('booster.widgets.TbExtendedGridView',array(
'id'=>'necesidades-grid',
'fixedHeader' => true,
'headerOffset' => 40,
// 40px is the height of the main navigation at bootstrap
'type' => 'striped',
//'responsiveTable' => true,
'template' => "{items}",
'dataProvider'=>$model->searchfiltada(),
'columns'=>array(
		'idNecesidades',
		'Titulo',
        'categorias.Nombre_Categoria',
		'Descripcion',
),
));


?>
</div>