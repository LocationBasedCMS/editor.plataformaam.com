<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('upiaggregationrulestart')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->upiaggregationrulestart0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('upitype')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->upitype0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('requirePositionToResponse')); ?>:
	<?php echo GxHtml::encode($data->requirePositionToResponse); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('requirePositionToView')); ?>:
	<?php echo GxHtml::encode($data->requirePositionToView); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('republisAllowed')); ?>:
	<?php echo GxHtml::encode($data->republisAllowed); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('aceptMultiple')); ?>:
	<?php echo GxHtml::encode($data->aceptMultiple); ?>
	<br />
	*/ ?>

</div>