<?php
if (isset($_GET['pid'])) {
    $p = Productos::model()->findByPk($_GET['pid']);
    $nombreproducto = ' de '.$p->Nombre_Producto;
    $prodid = $_GET['pid'];
} else {
    $nombreproducto ="";
    $prodid = "";
}


$controlador = Yii::app()->controller->id;
$this->breadcrumbs=array(
    'Productos'=>array('Productos/index'),
    'Precios'=>array('PreciosDesc/index', 'pid' => $prodid),
    'Nuevo'
);
$menuMas = array();


$this->pageTitle = 'Nuevo Precio'.$nombreproducto;
?>

    <div class="portlet-title">

        <div class="caption">
            <i class="fa fa-money"></i>
										<span class="caption-subject bold uppercase">
										<?php echo $this->pageTitle; ?> </span>
            <span class="caption-helper"></span>
        </div>

        <div class="actions btn-set">
            <?php $this->widget('booster.widgets.TbButtonAwesome', array(
                'buttonType' => 'button',
                'htmlOptions' => array('class' => 'search-button btn-default btn-circle', 'onclick' => 'js:history.go(-1)'),
                'label'=>'Volver',
                'icon' => 'chevron-left'

            )); ?>

            <?php $this->widget('booster.widgets.TbButtonAwesome', array(
                'buttonType' => 'button',
                'context'=>'primary',
                'htmlOptions' => array('class' => 'btn-circle', 'onclick' => '$("#'.Yii::app()->controller->id.'-form").submit();'),
                'label'=>'Crear',
                'icon' => 'save',
                'url' =>  $this->createUrl('preciosDesc/create'),

            )); ?>


            <?php $this->widget('booster.widgets.TbButtonAwesome', array(
                'buttonType' => 'link',
                'context'=>'primary',
                'htmlOptions' => array('class' => 'red-flamingo btn-circle'),
                'label'=>'Cancelar',
                'icon' => 'ban',
                'url' =>  $this->createUrl('preciosDesc/index',array('pid'=>$prodid)),


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

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>