<?php
$this->breadcrumbs=array(
	'Necesidades'=>array('index'),
	$model->idNecesidades=>array('view','id'=>$model->idNecesidades),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Necesidades','url'=>array('index')),
	array('label'=>'Create Necesidades','url'=>array('create')),
	array('label'=>'View Necesidades','url'=>array('view','id'=>$model->idNecesidades)),
	array('label'=>'Manage Necesidades','url'=>array('admin')),
	);
	?>

	<h1>Update Necesidades <?php echo $model->idNecesidades; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>