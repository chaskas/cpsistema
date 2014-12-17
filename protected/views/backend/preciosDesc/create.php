<?php
$this->breadcrumbs=array(
	'Precios Descs'=>array('admin'),
	'Nuevo',
);

$this->menu=array(
array('label'=>'List PreciosDesc','url'=>array('index')),
array('label'=>'Manage PreciosDesc','url'=>array('admin')),
);
?>

<div class="portlet-title"><h1>Nuevo PreciosDesc</h1></div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>