<?php
$this->breadcrumbs=array(
	'Trashes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Trash', 'url'=>array('index')),
	array('label'=>'Create Trash', 'url'=>array('create')),
	array('label'=>'Update Trash', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Trash', 'url'=>array('admin')),
);
?>

<h1>View Trash #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'copy_id',
	),
)); ?>
