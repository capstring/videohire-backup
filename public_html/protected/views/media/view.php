<?php
$this->breadcrumbs=array(
	'Типы носителей'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Типы носителей', 'url'=>array('index')),
	array('label'=>'Добавить тип', 'url'=>array('create')),
	array('label'=>'Изменить тип', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить тип', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
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
