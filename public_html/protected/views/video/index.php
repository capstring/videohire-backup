<?php
$this->breadcrumbs=array(
	'Видео',
);

if (Yii::app()->user->getRole()=='moderator'||Yii::app()->user->getRole()=='administrator')
{
	$this->menu=array(
		array('label'=>'Добавить видео', 'url'=>array('create')),
	);
}
?>

<h1>Видео</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
