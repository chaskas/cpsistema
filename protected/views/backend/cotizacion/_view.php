<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('idCotizacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCotizacion),array('view','id'=>$data->idCotizacion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaCreacion')); ?>:</b>
	<?php echo CHtml::encode($data->FechaCreacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaRevalidacion')); ?>:</b>
	<?php echo CHtml::encode($data->FechaRevalidacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaVenc')); ?>:</b>
	<?php echo CHtml::encode($data->FechaVenc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cruge_user_iduser')); ?>:</b>
	<?php echo CHtml::encode($data->cruge_user_iduser); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cruge_user_idprov')); ?>:</b>
	<?php echo CHtml::encode($data->cruge_user_idprov); ?>
	<br />


</div>