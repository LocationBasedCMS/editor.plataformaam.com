<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'upitype-form',
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

		<h3><?php echo GxHtml::encode($model->getRelationLabel('uPIAggregationRuleResponseOfs')); ?></h3>
		<?php echo $form->checkBoxList($model, 'uPIAggregationRuleResponseOfs', GxHtml::encodeEx(GxHtml::listDataEx(UPIAggregationRuleResponseOf::model()->findAllAttributes(null, true)), false, true)); ?>
		<h3><?php echo GxHtml::encode($model->getRelationLabel('uPIAggregationRuleStarts')); ?></h3>
		<?php echo $form->checkBoxList($model, 'uPIAggregationRuleStarts', GxHtml::encodeEx(GxHtml::listDataEx(UPIAggregationRuleStart::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->