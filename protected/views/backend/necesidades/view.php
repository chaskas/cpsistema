<?php
$this->breadcrumbs=array(
	'Necesidades'=>array('index'),
	$model->idNecesidades,
);

$this->menu=array(
array('label'=>'List Necesidades','url'=>array('index')),
array('label'=>'Create Necesidades','url'=>array('create')),
array('label'=>'Update Necesidades','url'=>array('update','id'=>$model->idNecesidades)),
array('label'=>'Delete Necesidades','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idNecesidades),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Necesidades','url'=>array('admin')),
);
?>

<h1>View Necesidades #<?php echo $model->idNecesidades; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'idNecesidades',
		'Titulo',
		'Descripcion',
		'Resuelta',
		'Publicada',
		'Categorias_idCategorias',
		'cruge_userr_id',
),
)); ?>
