<?php
$this->breadcrumbs=array(
	'Order Has Copies'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List OrderHasCopy', 'url'=>array('index')),
	array('label'=>'Create OrderHasCopy', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('order-has-copy-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Order Has Copies</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'order-has-copy-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'order_id',
		'copy_id',
		'dtime_start',
		'dtime_end',
		'dtime_end_actual',
		/*
		'employee_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
