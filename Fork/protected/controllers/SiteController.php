<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		/*
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
		*/
		if(!Yii::app()->user->isGuest) {
			$this->redirect("?r=site/index");
		}
		else {
			if(isset($_POST['email']) && isset($_POST['password'])) {
				$user = new UserIdentity($_POST['email'],$_POST['password']);
				$user->authenticate();
				if($user->errorCode===UserIdentity::ERROR_NONE)
				{
					$duration= 3600*24*30; // 30 days
					Yii::app()->user->login($user,$duration);
					$this->layout = "//layout/main.php";
					$this->redirect("?r=site/index");
				}
				else {
					$this->layout = false;
					$this->render('login',array('error'=>$user->errorCode));
				}
			}
			else {
				$this->layout = false;
				$this->render('login');
			}
		}
	}
	
	public function actionGroups() {
		
		if(isset($_POST['group_id']) && isset($_POST['name'])) {
			$id = $_POST['group_id'];
			$name = $_POST['name'];
			$connection = Yii::app()->db;
			$query = "SELECT group_id, group_name FROM groups WHERE stsrc=1 AND group_id=$id";
			$command = $connection->createCommand($query);
			$result = $command->execute();
			if($result['group_name']!==$name) {
				$query = "UPDATE groups SET stsrc=0, userchange='".Yii::app()->user->name."', datechange=NOW() WHERE group_id=$id AND stsrc=1";
				$command = $connection->createCommand($query);
				$result = $command->execute();
				$name = $_POST['name'];
				$query = "INSERT INTO groups(group_name, application_id, stsrc, userchange, datechange) VALUES ('$name',1,1,'".Yii::app()->user->name."', NOW())";
				$command = $connection->createCommand($query);
				$result = $command->execute();
				$actionSuccess = 1;
			}
		}
		else if(isset($_POST['name'])) {
			$name = $_POST['name'];
			$connection = Yii::app()->db;
			$query = "INSERT INTO groups(group_name, application_id, stsrc, userchange, datechange) VALUES ('$name',1,1,'".Yii::app()->user->name."', NOW())";
			$command = $connection->createCommand($query);
			$result = $command->execute();
			$actionSuccess = 2;
		}
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT group_id, group_name, application_name FROM groups g JOIN application a ON g.application_id = a.application_id AND g.stsrc=1 AND a.stsrc=1");
		$groupList = $command->queryAll();
		$result = 0;
		if(isset($_GET['success'])) {
			$result = 1;
		}
		$this->render('groups',array('groupList'=>$groupList,'success'=>$result));
		//$this->render('groups');
	}
	public function actionGroupPop () {
		if(isset($_GET['id'])) {
			$id = $_GET['id'];
			$connection = Yii::app()->db;
			$command = $connection->createCommand("SELECT group_id, group_name FROM groups WHERE group_id='$id' AND stsrc=1");
			$result = $command->queryAll();
			$this->layout = false;
			$this->render('groupPop',array('groupData'=>$result));
		}
		else {
			$this->layout = false;
			$this->render('groupPop');
		}
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionGroupUsers(){
		$this->render('groupUsers');
	}
	public function actionMenu(){
		$this->render('menu');
	}
	public function actionMenuPop(){
		$this->layout=false;
		$this->render('menuPop');
	}
	public function actionUsers () {
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT user_id, username, email, gender, age, location_name FROM users u JOIN location l ON u.location_id = l.location_id WHERE u.stsrc=1 AND l.stsrc=1");
		$userList = $command->queryAll();
		$this->render('users',array('userList'=>$userList));
	}
	public function actionAddUser () {
		if(isset($_POST['uid']) && isset($_POST['uname']) && isset($_POST['email']) && isset($_POST['password1']) && isset($_POST['gender']) && isset($_POST['age']) && isset($_POST['location'])) {
			$connection = Yii::app()->db;
			$id = $_POST['uid'];
			$query = "UPDATE users SET stsrc=0 WHERE user_id='$id'";
			$command = $connection->createCommand($query);
			$result = $command->execute();
			$user = new UserData($_POST['uname'], $_POST['email'], $_POST['password1'], $_POST['gender'], $_POST['age'], $_POST['location']);
			$user->authenticate();
			if($user->errorCode===UserData::ERROR_NONE)
			{
				$uname = $_POST['uname'];
				$email = $_POST['email'];
				$password = $_POST['password1'];
				$gender = $_POST['gender'];
				$age = $_POST['age'];
				$location = $_POST['location'];
				$randomHash = "";
				for($i = 0;$i<5;$i++) {
					$temp = rand()%62;
					if($temp<10)
						$randomHash .= $temp;
					else if($temp<36)
						$randomHash .= chr(($temp-10)+97);
					else
						$randomHash .= chr(($temp-36)+65);
				}
				$password = md5($randomHash.md5($password).$randomHash);
				$query = "INSERT INTO users(username, email, password, hash, gender, age, location_id, stsrc, userchange, datechange) VALUES('$uname','$email','$password','$randomHash','$gender','$age','$location','1','".Yii::app()->user->name."',NOW())";
				$command = $connection->createCommand($query);
				$result = $command->execute();
				$query = "UPDATE users SET stsrc=0, userchange='".Yii::app()->user->name."', datechange=NOW() WHERE user_id='$id'";
				$command = $connection->createCommand($query);
				$result = $command->execute();
				$this->redirect("index.php?r=site/users&success=1");
				//$this->render("users",array('success'=>1));
			}
			else {
				$id = $_POST['uid'];
				$query = "UPDATE users SET stsrc=1 WHERE user_id='$id'";
				$command = $connection->createCommand($query);
				$result = $command->execute();
				$command = $connection->createCommand("SELECT location_id, location_name FROM location WHERE stsrc=1");
				$locationList = $command->queryAll();
				$this->render('addUser',array('locationList'=>$locationList,'error'=>$user->errorCode));
			}
		}
		else if(isset($_POST['uname']) && isset($_POST['email']) && isset($_POST['password1']) && isset($_POST['gender']) && isset($_POST['age']) && isset($_POST['location'])) {
			$user = new UserData($_POST['uname'], $_POST['email'], $_POST['password1'], $_POST['gender'], $_POST['age'], $_POST['location']);
			$user->authenticate();
			if($user->errorCode===UserData::ERROR_NONE)
			{
				$connection = Yii::app()->db;
				$uname = $_POST['uname'];
				$email = $_POST['email'];
				$password = $_POST['password1'];
				$gender = $_POST['gender'];
				$age = $_POST['age'];
				$location = $_POST['location'];
				$randomHash = "";
				for($i = 0;$i<5;$i++) {
					$temp = rand()%62;
					if($temp<10)
						$randomHash .= $temp;
					else if($temp<36)
						$randomHash .= chr(($temp-10)+97);
					else
						$randomHash .= chr(($temp-36)+65);
				}
				$password = md5($randomHash.md5($password).$randomHash);
				$query = "INSERT INTO users(username, email, password, hash, gender, age, location_id, stsrc, userchange, datechange) VALUES('$uname','$email','$password','$randomHash','$gender','$age','$location','1','".Yii::app()->user->name."',NOW())";
				$command = $connection->createCommand($query);
				$result = $command->execute();
				$this->render("users",array('success'=>1));
			}
			else {
				$connection = Yii::app()->db;
				$command = $connection->createCommand("SELECT location_id, location_name FROM location WHERE stsrc=1");
				$locationList = $command->queryAll();
				$this->render('addUser',array('locationList'=>$locationList,'error'=>$user->errorCode));
			}
		}
		else {
			$connection = Yii::app()->db;
			$command = $connection->createCommand("SELECT location_id, location_name FROM location WHERE stsrc=1");
			$locationList = $command->queryAll();
			$this->render('addUser',array('locationList'=>$locationList));
		}
	}
	public function actionApplication () {
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT application_name, application_link, copyright FROM application WHERE stsrc=1");
		$applicationList = $command->queryAll();
		$this->render('application',array('applicationList'=>$applicationList));
		//$this->render('application');
	}
	public function actionApplicationPop () {
		$this->layout=false;
		$this->render('applicationPop');
	}
	public function actionAccess () {
		$this->render('menuGroupAccess');
	}
	public function actionForgotPass () {
		$this->layout = false;
		$this->render('forgotPassword');
	}
}