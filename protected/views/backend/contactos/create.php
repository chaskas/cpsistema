<?php
$this->breadcrumbs=array(
	'Contactoses'=>array('admin'),
	'Nuevo',
);

$this->menu=array(
array('label'=>'List Contactos','url'=>array('index')),
array('label'=>'Manage Contactos','url'=>array('admin')),
);
?>

<div class="portlet-title"><h1>Nuevo Contactos</h1></div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>