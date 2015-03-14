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
	$.fn.yiiGridView.update('vcom-composite-grid', {
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

<?php 
    /**
     * @description: $dataProvider garante a regra de negócio, como ponto de acesso. Decisão de projeto infrige MVC e Segurança.
     * 
     * 
     */
     /*
    $dataProvider=new CActiveDataProvider('VComComposite', array(
        'criteria'=>array(
            'alias' => 'vcc',
            'join' => ' INNER JOIN VComUserRole ON VComUserRole.vcomcomposite = `vcc`.id '.
                      ' INNER JOIN UserVComUserRole ON UserVComUserRole.vcomuserrole = VComUserRole.id ',
            //'join' =>   ' INNER JOIN VComUserRole ON VComUserRole.vcomcomposite   = `vcc`.id  '.
            //            ' INNER JOIN UserVComUserRole ON UserVComUserRole.vcomuserrole = VComUserRole.id   ',            
            'condition'=>'  ( `vcc`.vcomcomposite = 1 OR `vcc`.vcomcomposite IS NULL ) AND  `vcc`.id <> 1  AND VComUserRole.allowedEditVCom = 1  AND UserVComUserRole.user =  '.Yii::app()->user->getId(),
            'order'=>'name',
            //'condition'=>' ( VCC.vcomcomposite = 1 OR  VCC.vcomcomposite IS NULL ) AND VCC.id <> 1  AND VComUserRole.allowedEditVCom = 1 AND  UserVComUserRole.user =  '.Yii::app()->user->getId() ,
            //'condition'=>' (( vcomcomposite = 1 OR  vcomcomposite IS NULL ) and id <> 1 AND vcomcomposite IN ( SELECT vcomcomposite FROM VComUserRole  WHERE  allowedEditVCom = TRUE   ) )   ',
            //'with'=>array('VirtualSpace','VComComposite','User' ),
        ),
        'pagination'=>array(
            'pageSize'=>20,
        ),
    ));
    */
    $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'vcom-composite-grid',
	//'dataProvider' => $model->search(),
        'dataProvider' => $dataProvider,
	//'filter' => $model->find(" vcomcomposite = 1 "),
        'filter' => $model,
	'columns' => array(
		'id',
		'name',
		'description',
		array(
				'name'=>'virtualspace',
				'value'=>'GxHtml::valueEx($data->virtualspace0)',
				'filter'=>GxHtml::listDataEx(VirtualSpace::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'vcomcomposite',
				'value'=>'GxHtml::valueEx($data->vcomcomposite0)',
				'filter'=>GxHtml::listDataEx(VComComposite::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'createruser',
				'value'=>'GxHtml::valueEx($data->createruser0)',
				'filter'=>GxHtml::listDataEx(User::model()->findAllAttributes(null, true)),
				),
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>