<hr />
<div class="content container">
    <div class="row alert alert-info span8">
        <h2>
            <label class="badge badge-info">
                <?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
                <?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
            </label>
             <?php echo GxHtml::encode($data->name); ?> 
        </h2>
        <p><?php echo GxHtml::encode($data->description); ?>  </p>
        <p>
            <?php echo GxHtml::encode($data->getAttributeLabel('createruser')); ?>:
            <?php echo GxHtml::encode(GxHtml::valueEx($data->createruser0)); ?>
        </p>
        <p>
            <?php echo GxHtml::encode($data->getAttributeLabel('virtualspace')); ?>:
            <?php echo GxHtml::encode(GxHtml::valueEx($data->virtualspace0)); ?>
        </p>

        <p class="right pull-right">
              <?php echo GxHtml::link(
                                "Publicar", 
                                array('confirmPublish','id' => $data->id),
                                array('class' => 'btn btn-success right')
                      
                );?>
        </p>
    </div>
</div>