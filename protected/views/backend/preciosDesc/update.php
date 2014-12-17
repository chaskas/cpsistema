<?php
$this->breadcrumbs=array(
	'Precios Descs'=>array('index'),
	$model->idPreciosDesc=>array('view','id'=>$model->idPreciosDesc),
	'Update',
);

	$this->menu=array(
	array('label'=>'List PreciosDesc','url'=>array('index')),
	array('label'=>'Create PreciosDesc','url'=>array('create')),
	array('label'=>'View PreciosDesc','url'=>array('view','id'=>$model->idPreciosDesc)),
	array('label'=>'Manage PreciosDesc','url'=>array('admin')),
	);
	?>

	<h1>Update PreciosDesc <?php echo $model->idPreciosDesc; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>