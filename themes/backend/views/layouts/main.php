<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <?php //Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>



    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->


    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->

   <!--  END PAGE LEVEL PLUGIN STYLES -->


    <!-- BEGIN PAGE STYLES -->

    <!-- END PAGE STYLES -->

    <!-- BEGIN THEME STYLES -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/global/css/components.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/backend/layout/css/layout.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/backend/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/backend/layout/css/custom.css" rel="stylesheet" type="text/css"/>

    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>

</head>
<body class="page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-closed-hide-logo page-header-fixed">
<?php $this->renderPartial('//layouts/_header') ?>
<div class="clear"></div>



        <?php echo $content; ?>

    <div class="clear"></div>
<?php $this->renderPartial('//layouts/_footer') ?>
</body>
</html>
