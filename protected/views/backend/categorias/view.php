<?php
/* @var $this CategoriasController */
/* @var $model Categorias */
?>

<?php
$this->breadcrumbs=array(
	'Categorias'=>array('admin'),
	$model->Nombre_Categoria,
);

$this->menu=array(
	array('label'=>'List Categorias', 'url'=>array('index')),
	array('label'=>'Create Categorias', 'url'=>array('create')),
	array('label'=>'Update Categorias', 'url'=>array('update', 'id'=>$model->idCategorias)),
	array('label'=>'Delete Categorias', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idCategorias),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Categorias', 'url'=>array('admin')),
);
?>

<h1>View Categorias #<?php echo $model->idCategorias; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'idCategorias',
		'Nombre_Categoria',
		'Orden',
		'Publicado',
		'Borrado',
		'Creado',
		'Actualizado',
		'Categorias_Parent_id',
	),
)); ?>