<?php
/* @var $this CategoriasController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Categorías',
);

$this->menu=array(
	array('label'=>'Create Categorias','url'=>array('create')),
	array('label'=>'Manage Categorias','url'=>array('admin')),
);
?>

<h1>Categorias</h1>

<?php $this->widget('booster.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>