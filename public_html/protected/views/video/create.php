<?php
$this->breadcrumbs=array(
	'Видео'=>array('index'),
	'Добавить видео',
);
?>

<h1>Добавить видео</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>