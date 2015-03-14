<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('vcomuserrole')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->vcomuserrole0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('upiaggregationrulestart')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->upiaggregationrulestart0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('allowedRead')); ?>:
	<?php echo GxHtml::encode($data->allowedRead); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('allowedWrite')); ?>:
	<?php echo GxHtml::encode($data->allowedWrite); ?>
	<br />

</div>