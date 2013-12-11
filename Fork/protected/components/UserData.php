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