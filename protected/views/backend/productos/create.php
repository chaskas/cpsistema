<?php
$this->breadcrumbs=array(
    'Productos'=>array('index'),
    'Nuevo Producto',
);
$this->pageTitle = 'Crear Producto';

$menuMas = array();
?>

    <div class="portlet-title">

        <div class="caption">
            <i class="fa fa-dropbox"></i>
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
                'url' =>  $this->createUrl('productos/create'),

            )); ?>


            <?php $this->widget('booster.widgets.TbButtonAwesome', array(
                'buttonType' => 'link',
                'context'=>'primary',
                'htmlOptions' => array('class' => 'red-flamingo btn-circle'),
                'label'=>'Cancelar',
                'icon' => 'ban',
                'url' =>  $this->createUrl('productos'),


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