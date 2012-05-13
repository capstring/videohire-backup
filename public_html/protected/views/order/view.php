<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Order', 'url'=>array('index')),
	array('label'=>'Create Order', 'url'=>array('create')),
	array('label'=>'Update Order', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Order', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Order', 'url'=>array('admin')),
);
?>

<h1>Заказ #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'hash',
		'user_id',
	),
)); ?>

<?php
	echo '<h3>Заказанные видео</h3>';
	foreach ($model->orderHasCopies as $copy)
	{
		echo '<a href="'.Yii::app()->homeUrl.'/video/view/'.$copy->copy->video->id.'">'.$copy->copy->video->name.'</a><br/>';
	}
	if (is_null($model->orderHasCopies[0]->dtime_start))
		echo '<a href="'.Yii::app()->homeUrl.'/order/issue?order_id='.$model->id.'"><input type="button" value="Выдать заказ"/></a>';
	else
		echo '<a href="'.Yii::app()->homeUrl.'/order/close?order_id='.$model->id.'"><input type="button" value="Закрыть заказ"/></a>'
?>
