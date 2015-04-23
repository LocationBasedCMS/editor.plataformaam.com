<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'vcom-user-role-form',
	'enableAjaxValidation' => true,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'vcomcomposite'); ?>
		<?php echo $form->dropDownList($model, 'vcomcomposite', GxHtml::listDataEx(VComComposite::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'vcomcomposite'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'allowedEditVComAggregationRule'); ?>
		<?php echo $form->checkBox($model, 'allowedEditVComAggregationRule'); ?>
		<?php echo $form->error($model,'allowedEditVComAggregationRule'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'allowedEditVCom'); ?>
		<?php echo $form->checkBox($model, 'allowedEditVCom'); ?>
		<?php echo $form->error($model,'allowedEditVCom'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'isClientDefault'); ?>
		<?php echo $form->checkBox($model, 'isClientDefault'); ?>
		<?php echo $form->error($model,'isClientDefault'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'isClientSelectable'); ?>
		<?php echo $form->checkBox($model, 'isClientSelectable'); ?>
		<?php echo $form->error($model,'isClientSelectable'); ?>
		</div><!-- row -->

		<h3><?php echo GxHtml::encode($model->getRelationLabel('users')); ?></h3>
		<?php echo $form->checkBoxList($model, 'users', GxHtml::encodeEx(GxHtml::listDataEx(User::model()->findAllAttributes(null, true)), false, true)); ?>
		<h3><?php echo GxHtml::encode($model->getRelationLabel('vComUPIAggregationRuleResponseOfs')); ?></h3>
		<?php echo $form->checkBoxList($model, 'vComUPIAggregationRuleResponseOfs', GxHtml::encodeEx(GxHtml::listDataEx(VComUPIAggregationRuleResponseOf::model()->findAllAttributes(null, true)), false, true)); ?>
		<h3><?php echo GxHtml::encode($model->getRelationLabel('vComUPIAggregationRuleStarts')); ?></h3>
		<?php echo $form->checkBoxList($model, 'vComUPIAggregationRuleStarts', GxHtml::encodeEx(GxHtml::listDataEx(VComUPIAggregationRuleStart::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->