<?php


//$data = OrdencompraHasProductos::model()->findAll('OrdenCompra_id = :ocid', array(':ocid' => ));

$data = OrdencompraHasProductos::model()->searchbyocid($model->idOrdenCompra);


$this->widget('booster.widgets.TbExtendedGridView', array(
        'fixedHeader' => true,
        'id' => Yii::app()->controller->id.'-grid',
        'headerOffset' => 10,
        'type' => 'striped',
        'responsiveTable' => true,
        'dataProvider' => $data,
        'template' => "{items}\n{extendedSummary}",
        'columns' => array(
            array(
                'name'=> 'productos',
                'header'=>'Código',
                'value'=> '$data->productos->Codigo'
            ),
            array(
                'name'=> 'productos',
                'header'=>'Descripción',
                'value'=> '$data->productos->Nombre_Producto',
                'headerHtmlOptions' => array('style' => 'min-width:200px;'),
            ),
            'Cantidad',
            array('name'=> 'productos',
                'header'=>'Precio Unitario',
                'type' => 'raw',
                'value'=> '"<i class=\"fa fa-usd\" style=\"font-size: small\"></i> ".number_format($data->PrecioUnitario,0,",","." )'),
            array(
                'name'=> 'total',
                'header'=>'Total',
                'type' => 'raw',
                'value'=> '"<i class=\"fa fa-usd\" style=\"font-size: small\"></i> ".number_format($data->Cantidad*$data->PrecioUnitario,0,",","." )'
            ),
    ))
);
$Neto=0;
$sumario = OrdencompraHasProductos::model()->findAll('OrdenCompra_id = :ocid',array(':ocid' =>$model->idOrdenCompra));


foreach ($sumario as $sum) {

    $Neto = ($sum->Cantidad * $sum->PrecioUnitario ) + $Neto;
}?>
<div class="row">
    <div class="col-md-8">
    </div>
    <div class="col-md-4">
        <div class="well">
            <div class="row static-info align-reverse">
                <div class="col-md-8 name">
                    Sub Total:
                </div>
                <div class="col-md-3 value">
                    <?php echo "<i class=\"fa fa-usd\" style=\"font-size: small\"></i> ".number_format($Neto,0,",","." );?>
                </div>
            </div>

            <div class="row static-info align-reverse">
                <div class="col-md-8 name">
                    I.V.A.(<?php echo $this->iva * 100;?>) %
                </div>
                <div class="col-md-3 value">
                    <?php echo "<i class=\"fa fa-usd\" style=\"font-size: small\"></i> ".number_format( $Neto * $this->iva,0,",","." );?>
                </div>
            </div>
            <div class="row static-info align-reverse">
                <div class="col-md-8 name">
                    Total:
                </div>
                <div class="col-md-3 value">
                    <?php echo "<i class=\"fa fa-usd\" style=\"font-size: small\"></i> ".number_format(($Neto * $this->iva) + $Neto,0,",","." );?>
                </div>
            </div>
        </div>
    </div>
</div>
