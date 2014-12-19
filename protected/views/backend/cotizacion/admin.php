<?php
/* @var $this CotizacionController */
/* @var $model Cotizacion */


$this->breadcrumbs=array(
	'Cotizacions'=>array('admin'),
	'Administrar'

);

    Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
    });
    $('.search-form form').submit(function(){
    $.fn.yiiGridView.update('cotizacion-grid', {
    data: $(this).serialize()
    });
    return false;
    });
    ");
    ?>

<div class="portlet-title"><h1>Administrar Cotizacions</h1></div>


<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<div class="portlet-body">
<?php $this->widget('booster.widgets.TbExtendedGridView',array(
'id'=>'cotizacion-grid',
'fixedHeader' => true,
'headerOffset' => 40,
// 40px is the height of the main navigation at bootstrap
'type' => 'striped',
//'responsiveTable' => true,
'template' => "{items}",
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'idCotizacion',
		'FechaCreacion',
		'FechaRevalidacion',
		'FechaVenc',
		'cruge_user_iduser',
		'cruge_user_idprov',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
</div>