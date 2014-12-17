<?php
$this->breadcrumbs=array(
	'Imgenprods',
);

$this->menu=array(
array('label'=>'Create Imgenprod','url'=>array('create')),
array('label'=>'Manage Imgenprod','url'=>array('admin')),
);
?>

<h1>Imgenprods</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
