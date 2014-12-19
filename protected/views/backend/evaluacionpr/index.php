<?php
$this->breadcrumbs=array(
	'Evaluacionprs',
);

$this->menu=array(
array('label'=>'Create Evaluacionpr','url'=>array('create')),
array('label'=>'Manage Evaluacionpr','url'=>array('admin')),
);
?>

<h1>Evaluacionprs</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
