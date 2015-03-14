<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>
<style>
.text-justify {
  text-align: justify;
}
    
    
</style>
<hr />
<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
    'heading'=>'Aprendizagem em Movimento',
    'htmlOptions' => array(
        'style' => 'color:#333355; background-image: url('.Yii::app()->baseUrl.'/images/hero-unit-bg2.png'.')',
     ),
    )    
); ?>

<p>Crie seu veículo de comunicaçãolocativo hoje mesmo !.</p>
<?php $this->endWidget(); ?>

<?php

    $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
        'id'=>'dialogInfoLocalize',
        // additional javascript options for the dialog plugin
        'options'=>array(
            'title'=>'Localizar seu Veículo de Comunicação',
            'autoOpen'=>false,
            'modal' => true,
            'width' => '800',
            'buttons' => array(
                    'Ok'=>'js:function(){ $( this ).dialog( "close" );  }',),
            
        ),
    ));

    ?> 
    <div class="row-fluid">
        <div class="span4">
            
            <h4>Crie Espaços Virtuais</h4>
            <p> Espaços Virtuais são Áreas onde seu Veículo de Comunicação funcionará !  </p>
            <hr />
            <img class="img-polaroid " src="<?=Yii::app()->baseUrl.'/images/tutorial/info_mapa_virtual_space.png'?>" />
            <hr />
            <p> ---- </p>
            
        </div>
        <div class="span4">
            <h4>Os Veículos de Comunicação</h4>
            <img class="img-rounded " src='<?=Yii::app()->baseUrl.'/images/tutorial/info_vcomcomposite_vcombase.png'?>' />
            
            <p> Uma estrutura recursiva em formato de árvore de composições, iniciando a partir de uma composição inicial, e podendo ter sub-composições ou bases ! </p>
        </div>
        <div class="span4">
            <h4>Onde a Mágica Acontece</h4>
            <img class="img-circle" data-src="holder.js/140x140" />
            <p> As composições são o arupamento de coisas do veículo de comunicação, as Bases que detem as formas de comunicação dos veículos. Uma composição pode ter inúmeras bases, cada uma com suas regras !</p>
        </div>
        
    </div>

    <?php
    $this->endWidget('zii.widgets.jui.CJuiDialog');
?>


<hr />

<!-- Three columns of text below the carousel -->
<div class="row">
        <div class="span4">
          <h2>Localize</h2>
          <p class="text-justify" >Aonde você gosta de ir?! Crie seu <b>Veículo de Comunicação</b>, chame seus amigos e faça seu passeio, conectando o <b>mundo real</b> ao mundo virtual ! </p>
          <p><?php echo CHtml::link('Mais Informações &raquo;', '#Localize', array('onclick'=>'$("#dialogInfoLocalize").dialog("open"); return false;', 'class' => 'btn' ));  ?></p>
          
        </div>
        
        <div class="span4">
          <h2>Formate</h2>
          <p class="text-justify" >
              Imagem, vídeos, texto, áudio. Como elas devem se relacionar,  e Seja Feliz ! </p>
          <p> <a class="btn" href="#">Mais Informações &raquo;</a></p>
       </div>
        <div class="span4">
          <h2>Crie Papeis </h2>
          <p class="text-justify" >Colaborar e Compartilhar é importante ! Cada um possuirá papeis para interagir em seu VCom. Experimente ainda hoje! </p>
          <p><a class="btn" href="#">Mais Informações &raquo;</a></p>
        </div>  
</div><!-- /.row -->

<hr />






