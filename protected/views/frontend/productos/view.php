<?php
/* @var $this ProductosController */
/* @var $model Productos */

$this->breadcrumbs=array(
	'Productoses'=>array('index'),
	$model->idProductos,
);

$this->menu=array(
	array('label'=>'List Productos', 'url'=>array('index')),
	array('label'=>'Create Productos', 'url'=>array('create')),
	array('label'=>'Update Productos', 'url'=>array('update', 'id'=>$model->idProductos)),
	array('label'=>'Delete Productos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idProductos),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Productos', 'url'=>array('admin')),
);
?>

<h1>View Productos #<?php echo $model->idProductos; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idProductos',
		'Codigo',
		'Nombre_Producto',
		'Descripcion',
		'Marca',
		'Modelo',
		'CodModelo',
		'Tamano',
		'Capacidad',
		'TiempoDespacho',
		'Stock',
		'URLCatalogo',
		'PrecioNormal',
		'PedMin',
		'Visitado',
		'Publicado',
		'Borrado',
		'Creado',
		'Actualizado',
		'EstadoStock_id',
		'cruge_user_Prov_id',
		'Categorias_id',
	),
)); ?>
