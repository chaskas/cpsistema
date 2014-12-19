<?php
$this->breadcrumbs=array(
	'Contactoses',
);

$this->menu=array(
array('label'=>'Create Contactos','url'=>array('create')),
array('label'=>'Manage Contactos','url'=>array('admin')),
);
?>

<h1>Contactoses</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
