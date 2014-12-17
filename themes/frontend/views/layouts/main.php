<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8">
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta content="centralproveedores" name="author">
  <meta http-equiv="cleartype" content="on">

  <meta property="og:site_name" content="Central Proveedores">
  <meta property="og:title" content="Central Proveedores">
  <meta property="og:description" content="Plataforma de negocios entre empresas">
  <meta property="og:type" content="website">
  <meta property="og:image" content=""><!-- link to image for socio -->
  <meta property="og:url" content="http://www.centralproveedores.cl">

  <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css"><!--- fonts for slider on the index page -->  
  <!-- Fonts END -->

  <!-- Global styles START -->          
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Global styles END --> 
   
  <!-- Page level plugin styles START -->
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/global/plugins/slider-layer-slider/css/layerslider.css" rel="stylesheet">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/global/css/components.css" rel="stylesheet">
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/frontend/layout/css/style.css" rel="stylesheet">
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/frontend/pages/css/style-shop.css" rel="stylesheet" type="text/css">
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/frontend/pages/css/style-layer-slider.css" rel="stylesheet">
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/frontend/layout/css/style-responsive.css" rel="stylesheet">
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/frontend/layout/css/custom.css" rel="stylesheet">
  <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="ecommerce">


    <?php $this->renderPartial('//layouts/_header') ?>

    <div class="main">
        <div class="container">
                <?php echo $content; ?>






        </div>
    </div>
    <?php     $this->renderPartial('//layouts/_footer') ?>

</body>

</html>
