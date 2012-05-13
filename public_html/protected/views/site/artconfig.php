<form action="<?php echo Yii::app()->homeUrl;?>/site/artConfig" method="post">
	<div class="row">
		<label>Количество рекомендованных фильмов</label><br/>
		<input type="text" name="artConfig[limit]" value="<?php echo Yii::app()->params->limit; ?>"/>
	</div>
	<div class="row">
		<label>Внимательность алгоритма</label><br/>
		<input type="text" name="artConfig[vigilance]" value="<?php echo Yii::app()->params->vigilance; ?>"/>
	</div>
	<div class="row">
		<label>Количество итераций</label><br/>
		<input type="text" name="artConfig[count]" value="<?php echo Yii::app()->params->count; ?>" />
	</div>
	<input type="submit" value="Сохранить" />
	<br/>
	<br/>
	<div class="row">
		<label>Текущая длина векторов: </label><?php echo sizeof(Video::model()->findAll()); ?>
	</div>
	<br/>

</form>
<table class="table">
	<tr>
		<th>Логин</th>
		<?php 

		$videos = Video::model()->findAll();
		foreach ($videos as $video)
			echo '<th>'.$video->name.'</th>';
		?>
	</tr>

	<?php
	$result = Yii::app()->ART->art1();
	foreach ($result['features'] as $key=>$vector)
	{
		$user = User::model()->findByPk($key);
		echo '<tr><td>'.$user->login.'</td>';
		foreach ($vector as $item)
			echo '<td>'.$item.'</td>';
		echo '</tr>';
	}

	?>
</table>

<table class="table">
	<?php
		$array_of_clusters = array();
		foreach ($result['membership'] as $user_id=>$member)
			$array_of_clusters[$member][] = $user_id;
		echo '<tr>';
		foreach ($array_of_clusters as $key=>$value)
			echo '<th>Кластер №'.$key.'</th>';
		echo '</tr><tr>';
		foreach ($array_of_clusters as $value)
		{
			echo '<td>';
			foreach ($value as $user_id)
			{
				$user = User::model()->findByPk($user_id);
				echo $user->login.' ';
			}
			echo '</td>';
		}
	?>
	<tr></th>
</table>