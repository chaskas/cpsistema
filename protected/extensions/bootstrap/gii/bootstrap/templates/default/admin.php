<?php
/**
 * The following variables are available in this template:
 * - $this: the BootstrapCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */


<?php

$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('admin'),
	'Administrar'

);\n";
?>

    Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
    });
    $('.search-form form').submit(function(){
    $.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
    data: $(this).serialize()
    });
    return false;
    });
    ");
    ?>

<div class="portlet-title"><h1>Administrar <?php echo $this->pluralize($this->class2name($this->modelClass)); ?></h1></div>


<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo "<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>"; ?>

<div class="search-form" style="display:none">
    <?php echo "<?php \$this->renderPartial('_search',array(
	'model'=>\$model,
)); ?>\n"; ?>
</div><!-- search-form -->


<div class="portlet-body">
<?php echo "<?php"; ?> $this->widget('booster.widgets.TbExtendedGridView',array(
'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
'fixedHeader' => true,
'headerOffset' => 40,
// 40px is the height of the main navigation at bootstrap
'type' => 'striped',
//'responsiveTable' => true,
'template' => "{items}",
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
<?php
$count = 0;
foreach ($this->tableSchema->columns as $column) {
	if (++$count == 7) {
		echo "\t\t/*\n";
	}
	echo "\t\t'" . $column->name . "',\n";
}
if ($count >= 7) {
	echo "\t\t*/\n";
}
?>
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
</div>