<?php
$this->breadcrumbs=array(
	'Копии'=>array('index'),
	'Добавить копию',
);

$this->menu=array(
	array('label'=>'Копии', 'url'=>array('index')),
);
?>

<h1>Добавить копию</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>