<?php
/* @var $this ProductosController */
/* @var $model Productos */

$controlador = Yii::app()->controller->id;
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	'Administrar'

);
$this->pageTitle = 'Administrar Productos';

if (isset($_GET['papelera'])) :

    $model->Borrado = 1;
    $this->pageTitle = 'Administrar Productos Borrados';
    $menuMas=array(
    );
    $estilo ='bulk-actions-btn purple-studio btn-circle disabled';
    $ruta ='productos/RestaurarChecked';
    $icono ='recycle';
    $etiqueta='Restaurar';
else :

$model->Borrado = 0;
$estilo ='bulk-actions-btn blue-ebonyclay btn-circle disabled';
$ruta ='productos/BorrarChecked';
$icono ='trash';
$etiqueta='Borrar';

    $menuMas=array(
        array('label'=>'Ver Papelera', 'url'=>array('index&papelera')),
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
                'name' => 'idProductos'
            ),
        ),

        'columns' => array(

            'idProductos',
          //  'cruge_user_Prov_id',

            array(
                'name' => 'Nombre_Producto',
                'header' => 'Nombre Producto',
                'class' => 'booster.widgets.TbEditableColumn',
                'headerHtmlOptions' => array('style' => 'min-width:200px'),
                'editable' => array(
                    'type' => 'text',
                    'url' => $this->createUrl($controlador.'/editableSaver'),
                    'name' => 'Nombre_Producto',
                    'title' => 'Editar Nombre',
                    'validate' => 'js: function(value) {
                      if($.trim(value) == "") return "Este Campo no puede estar en blanco";}',

                )
            ),

            array(
                'name' => 'Categorias_id',
                'header' => 'Categoría',
                'class' => 'booster.widgets.TbEditableColumn',
                'headerHtmlOptions' => array('style' => 'min-width:150px;'),
                'filter' => false,
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl($controlador.'/editableSaver'),
                    'source' => CHtml::listData(Categorias::model()->findAll('Publicado=:p and Borrado=:b', array(':p'=>1,':b'=> 0)),'idCategorias' ,'Nombre_Categoria'),
                    'name' => 'Categorias_id',
                    'title' => 'Seleccionar Categoría',
                    //'emptytext' => 'Sin Padre'

                )
            ),

            array(
                'name' => 'PrecioNormal',
                'header' => 'Precio',
                'class' => 'booster.widgets.TbPrecioEditableColumn',
                'headerHtmlOptions' => array('style' => 'min-width:100px;text-align: center;'),
                'filter' => false,
                'editable' => array(
                    'type' => 'text',
                    'url' => $this->createUrl($controlador.'/editableSaver'),
                    'name' => 'PrecioNormal',
                    'title' => 'Editar Precio',
                    'htmlOptions' => array('style' => 'text-align:right'),
                    'validate' => 'js: function(value) {
                     if($.trim(value) == "") return "Este Campo no puede estar en blanco";}',
                    'display' => 'js: function(value, sourceData) {
                                     var escapedValue = $("<div>").text(value).html();
                                     var string = numeral(escapedValue).format(\'0,0\').replace(/,/g,".");
                                     $(this).html("<i class=\'fa fa-usd\' style=\'font-size: 12px;\'></i> <b>"+string+"</b>");}'
                )
            ),

            array(
                'htmlOptions' => array('style' => 'width:40px;text-align: left;'),
                'class' => 'booster.widgets.TbButtonColumnAwesome',
               // 'header' => '<i class="fa fa-fa-cubes"></i> ',
                'headerHtmlOptions' => array('style' => 'width:40px'),
                'template' => '{desc}',
                'buttons' => array(
                        'desc' => array(
                            'label' => 'Ver de Escdala y ofertas flash Avanzados',
                            'url'=>'Yii::app()->createUrl("PreciosDesc/index", array("pid"=>$data->primaryKey))',
                            'icon'=> 'search-plus',
                            'options' => array(
                                'class' => 'btn btn-small',
                            ),

                    ) ,
                )
            ),
            array(
                'name' => 'EstadoStock_id',
                'header' => 'Stock',
                'class' => 'booster.widgets.TbEditableColumn',
                'headerHtmlOptions' => array('style' => 'min-width:100px;'),
                'filter' => false,
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl($controlador.'/editableSaver'),
                    'source' => CHtml::listData(Estadostock::model()->findAll('Publicado=:p and Borrado=:b', array(':p'=>1,':b'=> 0)),'idEstadoStock' ,'Nombre_Estado'),
                    'name' => 'EstadoStock_id',
                    'title' => 'Seleccionar Estado',
                    'options'  => array(    //custom display
                        'display' => 'js: function(value, sourceData) {
                          var selected = $.grep(sourceData, function(o){ return value == o.value; }),
                              colors = {1: "green", 2: "red", 3: "purple", 4: "gray"};
                          $(this).text(selected[0].text).css("color", colors[value]);
                      }'

                    ),
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

        ),
    ));




?>
</div>
