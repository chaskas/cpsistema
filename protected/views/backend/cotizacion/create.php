<?php
$this->breadcrumbs=array(
	'Cotizacions'=>array('admin'),
	'Nuevo',
);

$this->menu=array(
array('label'=>'List Cotizacion','url'=>array('index')),
array('label'=>'Manage Cotizacion','url'=>array('admin')),
);
?>

<div class="portlet-title"><h1>Nuevo Cotizacion</h1></div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>