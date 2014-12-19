<?php
$this->breadcrumbs=array(
	'Evaluacionprs'=>array('admin'),
	'Nuevo',
);

$this->menu=array(
array('label'=>'List Evaluacionpr','url'=>array('index')),
array('label'=>'Manage Evaluacionpr','url'=>array('admin')),
);
?>

<div class="portlet-title"><h1>Nuevo Evaluacionpr</h1></div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>