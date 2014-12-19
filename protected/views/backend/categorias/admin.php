<?php
/* @var $this CategoriasController */
/* @var $model Categorias */

$controlador = Yii::app()->controller->id;

$this->breadcrumbs = array(
'Categorías' => array('admin'),
'Administrar'

);
$this->pageTitle = 'Administrar Categorías';



if (isset($_GET['papelera'])) :

$model->Borrado = 1;
$this->pageTitle = 'Administrar Categorías Borradas';
$menuMas=array(
);
    $estilo ='bulk-actions-btn purple-studio btn-circle disabled';
    $ruta = $controlador.'/RestaurarChecked';
    $icono ='recycle';
    $etiqueta='Restaurar';




else :
$model->Borrado = 0;
 $estilo ='bulk-actions-btn blue-ebonyclay btn-circle disabled';
 $ruta =$controlador.'/BorrarChecked';
 $icono ='trash';
 $etiqueta='Borrar';

$menuMas=array(
array('label'=>'Ver Papelera', 'url'=>array('admin&papelera')),
);
 Yii::app()->getClientScript()->registerScript('el',
        "jQuery(document).on('click','#".$controlador."-grid span.fa-trash',function() {
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
        <i class="fa fa-sitemap"></i>
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
                           'name' => 'idCategorias'
                       ),
                   ),

        'columns' => array(
            array(
                'name' => 'Nombre_Categoria',
                'header' => 'Nombre Categoria',
                'class' => 'booster.widgets.TbEditableColumn',
                'headerHtmlOptions' => array('style' => 'min-width:200px'),
                'filter' => false,
                'editable' => array(
                    'type' => 'text',
                    'url' => $this->createUrl($controlador.'/editableSaver'),
                    'name' => 'Nombre_Categoria',
                    'title' => 'Editar Nombre',
                    'validate' => 'js: function(value) {
                      if($.trim(value) == "") return "Este Campo no puede estar en blanco";}'
                )
            ),
            array(
                'name' => 'Categorias_Parent_id',
                'header' => 'Categoria Padre',
                'class' => 'booster.widgets.TbEditableColumn',
                'headerHtmlOptions' => array('style' => 'min-width:150px;'),
                'filter' => false,
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl($controlador.'/editableSaver'),
                    'source' => 'js: function() {
                      var idCategorias = $(this).attr("data-pk");
                      return "?r=categorias/GetCategorias&id="+idCategorias;
                 }',
                    'name' => 'Categorias_Parent_id',
                    'title' => 'Seleccionar Categoria Padre',
                    'emptytext' => 'Sin Padre'

                )
            ),
            array(
                'class' => 'booster.widgets.TbToggleColumnAwesome',
                'toggleAction' => $controlador.'/toggle',
                'name' => 'Publicado',
                'headerHtmlOptions' => array('style' => 'width:100px;text-align: center;'),
                'checkedIcon' => 'check-circle',
                'uncheckedIcon' => 'times-circle',
                'header' => 'Publicado',

                'checkedButtonLabel' => 'Despublicar',
                'uncheckedButtonLabel' => 'Publicar'
            ),

            array(
                'name'=>'Actualizado',
                'value'=>"Yii::app()->dateFormatter->formatDateTime(\$data->Actualizado, 'medium', 'short')",
            ),

            array(
                'name'=>'Creado',
                'value'=>"Yii::app()->dateFormatter->formatDateTime(\$data->Creado, 'medium', 'short')",
            ),
            array(
                'htmlOptions' => array(),
                'class' => 'booster.widgets.TbButtonColumnAwesome',
                'template' => '{update}',
                'buttons' => array(
                    'update' => array(
                        'label' => 'Editar Categoria',
                        'icon'=> 'pencil-square',
                        'options' => array(
                            'class' => 'btn btn-small',
                        ),
                    ),
                ),
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
            array(
                'name' => 'idCategorias',
                'header' => 'ID',
                'headerHtmlOptions' => array('style' => 'width:45px'),

            ),
        ),
    )); ?>
</div>
