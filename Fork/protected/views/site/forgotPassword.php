<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>


<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>

	<title>New Application - Login</title>

	<meta charset="utf-8" />
	<meta name="description" content="" />
	<meta name="author" content="" />		
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" title="no title" />
	<link rel="stylesheet" href="css/text.css" type="text/css" media="screen" title="no title" />
	<link rel="stylesheet" href="css/buttons.css" type="text/css" media="screen" title="no title" />
	<link rel="stylesheet" href="css/theme-default.css" type="text/css" media="screen" title="no title" />
	<link rel="stylesheet" href="css/login.css" type="text/css" media="screen" title="no title" />
	<link rel="stylesheet" href="css/all.css" type="text/css" />
</head>

<body>

<div id="login">
	<h1>Forgot Password?</h1>
	<div id="login_panel">
		<form action="?r=site/login" method="post" accept-charset="utf-8" class="form uniformForm validateForm" >		
			<div class="login_fields">
				<div class="field">
					<label for="email">Please input your email or password. We will send confirmation and instruction to your email on how to reset your password.</label>
					<input type="text" name="email" value="" id="email" tabindex="1" placeholder="johnsmith12 or email@example.com" class="validate[required,minSize[5]]" />		
				</div>
				<?php
					if(isset($error)) {
					?>
				<div class="field">
					<span class="ticket ticket-important"><?php echo UserIdentity::getErrorMessage($error); ?></span>
				</div>
				<?php
					}
				?>
			</div> <!-- .login_fields -->
			<div class="login_actions">
				<button type="submit" class="btn btn-primary" tabindex="3">Reset Password</button>
			</div>
		</form>
	</div> <!-- #login_panel -->		
</div> <!-- #login -->

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/all.js"></script>


</body>
</html>