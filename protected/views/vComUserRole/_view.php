<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('vcomcomposite')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->vcomcomposite0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('allowedEditVComAggregationRule')); ?>:
	<?php echo GxHtml::encode($data->allowedEditVComAggregationRule); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('allowedEditVCom')); ?>:
	<?php echo GxHtml::encode($data->allowedEditVCom); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('isClientDefault')); ?>:
	<?php echo GxHtml::encode($data->isClientDefault); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('isClientSelectable')); ?>:
	<?php echo GxHtml::encode($data->isClientSelectable); ?>
	<br />

</div>