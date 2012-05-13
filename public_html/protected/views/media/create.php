<?php
$this->breadcrumbs=array(
	'Типы носителей'=>array('index'),
	'Добавить тип',
);

$this->menu=array(
	array('label'=>'Типы носителей', 'url'=>array('index')),
);
?>

<h1>Добавить тип носителя</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>