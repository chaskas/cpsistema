<?php
$this->breadcrumbs=array(
	'Contactos'=>array('index'),
	$model->Asunto,
);

$usuario = Yii::app()->user->um->loadUserById($model->cruge_user_Empr_id,true);
?>
<div class="portlet-body">
    <div class="row inbox">
        <div class="col-md-4">
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
        <div class="col-md-7">
            <div class="inbox-content"><div class="inbox-header inbox-view-header">
                    <h1 class="pull-left"><?php echo $model->Asunto; ?></h1>
                </div>
                <div style="clear: both"></div>

                <div class="inbox-view-info">
                    <div class="row">
                        <div class="col-md-7">
            <span class="bold">Enviado:</span> <?php echo Yii::app()->dateFormatter->formatDateTime($model->Creado, 'long', 'short'); ?>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="inbox-view">
                    <?php echo $model->Mensaje; ?>
                </div>

        </div>
    </div>
</div>