<?php
/* @var $this PreciosDescController */
/* @var $model PreciosDesc */


if (isset($_GET['id'])) {
   $p = Productos::model()->findByPk($_GET['id']);
$nombreproducto = ' de '.$p->Nombre_Producto;
$prodid = $_GET['id'];
} else {
$nombreproducto ="";
$prodid = "";
}


$controlador = Yii::app()->controller->id;
$this->breadcrumbs=array(
	'Productos'=>array('Productos/index'),
	'Administrar'
);



$this->pageTitle = 'Administrar Precios'.$nombreproducto;




if (isset($_GET['papelera'])) :

    $model->Borrado = 1;
    $this->pageTitle = 'Ver Precios Borrados'. $nombreproducto ;
    $menuMas=array(
    );
    $estilo ='bulk-actions-btn purple-studio btn-circle disabled';
    $ruta ='PreciosDesc/RestaurarChecked';
    $icono ='recycle';
    $etiqueta='Restaurar';

else :
    $model->Borrado = 0;
    $estilo ='bulk-actions-btn blue-ebonyclay btn-circle disabled';
    $ruta ='PreciosDesc/BorrarChecked';
    $icono ='trash';
    $etiqueta='Borrar';

    $menuMas=array(
        array('label'=>'Ver Papelera', 'url'=>array('admin&papelera', 'id' =>$prodid)),
    );
    Yii::app()->getClientScript()->registerScript('el',
        "jQuery(document).on('click','#".Yii::app()->controller->id."-grid span.fa-trash',function() {
             if(!confirm('¿Está seguro que desea borrar este elemento?')) return false;
        });

        jQuery(document).on('click','#papelera',function() {
             if(!confirm('¿Está seguro que desea borrar los elemento seleccionados?')) return false;
        });"
    );

endif;

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
        <span class="caption-helper"></span>
    </div>





    <div class="actions btn-set">
        <?php $this->widget('booster.widgets.TbButtonAwesome', array(
            'buttonType' => 'button',
            'htmlOptions' => array('class' => 'btn-default btn-circle', 'onclick' => 'js:history.go(-1)'),
            'label'=>'Volver',
            'icon' => 'chevron-left'

        )); ?>

        <?php /* $this->widget('booster.widgets.TbButtonAwesome', array(
            'buttonType' => 'button',
            'context'=>'primary',
            'htmlOptions' => array('class' => 'search-button grey btn-circle'),
            'label'=>'Filtros',
            'icon' => 'filter'

        ));*/ ?>


        <?php $this->widget('booster.widgets.TbButtonAwesome', array(
            'buttonType' => 'link',
            'context'=>'primary',
            'htmlOptions' => array('class' => 'green-seagreen btn-circle'),
            'label'=>'Nuevo',
            'icon' => 'plus-square',
            'url' =>  $this->createUrl($controlador.'/create',array('id' =>$prodid)),

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



        <?php $this->widget('booster.widgets.TbButtonAwesome', array(
            'buttonType' => 'button',
            'context'=>'primary',
            'htmlOptions' => array(
                'class' => $estilo,
                'rel' => $this->createUrl($ruta),
            ),
            'label'=>$etiqueta,
            'icon' => $icono,
            'id' => 'papelera',



        )); ?>
        <?php $this->widget('booster.widgets.TbButtonAwesome', array(
            'buttonType' => 'link',
            'context'=>'primary',
            'htmlOptions' => array('class' => 'red-flamingo btn-circle'),
            'label'=>'Cancelar',
            'icon' => 'ban',
            'url' =>  $this->createUrl('Productos/index'),


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
                'name' => 'idPreciosDesc'
            ),
        ),

        'columns' => array(

            'idPreciosDesc',
            array(
                'name'=>'FechaIni',
                'value'=>"Yii::app()->dateFormatter->formatDateTime(\$data->FechaIni, 'medium', 'short')",
            ),
            array(
                'name'=>'FechaFin',
                'value'=>"Yii::app()->dateFormatter->formatDateTime(\$data->FechaFin, 'medium', 'short')",
            ),
            'CantMin',
            'CantMax',
            'Precio',
            'TipoDesc_id',

            array(
                'htmlOptions' => array('style' => 'width:150px;text-align: center;'),
                'class' => 'booster.widgets.TbButtonColumnAwesome',
                'template' => '{update}',
                'buttons' => array(
                    'update' => array(
                        'label' => 'Editar Productos',
                        'icon'=> 'pencil-square',
                        'options' => array(
                            'class' => 'btn btn-small',
                        ),
                    ) ,


                )
            ),

            array(
                'class' => 'booster.widgets.TbToggleColumnAwesome',
                'toggleAction' => $controlador.'/toggle',
                'name' => 'Borrado',
                'headerHtmlOptions' => array('style' => 'width:10px'),
                'checkedIcon' => 'recycle',
                'uncheckedIcon' => 'trash',
                'header' => '',
                'checkedButtonLabel' => 'Restaurar',
                'uncheckedButtonLabel' => 'Eliminar'
            ),


        )
    ));


?>
</div>




<?php


/* $this->widget('booster.widgets.TbExtendedGridView',array(
'id'=>'precios-desc-grid',
'fixedHeader' => true,
'headerOffset' => 40,
// 40px is the height of the main navigation at bootstrap
'type' => 'striped',
//'responsiveTable' => true,
'template' => "{items}",
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'idPreciosDesc',
		'FechaIni',
		'FechaFin',
		'CantMin',
		'CantMax',
		'Precio',
		/*
		'Productos_id',
		'TipoDesc_id',
		*
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
));*/ ?>
