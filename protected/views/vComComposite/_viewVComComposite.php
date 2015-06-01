
<?php 
$arrayVirtualSpace[] = $model->virtualspace0;

$this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
'name',
'description',
array(
			'name' => 'virtualspace0',
			'type' => 'raw',
			'value' => $model->virtualspace0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->virtualspace0)), array('virtualSpace/view', 'id' => GxActiveRecord::extractPkValue($model->virtualspace0, true))) : null,
			),
array(
			'name' => 'vcomcomposite0',
			'type' => 'raw',
			'value' => $model->vcomcomposite0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->vcomcomposite0)), array('vComComposite/view', 'id' => GxActiveRecord::extractPkValue($model->vcomcomposite0, true))) : null,
			),
array(
			'name' => 'createruser0',
			'type' => 'raw',
			'value' => $model->createruser0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->createruser0)), array('user/view', 'id' => GxActiveRecord::extractPkValue($model->createruser0, true))) : null,
			),
	),
)); ?>
<div class="row-fluid">
    <div class="span4">

        <h3><?php echo GxHtml::encode($model->getRelationLabel('vComComposites')); ?></h3>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->vComComposites as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('vComComposite/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
                $arrayVirtualSpace[] = $relatedModel->virtualspace0;
	}
	echo GxHtml::closeTag('ul');
?>

<h3><?php echo GxHtml::encode($model->getRelationLabel('vComBases')); ?></h3>
<?php
	echo GxHtml::openTag('ul');
        $arrayvComBases = $model->getRecursiveVComBases();
	foreach($model->vComBases as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('vComBase/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
                $arrayVirtualSpace[] = $relatedModel->virtualspace0;
	}
	echo GxHtml::closeTag('ul');
?>

<h3><?php echo GxHtml::encode($model->getRelationLabel('vComUserRoles')); ?></h3>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->vComUserRoles as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('vComUserRole/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>  
    </div>
    <div class="span8 alert">
        <?php 
            //Algoritimo Para Buscar os VCOMs Composites 
        
            
        
        
        
        
            $principal = $arrayVirtualSpace[0];
            Yii::import('application.extensions.EGMap.*');
            $gMap = new EGMap();
            $gMap->setJsName('virtual_space_map');
            $gMap->width = '100%';
            $gMap->height = 300;
            $gMap->zoom = 13;
            $gMap->setCenter(
                    ( $principal->__get('startLatitude') + $principal->__get('stopLatitude') )/2 ,
                    ( $principal->__get('startLongitude') + $principal->__get('stopLongitude'))/2 );
            
            foreach ($arrayVirtualSpace as $virtualSpace ) {
                $bounds = new EGMapBounds(
                        new EGMapCoord($virtualSpace->__get('startLatitude'),$virtualSpace->__get('startLongitude')),
                        new EGMapCoord($virtualSpace->__get('stopLatitude'),$virtualSpace->__get('stopLongitude')) );
                $rec = new EGMapRectangle($bounds);
                $gMap->addRectangle($rec);
            }
            $gMap->renderMap();    
        ?>
    </div>
</div>
