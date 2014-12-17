<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>

<div class="portlet-body">
    <div class="form-body">

        <?php echo "<?php \$form=\$this->beginWidget('booster.widgets.TbActiveForm',array(
            'id'=>'" . $this->class2id($this->modelClass) . "-form',
            'type' => 'horizontal',
            'enableAjaxValidation'=>false,
            'htmlOptions'=>array(
                'class'=>'well',
            )
        )); ?>\n"; ?>

        <p class="help-block">Campos con <span class="required">*</span> son obligatorios</p>

        <?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>

        <?php
        foreach ($this->tableSchema->columns as $column) {
            if ($column->autoIncrement) {
                continue;
            }
            ?>
            <?php echo "<?php echo " . $this->generateActiveGroup($this->modelClass, $column) . "; ?>\n"; ?>

        <?php
        }
        ?>
        <div class="form-actions">
            <?php echo "<?php \$this->widget('booster.widgets.TbButton', array(
                    'buttonType'=>'submit',
                    'context'=>'primary',
                    'label'=>\$model->isNewRecord ? 'Create' : 'Save',
                )); ?>\n"; ?>
        </div>

        <?php echo "<?php \$this->endWidget(); ?>\n"; ?>
    </div>
</div>