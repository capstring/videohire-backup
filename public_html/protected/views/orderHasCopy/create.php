<?php
$this->breadcrumbs=array(
	'Order Has Copies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OrderHasCopy', 'url'=>array('index')),
	array('label'=>'Manage OrderHasCopy', 'url'=>array('admin')),
);
?>

<h1>Create OrderHasCopy</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>