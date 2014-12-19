<?php
$this->breadcrumbs=array(
	'Cotizacions'=>array('index'),
	$model->idCotizacion,
);

$this->menu=array(
array('label'=>'List Cotizacion','url'=>array('index')),
array('label'=>'Create Cotizacion','url'=>array('create')),
array('label'=>'Update Cotizacion','url'=>array('update','id'=>$model->idCotizacion)),
array('label'=>'Delete Cotizacion','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idCotizacion),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Cotizacion','url'=>array('admin')),
);
?>

<h1>View Cotizacion #<?php echo $model->idCotizacion; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'idCotizacion',
		'FechaCreacion',
		'FechaRevalidacion',
		'FechaVenc',
		'cruge_user_iduser',
		'cruge_user_idprov',
),
)); ?>
