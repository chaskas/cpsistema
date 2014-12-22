<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('idNecesidades')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idNecesidades),array('view','id'=>$data->idNecesidades)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Titulo')); ?>:</b>
	<?php echo CHtml::encode($data->Titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->Descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Resuelta')); ?>:</b>
	<?php echo CHtml::encode($data->Resuelta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Publicada')); ?>:</b>
	<?php echo CHtml::encode($data->Publicada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Categorias_idCategorias')); ?>:</b>
	<?php echo CHtml::encode($data->Categorias_idCategorias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cruge_userr_id')); ?>:</b>
	<?php echo CHtml::encode($data->cruge_userr_id); ?>
	<br />


</div>