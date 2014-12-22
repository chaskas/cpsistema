<?php
/* @var $this OrdencompraHasProductosController */
/* @var $data OrdencompraHasProductos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idOrdenProductos')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idOrdenProductos), array('view', 'id'=>$data->idOrdenProductos)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OrdenCompra_id')); ?>:</b>
	<?php echo CHtml::encode($data->OrdenCompra_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Productos_id')); ?>:</b>
	<?php echo CHtml::encode($data->Productos_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->Cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PrecioUnitario')); ?>:</b>
	<?php echo CHtml::encode($data->PrecioUnitario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TiempoDespacho')); ?>:</b>
	<?php echo CHtml::encode($data->TiempoDespacho); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TipoDescId')); ?>:</b>
	<?php echo CHtml::encode($data->TipoDescId); ?>
	<br />


</div>