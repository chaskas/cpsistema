<?php
$this->breadcrumbs=array(
	'Precios Descs',
);

$this->menu=array(
array('label'=>'Create PreciosDesc','url'=>array('create')),
array('label'=>'Manage PreciosDesc','url'=>array('admin')),
);
?>

<h1>Precios Descs</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
