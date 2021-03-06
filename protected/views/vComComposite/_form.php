<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'vcom-composite-form',
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
		<?php echo $form->labelEx($model,'virtualspace'); ?>
		<?php echo $form->dropDownList($model, 'virtualspace', GxHtml::listDataEx(VirtualSpace::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'virtualspace'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'vcomcomposite'); ?>
		<?php echo $form->dropDownList($model, 'vcomcomposite', GxHtml::listDataEx(VComComposite::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'vcomcomposite'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'createruser'); ?>
		<?php echo $form->dropDownList($model, 'createruser', GxHtml::listDataEx( User::model()->findAllByAttributes ( array('id' => Yii::app()->user->getId())) )); ?>
		<?php echo $form->error($model,'createruser'); ?>
		</div><!-- row -->

		<h3><?php echo GxHtml::encode($model->getRelationLabel('vComBases')); ?></h3>
		<?php echo $form->checkBoxList($model, 'vComBases', GxHtml::encodeEx(GxHtml::listDataEx(VComBase::model()->findAllAttributes(null, true)), false, true)); ?>
		<h3><?php echo GxHtml::encode($model->getRelationLabel('vComComposites')); ?></h3>
		<?php echo $form->checkBoxList($model, 'vComComposites', GxHtml::encodeEx(GxHtml::listDataEx(VComComposite::model()->findAllAttributes(null, true)), false, true)); ?>
		<h3><?php echo GxHtml::encode($model->getRelationLabel('vComUserRoles')); ?></h3>
		<?php echo $form->checkBoxList($model, 'vComUserRoles', GxHtml::encodeEx(GxHtml::listDataEx(VComUserRole::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->