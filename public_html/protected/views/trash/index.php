<?php
$this->breadcrumbs=array(
	'Корзина',
);

?>

<?php
	$this->menu = array(
		array('label'=>'Оформить заказ', 'url'=>Yii::app()->homeUrl.'/order/create'),
	);
?>
<h1>Корзина</h1>

<?php
	if ($dataProvider->itemCount>0)
	{
		$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
		));
		
		Yii::app()->ART;
		$recommended = Yii::app()->ART->recommended(Trash::model()->getVideosAsArray());

		if (sizeof($recommended)>0)
		{
			echo '<div class="recommended">';
			echo '<h4>Вместе с этими фильмами обычно заказывают следующие</h4>';
			foreach ($recommended as $video_id)
			{
				$video = Video::model()->findByPk($video_id);
				echo '<div><a href="'.Yii::app()->homeUrl.'/video/view/'.$video_id.'">'.$video->name.'</a></div>';
			}
			echo '</div>';
		}
	}
	else
		echo 'У Вас нет фильмов в корзине';
?>