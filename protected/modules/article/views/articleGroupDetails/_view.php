<?php
/* @var $this ArticleGroupDetailsController */
/* @var $data ArticleGroupDetails */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('article_group_id')); ?>:</b>
	<?php echo CHtml::encode($data->article_group_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('process_id')); ?>:</b>
	<?php echo CHtml::encode($data->process_id); ?>
	<br />


</div>