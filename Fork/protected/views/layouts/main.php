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
<script>
	
</script>
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
		
		<ul id="mainNav">			
			<li id="navIndex" class="nav active"> <!-- active -->
				<span class="icon-home"></span><!-- icon -->
				<a href="index.php?r=site/index">Index</a>	
			</li>
						
			<li id="navMenu" class="nav">
				<span class="icon-document-alt-stroke"></span><!-- icon -->
				<a href="index.php?r=site/menu">Menu Management</a>
			</li>	
			
			<li id="navUser" class="nav">
				<span class="icon-article"></span>
				<a href="javascript:;">User Management</a>
				<ul class="subNav">
					<li><a href="index.php?r=site/application">Application</a></li>
					<li><a href="index.php?r=site/users">Users</a></li>
					<li><a href="index.php?r=site/groups">Groups</a></li>
					<li><a href="index.php?r=site/menu">Menu</a></li>
					<li><a href="index.php?r=site/groupUsers">Group Users</a></li>
					<li><a href="index.php?r=site/access">Menu Group Access</a></li>
				</ul>
			</li>
			<li id="navUser" class="nav">
				<span class="icon-article"></span>
				<a href="javascript:;">Forks</a>
				<ul class="subNav">
					<li><a href="index.php?r=fork/locations">Location</a></li>
					<li><a href="index.php?r=fork/provider">Provider</a></li>
					<li><a href="index.php?r=fork/restaurant">Restaurant</a></li>
					<li><a href="index.php?r=fork/restaurantPromo">Restaurant Promo</a></li>
					<li><a href="index.php?r=fork/restaurantReview">Restaurant Review</a></li>
					<li><a href="index.php?r=fork/restaurantLocation">Restaurant Location</a></li>
					<li><a href="index.php?r=fork/foodCategory">FoodCategory</a></li>
				</ul>
			</li>
		</ul>
				
	</div> <!-- #sidebar -->
	
	<?php echo $content; ?>
	
	<div id="topNav">
		 <ul>
		 	<li>
		 		<a href="#menuProfile" class="menu"><?php echo "username"; ?></a>
		 		
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