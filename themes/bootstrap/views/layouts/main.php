<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                                
                array('label'=>'Pessoas','icon'=>'user' ,'url'=>'#', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
                    array('label'=>'Usuários','url'=>array('user/admin') ),                                    
                    '---',
                    array( 'label'=>'Papeis dos Usuários', 'url'=>array('vComUserRole/admin')),                    
                    array('label'=>'Configurações Papel de Usuário X Regras de publicações', 'url'=>array('vComUPIAggregationRuleStart/admin')),
                    array('label'=>'Configurações Papel de usuário X Regras de respostas', 'url'=>array('vComUPIAggregationRuleResponseOf/admin')),
                    
                )),
                
                array('label'=>'Veículos de Comunicação','icon'=>'road', 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
                    array('label'=>'Espaços Virtuais', 'url'=>array('virtualSpace/admin')),
                    array('label'=>'Veículos de Comunicação', 'url'=>array('vComComposite/admin')),
                    '---',
                    array('label'=>'Áreas de Interação', 'url'=>array('vComBase/admin')),
                    array('label'=>'Regras de Inicialização', 'url'=>array('uPIAggregationRuleStart/admin')),
                    array('label'=>'Regras de Respostas', 'url'=>array('uPIAggregationRuleResponseOf/admin')),
                    '---',
                    array('label'=>'Tipos de UPI', 'url'=>array('uPIType/admin')),
                    '---',
                    array('label'=>'Publicar Veículo de Comunicação', 'icon'=>'share', 'url'=>array('vComComposite/publish')),
                    
                )),                
                
                
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        ),
    ),
)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

                <div class="clear"></div>

	
                <div id="footer"  >
            <div class="row" >
                <label class="text-right" >Copyright &copy; <?php echo date('Y'); ?> por <b>Bernard Corrêa Pereira.</b> All Rights Reserved.</label>
            </div>
            <div class="row" >
                <label class="text-right" ><?php echo Yii::powered(); ?></label>
            </div>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
