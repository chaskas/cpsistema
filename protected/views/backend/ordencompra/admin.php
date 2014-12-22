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
        <i class="fa fa-reorder"></i>
										<span class="caption-subject bold uppercase">
										<?php echo $this->pageTitle; ?> </span>
       <span class="caption-helper"></span>
    </div>





   <div class="actions btn-set">
        <?php $this->widget('booster.widgets.TbButtonAwesome', array(
            'buttonType' => 'button',
            'htmlOptions' => array('class' => 'btn-default btn-circle', 'onclick' => 'js:history.go(-1)'),
            'label'=>'Volver',
            'icon' => 'chevron-left'

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
        'template' => "{summary}\n{items}\n{pager}\n{extendedSummary}",
        'bulkActions' => array(
            'actionButtons' => array(

            ),
            'checkBoxColumnConfig' => array(
                'name' => 'idProductos'
            ),
        ),

        'columns' => array(

            array(
                'name'=>'idOrdenCompra',
                'headerHtmlOptions' => array('style' => 'width:80px; text-align:center;'),
            ),

            array(
                'name'=>'FechaCreacion',
                'value'=>"Yii::app()->dateFormatter->formatDateTime(\$data->FechaCreacion, 'medium','')",
                'headerHtmlOptions' => array('style' => 'width:100px'),
            ),
            'Empresa',
            array(
                'class' => 'booster.widgets.TbToggleOneColumn',
                'toggleAction' => $controlador.'/toggle',
                'name' => 'Estado_Facturacion',
                'headerHtmlOptions' => array('style' => 'width:150px;text-align: center;'),
                'checkedIcon' => 'check-square-o',
                'uncheckedIcon' => 'square-o',
                'htmlOptions' => array('id' => 'testing'),
                'checkedButtonLabel' => 'No se Puede deshacer',
                'uncheckedButtonLabel' => 'Marcar Como Facturado  (No se puede deshacer)',
                'url' => $this->createUrl($controlador.'/editableSaver'),
            ),


            array(
                'name' => 'opcionesPago.OpcionesPago_Nomb',
                'header' => 'Forma de Pago'

            ),
            array(
                'name' => 'EstadoOC_id',
                'class' => 'booster.widgets.TbEditableColumn',
                'headerHtmlOptions' => array('style' => 'min-width:50px;'),
                'filter' => false,
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl($controlador.'/editableSaver'),
                    'source' => CHtml::listData(Estadooc::model()->findAll('idEstadoOC<>:id', array(':id'=>1)),'idEstadoOC' ,'Nombre_Estado'),
                    'name' => 'EstadoOC_id',
                    'title' => 'Seleccionar Estado',
                    'emptytext' => 'Pendiente',
                )
            ),
            array (
                'name'=>'Total',
                'value' =>'"$ ".number_format ($data->Total,0,",","." )',
            ),

            array(
                'class' => 'booster.widgets.TbEvalColumn',
                'toggleAction' => $controlador.'/toggle',
                'name' => 'eval',
                'header' => 'Evaluación',
                'headerHtmlOptions' => array('style' => 'width:150px;text-align: center;'),
                //'htmlOptions' => array('id' => 'testing'),
                'url' => $this->createUrl('/editableSaver'),
            ),


            array(
                'htmlOptions' => array('style' => 'width:150px;text-align: center;'),
                'class' => 'booster.widgets.TbButtonColumnAwesome',
                'template' => '{view}',
                'buttons' => array(
                    'view' => array(
                        'label' => 'Ver Orden',
                        'icon'=> 'binoculars',
                        'options' => array(
                            'class' => 'btn btn-small',
                        ),

                    ) ,
                )
            ),


        ),
    ));




  //  $this->widget('CStarRating',array('name'=>'rating'));  ?>
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
