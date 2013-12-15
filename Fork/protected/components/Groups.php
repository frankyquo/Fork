<?php
class Groups
{
	public $group_id;
	public $group_name;
	public $application_id;
	
	public function __construct($group_id, $group_name, $application_id)
	{
		$this->group_id = $group_id;
		$this->group_name = $group_name;
		$this->application_id = $application_id;
	}
	public static function getAll()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT application_name, group_id, group_name FROM groups g JOIN application a ON g.application_id = a.application_id WHERE g.stsrc='a' AND a.stsrc='a'");
		$groupList = $command->queryAll();
		return $groupList;
	}
	public static function get($id)
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT application_id, group_id, group_name FROM groups WHERE stsrc='a' AND group_id='$id'");
		$restaurantList = $command->queryAll();
		$data = $restaurantList[0];
		return new Groups($data['group_id'], $data['group_name'], $data['application_id']);
	}
	public function insert()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("INSERT INTO groups(group_name, application_id, stsrc, userchange, datechange) VALUES('".$this->group_name."','".$this->application_id."','a','".Yii::app()->user->name."',NOW())");
		return $command->execute();
	}
	public function update($group_name, $application_id)
	{
		if($this->group_name!==$group_name || $this->application_id!==$application_id)
		{
			$connection = Yii::app()->db;
			$command = $connection->createCommand("UPDATE groups SET group_name='".$group_name."', application_id='".$application_id."', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE stsrc='a' AND group_id='".$this->group_id."'");
			return $command->execute();
		}
		return 0;
	}
	public function delete()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("UPDATE groups SET stsrc='d', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE group_id='".$this->group_id."'");
		return $command->execute();
	}
}
?>