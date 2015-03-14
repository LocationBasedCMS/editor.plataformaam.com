<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Gerenciar'),
);

$this->menu = array(
		
		array('label'=>Yii::t('app', 'Criar') . ' ' . $model->label(), 'url'=>array('create')),
	);


Yii::app()->clientScript->registerScript('search', "
$('.search-form').hide();
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('vcom-upiaggregation-rule-start-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1  class="alert alert-info "><?php echo '<label class=\'  label label-info \' >'.Yii::t('app', 'Gerenciar')  .  '</label>' . ' ' . GxHtml::encode($model->label(2)); ?></h1>

<p>
You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo GxHtml::link(Yii::t('app', 'Pesquisa Avançada'), '#', array('class' => 'search-button')); ?>
<div class="search-form">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'vcom-upiaggregation-rule-start-grid',
	'dataProvider' => $dataProvider,
	'filter' => $model,
	'columns' => array(
		'id',
		array(
				'name'=>'vcomuserrole',
				'value'=>'GxHtml::valueEx($data->vcomuserrole0)',
				'filter'=>GxHtml::listDataEx(VComUserRole::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'upiaggregationrulestart',
				'value'=>'GxHtml::valueEx($data->upiaggregationrulestart0)',
				'filter'=>GxHtml::listDataEx(UPIAggregationRuleStart::model()->findAllAttributes(null, true)),
				),
		array(
					'name' => 'allowedRead',
					'value' => '($data->allowedRead === 0) ? Yii::t(\'app\', \'No\') : Yii::t(\'app\', \'Yes\')',
					'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
					),
		array(
					'name' => 'allowedWrite',
					'value' => '($data->allowedWrite === 0) ? Yii::t(\'app\', \'No\') : Yii::t(\'app\', \'Yes\')',
					'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
					),
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>