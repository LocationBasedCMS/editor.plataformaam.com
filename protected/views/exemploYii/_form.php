<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'exemplo-yii-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'Nome'); ?>
		<?php echo $form->textField($model, 'Nome', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'Nome'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'Descrição'); ?>
		<?php echo $form->textArea($model, 'Descrição'); ?>
		<?php echo $form->error($model,'Descrição'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->