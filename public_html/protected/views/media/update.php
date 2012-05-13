<?php
$this->breadcrumbs=array(
	'Типы носителей'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Изменить',
);

$this->menu=array(
	array('label'=>'Типы носителей', 'url'=>array('index')),
	array('label'=>'Добавить тип', 'url'=>array('create')),
	array('label'=>'Просмотреть', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Изменить</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>