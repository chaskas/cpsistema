<?php
/* @var $this OrdencompraHasProductosController */
/* @var $model OrdencompraHasProductos */

$this->breadcrumbs=array(
	'Ordencompra Has Productoses'=>array('index'),
	$model->idOrdenProductos,
);

$this->menu=array(
	array('label'=>'List OrdencompraHasProductos', 'url'=>array('index')),
	array('label'=>'Create OrdencompraHasProductos', 'url'=>array('create')),
	array('label'=>'Update OrdencompraHasProductos', 'url'=>array('update', 'id'=>$model->idOrdenProductos)),
	array('label'=>'Delete OrdencompraHasProductos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idOrdenProductos),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrdencompraHasProductos', 'url'=>array('admin')),
);
?>

<h1>View OrdencompraHasProductos #<?php echo $model->idOrdenProductos; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idOrdenProductos',
		'OrdenCompra_id',
		'Productos_id',
		'Cantidad',
		'PrecioUnitario',
		'TiempoDespacho',
		'TipoDescId',
	),
)); ?>
