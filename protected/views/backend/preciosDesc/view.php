<?php
$this->breadcrumbs=array(
	'Precios Descs'=>array('index'),
	$model->idPreciosDesc,
);

$this->menu=array(
array('label'=>'List PreciosDesc','url'=>array('index')),
array('label'=>'Create PreciosDesc','url'=>array('create')),
array('label'=>'Update PreciosDesc','url'=>array('update','id'=>$model->idPreciosDesc)),
array('label'=>'Delete PreciosDesc','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idPreciosDesc),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage PreciosDesc','url'=>array('admin')),
);
?>

<h1>View PreciosDesc #<?php echo $model->idPreciosDesc; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'idPreciosDesc',
		'FechaIni',
		'FechaFin',
		'CantMin',
		'CantMax',
		'Precio',
		'Productos_id',
		'TipoDesc_id',
),
)); ?>
