<?php $form=$this->beginWidget('CActiveForm', array(
    'enableClientValidation'=>false,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
    'htmlOptions'=>array(
        'class'=>'login-form',
    )
)); ?>
        <h3 class="form-title"><?php echo CrugeTranslator::t('logon',"Ingresar"); ?></h3>
        <?php if(Yii::app()->user->hasFlash('loginflash')): ?>
            <div class="flash-error">
                <?php echo Yii::app()->user->getFlash('loginflash'); ?>
            </div>
        <?php else: ?>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
			<span>
			Enter any username and password. </span>
        </div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'Usuario o correo',  array('class'=>'control-label visible-ie8 visible-ie9')); ?>
        <div class="input-icon">
            <i class="fa fa-user"></i>
			<?php echo $form->textField($model,'username', array('class'=>'form-control placeholder-no-fix','id'=>'email', 'autocomplete'=>'off', 'placeholder'=>'Usuario o Correo')); ?>
			<?php echo $form->error($model,'username'); ?>
		</div>
	</div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'password',  array('class'=>'control-label visible-ie8 visible-ie9')); ?>
                <div class="input-icon">
                    <i class="fa fa-lock"></i>
                    <?php echo $form->passwordField($model,'password', array('class'=>'form-control placeholder-no-fix', 'autocomplete'=>'off', 'placeholder'=>'Clave')); ?>
                    <?php echo $form->error($model,'username'); ?>
                </div>
            </div>



            <div class="form-actions">


		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>

		<?php //Yii::app()->user->ui->tbutton(CrugeTranslator::t('logon', "Login")); ?>
        <?php echo CHtml::submitButton('Ingresar', array('class' => 'btn btn-primary')); ?>

       <div class="forget-password">
        <?php echo Yii::app()->user->ui->passwordRecoveryLink; ?></div>

                <div class="create-account">
        <?php
			if(Yii::app()->user->um->getDefaultSystem()->getn('registrationonlogin')===1)
				echo Yii::app()->user->ui->registrationLink;
		?></div>
	</div>


	<?php
		//	si el componente CrugeConnector existe lo usa:
		//
		if(Yii::app()->getComponent('crugeconnector') != null){
		if(Yii::app()->crugeconnector->hasEnabledClients){ 
	?>
	<div class='crugeconnector'>
		<span><?php echo CrugeTranslator::t('logon', 'You also can login with');?>:</span>
		<ul>
		<?php 
			$cc = Yii::app()->crugeconnector;
			foreach($cc->enabledClients as $key=>$config){
				$image = CHtml::image($cc->getClientDefaultImage($key));
				echo "<li>".CHtml::link($image,
					$cc->getClientLoginUrl($key))."</li>";
			}
		?>
		</ul>
	</div>
	<?php }} ?>
	

<?php $this->endWidget(); ?>
</div></div></div>
<?php endif; ?>
