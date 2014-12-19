<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('idEvaluacionPr')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idEvaluacionPr),array('view','id'=>$data->idEvaluacionPr)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TiempoRespuesta')); ?>:</b>
	<?php echo CHtml::encode($data->TiempoRespuesta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TiempoEnvio')); ?>:</b>
	<?php echo CHtml::encode($data->TiempoEnvio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CalidadProd')); ?>:</b>
	<?php echo CHtml::encode($data->CalidadProd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TiempoFact')); ?>:</b>
	<?php echo CHtml::encode($data->TiempoFact); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Comentario')); ?>:</b>
	<?php echo CHtml::encode($data->Comentario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Respuesta')); ?>:</b>
	<?php echo CHtml::encode($data->Respuesta); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('OrdenCompra_id')); ?>:</b>
	<?php echo CHtml::encode($data->OrdenCompra_id); ?>
	<br />

	*/ ?>

</div>