<?php
$this->breadcrumbs=array(
	'Копии'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Редактировать',
);

$this->menu=array(
	array('label'=>'Копии', 'url'=>array('index')),
	array('label'=>'Добавить копию', 'url'=>array('create')),
	array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Редактировать</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>