<?php
$this->breadcrumbs=array(
	'Trashes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Trash', 'url'=>array('index')),
	array('label'=>'Manage Trash', 'url'=>array('admin')),
);
?>

<h1>Create Trash</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>