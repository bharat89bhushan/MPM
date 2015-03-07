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

<h1>Clean Data</h1>
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
<?php
echo CHtml::link("Clean ProductionPlan<br>", array('default/CleanPlan'));
?>
<?php
echo CHtml::link('Clean GodownStocks<br>', array('default/CleanGodownStock'));
?>
<?php
echo CHtml::link('Clean Purchase<br>', array('default/Purchase'));
?>
<?php
echo CHtml::link('Clean Sales<br>', array('default/Sales'));
?>

<?php
echo CHtml::link('Clean ItemTransfer<br>', array('default/Transfer'));
?>

<?php
echo CHtml::link('Clean Parties and Party Stock <br>', array('default/Parties'));
?>

<?php
echo CHtml::link('Clean Articles<br>', array('default/Articles'));
?>

<?php
echo CHtml::link('Clean Items<br>', array('default/Items'));
?>




