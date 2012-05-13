<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<?php
		Yii::app()->clientScript->registerCoreScript('jquery');
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/script.js');
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery-1.4.2.min.js');
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.jcarousel.js');
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/main.js');
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/style.css');
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/skin.css');
	?>
	</head>
	<body> 
		<div class="wrap-big">
			<div class="green-line"></div>
			<div class="page">

				<!-- HEADER -->
				<div class="header">

					<div class="header-up">
						<div class="hello-user">
							добро пожаловать на сайт, <span class="user-name">%username!</span>
						</div>
						<div class="main-menu-wrapper">
							<ul class="main-menu">
								<li><a href="<?php echo Yii::app()->homeUrl; ?>">Главная</a></li>
								<li>|</li>
								<?php
									if (!Yii::app()->user->isGuest)
									{
										echo '<li><a href="'.Yii::app()->homeUrl.'/user">Личный кабинет</a></li>';
										echo '<li>|</li>';
									}
								?>
								<li><a href="#">О компании</a></li>
								<?php
									if (Yii::app()->user->getRole()=='administrator'||Yii::app()->user->getRole()=='moderator')
										{
											echo '<li>|</li>';
											echo '<li><a href="'.Yii::app()->homeUrl.'/order/admin">Админка</a></li>';
										}
								?>
							</ul>
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="header-down">
						<div class="search">
							<input class="" type="text" onfocus="change(this)" onblur="doDefault(this)" value="Поиск">
						</div>
						<div class="site-face">
							<div id="site-logo">
								<img src="/images/logo.png" />
								<!--<a href="#">лого здесь</a>-->
							</div>
							<div class="site-main">
								<!-- Лучше это всё картинкой сделать -->
								<span class="main-string">Самый лучший Видеопрокат</span>
								<br />
								<span class=""> наверное...</span>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<!-- end HEADER -->
				<!-- CONTENT -->
				<div class="content">
					<?php echo $content; ?>
				</div>
			</div>
		</div>
		<!-- FOOTER -->
		<div class="footer">
				<div class="footer-upline"></div>
				<div class="footer-downline"></div>
		</div>
		<!-- end FOOTER -->
	</body>
</html>