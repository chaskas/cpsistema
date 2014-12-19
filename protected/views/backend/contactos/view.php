<?php
$this->breadcrumbs=array(
	'Contactoses'=>array('index'),
	$model->idContactos,
);

$this->menu=array(
array('label'=>'List Contactos','url'=>array('index')),
array('label'=>'Create Contactos','url'=>array('create')),
array('label'=>'Update Contactos','url'=>array('update','id'=>$model->idContactos)),
array('label'=>'Delete Contactos','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idContactos),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Contactos','url'=>array('admin')),
);
?>

<h1>View Contactos #<?php echo $model->idContactos; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'idContactos',
		'Asunto',
		'Mensaje',
		'Leido',
		'Atendido',
		'Creado',
		'cruge_user_Prov_id',
		'cruge_user_Empr_id',
),
)); ?>
