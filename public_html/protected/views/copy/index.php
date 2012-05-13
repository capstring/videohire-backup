<?php
$this->breadcrumbs=array(
	'Копии',
);

$this->menu=array(
	array('label'=>'Добавить копию', 'url'=>array('create')),
);
?>

<h1>Копии</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
