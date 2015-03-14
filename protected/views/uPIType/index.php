<?php

$this->breadcrumbs = array(
	UPIType::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Criar') . ' ' . UPIType::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Gerenciar') . ' ' . UPIType::label(2), 'url' => array('admin')),
);
?>

<h1  class="alert alert-info "><?php echo GxHtml::encode(UPIType::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 