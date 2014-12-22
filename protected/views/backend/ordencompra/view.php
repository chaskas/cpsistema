<?php
$this->breadcrumbs=array(
	'Orden de compras'=>array('index'),
	'Orden #'.$model->idOrdenCompra,
);


$this->pageTitle = 'Orden # '.$model->idOrdenCompra;;

$usuario = Yii::app()->user->um->loadUserById($model->cruge_user_Empr_id,true);


$menuMas=array(
);
?>

<div class="portlet-title">

    <div class="caption">
        <i class="fa fa-bars"></i>
										<span class="caption-subject bold uppercase">
										<?php echo $this->pageTitle ?> </span>
        <span class="caption-helper"><?php echo Yii::app()->dateFormatter->formatDateTime($model->FechaCreacion, 'full', '');?> </span>
</div>

   <div class="actions btn-set">
        <?php $this->widget('booster.widgets.TbButtonAwesome', array(
            'buttonType' => 'button',
            'htmlOptions' => array('class' => 'search-button btn-default btn-circle', 'onclick' => 'js:history.go(-1)'),
            'label'=>'Volver',
            'icon' => 'chevron-left'

        )); ?>


        <?php
        $this->widget(
            'booster.widgets.TbButtonGroupAwesome',
            array(
                //   'size' => 'large',
                'context' => 'primary',
                'buttons' => array(
                    array(
                        'label' => 'Más',
                        'items' => $menuMas,
                        'icon' => 'share',
                        'htmlOptions' => array('class' => 'blue-steel btn-circle'),
                        'dropdownOptions' => array('class' => 'dropdown-menu pull-right'),

                    ),
                ),
            )
        );
        ?>
    </div>
</div>


<div class="portlet-body">

<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="portlet grey-gallery box">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-calendar"></i>Detalles de la orden
                </div>

            </div>
            <div class="portlet-body">
                <div class="row static-info">
                    <div class="col-md-5 name">
                       Orden #:
                    </div>
                    <div class="col-md-7 value">
                        <?php echo $model->idOrdenCompra;?>
                    </div>
                </div>
                <div class="row static-info">
                    <div class="col-md-5 name">
                        Fecha & Hora:
                    </div>
                    <div class="col-md-7 value">
                        <?php echo Yii::app()->dateFormatter->formatDateTime($model->FechaCreacion, 'long', 'short');?>
                    </div>
                </div>
                <div class="row static-info">
                    <div class="col-md-5 name">
                        Estado:
                    </div>
                    <div class="col-md-7 value">
                        <?php
                        $this->widget('booster.widgets.TbEditableField', array(
                            'type'      => 'select',
                            'model'     => $model,
                            'attribute' => 'EstadoOC_id',
                            'url' => $this->createUrl('Ordencompra/editableSaver'),
                            'source' => CHtml::listData(Estadooc::model()->findAll('idEstadoOC<>:id', array(':id'=>1)),'idEstadoOC' ,'Nombre_Estado'),
                            //or you can use plain arrays:
                            //'source'    => Editable::source(array(1 => 'Status1', 2 => 'Status2')),
                            'placement' => 'right',
                            'title' => 'Seleccionar Estado',
                            'emptytext' => 'Pendiente',
                        ));
                        ?>
                    </div>
                </div>
                <div class="row static-info">
                    <div class="col-md-5 name">
                        Neto:
                    </div>
                    <div class="col-md-7 value">
                        <?php
                            $neto = ($model->Total)/(1+$this->iva);


                        echo '<i class="fa fa-usd"></i> '.number_format ($neto,0,",","." );?>
                    </div>
                </div>

                <div class="row static-info">
                    <div class="col-md-5 name">
                        IVA:
                    </div>
                    <div class="col-md-7 value">
                        <?php
                         $impuesto = $model->Total*$this->iva/(1+$this->iva);
                        echo '<i class="fa fa-usd"></i> '.number_format (($impuesto),0,",","." );?>
                    </div>
                </div>


                <div class="row static-info">
                    <div class="col-md-5 name">
                        Total:
                    </div>
                    <div class="col-md-7 value">
                        <?php echo '<i class="fa fa-usd"></i> '.number_format ($model->Total,0,",","." );?>
                    </div>
                </div>
                <div class="row static-info">
                    <div class="col-md-5 name">
                        Forma de Pago:
                    </div>
                    <div class="col-md-7 value">
                        <?php echo $model->opcionesPago->OpcionesPago_Nomb;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="portlet grey-gallery box">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>Información del cliente
                </div>
            </div>
            <div class="portlet-body">
                <div class="row static-info">
                    <div class="col-md-5 name">
                        Nombre Empresa:
                    </div>
                    <div class="col-md-7 value">
                        <?php echo $model->Empresa;?>
                    </div>
                </div>
                <div class="row static-info">
                    <div class="col-md-5 name">
                        Encargado:
                    </div>
                    <div class="col-md-7 value">
                        <?php echo $model->Nombre.' '.$model->Apellido; ?>
                    </div>
                </div>

                <div class="row static-info">
                    <div class="col-md-5 name">
                        Correo:
                    </div>
                    <div class="col-md-7 value">
                        <?php echo $usuario->email; ?>
                    </div>
                </div>


                <div class="row static-info">
                    <div class="col-md-5 name">
                        Teléfono:
                    </div>
                    <div class="col-md-7 value">
                        <?php echo $model->Telefono; ?>
                    </div>
                </div>

                <div class="row static-info">
                    <div class="col-md-5 name">
                        Comuna:
                    </div>
                    <div class="col-md-7 value">
                        <?php echo Comuna::model()->findByPk($model->Comuna)->Nombre_Comuna; ?>
                    </div>
                </div>
                <div class="row static-info">
                    <div class="col-md-5 name">
                        Dirección:
                    </div>
                    <div class="col-md-7 value">
                        <?php echo $model->Direccion; ?>
                    </div>
                </div>
                <div class="row static-info">
                    <div class="col-md-5 name">
                        &nbsp;
                    </div>
                    <div class="col-md-7 value">
                        &nbsp;
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="portlet grey-gallery box">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-book"></i>Información facturación
                </div>
            </div>
            <div class="portlet-body">

                <div class="row static-info">
                    <div class="col-md-5 name">
                        Razón Social:
                    </div>
                    <div class="col-md-7 value">
                        <?php echo Yii::app()->user->um->getFieldValue($model->cruge_user_Empr_id,'razonsocial'); ;?>
                    </div>
                </div>

                <div class="row static-info">
                    <div class="col-md-5 name">
                        R.U.T:
                    </div>
                    <div class="col-md-7 value">
                        <?php echo Yii::app()->user->um->getFieldValue($model->cruge_user_Empr_id,'RutEmpresa'); ;?>
                    </div>
                </div>

                <div class="row static-info">
                    <div class="col-md-5 name">
                        Giro:
                    </div>
                    <div class="col-md-7 value">
                        <?php echo Yii::app()->user->um->getFieldValue($model->cruge_user_Empr_id,'giro'); ;?>
                    </div>
                </div>

                <div class="row static-info">
                    <div class="col-md-5 name">
                        Dirección:
                    </div>
                    <div class="col-md-7 value">
                        <?php echo Yii::app()->user->um->getFieldValue($model->cruge_user_Empr_id,'direccion'); ;?>
                    </div>
                </div>

                <div class="row static-info">
                    <div class="col-md-5 name">
                        Comuna:
                    </div>
                    <div class="col-md-7 value">
                        <?php  echo Comuna::model()->findByPk($model->Comuna)->Nombre_Comuna; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="portlet grey-gallery box">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-truck"></i>Información de despacho
                </div>
            </div>
            <div class="portlet-body">
                <div class="row static-info">
                    <div class="col-md-5 name">
                        Nombre:
                    </div>
                    <div class="col-md-7 value">
                        <?php   $despacho = Infodespacho::model()->findByPk($model->InfoDespacho_id);

                            echo $despacho->Primer_Nombre.' '. $despacho->Apellido;
                        ?>
                    </div>
                </div>
                <div class="row static-info">
                    <div class="col-md-5 name">
                        Dirección:
                    </div>
                    <div class="col-md-7 value">
                        <?php echo $despacho->Direccion; ;?>
                    </div>
                </div>


                <div class="row static-info">
                    <div class="col-md-5 name">
                        Codigo Postal:
                    </div>
                    <div class="col-md-7 value">
                        <?php echo $despacho->CodPostal; ;?>
                    </div>
                </div>


                <div class="row static-info">
                    <div class="col-md-5 name">
                        Comuna:
                    </div>
                    <div class="col-md-7 value">
                        <?php echo Comuna::model()->findByPk($despacho->Comuna_id)->Nombre_Comuna; ;?>
                    </div>
                </div>


                <div class="row static-info">
                    <div class="col-md-5 name">
                        Teléfono:
                    </div>
                    <div class="col-md-7 value">
                        <?php echo $despacho->Fono; ;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="portlet  grey-gallery box">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt"></i>Detalle Pedido
                </div>
            </div>
            <div class="portlet-body">

                <?php $this->renderPartial('_detallesoc', array(
                    'model' => $model,
                )); ?>
            </div>
        </div>
    </div>
</div>

</div>
