<?php
/* @var $this ConfigUnitsController */
/* @var $model ConfigUnits */

$this->breadcrumbs=array(
	'Config Units'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Process', 'url'=>array('configProcess/admin')),
	array('label'=>'Item Types', 'url'=>array('configItemTypes/admin')),
	array('label'=>'Property Types', 'url'=>array('configPropTypes/admin')),
	array('label'=>'Property Type Values', 'url'=>array('configPropTypeValues/admin')),
);

?>

<h1>Manage Units</h1>
<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php// echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php// $this->renderPartial('_search',array(
	//'model'=>$model,
//)); ?>
</div>--><!-- search-form -->
<?
echo CHtml::link('Clean Plan', array('default/CleanPlan'));
?>
