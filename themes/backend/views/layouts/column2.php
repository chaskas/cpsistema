<?php $this->beginContent('//layouts/main'); ?>
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <?php $this->renderPartial('//layouts/_sidebar') ?>
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->
  <!--              <h3 class="page-title">
                <?php /*echo CHtml::encode($this->pageTitle); */?>
                </h3>-->
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

        </div>
                <!-- END PAGE HEADER-->
                <!-- BEGIN PAGE CONTENT-->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="portlet light" id="<?php echo Yii::app()->controller->id;?>-portlet"> <?php echo $content; ?></div>
                    </div>
                </div>

                <!-- END PAGE CONTENT-->
            </div>
        </div>
        <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
<?php $this->endContent(); ?>
