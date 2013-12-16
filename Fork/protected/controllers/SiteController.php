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
		$this->render('groups',array('groupList'=>Groups::getAll()));
	}
	
	public function actionAddGroup()
	{
		if(isset($_POST['application']) && isset($_POST['group_name'])) {
			//insert or update submit
			
			if(isset($_POST['group_id']))
			{
				//update submit
				$newGroup = Groups::get($_POST['group_id']);
				if($newGroup->update($_POST['group_name'],$_POST['application'])==1)
				{
					$this->redirect(array("site/groups",'success'=>2));
				}
				else
				{
					$this->redirect(array("site/groups",'success'=>-2));
				}
			}
			else
			{
				//insert submit
				$newGroup = new Groups(0,$_POST['group_name'],$_POST['application']);
				if($newGroup->insert()==1)
				{
					$this->redirect(array("site/groups",'success'=>1));
				}
				else
				{
					$this->redirect(array("site/groups",'success'=>-1));
				}
			}
		}
		$id = 0;
		$data = null;
		if(isset($_GET['id'])) {
			//update page
			$id = $_GET['id'];
			$data = Groups::get($_GET['id']);
		}
		$this->render('addGroup',array('id'=>$id,'data'=>$data,'applicationList'=>UserApplication::getAll()));
	}
	
	public function actionDeleteGroup ()
	{
		if(isset($_GET['id']))
		{
			//delete
			$id = $_GET['id'];
			$newGroup = Groups::get($id);
			if($newGroup->delete()==1)
			{
				$this->redirect(array("site/groups",'success'=>3));
			}
			else
			{
				$this->redirect(array("site/groups",'success'=>-3));
			}
		}
		else
		{
			$this->redirect('site/groups');
		}
	}
	
	public function actionMenu()
	{
		$application_id = 1;
		if(isset($_POST['application_id']))
			$application_id = $_POST['application_id'];
		$this->render('menu',array('application_id'=>$application_id,'menuList'=>MenuData::getAll($application_id),'applicationList'=>UserApplication::getAll()));
	}
	
	public function actionAddMenu()
	{
		if(isset($_POST['application']) && isset($_POST['menu_name']) && isset($_POST['menu_link']) && isset($_POST['parent'])) {
			//insert or update submit
			
			if(isset($_POST['menu_id']))
			{
				//update submit
				$newMenu = MenuData::get($_POST['menu_id']);
				if($newMenu->update($_POST['application'], $_POST['menu_name'], $_POST['menu_link'], $_POST['parent'])==1)
				{
					$this->redirect(array("site/menu",'success'=>2));
				}
				else
				{
					$this->redirect(array("site/menu",'success'=>-2));
				}
			}
			else
			{
				if($_POST['application']==0)
				{
					$this->redirect(array("site/menu",'success'=>-1));
				}
				else
				{
					//insert submit
					$newMenu = new MenuData(0, $_POST['application'], $_POST['menu_name'], $_POST['menu_link'], $_POST['parent'],0);
					if($newMenu->insert()==1)
					{
						$this->redirect(array("site/menu",'success'=>1));
					}
					else
					{
						$this->redirect(array("site/menu",'success'=>-1));
					}
				}
			}
		}
		$id = 0;
		$data = null;
		if(isset($_GET['id'])) {
			//update page
			$id = $_GET['id'];
			$data = MenuData::get($_GET['id']);
		}
		$this->render('addMenu',array('id'=>$id,'data'=>$data,'applicationList'=>UserApplication::getAll(),'parentList'=>MenuData::getParent()));
	}
	
	public function actionDeleteMenu ()
	{
		if(isset($_GET['id']))
		{
			//delete
			$id = $_GET['id'];
			$newMenu = MenuData::get($id);
			if($newMenu->delete()==1)
			{
				$this->redirect(array("site/menu",'success'=>3));
			}
			else
			{
				$this->redirect(array("site/menu",'success'=>-3));
			}
		}
		else
		{
			$this->redirect('site/menu');
		}
	}
	
	public function actionAddGroupUsers ()
	{
		if(isset($_POST['action']) && ($_POST['action']==='remove' || $_POST['action']==='add') && isset($_POST['group_id_new']) && $_POST['group_id_new']!=='0')
		{
			if($_POST['action']==='add' && isset($_POST['notActive']))
			{
				foreach($_POST['notActive'] as $user)
				{
					GroupUsers::addGroupUser($user,$_POST['group_id_new']);
				}
			}
			else if(isset($_POST['active']))
			{
				foreach($_POST['active'] as $user)
				{
					GroupUsers::removeGroupUser($user,$_POST['group_id_new']);
				}
			}
		}
	}
	
	public function actionGroupUsers()
	{
		if(isset($_POST['action']) && ($_POST['action']==='remove' || $_POST['action']==='add') && isset($_POST['group_id_new']) && $_POST['group_id_new']!=='0')
		{
			if($_POST['action']==='add' && isset($_POST['notActive']))
			{
				foreach($_POST['notActive'] as $user)
				{
					GroupUsers::addGroupUser($user,$_POST['group_id_new']);
				}
			}
			else if(isset($_POST['active']))
			{
				foreach($_POST['active'] as $user)
				{
					GroupUsers::removeGroupUser($user,$_POST['group_id_new']);
				}
			}
		}
		$application_id = 0;
		$group_id = 0;
		$groupList = 0;
		$userIn = 0;
		$userOut = 0;
		if(isset($_POST['application_id']))
		{
			$application_id = $_POST['application_id'];
			$groupList = Groups::getByApplication($_POST['application_id']);
		}
		if(isset($_POST['group_id']))
			$group_id = $_POST['group_id'];
		if(isset($_POST['application_id']) && isset($_POST['group_id']))
		{
			$userIn = GroupUsers::getAllIn($_POST['application_id'], $_POST['group_id']);
			$userOut = GroupUsers::getAllOut($_POST['application_id'], $_POST['group_id']);
		}
		$this->render('groupUsers',array('application_id'=>$application_id, 'group_id'=>$group_id, 'applicationList'=>UserApplication::getAll(), 'groupList'=>$groupList, 'userIn'=>$userIn, 'userOut'=>$userOut));
	}
	
	public function actionGroupList()
	{
		$this->layout = false;
		if(isset($_GET['action']) && isset($_GET['app']) && isset($_GET['group']))
		{
			if($_GET['action']==='in')
			{
				$this->render('groupList',array('userList'=>GroupUsers::getAllIn($_GET['app'], $_GET['group'])));
			}
			else if($_GET['action']==='out')
			{
				$this->render('groupList',array('userList'=>GroupUsers::getAllOut($_GET['app'], $_GET['group'])));
			}
		}
		else
		{
			$this->render('groupList',array('groupList'=>Groups::getByApplication($_GET['id'])));
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
	public function actionAccess ()
	{
		if(isset($_POST['action']) && ($_POST['action']==='remove' || $_POST['action']==='add') && isset($_POST['group_id_new']) && $_POST['group_id_new']!=='0')
		{
			if($_POST['action']==='add' && isset($_POST['notActive']))
			{
				foreach($_POST['notActive'] as $user)
				{
					GroupUsers::addGroupUser($user,$_POST['group_id_new']);
				}
			}
			else if(isset($_POST['active']))
			{
				foreach($_POST['active'] as $user)
				{
					GroupUsers::removeGroupUser($user,$_POST['group_id_new']);
				}
			}
		}
		$application_id = 0;
		$group_id = 0;
		$groupList = 0;
		$menuList = 0;
		if(isset($_POST['application_id']))
		{
			$application_id = $_POST['application_id'];
			$groupList = Groups::getByApplication($_POST['application_id']);
		}
		if(isset($_POST['group_id']))
			$group_id = $_POST['group_id'];
		if(isset($_POST['application_id']) && isset($_POST['group_id']))
		{
			$menuList = MenuGroupAccess::getAll($_POST['application_id'], $_POST['group_id']);
		}
		$this->render('menuGroupAccess', array('application_id'=>$application_id, 'group_id'=>$group_id, 'applicationList'=>UserApplication::getAll(), 'groupList'=>$groupList, 'menuList'=>$menuList));
	}
	public function actionMenuGroupAccessList()
	{
		$this->layout = false;
		if(isset($_GET['app']) && isset($_GET['group']))
		{
			$menuList = MenuGroupAccess::getAll($_GET['app'], $_GET['group']);
			$this->render('menuGroupAccessList', array('menuList'=>$menuList));
		}
	}
	public function actionChangeGroupAccess()
	{
		if(isset($_POST['application_id']) && isset($_POST['group_id']) && isset($_POST['menu_id']) && isset($_POST['checked']))
		{
			$connection = Yii::app()->db;
			$command = 0;
			
			if($_POST['checked']!=='checked')
			{
				$command = $connection->createCommand("INSERT INTO asd(asd) VALUES ('nilai checked = ".$_POST['checked']."')");
				$command->execute();
				$command = $connection->createCommand("UPDATE menugroupaccess SET status=0, userchange='".Yii::app()->user->name."', datechange=NOW() WHERE group_id='".$_POST['group_id']."' AND menu_id='".$_POST['menu_id']."' AND application_id='".$_POST['application_id']."'");
			}
			else
			{
				$command = $connection->createCommand("UPDATE menugroupaccess SET status=1, userchange='".Yii::app()->user->name."', datechange=NOW() WHERE group_id='".$_POST['group_id']."' AND menu_id='".$_POST['menu_id']."' AND application_id='".$_POST['application_id']."'");
			}
			$result = $command->execute();
		}
		//'application_id='+$('#application_id_new').val()+'&group_id='+$('#group_id_new').val()+'&menu_id='+$(this).val()
	}
	public function actionForgotPass ()
	{
		$this->layout = false;
		$this->render('forgotPassword');
	}
}