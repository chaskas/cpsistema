<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
<div class="page-sidebar navbar-collapse collapse">
  <!-- BEGIN SIDEBAR MENU -->
  <?php $this->widget('zii.widgets.CMenu', array(
     'encodeLabel' => false,
     'activateParents' => true,
     'htmlOptions' => array(
         'class' => 'page-sidebar-menu',
         'data-auto-scroll' => 'false',
         'data-slide-speed' => '200'
     ),
     'items' => array(
         array(
             'label' => '<i class="icon-home"></i><span class="title">Inicio</span>',
             'encodeLabel' => false,
             'url' => array('/site/index'),
             'activeCssClass' => 'active'
         ),
         array(
             'label' => '<i class="icon-social-dropbox"></i><span class="title">Productos</span><span class="arrow "></span>',
             'encodeLabel' => false,
             'url' => array('/productos/index'),
             'activeCssClass' => 'active open',
             'submenuOptions' => array('class' => 'sub-menu', 'activateParents' => true),
             'items' => array(
                 array(
                     'label' => '<i class="icon-eye"></i> <span class="title">Ver Productos</span>',
                     'encodeLabel' => false,
                     'url' => array('/Productos/index'),
                     'activeCssClass' => 'active',
                 ),
                 array(
                     'label' => '<i class="icon-plus"></i> <span class="title">Nuevo Producto</span>',
                      'encodeLabel' => false,
                      'url' => array('/Productos/create'),
                      'activeCssClass' => 'active',
                 ),
             )
         ),
         array(
             'label' => '<i class="icon-basket-loaded"></i><span class="title">Órdenes de Compra</span>',
             'encodeLabel' => false,
             'url' => array('/OrdenCompra/index'),
             'activeCssClass' => 'active open'
         ),
         array(
             'label' => '<i class="icon-call-in"></i><span class="title">Contactos</span>',
             'encodeLabel' => false,
             'url' => array('/Contactos/index'),
             'activeCssClass' => 'active open',
             'submenuOptions' => array('class' => 'sub-menu', 'activateParents' => true,),
             'items' => array(
               /*  array(
                     'label' => '<i class="icon-envelope-open"></i><span class="title">Mensajes</span>',
                     'encodeLabel' => false,
                     'url' => array('Contactos/leidos'),
                     'activeCssClass' => 'active',

                 ),*/
/*                 array(
                     'label' => '<i class="icon-envelope-letter"></i><span class="title">Ver Mensajes</span>',
                     'encodeLabel' => false,
                     'url' => array('/Contactos/index'),
                     'activeCssClass' => 'active',
                 ),*/
             )
         ),
         array(
             'label' => '<i class="icon-support"></i><span class="title">Necesidades</span>',
             'encodeLabel' => false,
             'url' => array('/necesidades/index'),
             'activeCssClass' => 'active'
         ),

         array(
             'label' => '<i class="icon-bar-chart"></i><span class="title">Reportes</span><span class="arrow "></span>',
             'encodeLabel' => false,
             'url' => array('/informes/index'),
             'activeCssClass' => 'active open',
             'submenuOptions' => array('class' => 'sub-menu', 'activateParents' => true),
             'items' => array(
                 array(
                     'label' => '<i class="icon-badge"></i><span class="title">Evaluaciones</span>',
                     'encodeLabel' => false,
                     'url' => array('/evaluaciones/index'),
                     'activeCssClass' => 'active open'
                 ),
             )
         ),
     )
  ));

?>

                  <!-- END SIDEBAR MENU -->
    </div>
</div>
<!-- END SIDEBAR -->