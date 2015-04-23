<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'upiaggregation-rule-response-of-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'upiaggregationrulestart'); ?>
		<?php echo $form->dropDownList($model, 'upiaggregationrulestart', GxHtml::listDataEx(UPIAggregationRuleStart::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'upiaggregationrulestart'); ?>
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
		<?php echo $form->labelEx($model,'requirePositionToResponse'); ?>
		<?php echo $form->checkBox($model, 'requirePositionToResponse'); ?>
		<?php echo $form->error($model,'requirePositionToResponse'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'requirePositionToView'); ?>
		<?php echo $form->checkBox($model, 'requirePositionToView'); ?>
		<?php echo $form->error($model,'requirePositionToView'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'republisAllowed'); ?>
		<?php echo $form->checkBox($model, 'republisAllowed'); ?>
		<?php echo $form->error($model,'republisAllowed'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'aceptMultiple'); ?>
		<?php echo $form->checkBox($model, 'aceptMultiple'); ?>
		<?php echo $form->error($model,'aceptMultiple'); ?>
		</div><!-- row -->

		<h3><?php echo GxHtml::encode($model->getRelationLabel('vComUPIAggregationRuleResponseOfs')); ?></h3>
		<?php echo $form->checkBoxList($model, 'vComUPIAggregationRuleResponseOfs', GxHtml::encodeEx(GxHtml::listDataEx(VComUPIAggregationRuleResponseOf::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->