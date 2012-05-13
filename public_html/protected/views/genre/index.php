<?php
$this->breadcrumbs=array(
	'Жанры',
);

if (Yii::app()->user->getRole()=='moderator'||Yii::app()->user->getRole()=='administrator')
{
	$this->menu=array(
		array('label'=>'Добавить жанр', 'url'=>array('create')),
	);
}
?>

<h1>Жанры</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
