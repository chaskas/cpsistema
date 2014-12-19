<?php
$this->breadcrumbs=array(
	'Ordencompras',
);

$this->menu=array(
array('label'=>'Create Ordencompra','url'=>array('create')),
array('label'=>'Manage Ordencompra','url'=>array('admin')),
);
?>

<h1>Ordencompras</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
