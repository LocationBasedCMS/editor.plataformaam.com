<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'vcom-base-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model, 'description'); ?>
		<?php echo $form->error($model,'description'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'vcomcomposite'); ?>
		<?php echo $form->dropDownList($model, 'vcomcomposite', GxHtml::listDataEx(VComComposite::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'vcomcomposite'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'virtualspace'); ?>
		<?php echo $form->dropDownList($model, 'virtualspace', GxHtml::listDataEx(VirtualSpace::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'virtualspace'); ?>
		</div><!-- row -->

		<h3><?php echo GxHtml::encode($model->getRelationLabel('uPIAggregationRuleStarts')); ?></h3>
		<?php echo $form->checkBoxList($model, 'uPIAggregationRuleStarts', GxHtml::encodeEx(GxHtml::listDataEx(UPIAggregationRuleStart::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->