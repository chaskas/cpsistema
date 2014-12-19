<?php
$this->breadcrumbs=array(
	'Evaluacionprs'=>array('index'),
	$model->idEvaluacionPr=>array('view','id'=>$model->idEvaluacionPr),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Evaluacionpr','url'=>array('index')),
	array('label'=>'Create Evaluacionpr','url'=>array('create')),
	array('label'=>'View Evaluacionpr','url'=>array('view','id'=>$model->idEvaluacionPr)),
	array('label'=>'Manage Evaluacionpr','url'=>array('admin')),
	);
	?>

	<h1>Update Evaluacionpr <?php echo $model->idEvaluacionPr; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>