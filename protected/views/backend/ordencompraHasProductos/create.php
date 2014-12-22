<?php
/* @var $this OrdencompraHasProductosController */
/* @var $model OrdencompraHasProductos */

$this->breadcrumbs=array(
	'Ordencompra Has Productoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OrdencompraHasProductos', 'url'=>array('index')),
	array('label'=>'Manage OrdencompraHasProductos', 'url'=>array('admin')),
);
?>

<h1>Create OrdencompraHasProductos</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>