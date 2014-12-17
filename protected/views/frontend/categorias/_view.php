<?php
/* @var $this CategoriasController */
/* @var $data Categorias */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCategorias')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCategorias), array('view', 'id'=>$data->idCategorias)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre_Categoria')); ?>:</b>
	<?php echo CHtml::encode($data->Nombre_Categoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Orden')); ?>:</b>
	<?php echo CHtml::encode($data->Orden); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Publicado')); ?>:</b>
	<?php echo CHtml::encode($data->Publicado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Borrado')); ?>:</b>
	<?php echo CHtml::encode($data->Borrado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Creado')); ?>:</b>
	<?php echo CHtml::encode($data->Creado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Actualizado')); ?>:</b>
	<?php echo CHtml::encode($data->Actualizado); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Categorias_Parent_id')); ?>:</b>
	<?php echo CHtml::encode($data->Categorias_Parent_id); ?>
	<br />

	*/ ?>

</div>