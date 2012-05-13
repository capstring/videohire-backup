<?php
$this->breadcrumbs=array(
	'Order Has Copies',
);

$this->menu=array(
	array('label'=>'Create OrderHasCopy', 'url'=>array('create')),
	array('label'=>'Manage OrderHasCopy', 'url'=>array('admin')),
);
?>

<h1>Order Has Copies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
