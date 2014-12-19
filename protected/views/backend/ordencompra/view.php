<?php
$this->breadcrumbs=array(
	'Ordencompras'=>array('index'),
	$model->idOrdenCompra,
);

$this->menu=array(
array('label'=>'List Ordencompra','url'=>array('index')),
array('label'=>'Create Ordencompra','url'=>array('create')),
array('label'=>'Update Ordencompra','url'=>array('update','id'=>$model->idOrdenCompra)),
array('label'=>'Delete Ordencompra','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idOrdenCompra),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Ordencompra','url'=>array('admin')),
);
?>

<h1>View Ordencompra #<?php echo $model->idOrdenCompra; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'idOrdenCompra',
		'FechaCreacion',
		'Estado_Facturacion',
		'Numero_Factura',
		'Estado_Pago',
		'OpcionesPago_id',
		'cruge_user_Prov_id',
		'cruge_user_Empr_id',
		'EstadoOC_id',
		'InfoDespacho_id',
),
)); ?>
