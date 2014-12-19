<?php
$this->breadcrumbs=array(
	'Cotizacions'=>array('index'),
	$model->idCotizacion=>array('view','id'=>$model->idCotizacion),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Cotizacion','url'=>array('index')),
	array('label'=>'Create Cotizacion','url'=>array('create')),
	array('label'=>'View Cotizacion','url'=>array('view','id'=>$model->idCotizacion)),
	array('label'=>'Manage Cotizacion','url'=>array('admin')),
	);
	?>

	<h1>Update Cotizacion <?php echo $model->idCotizacion; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>