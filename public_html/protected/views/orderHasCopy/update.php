<?php
$this->breadcrumbs=array(
	'Order Has Copies'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrderHasCopy', 'url'=>array('index')),
	array('label'=>'Create OrderHasCopy', 'url'=>array('create')),
	array('label'=>'View OrderHasCopy', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OrderHasCopy', 'url'=>array('admin')),
);
?>

<h1>Update OrderHasCopy <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>