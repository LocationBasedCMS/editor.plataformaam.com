<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('Nome')); ?>:
	<?php echo GxHtml::encode($data->Nome); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('Descrição')); ?>:
	<?php echo GxHtml::encode($data->Descrição); ?>
	<br />

</div>