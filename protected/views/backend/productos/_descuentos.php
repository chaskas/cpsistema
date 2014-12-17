<?php
/**
 * Created by PhpStorm.
 * User: Cristian
 * Date: 16-12-2014
 * Time: 16:57
 */

echo CHtml::tag('h3',array(),'RELATIONAL DATA EXAMPLE ROW : "'.$id.'"');
$this->widget('booster.widgets.TbExtendedGridView', array(
    'type'=>'striped bordered',
    'dataProvider' => $gridDataProvider,
    'template' => "{items}",
    'columns' => array_merge(array(array('class'=>'booster.widgets.TbImageColumn')),$gridColumns),
));