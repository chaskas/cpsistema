<?php
/* @var $this ProductosController */
/* @var $model Productos */

$controlador = Yii::app()->controller->id;
$this->breadcrumbs=array(
    'Ordenes de Compra'=>array('index'),
    'Administrar'

);
$this->pageTitle = 'Administrar Ordenes De Compra';
$menuMas=array(
);

Yii::app()->clientScript->registerScript($controlador, "
    $('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
    });
    $('.search-form form').submit(function(){
    $.fn.yiiGridView.update('".$controlador."-grid', {
    data: $(this).serialize()
    });
    return false;
    });

    $('.limpiar').click(function() {
    $(this).closest('form').find('input[type=text], select').val('');
    $( '.search-form form' ).submit();
    });

    $.fn.yiiGridView.initBulkActions('".$controlador."-portlet');

");
?>

<?php
Yii::app()->clientScript->registerScript('bulk',"$(document).on('click','button.bulk-actions-btn' , function() {

	 var checked = $.fn.yiiGridView.getCheckedRowsIds('".$controlador."-grid');
     var values = checked.join();
     var rel = jQuery(this).attr('rel');
     console.log(values);
     if (!checked.length) {
         alert('Debe seleccionar al menos 1 elemento');
         return false;
     }
    console.log(rel);
    console.log(values);
    $.ajax({
      url: rel,
      type: 'POST',
      data: {ids:values},
      success:function(response){
        $('#".$controlador."-grid').yiiGridView('update');
      }
    });
});

");

?>


<div class="portlet-title">

    <div class="caption">
        <i class="fa fa-dropbox"></i>
										<span class="caption-subject bold uppercase">
										<?php echo $this->pageTitle; ?> </span>

        <?php  //echo Yii::app()->user->id; ?>
        <span class="caption-helper"></span>
    </div>





    <div class="actions btn-set">
        <?php $this->widget('booster.widgets.TbButtonAwesome', array(
            'buttonType' => 'button',
            'htmlOptions' => array('class' => 'btn-default btn-circle', 'onclick' => 'js:history.go(-1)'),
            'label'=>'Volver',
            'icon' => 'chevron-left'

        )); ?>

        <?php $this->widget('booster.widgets.TbButtonAwesome', array(
            'buttonType' => 'button',
            'context'=>'primary',
            'htmlOptions' => array('class' => 'search-button grey btn-circle'),
            'label'=>'Filtros',
            'icon' => 'filter'

        )); ?>


        <?php $this->widget('booster.widgets.TbButtonAwesome', array(
            'buttonType' => 'link',
            'context'=>'primary',
            'htmlOptions' => array('class' => 'green-seagreen btn-circle'),
            'label'=>'Nuevo',
            'icon' => 'plus-square',
            'url' =>  $this->createUrl($controlador.'/create'),

        )); ?>


        <?php $this->widget('booster.widgets.TbButtonAwesome', array(
            'buttonType' => 'button',
            'context'=>'primary',
            'htmlOptions' => array(
                'class' => 'green btn-circle bulk-actions-btn disabled',
                'rel' => $this->createUrl($controlador.'/PublicarChecked'),
            ),
            'label'=>'Publicar',
            'icon' => 'check-square',
            'id' => 'publicar',

        )); ?>

        <?php $this->widget('booster.widgets.TbButtonAwesome', array(
            'buttonType' => 'button',
            'context'=>'primary',
            'htmlOptions' => array(
                'class' => 'bulk-actions-btn red-thunderbird btn-circle disabled',
                'rel' => $this->createUrl($controlador.'/DespublicarChecked')
            ),
            'label'=>'Despublicar',
            'icon' => 'times',
            'id'=>'despublicar',

        )); ?>



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

<div class="search-form" style="display:none">
    <!--<div class="search-form">-->
    <?php $this->renderPartial('_search', array(
        'model' => $model,
    )); ?>
</div><!-- search-form -->

<div class="portlet-body">

    <?php
    $dataProvider = $model->search();
    $dataProvider->pagination = array('pageSize'=>20);

    $this->widget('booster.widgets.TbExtendedGridView', array(
        'fixedHeader' => true,
        'id' =>$controlador.'-grid',
        'headerOffset' => 10,
        'type' => 'striped',
        'responsiveTable' => true,
        'dataProvider' => $dataProvider,
        'enablePagination' => true,
        'pager' => array(
            'header' => '',
            'htmlOptions' => array('class' => 'pagination'),
            'firstPageLabel' => 'Primero',
            'prevPageLabel' => 'Anterior',
            'nextPageLabel' => 'Siguiente',
            'lastPageLabel' => 'Último',
        ),
        //'sortableRows'=>true,
        //  'afterSortableUpdate' => 'js:function(id, position){ console.log("id: "+id+", position:"+position);}',
        // 'selectableCells'=>false,
        'selectableRows' => 2,
        'template' => "{summary}\n{items}\n{pager}\n{extendedSummary}",
        'bulkActions' => array(
            'actionButtons' => array(

            ),
            // if grid doesn't have a checkbox column type, it will attach
            // one and this configuration will be part of it
            'checkBoxColumnConfig' => array(
                'name' => 'idProductos'
            ),
        ),

        'columns' => array(

            'idOrdenCompra',

            array(
                'name'=>'FechaCreacion',
                'value'=>"Yii::app()->dateFormatter->formatDateTime(\$data->FechaCreacion, 'medium')",
            ),

            'cruge_user_Empr_id',
            'Estado_Facturacion',
            'OpcionesPago_id',
            'cruge_user_Prov_id',
            /* total */
            'EstadoOC_id',
            /*evaluacion*/


        ),
    ));




    ?>
</div>

<?php /*
'columns'=>array(

		'Estado_Facturacion',
		'Numero_Factura',
		'Estado_Pago',
		'OpcionesPago_id',
		/*
		'cruge_user_Prov_id',
		'cruge_user_Empr_id',
		'EstadoOC_id',
		'InfoDespacho_id',
		*/
