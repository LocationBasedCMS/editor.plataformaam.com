<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'upiaggregation-rule-start-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'vcombase'); ?>
		<?php echo $form->dropDownList($model, 'vcombase', GxHtml::listDataEx(VComBase::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'vcombase'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'upitype'); ?>
		<?php echo $form->dropDownList($model, 'upitype', GxHtml::listDataEx(UPIType::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'upitype'); ?>
		</div><!-- row -->
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
		<?php echo $form->labelEx($model,'requirePositionToCreate'); ?>
		<?php echo $form->checkBox($model, 'requirePositionToCreate'); ?>
		<?php echo $form->error($model,'requirePositionToCreate'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'requirePositionToView'); ?>
		<?php echo $form->checkBox($model, 'requirePositionToView'); ?>
		<?php echo $form->error($model,'requirePositionToView'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'visibleDistance'); ?>
		<?php echo $form->textField($model, 'visibleDistance'); ?>
		<?php echo $form->error($model,'visibleDistance'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'republisAllowed'); ?>
		<?php echo $form->checkBox($model, 'republisAllowed'); ?>
		<?php echo $form->error($model,'republisAllowed'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'isSingleton'); ?>
		<?php echo $form->checkBox($model, 'isSingleton'); ?>
		<?php echo $form->error($model,'isSingleton'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('uPIAggregationRuleResponseOfs')); ?></label>
		<?php echo $form->checkBoxList($model, 'uPIAggregationRuleResponseOfs', GxHtml::encodeEx(GxHtml::listDataEx(UPIAggregationRuleResponseOf::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('uPIAggregationRuleResponseOfs1')); ?></label>
		<?php echo $form->checkBoxList($model, 'uPIAggregationRuleResponseOfs1', GxHtml::encodeEx(GxHtml::listDataEx(UPIAggregationRuleResponseOf::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('vComUPIAggregationRuleStarts')); ?></label>
		<?php echo $form->checkBoxList($model, 'vComUPIAggregationRuleStarts', GxHtml::encodeEx(GxHtml::listDataEx(VComUPIAggregationRuleStart::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->