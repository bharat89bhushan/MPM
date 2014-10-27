<?php
/* @var $this ItemsCompositionDetailsController */
/* @var $data ItemsCompositionDetails */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('icd_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->icd_id), array('view', 'id'=>$data->icd_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comp_id')); ?>:</b>
	<?php echo CHtml::encode($data->comp_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Item_id')); ?>:</b>
	<?php echo CHtml::encode($data->Item_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value')); ?>:</b>
	<?php echo CHtml::encode($data->value); ?>
	<br />


</div>