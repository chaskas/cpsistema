<?php
/*
	aqui: $this->beginContent('//layouts/main'); indica que este layout se amolda 
	al layout que se haya definido para todo el sistema, y dentro de el colocara
	su propio layout para amoldar a un CPortlet.
	
	esto es para asegurar que el sistema disponga de un portlet, 
	esto es casi lo mismo que haber puesto en UiController::layout = '//layouts/column2'
	a diferencia que aqui se indica el uso de un archivo CSS para estilos predefinidos
	
	Yii::app()->layout asegura que estemos insertando este contenido en el layout que
	se ha definido para el sistema principal.
*/
?>
<?php
if(Yii::app()->user->isSuperAdmin)
    echo Yii::app()->user->ui->superAdminNote();
?>

<?php $this->beginContent('//layouts/'.Yii::app()->layout);?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <?php $this->renderPartial('//layouts/_sidebar') ?>
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title">
                <?php echo CHtml::encode($this->pageTitle); ?>
            </h3>
            <div class="page-bar">
                <?php if(isset($this->breadcrumbs)):?>
                    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links'=>$this->breadcrumbs,

                        'tagName'=>'ul',
                        'htmlOptions'=>array('class'=>'page-breadcrumb'),
                        'separator'=> '',
                        'activeLinkTemplate'=>'<li><a href="{url}">{label}</a><i class="fa fa-angle-right"></i></li>',
                        'inactiveLinkTemplate'=>'<li>{label}</li>',
                        'homeLink'=>'<li><i class="fa fa-home"></i><a href="'.Yii::app()->homeUrl.'">Inicio</a><i class="fa fa-angle-right"></i></li>'
                    )); ?><!-- breadcrumbs -->
                <?php endif?>
                <div class="page-toolbar">
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                            Aciones <i class="fa fa-angle-down"></i>
                        </button>
                        <?php if(Yii::app()->user->checkAccess('admin')) { ?>
                            <?php
                            $this->beginWidget('zii.widgets.CMenu', array(
                                'items'=>Yii::app()->user->ui->adminItems,
                                'htmlOptions'=>array('class'=>'dropdown-menu pull-right'),
                            ));
                            $this->endWidget();
                            ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="portlet light "> <?php echo $content; ?></div>
                </div>
            </div>

            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<?php $this->endContent(); ?>
