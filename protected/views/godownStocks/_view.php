<?php
/* @var $this GodownStocksController */
/* @var $data GodownStocks */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('article_id')); ?>:</b>
	<?php echo CHtml::encode($data->article_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quality_id')); ?>:</b>
	<?php echo CHtml::encode($data->quality_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qty')); ?>:</b>
	<?php echo CHtml::encode($data->qty); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unit_id')); ?>:</b>
	<?php echo CHtml::encode($data->unit_id); ?>
	<br />


</div>