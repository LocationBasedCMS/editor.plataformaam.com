<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'vcom-upiaggregation-rule-response-of-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'vcomuserole'); ?>
		<?php echo $form->dropDownList($model, 'vcomuserole', GxHtml::listDataEx(VComUserRole::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'vcomuserole'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'upiaggregationruleresponseof'); ?>
		<?php echo $form->dropDownList($model, 'upiaggregationruleresponseof', GxHtml::listDataEx(UPIAggregationRuleResponseOf::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'upiaggregationruleresponseof'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'allowedRead'); ?>
		<?php echo $form->checkBox($model, 'allowedRead'); ?>
		<?php echo $form->error($model,'allowedRead'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'allowedWrite'); ?>
		<?php echo $form->checkBox($model, 'allowedWrite'); ?>
		<?php echo $form->error($model,'allowedWrite'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->