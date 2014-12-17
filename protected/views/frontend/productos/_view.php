<?php
/* @var $this ProductosController */
/* @var $data Productos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idProductos')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idProductos), array('view', 'id'=>$data->idProductos)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Codigo')); ?>:</b>
	<?php echo CHtml::encode($data->Codigo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre_Producto')); ?>:</b>
	<?php echo CHtml::encode($data->Nombre_Producto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->Descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Marca')); ?>:</b>
	<?php echo CHtml::encode($data->Marca); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Modelo')); ?>:</b>
	<?php echo CHtml::encode($data->Modelo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CodModelo')); ?>:</b>
	<?php echo CHtml::encode($data->CodModelo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Tamano')); ?>:</b>
	<?php echo CHtml::encode($data->Tamano); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Capacidad')); ?>:</b>
	<?php echo CHtml::encode($data->Capacidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TiempoDespacho')); ?>:</b>
	<?php echo CHtml::encode($data->TiempoDespacho); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Stock')); ?>:</b>
	<?php echo CHtml::encode($data->Stock); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('URLCatalogo')); ?>:</b>
	<?php echo CHtml::encode($data->URLCatalogo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PrecioNormal')); ?>:</b>
	<?php echo CHtml::encode($data->PrecioNormal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PedMin')); ?>:</b>
	<?php echo CHtml::encode($data->PedMin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Visitado')); ?>:</b>
	<?php echo CHtml::encode($data->Visitado); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('EstadoStock_id')); ?>:</b>
	<?php echo CHtml::encode($data->EstadoStock_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cruge_user_Prov_id')); ?>:</b>
	<?php echo CHtml::encode($data->cruge_user_Prov_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Categorias_id')); ?>:</b>
	<?php echo CHtml::encode($data->Categorias_id); ?>
	<br />

	*/ ?>

</div>