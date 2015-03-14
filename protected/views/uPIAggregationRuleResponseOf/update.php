<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model) => array('view', 'id' => GxActiveRecord::extractPkValue($model, true)),
	Yii::t('app', 'Editar'),
);

$this->menu = array(
	
	array('label' => Yii::t('app', 'Criar') . ' ' . $model->label(), 'url'=>array('create')),
	array('label' => Yii::t('app', 'Visualizar') . ' ' . $model->label(), 'url'=>array('view', 'id' => GxActiveRecord::extractPkValue($model, true))),
	array('label' => Yii::t('app', 'Gerenciar') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1  class="alert alert-info "><?php echo '<label class=\'  label label-info \' >'.Yii::t('app', 'Editar') . ' ' . GxHtml::encode($model->label()) .' </label>  '. ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model));
?>