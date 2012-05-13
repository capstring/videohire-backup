<?php
$this->breadcrumbs=array(
	'Order Has Copies'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List OrderHasCopy', 'url'=>array('index')),
	array('label'=>'Create OrderHasCopy', 'url'=>array('create')),
	array('label'=>'Update OrderHasCopy', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OrderHasCopy', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrderHasCopy', 'url'=>array('admin')),
);
?>

<h1>View OrderHasCopy #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'order_id',
		'copy_id',
		'dtime_start',
		'dtime_end',
		'dtime_end_actual',
		'employee_id',
	),
)); ?>
