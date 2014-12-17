<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('idImgP')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idImgP),array('view','id'=>$data->idImgP)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ruta')); ?>:</b>
	<?php echo CHtml::encode($data->Ruta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Orden')); ?>:</b>
	<?php echo CHtml::encode($data->Orden); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Productos_id')); ?>:</b>
	<?php echo CHtml::encode($data->Productos_id); ?>
	<br />


</div>