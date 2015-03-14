<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Criar') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Gerenciar') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1  class="alert alert-info "><?php echo '<label class=\'  label label-info \' >'.Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
array(
			'name' => 'vcombase0',
			'type' => 'raw',
			'value' => $model->vcombase0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->vcombase0)), array('vComBase/view', 'id' => GxActiveRecord::extractPkValue($model->vcombase0, true))) : null,
			),
array(
			'name' => 'upitype0',
			'type' => 'raw',
			'value' => $model->upitype0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->upitype0)), array('uPIType/view', 'id' => GxActiveRecord::extractPkValue($model->upitype0, true))) : null,
			),
'name',
'description',
'requirePositionToCreate:boolean',
'requirePositionToView:boolean',
'visibleDistance',
'republisAllowed:boolean',
'isSingleton:boolean',
	),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('uPIAggregationRuleResponseOfs')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->uPIAggregationRuleResponseOfs as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('uPIAggregationRuleResponseOf/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2><?php echo GxHtml::encode($model->getRelationLabel('uPIAggregationRuleResponseOfs1')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->uPIAggregationRuleResponseOfs1 as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('uPIAggregationRuleResponseOf/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2><?php echo GxHtml::encode($model->getRelationLabel('vComUPIAggregationRuleStarts')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->vComUPIAggregationRuleStarts as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('vComUPIAggregationRuleStart/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>