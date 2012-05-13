<?php
$this->breadcrumbs=array(
	'Жанры'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список жанров', 'url'=>array('index')),
	array('label'=>'Добавить жанр', 'url'=>array('create')),
	array('label'=>'Изменить жанр', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить жанр', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1><?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
