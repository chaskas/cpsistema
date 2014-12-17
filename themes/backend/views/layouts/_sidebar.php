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
             'url' => array('site/index'),
             'activeCssClass' => 'active'
         ),
         array(
             'label' => '<i class="icon-social-dropbox"></i><span class="title">Productos</span><span class="arrow "></span>',
             'encodeLabel' => false,
             'url' => array('productos/admin'),
             'activeCssClass' => 'active open',
             'submenuOptions' => array('class' => 'sub-menu', 'activateParents' => true),
             'items' => array(
                 array(
                     'label' => '<i class="icon-plus"></i><span class="title">Nuevo Producto</span>',
                      'encodeLabel' => false,
                      'url' => array('Productos/create'),
                      'activeCssClass' => 'active',
                 )
             )
         ),
         array(
             'label' => '<i class="icon-basket-loaded"></i><span class="title">Órdenes de Compra</span><span class="arrow "></span>',
             'encodeLabel' => false,
             'url' => array('OrdenCompra/admin'),
             'activeCssClass' => 'active open'
         ),
         array(
             'label' => '<i class="icon-call-in"></i><span class="title">Contactos</span><span class="arrow "></span>',
             'encodeLabel' => false,
             'url' => array('Contactos/admin'),
             'activeCssClass' => 'active open',
             'submenuOptions' => array('class' => 'sub-menu', 'activateParents' => true,),
             'items' => array(
               /*  array(
                     'label' => '<i class="icon-envelope-open"></i><span class="title">Mensajes</span>',
                     'encodeLabel' => false,
                     'url' => array('Contactos/leidos'),
                     'activeCssClass' => 'active',

                 ),*/
                 array(
                     'label' => '<i class="icon-envelope-letter"></i><span class="title">Mensajes Nuevos</span>',
                     'encodeLabel' => false,
                     'url' => array('Contactos/nuevos'),
                     'activeCssClass' => 'active',
                 ),
             )
         ),
         array(
             'label' => '<i class="icon-bar-chart"></i><span class="title">Informmes</span><span class="arrow "></span>',
             'encodeLabel' => false,
             'url' => array('informes/inedex'),
             'activeCssClass' => 'active open'
         ),
         array(
             'label' => '<i class="icon-badge"></i><span class="title">Evaluaciones</span><span class="arrow "></span>',
             'encodeLabel' => false,
             'url' => array('informes/inedex'),
             'activeCssClass' => 'active open'),

     )
  )
  );

?>



        <!--          <ul class="page-sidebar-menu" data-auto-scroll="false" data-slide-speed="200">



                      <li class="start "><a href="index.html">
                          </a>
                      </li>
                      <li class="active">
                          <a href="javascript:;">
                          <i class="icon-basket"></i>
                          <span class="title">eCommerce</span>
                          <span class="selected"></span>
                          <span class="arrow open"></span>
                          </a>
                          <ul class="sub-menu">
                              <li class="active">
                                  <a href="ecommerce_index.html">
                                  <i class="icon-home"></i>
                                  Dashboard</a>
                              </li>
                              <li>
                                  <a href="ecommerce_orders.html">
                                  <i class="icon-basket"></i>
                                  Orders</a>
                              </li>
                              <li>
                                  <a href="ecommerce_orders_view.html">
                                  <i class="icon-tag"></i>
                                  Order View</a>
                              </li>
                              <li>
                                  <a href="ecommerce_products.html">
                                  <i class="icon-handbag"></i>
                                  Products</a>
                              </li>
                              <li>
                                  <a href="ecommerce_products_edit.html">
                                  <i class="icon-pencil"></i>
                                  Product Edit</a>
                              </li>
                          </ul>
                      </li>

                  <!-- END SIDEBAR MENU -->*/?>
    </div>
</div>
<!-- END SIDEBAR -->