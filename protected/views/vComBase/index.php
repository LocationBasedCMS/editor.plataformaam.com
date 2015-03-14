<?php

$this->breadcrumbs = array(
	VComBase::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Criar') . ' ' . VComBase::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Gerenciar') . ' ' . VComBase::label(2), 'url' => array('admin')),
);
?>

<h1  class="alert alert-info "><?php echo GxHtml::encode(VComBase::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 