<?php
$this->breadcrumbs=array(
	'Imgenprods'=>array('index'),
	$model->idImgP=>array('view','id'=>$model->idImgP),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Imgenprod','url'=>array('index')),
	array('label'=>'Create Imgenprod','url'=>array('create')),
	array('label'=>'View Imgenprod','url'=>array('view','id'=>$model->idImgP)),
	array('label'=>'Manage Imgenprod','url'=>array('admin')),
	);
	?>

	<h1>Update Imgenprod <?php echo $model->idImgP; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>