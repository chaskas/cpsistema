<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('idOrdenCompra')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idOrdenCompra),array('view','id'=>$data->idOrdenCompra)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaCreacion')); ?>:</b>
	<?php echo CHtml::encode($data->FechaCreacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Estado_Facturacion')); ?>:</b>
	<?php echo CHtml::encode($data->Estado_Facturacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Numero_Factura')); ?>:</b>
	<?php echo CHtml::encode($data->Numero_Factura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Estado_Pago')); ?>:</b>
	<?php echo CHtml::encode($data->Estado_Pago); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OpcionesPago_id')); ?>:</b>
	<?php echo CHtml::encode($data->OpcionesPago_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cruge_user_Prov_id')); ?>:</b>
	<?php echo CHtml::encode($data->cruge_user_Prov_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('cruge_user_Empr_id')); ?>:</b>
	<?php echo CHtml::encode($data->cruge_user_Empr_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EstadoOC_id')); ?>:</b>
	<?php echo CHtml::encode($data->EstadoOC_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('InfoDespacho_id')); ?>:</b>
	<?php echo CHtml::encode($data->InfoDespacho_id); ?>
	<br />

	*/ ?>

</div>