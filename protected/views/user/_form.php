<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'user-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'login'); ?>
		<?php echo $form->textField($model, 'login', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'login'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 500)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model, 'email', array('maxlength' => 500)); ?>
		<?php echo $form->error($model,'email'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model, 'password', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'password'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'isExcluded'); ?>
		<?php echo $form->checkBox($model, 'isExcluded'); ?>
		<?php echo $form->error($model,'isExcluded'); ?>
		</div><!-- row -->

		<h3><?php echo GxHtml::encode($model->getRelationLabel('vComUserRoles')); ?></h3>
		<?php echo $form->checkBoxList($model, 'vComUserRoles', GxHtml::encodeEx(GxHtml::listDataEx(VComUserRole::model()->findAllAttributes(null, true)), false, true)); ?>
		<h3><?php echo GxHtml::encode($model->getRelationLabel('vComComposites')); ?></h3>
		<?php echo $form->checkBoxList($model, 'vComComposites', GxHtml::encodeEx(GxHtml::listDataEx(VComComposite::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->