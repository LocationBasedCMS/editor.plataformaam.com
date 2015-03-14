<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'startLatitude'); ?>
		<?php echo $form->textField($model, 'startLatitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'startLongitude'); ?>
		<?php echo $form->textField($model, 'startLongitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'stopLatitude'); ?>
		<?php echo $form->textField($model, 'stopLatitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'stopLongitude'); ?>
		<?php echo $form->textField($model, 'stopLongitude'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
