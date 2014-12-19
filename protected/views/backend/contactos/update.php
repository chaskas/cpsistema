<?php
$this->breadcrumbs=array(
	'Contactoses'=>array('index'),
	$model->idContactos=>array('view','id'=>$model->idContactos),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Contactos','url'=>array('index')),
	array('label'=>'Create Contactos','url'=>array('create')),
	array('label'=>'View Contactos','url'=>array('view','id'=>$model->idContactos)),
	array('label'=>'Manage Contactos','url'=>array('admin')),
	);
	?>

	<h1>Update Contactos <?php echo $model->idContactos; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>