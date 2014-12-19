<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('idContactos')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idContactos),array('view','id'=>$data->idContactos)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Asunto')); ?>:</b>
	<?php echo CHtml::encode($data->Asunto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Mensaje')); ?>:</b>
	<?php echo CHtml::encode($data->Mensaje); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Leido')); ?>:</b>
	<?php echo CHtml::encode($data->Leido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Atendido')); ?>:</b>
	<?php echo CHtml::encode($data->Atendido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Creado')); ?>:</b>
	<?php echo CHtml::encode($data->Creado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cruge_user_Prov_id')); ?>:</b>
	<?php echo CHtml::encode($data->cruge_user_Prov_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('cruge_user_Empr_id')); ?>:</b>
	<?php echo CHtml::encode($data->cruge_user_Empr_id); ?>
	<br />

	*/ ?>

</div>