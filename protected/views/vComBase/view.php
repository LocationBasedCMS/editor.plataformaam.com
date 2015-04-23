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
'name',
'description',
array(
			'name' => 'vcomcomposite0',
			'type' => 'raw',
			'value' => $model->vcomcomposite0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->vcomcomposite0)), array('vComComposite/view', 'id' => GxActiveRecord::extractPkValue($model->vcomcomposite0, true))) : null,
			),
array(
			'name' => 'virtualspace0',
			'type' => 'raw',
			'value' => $model->virtualspace0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->virtualspace0)), array('virtualSpace/view', 'id' => GxActiveRecord::extractPkValue($model->virtualspace0, true))) : null,
			),
	),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('uPIAggregationRuleStarts')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->uPIAggregationRuleStarts as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('uPIAggregationRuleStart/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
                echo GxHtml::openTag('ul');
                    foreach($relatedModel->uPIAggregationRuleResponseOfs as $relatedModel2) {
                        echo GxHtml::openTag('li');
                        echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel2)), array('uPIAggregationRuleResponseOf/view', 'id' => GxActiveRecord::extractPkValue($relatedModel2, true)));
                        echo GxHtml::openTag('ul');
                    }
                echo GxHtml::closeTag('ul');
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>