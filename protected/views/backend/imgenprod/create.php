<?php
$this->breadcrumbs=array(
	'Imgenprods'=>array('admin'),
	'Nuevo',
);

$this->menu=array(
array('label'=>'List Imgenprod','url'=>array('index')),
array('label'=>'Manage Imgenprod','url'=>array('admin')),
);
?>

<div class="portlet-title"><h1>Nuevo Imgenprod</h1></div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>