<?php
	//$content = "Haha this is something i am trying to write. lets see how far does this text go if i keep writing it like this. will it keep going to the right or would it wrap to the next line when the line is filled?";
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<meta charset="utf-8" />
	<meta name="description" content="" />
	<meta name="author" content="" />		
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/all.css" type="text/css" />
	
	<!--[if gte IE 9]>
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie9.css" type="text/css" />
	<![endif]-->
	
	<!--[if gte IE 8]>
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie8.css" type="text/css" />
	<![endif]-->
	
</head>

<body>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/all.js"></script>
<div id="wrapper">
	
	<div id="header">
		<h1><a href="index.php">Fork</a></h1>		
		
		<a href="javascript:;" id="reveal-nav">
			<span class="reveal-bar"></span>
			<span class="reveal-bar"></span>
			<span class="reveal-bar"></span>
		</a>
	</div> <!-- #header -->
	
	<div id="sidebar">		
		
		<?php
			$this->widget(
				'NavigationMenu',
				array(
					'id'=>'mainNav',
					'items'=>array(
						array(
							'id'=>'navUser',
							'label'=>'User Management', 'url'=>array('/site/'),
							'items'=>array(
								array('label'=>'Application', 'url'=>array('/site/application')),
								array('label'=>'Users', 'url'=>array('/site/users')),
								array('label'=>'Groups', 'url'=>array('/site/groups')),
								array('label'=>'Menu', 'url'=>array('/site/menu')),
								array('label'=>'Group Users', 'url'=>array('/site/groupUsers')),
								array('label'=>'Menu Group Access', 'url'=>array('/site/access')),
							),
							'submenuOptions'=>array('class'=>'subNav dropdown'),
							'itemOptions'=>array('class'=>'nav')
						),
						array(
							'id'=>'navFork',
							'label'=>'Fork', 'url'=>array('/fork/'),
							'items'=>array(
								array('label'=>'Location','url'=>array('/fork/locations')),
								array('label'=>'Food','url'=>array('/fork/food')),
								array('label'=>'Provider','url'=>array('/fork/provider')),
								array('label'=>'Restaurant','url'=>array('/fork/restaurant')),
								array('label'=>'Restaurant Promo','url'=>array('/fork/restaurantPromo')),
								array('label'=>'Restaurant Review','url'=>array('/fork/restaurantReview')),
								array('label'=>'Restaurant Location','url'=>array('/fork/restaurantLocation')),
								array('label'=>'Food Category','url'=>array('/fork/foodCategory'))
							),
							'submenuOptions'=>array('class'=>'subNav dropdown'),
							'itemOptions'=>array('class'=>'nav')
						)
					)
				)
			);
		?>
				
	</div> <!-- #sidebar -->
	
	<?php echo $content; ?>
	
	<div id="topNav">
		 <ul>
		 	<li>
		 		<a href="#menuProfile" class="menu"><?php echo Yii::app()->user->name; ?></a>
		 		
		 		<div id="menuProfile" class="menu-container menu-dropdown">
					<div class="menu-content">
						<ul class="">
							<li><a href="javascript:;">Edit Profile</a></li>
							<li><a href="javascript:;">Edit Settings</a></li>
							<li><a href="javascript:;">Suspend Account</a></li>
						</ul>
					</div>
				</div>
	 		</li>
		 	<li><a href="?r=/site/logout">Logout</a></li>
		 </ul>
	</div> <!-- #topNav -->
	
</div> <!-- #wrapper -->

<div id="footer">
	Copyright &copy; 2013 by Franky Jacky
</div>

</body>
</html>