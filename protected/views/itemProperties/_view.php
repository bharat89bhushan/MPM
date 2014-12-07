<?php
/* @var $this ItemPropertiesController */
/* @var $data ItemProperties */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_id')); ?>:</b>
	<?php echo CHtml::encode($data->item_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prop_val_id')); ?>:</b>
	<?php echo CHtml::encode($data->prop_val_id); ?>
	<br />


</div>