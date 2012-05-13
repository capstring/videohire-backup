<?php
$this->breadcrumbs=array(
	'Видео'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Изменить',
);

$this->menu=array(
	array('label'=>'Видео', 'url'=>array('index')),
	array('label'=>'Добавить видео', 'url'=>array('create')),
	array('label'=>'Просмотр информации', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Редактирование видео</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>