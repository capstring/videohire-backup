<?php
$this->breadcrumbs=array(
	'Копии'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Копии', 'url'=>array('index')),
	array('label'=>'Добавить копию', 'url'=>array('create')),
	array('label'=>'Редактировать', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить копию', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Просмотр</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'video_id',
		'type_id',
		'cost',
		'location',
	),
)); ?>
