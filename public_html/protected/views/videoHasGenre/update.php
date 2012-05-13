<?php
$this->breadcrumbs=array(
	'Video Has Genres'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List VideoHasGenre', 'url'=>array('index')),
	array('label'=>'Create VideoHasGenre', 'url'=>array('create')),
	array('label'=>'View VideoHasGenre', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage VideoHasGenre', 'url'=>array('admin')),
);
?>

<h1>Update VideoHasGenre <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>