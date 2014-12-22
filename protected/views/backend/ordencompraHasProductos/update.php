<?php
/* @var $this OrdencompraHasProductosController */
/* @var $model OrdencompraHasProductos */

$this->breadcrumbs=array(
	'Ordencompra Has Productoses'=>array('index'),
	$model->idOrdenProductos=>array('view','id'=>$model->idOrdenProductos),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrdencompraHasProductos', 'url'=>array('index')),
	array('label'=>'Create OrdencompraHasProductos', 'url'=>array('create')),
	array('label'=>'View OrdencompraHasProductos', 'url'=>array('view', 'id'=>$model->idOrdenProductos)),
	array('label'=>'Manage OrdencompraHasProductos', 'url'=>array('admin')),
);
?>

<h1>Update OrdencompraHasProductos <?php echo $model->idOrdenProductos; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>