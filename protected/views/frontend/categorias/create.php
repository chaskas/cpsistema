<?php
/* @var $this CategoriasController */
/* @var $model Categorias */

$this->breadcrumbs=array(
	'Categorias'=>array('index'),
	'Nuevas',
);

$this->menu=array(
	array('label'=>'List Categorias', 'url'=>array('index')),
	array('label'=>'Manage Categorias', 'url'=>array('admin')),
);
?>

    <h1>Create Categorias</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>