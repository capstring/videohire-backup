<?php
$this->breadcrumbs=array(
	'Типы носителей',
);

$this->menu=array(
	array('label'=>'Добавить тип', 'url'=>array('create')),
);
?>

<h1>Типы носителей</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
