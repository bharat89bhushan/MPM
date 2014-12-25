<?php
/* @var $this ProductionPlanDetailsController */
/* @var $data ProductionPlanDetails */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('production_plan_id')); ?>:</b>
	<?php echo CHtml::encode($data->production_plan_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('article_detail_id')); ?>:</b>
	<?php echo CHtml::encode($data->article_detail_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />


</div>