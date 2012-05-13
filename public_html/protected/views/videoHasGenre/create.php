<?php
$this->breadcrumbs=array(
	'Video Has Genres'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VideoHasGenre', 'url'=>array('index')),
	array('label'=>'Manage VideoHasGenre', 'url'=>array('admin')),
);
?>

<h1>Create VideoHasGenre</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>