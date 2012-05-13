<?php
$this->breadcrumbs=array(
	'Genres'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Изменить',
);

$this->menu=array(
	array('label'=>'Жанры', 'url'=>array('index')),
	array('label'=>'Добавить жанр', 'url'=>array('create')),
	array('label'=>'Просмотр жанра', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Изменить жанр</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>