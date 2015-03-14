<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
                                //array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                                //array('label'=>'Contact', 'url'=>array('/site/contact')),
                            
                            
                                array(
                                    'label'=>'Pessoas !', 
                                    'url'=>'#', 
                                    'linkOptions'=> array(
                                         'class' => 'dropdown-toggle',
                                         'data-toggle' => 'dropdown',
                                    ),
                                    'itemOptions' => array('class'=>'dropdown user'),                 
                                    'items'=>array(
                                        array('label'=>'Usuários','url'=>array('user/index') ),                                    array(
                                        array( 'label'=>'Papeis no VCOM', 'url'=>'#'),
                                    ),
                                )),                            	


                            
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest ),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                            
                                /*
                                array('label'=>'Veículos de Comunicação','url'=>array('vComComposite/index'),'visible'=>!Yii::app()->user->isGuest,  'items'=>array(
                                    array('label'=>'Espaços Virtuais', 'url'=>array('virtualSpace/index')),
                                    array('label'=>'Composições', 'url'=>array('vComComposite/index')),
                                    array('label'=>'Bases', 'url'=>array('vComBase/index')),
                                    array('label'=>'Bases -> Regras', 'url'=>array('uPIAggregationRuleStart/index')),
                                    array('label'=>'Bases -> Respostas', 'url'=>array('uPIAggregationRuleResponseOf/index')),
                                    array('label'=>'Tipos', 'url'=>array('uPIType/index')),
                                )),

                                 */
			),
                    'encodeLabel' => false,
                    'htmlOptions' => array(
                             'class'=>'nav pull-right',
                     ),
                     'submenuHtmlOptions' => array(
                             'class' => 'dropdown-menu',
                     )                    
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
