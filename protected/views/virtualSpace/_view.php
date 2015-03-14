<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('startLatitude')); ?>:
	<?php echo GxHtml::encode($data->startLatitude); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('startLongitude')); ?>:
	<?php echo GxHtml::encode($data->startLongitude); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('stopLatitude')); ?>:
	<?php echo GxHtml::encode($data->stopLatitude); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('stopLongitude')); ?>:
	<?php echo GxHtml::encode($data->stopLongitude); ?>
	<br />

</div>