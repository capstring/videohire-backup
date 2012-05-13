<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div class="main-links">
			<ul>
				<?php
					if (Yii::app()->user->isGuest)
					{
						echo '<li><a href="/index.php/site/login">Вход</a></li>';
						echo '<li><a href="/index.php/user/registration">Регистрация</a></li>';
					}
					else
					{
						$user = User::model()->findByPk(Yii::app()->user->getId());
						echo '<li><b>'.$user->login.'</b></li>';
						echo '<li><a href="/index.php/site/logout">Выход</a></li>';
					}
				?>
			</ul>
		</div>
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->


	<div id="mainmenu">
		<?php 
		if (Yii::app()->user->getRole()=='moderator')
			$this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array('label'=>'Главная', 'url'=>array('/site/index')),
					array('label'=>'Заказы', 'url'=>array('/order/admin')),
					array('label'=>'Видео', 'url'=>array('/video/index')),
					array('label'=>'Копии', 'url'=>array('/copy/index')),
					array('label'=>'Жанры', 'url'=>array('/genre/index')),
					array('label'=>'Типы носителей', 'url'=>array('/media/index')),
				),
			));
		else if (Yii::app()->user->getRole()=='administrator') 
			$this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array('label'=>'Главная', 'url'=>array('/site/index')),
					array('label'=>'Заказы', 'url'=>array('/order/admin')),
					array('label'=>'Видео', 'url'=>array('/video/index')),
					array('label'=>'Копии', 'url'=>array('/copy/index')),
					array('label'=>'Жанры', 'url'=>array('/genre/index')),
					array('label'=>'Типы носителей', 'url'=>array('/media/index')),
					array('label'=>'Конфигурации механизма выдачи рекомендаций', 'url'=>array('/site/artConfig')),
				),
			));
		else if (Yii::app()->user->getRole()=='user')
			$this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array('label'=>'Главная', 'url'=>array('/site/index')),
					array('label'=>'Видео', 'url'=>array('/video/index')),
					array('label'=>'Корзина('.Trash::model()->copiesInTrash().')', 'url'=>array('/trash/index')),
				),
			)); 
		else
			$this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array('label'=>'Главная', 'url'=>array('/site/index')),
					array('label'=>'Видео', 'url'=>array('/video/index')),
				),
			));
		?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
