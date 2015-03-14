<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('vcombase')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->vcombase0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('upitype')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->upitype0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('description')); ?>:
	<?php echo GxHtml::encode($data->description); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('requirePositionToCreate')); ?>:
	<?php echo GxHtml::encode($data->requirePositionToCreate); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('requirePositionToView')); ?>:
	<?php echo GxHtml::encode($data->requirePositionToView); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('visibleDistance')); ?>:
	<?php echo GxHtml::encode($data->visibleDistance); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('republisAllowed')); ?>:
	<?php echo GxHtml::encode($data->republisAllowed); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('isSingleton')); ?>:
	<?php echo GxHtml::encode($data->isSingleton); ?>
	<br />
	*/ ?>

</div>