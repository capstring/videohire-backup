<?php
$this->breadcrumbs=array(
	'Trashes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Trash', 'url'=>array('index')),
	array('label'=>'Create Trash', 'url'=>array('create')),
	array('label'=>'View Trash', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Trash', 'url'=>array('admin')),
);
?>

<h1>Update Trash <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>