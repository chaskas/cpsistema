<?php
/* @var $this CategoriasController */
/* @var $model Categorias */
?>

<?php
$this->breadcrumbs=array(
	'Categorias'=>array('admin'),
	//$model->idCategorias=>array('view','id'=>$model->idCategorias),
	'Editar',
);
$this->pageTitle = 'Editar Categoria';

$menuMas=array(
	array('label'=>'List Categorias', 'url'=>array('index')),
	array('label'=>'Create Categorias', 'url'=>array('create')),
	array('label'=>'View Categorias', 'url'=>array('view', 'id'=>$model->idCategorias)),
	array('label'=>'Manage Categorias', 'url'=>array('admin')),
);
?>
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-sitemap"></i>
            <span class="caption-subject bold uppercase">
			    <?php echo $this->pageTitle; ?> <?php echo $model->Nombre_Categoria; ?></span>
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
                'label'=>'Guardar',
                'icon' => 'save',
                'url' =>  $this->createUrl('categorias/create'),

            )); ?>


            <?php $this->widget('booster.widgets.TbButtonAwesome', array(
                'buttonType' => 'link',
                'context'=>'primary',
                'htmlOptions' => array('class' => 'red-flamingo btn-circle'),
                'label'=>'Cancelar',
                'icon' => 'ban',
                'url' =>  $this->createUrl('categorias/admin'),


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

<?php $this->renderPartial('_form', array('model'=>$model)); ?>