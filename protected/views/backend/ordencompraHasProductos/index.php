<?php
/* @var $this OrdencompraHasProductosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ordencompra Has Productoses',
);

$this->menu=array(
	array('label'=>'Create OrdencompraHasProductos', 'url'=>array('create')),
	array('label'=>'Manage OrdencompraHasProductos', 'url'=>array('admin')),
);
?>

<h1>Ordencompra Has Productoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
