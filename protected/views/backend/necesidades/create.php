<?php
$this->breadcrumbs=array(
	'Necesidades'=>array('admin'),
	'Nuevo',
);

$this->menu=array(
array('label'=>'List Necesidades','url'=>array('index')),
array('label'=>'Manage Necesidades','url'=>array('admin')),
);
?>

<div class="portlet-title"><h1>Nuevo Necesidades</h1></div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>