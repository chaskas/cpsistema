<?php
$this->breadcrumbs=array(
	'Tipodescs'=>array('admin'),
	'Nuevo',
);

$this->menu=array(
array('label'=>'List Tipodesc','url'=>array('index')),
array('label'=>'Manage Tipodesc','url'=>array('admin')),
);
?>

<div class="portlet-title"><h1>Nuevo Tipodesc</h1></div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>