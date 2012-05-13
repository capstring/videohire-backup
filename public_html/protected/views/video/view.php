<?php
Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/script.js');
?>
<!-- RIGHT SIDEBAR -->
<div class="sidebar-right">
	<!-- BASKET -->
	<div class="basket-block">
		<h3>Корзина</h3>
		<div class="basket-block-content">
			<div class="basket-block-item">
				<div class="item-image">
					<img src="img/basket_film.jpg" />
				</div>
				<div class="image-content">
					<h4 class="item-title">заголовок фильма</h4>
					<div class="item-summary">
						о фильме. о фильме
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="basket-block-item">
				<div class="item-image">
					<img src="img/basket_film.jpg" />
				</div>
				<div class="image-content">
					<h4 class="item-title">заголовок фильма</h4>
					<div class="item-summary">
						о фильме. о фильме
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="basket-block-item">
				<div class="item-image">
					<img src="img/basket_film.jpg" />
				</div>
				<div class="image-content">
					<h4 class="item-title">заголовок фильма</h4>
					<div class="item-summary">
						о фильме. о фильме
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<!-- end BASKET -->
	

</div>
<!-- end RIGHT SIDEBAR -->

<div class="main-column">
	<!-- ONE FILM-->
	<div class="full-film">
		<div class="full-film-image"> 
			<img src="<?php echo $model->getImageUrl(); ?>" />
		</div>
		<div>
			<h1><?php echo $model->name; ?></h1>
			<div class="full-film-system-information">
				<?php echo $model->dtime.', '.$model->getGenreAsString(); ?>
			</div>
			<div class="to_basket">
				<input type="button" value="Добавить в корзину" />
			</div>
			<div class="full-image-description">
				<p><?php echo $model->description; ?></p>
			</div>
			<table class="full-film-other-information">
				<tr>
					<th>Режиссер:&nbsp;</th>
					<td><?php echo $model->producer; ?></td>
				</tr>
				<tr>
					<th>Актеры:</th>
					<td><?php echo $model->actors; ?></td>
				</tr>
				<tr>
					<th>Наличие:</th>
					<td> Был где-то...</td>
				</tr>
			</table>
		</div>
		<div class="clear"></div>
	</div>
	<div class="recommendation">
		<?php
		Yii::app()->ART;
		$recommended = Yii::app()->ART->recommended(array($model->id));
		if (sizeof($recommended)>0)
		{
			echo '<div class="recommended">';
			echo '<h4>Рекомендуем Вам посмотреть следующие фильмы</h4>';
			foreach ($recommended as $video_id)
			{
				$video = Video::model()->findByPk($video_id);
				echo '<div><a href="'.Yii::app()->homeUrl.'/video/view/'.$video_id.'">'.$video->name.'</a></div>';
			}
			echo '</div>';
		}
		?>
		<div class="clear"></div>
	</div>
	<!-- end ONE FILM-->
	
	<!-- FILM LIST -->
	<!--
	<table class="teaser-film">
		
		<tr class="teaser-film-item">
			<td class="teaser-film-image">
				
				<a href="#"><img src="img/teaser_film.jpg" /></a>
			</td>
			<td class="teaser-film-other">
				<h2><a href="#">Одинокие сердца</a></h2>
				<div class="teaser-film-system-information">
					2011, США, , 91 минута
				</div>
				<span class="cost">300 p.</span>
				<div class="to_basket">
					<a href="#">Добавить в корзину</a>
				</div>
			</td>
			<td class="teaser-film-price">
				Приключение, Боевик, Комедия
			</td>
		</tr>
		<tr class="teaser-film-item">
			<td class="teaser-film-image">
				
				<a href="#"><img src="img/teaser_film.jpg" /></a>
			</td>
			<td class="teaser-film-other">
				<h2><a href="#">Одинокие сердца</a></h2>
				<div class="teaser-film-system-information">
					2011, США, , 91 минута
				</div>
				<span class="cost">300 p.</span>
				<div class="to_basket">
					<input type="button" value="Добавить в корзину" />
				</div>
			</td>
			<td class="teaser-film-price">
				Приключение, Боевик, Комедия
			</td>
		</tr>
		<tr class="teaser-film-item">
			<td class="teaser-film-image">
				
				<a href="#"><img src="img/teaser_film.jpg" /></a>
			</td>
			<td class="teaser-film-other">
				<h2><a href="#">Одинокие сердца</a></h2>
				<div class="teaser-film-system-information">
					2011, США, , 91 минута
				</div>
				<span class="cost">300 p.</span>
				<div class="to_basket">
					<input type="button" value="Добавить в корзину" />
				</div>
			</td>
			<td class="teaser-film-price">
				Приключение, Боевик, Комедия
			</td>
		</tr>						
		
		
	</table>
	-->
	<!-- end FILM LIST -->
	
</div>
<!-- end MAIN COLUMN -->

<div class="clear"></div>
<div class="push"></div>


	
