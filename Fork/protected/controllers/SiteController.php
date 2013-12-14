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
	/*
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
	}*/

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
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
					$this->redirect(array('site/login','error'=>$user->errorCode));
				}
			}
			else {
				$this->layout = false;
				$this->render('login');
			}
		}
	}
	
	public function actionApplication ()
	{
		$this->render('application',array('applicationList'=>UserApplication::getAll()));
	}
	
	public function actionAddApplication ()
	{
		if(isset($_POST['app_name']) && isset($_POST['app_link']) && isset($_POST['app_copy']))
		{
			//insert or update submit
			if(isset($_POST['app_id']))
			{
				//update submit
				$newApplication = UserApplication::get($_POST['app_id']);
				if($newApplication->update($_POST['app_name'],$_POST['app_link'],$_POST['app_copy'])==1)
				{
					$this->redirect(array("site/application",'success'=>2));
				}
				else
				{
					$this->redirect(array("site/application",'success'=>-2));
				}
			}
			else
			{
				//insert submit
				$newApplication = new UserApplication(0,$_POST['app_name'],$_POST['app_link'],$_POST['app_copy']);
				if($newApplication->insert()==1)
				{
					$this->redirect(array("site/application",'success'=>1));
				}
				else
				{
					$this->redirect(array("site/application",'success'=>-1));
				}
			}
		}
		$id = 0;
		$data = null;
		if(isset($_GET['id'])) {
			//update page
			$id = $_GET['id'];
			$data = UserApplication::get($_GET['id']);
		}
		$this->render('addApplication',array('id'=>$id,'data'=>$data));
	}
	
	public function actionDeleteApplication ()
	{
		if(isset($_GET['id']))
		{
			//delete
			$id = $_GET['id'];
			$newApplication = UserApplication::get($id);
			if($newApplication->delete()==1)
			{
				$this->redirect(array("site/application",'success'=>3));
			}
			else
			{
				$this->redirect(array("site/application",'success'=>-3));
			}
		}
		else
		{
			$this->redirect('site/application');
		}
	}
	
	public function actionUsers ()
	{
		$this->render('users',array('userList'=>UserData::getAll()));
	}
	
	public function actionAddUser ()
	{
		if(isset($_POST['uname']) && isset($_POST['email']) && isset($_POST['password1']) && isset($_POST['gender']) && isset($_POST['age']) && isset($_POST['location'])) {
			//insert or update submit
			
			if(isset($_POST['user_id']))
			{
				//update submit
				$newUser = UserData::get($_POST['user_id']);
				if($newUser->update($_POST['uname'],$_POST['email'],$_POST['password1'],$_POST['gender'],$_POST['age'],$_POST['location'])==1)
				{
					$this->redirect(array("site/users",'success'=>2));
				}
				else
				{
					$this->redirect(array("site/users",'success'=>-2));
				}
			}
			else
			{
				//insert submit
				$newUser = new UserData(0,$_POST['uname'],$_POST['email'],$_POST['password1'],0,$_POST['gender'],$_POST['age'],$_POST['location']);
				if($newUser->insert()==1)
				{
					$this->redirect(array("site/users",'success'=>1));
				}
				else
				{
					$this->redirect(array("site/users",'success'=>-1));
				}
			}
		}
		$id = 0;
		$data = null;
		if(isset($_GET['id'])) {
			//update page
			$id = $_GET['id'];
			$data = UserData::get($_GET['id']);
		}
		$this->render('addUser',array('id'=>$id,'data'=>$data,'locationList'=>Location::getAll()));
	}
	
	public function actionDeleteUser ()
	{
		if(isset($_GET['id']))
		{
			//delete
			$id = $_GET['id'];
			$newUser = UserData::get($id);
			if($newUser->delete()==1)
			{
				$this->redirect(array("site/users",'success'=>3));
			}
			else
			{
				$this->redirect(array("site/users",'success'=>-3));
			}
		}
		else
		{
			$this->redirect('site/users');
		}
	}
	
	public function actionGroups()
	{
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
	public function actionGroupPop ()
	{
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
	
	public function actionGroupUsers()
	{
		$this->render('groupUsers');
	}
	public function actionMenu()
	{
		$this->render('menu');
	}
	public function actionMenuPop()
	{
		$this->layout=false;
		$this->render('menuPop');
	}
	public function actionAccess ()
	{
		$this->render('menuGroupAccess');
	}
	public function actionForgotPass ()
	{
		$this->layout = false;
		$this->render('forgotPassword');
	}
}