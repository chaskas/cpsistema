<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top ">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="index.html">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/backend/layout/img/logo.png" alt="logo" class="logo-default"/>
            </a>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE TOP -->
        <div class="page-top">
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-bell"></i>
                        <span class="badge badge-danger">
                        7 </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <p>
                                     You have 14 new notifications
                                </p>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 250px;">
                                    <li>
                                        <a href="#">
                                        <span class="label label-sm label-icon label-success">
                                        <i class="fa fa-plus"></i>
                                        </span>
                                        New user registered. <span class="time">
                                        Just now </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                        <span class="label label-sm label-icon label-danger">
                                        <i class="fa fa-bolt"></i>
                                        </span>
                                        Server #12 overloaded. <span class="time">
                                        15 mins </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                        <span class="label label-sm label-icon label-warning">
                                        <i class="fa fa-bell-o"></i>
                                        </span>
                                        Server #2 not responding. <span class="time">
                                        22 mins </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                        <span class="label label-sm label-icon label-info">
                                        <i class="fa fa-bullhorn"></i>
                                        </span>
                                        Application error. <span class="time">
                                        40 mins </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                        <span class="label label-sm label-icon label-danger">
                                        <i class="fa fa-bolt"></i>
                                        </span>
                                        Database overloaded 68%. <span class="time">
                                        2 hrs </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                        <span class="label label-sm label-icon label-danger">
                                        <i class="fa fa-bolt"></i>
                                        </span>
                                        2 user IP blocked. <span class="time">
                                        5 hrs </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                        <span class="label label-sm label-icon label-warning">
                                        <i class="fa fa-bell-o"></i>
                                        </span>
                                        Storage Server #4 not responding. <span class="time">
                                        45 mins </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                        <span class="label label-sm label-icon label-info">
                                        <i class="fa fa-bullhorn"></i>
                                        </span>
                                        System Error. <span class="time">
                                        55 mins </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                        <span class="label label-sm label-icon label-danger">
                                        <i class="fa fa-bolt"></i>
                                        </span>
                                        Database overloaded 68%. <span class="time">
                                        2 hrs </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="external">
                                <a href="#">
                                See all notifications <i class="icon-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN INBOX DROPDOWN -->
                    <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-envelope-open"></i>
                        <span class="badge badge-primary">
                        4 </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <p>
                                     You have 12 new messages
                                </p>
                            </li>
                            <li>

                            </li>
                            <li class="external">
                                <a href="inbox.html">
                                See all messages <i class="icon-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END INBOX DROPDOWN -->


                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown dropdown-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                         <img alt="" class="img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/backend/layout/img/avatar3_small.jpg"/>
                        <span class="username username-hide-on-mobile">
                        <?php   echo Yii::app()->user->name; ?>  </span>
                        <i class="fa fa-angle-down"></i>
                        </a>
                        <?php $this->widget('zii.widgets.CMenu',array(
                            'items'=>array(
                                array('label'=>'Mi Cuenta', 'url'=>array('/cruge/ui/editprofile')),
                                array('label'=>'Administrar Usuarios'
                                , 'url'=>Yii::app()->user->ui->userManagementAdminUrl
                                , 'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'Ingresar'
                                , 'url'=>Yii::app()->user->ui->loginUrl
                                , 'visible'=>Yii::app()->user->isGuest),
                                array('label'=>'Salir ('.Yii::app()->user->name.')'
                                , 'url'=>Yii::app()->user->ui->logoutUrl
                                , 'visible'=>!Yii::app()->user->isGuest),
                            ),
                            'encodeLabel' => false,
                            'htmlOptions' => array(
                                'class'=>'dropdown-menu',
                            ),
                        )); ?>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->