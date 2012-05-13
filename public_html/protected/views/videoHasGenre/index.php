<?php
$this->breadcrumbs=array(
	'Video Has Genres',
);

$this->menu=array(
	array('label'=>'Create VideoHasGenre', 'url'=>array('create')),
	array('label'=>'Manage VideoHasGenre', 'url'=>array('admin')),
);
?>

<h1>Video Has Genres</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
