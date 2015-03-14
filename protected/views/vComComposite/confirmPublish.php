<div class="span-8 row alert alert-success">  
    
    <div class="">
        <h1> Confirmação da Publicação </h1>
        <p>
            Ao clicar em <strong>"Publicar Veículo de Comunicação"</strong> o veículo de comunicação será disponibilizado no webservice central. 
            Caso este tenha sido publicado anteriormente, suas informações serão sobrescritas, podendo gerar efeitos indesejáveis no ambiente.
        </p>
        
             
        <h2 class="row alert alert-info ">  <?php echo GxHtml::encode(GxHtml::valueEx($model));?>
            <?php echo GxHtml::link(
                    "Publicar veículo de comunicação", 
                    array('finishPublish','id' => $model->id),
                    array('class' => 'btn btn-danger pull-right') 
            ); ?>
         
        </h2>
    </div>
   

  
<?php
        $this->renderPartial('_viewVComComposite', array(
                'model' => $model,
        ));
?>
</div>
