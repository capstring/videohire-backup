<?php
$this->breadcrumbs=array(
	'Video Has Genres'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List VideoHasGenre', 'url'=>array('index')),
	array('label'=>'Create VideoHasGenre', 'url'=>array('create')),
	array('label'=>'Update VideoHasGenre', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete VideoHasGenre', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VideoHasGenre', 'url'=>array('admin')),
);
?>

<h1>View VideoHasGenre #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'video_id',
		'genre_id',
	),
)); ?>
