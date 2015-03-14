<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('description')); ?>:
	<?php echo GxHtml::encode($data->description); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('vcomcomposite')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->vcomcomposite0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('virtualspace')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->virtualspace0)); ?>
	<br />

</div>