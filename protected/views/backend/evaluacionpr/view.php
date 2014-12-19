<?php
$this->breadcrumbs=array(
	'Evaluacionprs'=>array('index'),
	$model->idEvaluacionPr,
);

$this->menu=array(
array('label'=>'List Evaluacionpr','url'=>array('index')),
array('label'=>'Create Evaluacionpr','url'=>array('create')),
array('label'=>'Update Evaluacionpr','url'=>array('update','id'=>$model->idEvaluacionPr)),
array('label'=>'Delete Evaluacionpr','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idEvaluacionPr),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Evaluacionpr','url'=>array('admin')),
);
?>

<h1>View Evaluacionpr #<?php echo $model->idEvaluacionPr; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'idEvaluacionPr',
		'TiempoRespuesta',
		'TiempoEnvio',
		'CalidadProd',
		'TiempoFact',
		'Comentario',
		'Respuesta',
		'OrdenCompra_id',
),
)); ?>
