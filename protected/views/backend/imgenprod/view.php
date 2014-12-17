<?php
$this->breadcrumbs=array(
	'Imgenprods'=>array('index'),
	$model->idImgP,
);

$this->menu=array(
array('label'=>'List Imgenprod','url'=>array('index')),
array('label'=>'Create Imgenprod','url'=>array('create')),
array('label'=>'Update Imgenprod','url'=>array('update','id'=>$model->idImgP)),
array('label'=>'Delete Imgenprod','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idImgP),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Imgenprod','url'=>array('admin')),
);
?>

<h1>View Imgenprod #<?php echo $model->idImgP; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'idImgP',
		'Ruta',
		'Orden',
		'Productos_id',
),
)); ?>
