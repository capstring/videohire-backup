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

<!-- MAIN COLUMN -->
<div class="main-column">
	<!-- NEW -->
	<div class="film-content-new">
		<h2>Новинки</h2>
			<ul class="car-popular jcarousel-skin-tango">
			<?php
				$new = Video::model()->getNewVideos();
				foreach ($new as $video)
				{
					echo '<li class="film-content-item">';
					echo '<div class="film-content-image">';
					echo '<img src="'.$video->getImageUrl().'" />';
					echo '</div>';
					echo '<div class="film-content-title">';
					echo '<a href="'.Yii::app()->homeUrl.'/video/view/'.$video->id.'"<span>'.$video->name.'</span></a>';
					echo '</div>';
					echo '</li>';
				}
			?>
		</ul>
		<div class="clear"></div>
	</div>
	<!-- end NEW -->
	<!-- POPULAR -->
	<div class="film-content-popular">
		<h2>Популярное</h2>
		<ul class="car-popular jcarousel-skin-tango">
			<?php
				$popular = Video::model()->getpopularVideos();
				foreach ($popular as $video)
				{
					echo '<li class="film-content-item">';
					echo '<div class="film-content-image">';
					echo '<img src="'.$video->getImageUrl().'" />';
					echo '</div>';
					echo '<div class="film-content-title">';
					echo '<a href="'.Yii::app()->homeUrl.'/video/view/'.$video->id.'"<span>'.$video->name.'</span></a>';
					echo '</div>';
					echo '</li>';
				}
			?>
		</ul>
	<div class="clear"></div>
	</div>
	<!-- end POPULAR -->
</div>
<!-- end MAIN COLUMN -->

<div class="clear"></div>
<div class="push"></div>