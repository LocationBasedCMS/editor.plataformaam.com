<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('vcomuserole')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->vcomuserole0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('upiaggregationruleresponseof')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->upiaggregationruleresponseof0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('allowedRead')); ?>:
	<?php echo GxHtml::encode($data->allowedRead); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('allowedWrite')); ?>:
	<?php echo GxHtml::encode($data->allowedWrite); ?>
	<br />

</div>