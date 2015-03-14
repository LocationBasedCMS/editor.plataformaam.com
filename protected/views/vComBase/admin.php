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
	$.fn.yiiGridView.update('vcom-base-grid', {
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
	'id' => 'vcom-base-grid',
	'dataProvider' => $dataProvider,
	'filter' => $model,
	'columns' => array(
		'id',
		'name',
		'description',
		array(
				'name'=>'vcomcomposite',
				'value'=>'GxHtml::valueEx($data->vcomcomposite0)',
				'filter'=>GxHtml::listDataEx(VComComposite::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'virtualspace',
				'value'=>'GxHtml::valueEx($data->virtualspace0)',
				'filter'=>GxHtml::listDataEx(VirtualSpace::model()->findAllAttributes(null, true)),
				),
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>