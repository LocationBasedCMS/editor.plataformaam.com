<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	
	array('label'=>Yii::t('app', 'Criar') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Editar') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Gerenciar') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1  class="alert alert-info "><?php echo '<label class=\'  label label-info \' >'.Yii::t('app', 'Visualizar') . '  ' . GxHtml::encode($model->label()) . '</label>' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
array(
			'name' => 'upiaggregationrulestart0',
			'type' => 'raw',
			'value' => $model->upiaggregationrulestart0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->upiaggregationrulestart0)), array('uPIAggregationRuleStart/view', 'id' => GxActiveRecord::extractPkValue($model->upiaggregationrulestart0, true))) : null,
			),
array(
			'name' => 'upitype0',
			'type' => 'raw',
			'value' => $model->upitype0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->upitype0)), array('uPIType/view', 'id' => GxActiveRecord::extractPkValue($model->upitype0, true))) : null,
			),
'name',
'requirePositionToResponse:boolean',
'requirePositionToView:boolean',
'republisAllowed:boolean',
'aceptMultiple:boolean',
	),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('vComUPIAggregationRuleResponseOfs')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->vComUPIAggregationRuleResponseOfs as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('vComUPIAggregationRuleResponseOf/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>