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
'startLatitude',
'startLongitude',
'stopLatitude',
'stopLongitude',
	),
)); ?>


<?php    
    Yii::import('application.extensions.EGMap.*');
    $gMap = new EGMap();
    $gMap->setJsName('virtual_space_map');
    $gMap->width = '100%';
    $gMap->height = 300;
    $gMap->zoom = 13;
    $gMap->setCenter(
            ( $model->__get('startLatitude') + $model->__get('stopLatitude') )/2 ,
            ( $model->__get('startLongitude') + $model->__get('stopLongitude'))/2 );

    $bounds = new EGMapBounds(
            new EGMapCoord($model->__get('startLatitude'),$model->__get('startLongitude')),
            new EGMapCoord($model->__get('stopLatitude'),$model->__get('stopLongitude')) );
    $rec = new EGMapRectangle($bounds);
    $rec->addHtmlInfoWindow(new EGMapInfoWindow('Hey! I am a rectangle!'));

    $gMap->addRectangle($rec);

    $gMap->renderMap();    
    ?>




<h2><?php echo GxHtml::encode($model->getRelationLabel('vComBases')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->vComBases as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('vComBase/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2><?php echo GxHtml::encode($model->getRelationLabel('vComComposites')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->vComComposites as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('vComComposite/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');

?>

