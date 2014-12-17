<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('idPreciosDesc')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPreciosDesc),array('view','id'=>$data->idPreciosDesc)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaIni')); ?>:</b>
	<?php echo CHtml::encode($data->FechaIni); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaFin')); ?>:</b>
	<?php echo CHtml::encode($data->FechaFin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CantMin')); ?>:</b>
	<?php echo CHtml::encode($data->CantMin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CantMax')); ?>:</b>
	<?php echo CHtml::encode($data->CantMax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Precio')); ?>:</b>
	<?php echo CHtml::encode($data->Precio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Productos_id')); ?>:</b>
	<?php echo CHtml::encode($data->Productos_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('TipoDesc_id')); ?>:</b>
	<?php echo CHtml::encode($data->TipoDesc_id); ?>
	<br />

	*/ ?>

</div>