<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserData extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	 
	public $user_id;
	public $username;
	public $email;
	public $password;
	public $hash;
	public $gender;
	public $age;
	public $location_id;
	
	public function __construct($user_id, $username, $email, $password, $hash, $gender, $age, $location_id)
	{
		$this->user_id = $user_id;
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
		$this->hash = $hash;
		if($hash===0 && $user_id!==0)
		{
			$connection = Yii::app()->db;
			$command = $connection->createCommand("SELECT hash FROM users WHERE stsrc='a' AND user_id='".$user_id."'");
			$result = $command->queryAll();
			$hash = $result[0]['hash'];
		}
		$this->gender = $gender;
		$this->age = $age;
		$this->location_id = $location_id;
	}
	private function generateHash()
	{
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
		$this->hash = $randomHash;
		return $randomHash;
	}
	private function encryptPassword($password=0,$hash=0)
	{
		if($password===0 && $hash===0)
		{
			$this->password = md5($this->hash . md5($this->password) . $this->hash);
		}
		else if($hash===0)
		{
			return md5($this->hash . md5($password) . $this->hash);
		}
		else
		{
			return md5($hash . md5($password) . $hash);
		}
	}
	public static function getAll() {
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT user_id, username, email, gender, age, location_name FROM users u JOIN location l ON u.location_id = l.location_id WHERE u.stsrc='a' AND l.stsrc='a'");
		$userList = $command->queryAll();
		return $userList;
	}
	public static function get($id) {
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT user_id, username, email, password, hash, gender, age, location_id FROM users WHERE stsrc='a' AND user_id='$id'");
		$userList = $command->queryAll();
		$data = $userList[0];
		return new UserData($data['user_id'], $data['username'], $data['email'], $data['password'], $data['hash'], $data['gender'], $data['age'], $data['location_id']);
	}
	public function insert()
	{
		$connection = Yii::app()->db;
		$this->generateHash();
		$this->encryptPassword();
		$command = $connection->createCommand("INSERT INTO users(username, email, password, hash, gender, age, location_id, stsrc, userchange, datechange) VALUES('".$this->username."','".$this->email."','".$this->password."','".$this->hash."','".$this->gender."','".$this->age."','".$this->location_id."','a','".Yii::app()->user->name."',NOW())");
		return $command->execute();
	}
	public function update($username, $email, $password, $gender, $age, $location_id)
	{
		$password1 = $this->encryptPassword($password);
		if($this->username!==$username || $this->email!==$email || $this->password!==$password1 || $this->gender!==$gender || $this->age!==$age || $this->location_id!==$location_id)
		{
			$hash = $this->hash;
			if($this->password!==$password1)
			{
				$hash = $this->generateHash();
				$password1 = $this->encryptPassword($password,$hash);
			}
			$connection = Yii::app()->db;
			$command = $connection->createCommand("UPDATE users SET username='".$username."', email='".$email."', password='".$password1."', hash='".$hash."', gender='".$gender."', age='".$age."', location_id='".$location_id."', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE stsrc='a' AND user_id='".$this->user_id."'");
			return $command->execute();
		}
		return 0;
	}
	public function delete()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("UPDATE users SET stsrc='d', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE user_id='".$this->user_id."'");
		return $command->execute();
	}
	public function authenticate()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT username, email FROM users WHERE stsrc=1");
		$users = $command->queryAll();
		$data = null;
		foreach($users as $temp) {
			if(strcasecmp($this->username,$temp['username'])==0 || strcasecmp($this->username,$temp['email'])==0) {
				$data = $temp;
				break;
			}
		}
		if($data==null) {
			$this->errorCode=self::ERROR_NONE;
		}
		else
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		return !$this->errorCode;
	}
	public static function getErrorMessage($errorCode) {
		switch($errorCode) {
			case self::ERROR_USERNAME_INVALID:
			return "Username or Email already registered!";
		}
	}
}