<?php
class Location
{
	public $location_id;
	public $location_name;
	
	public function __construct($location_id, $location_name)
	{
		$this->location_id = $location_id;
		$this->location_name = $location_name;
	}
	public static function getAll()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT location_id, location_name FROM location WHERE stsrc='a'");
		$locationList = $command->queryAll();
		return $locationList;
	}
	public static function get($id)
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT location_id, location_name FROM location WHERE stsrc='a' AND location_id='$id'");
		$locationList = $command->queryAll();
		$data = $locationList[0];
		return new Location($data['location_id'],$data['location_name']);
	}
	public function insert()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("INSERT INTO location(location_name, stsrc, userchange, datechange) VALUES('".$this->location_name."','a','".Yii::app()->user->name."',NOW())");
		return $command->execute();
	}
	public function update($location_name)
	{
		if($this->location_name!==$location_name)
		{
			$connection = Yii::app()->db;
			$command = $connection->createCommand("UPDATE location SET location_name='".$location_name."', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE stsrc='a' AND location_id='".$this->location_id."'");
			return $command->execute();
		}
		return 0;
	}
	public function delete()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("UPDATE location SET stsrc='d', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE location_id='".$this->location_id."'");
		return $command->execute();
	}
}
?>