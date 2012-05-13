<?php
$this->breadcrumbs=array(
	'Жанры'=>array('index'),
	'Добавить жанр',
);

$this->menu=array(
	array('label'=>'Список жанров', 'url'=>array('index')),
);
?>

<h1>Добавить жанр</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>