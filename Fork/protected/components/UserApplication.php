<?php
class UserApplication
{
	public $application_id;
	public $application_name;
	public $application_link;
	public $copyright;
	
	public function __construct($application_id, $application_name, $application_link, $copyright)
	{
		$this->application_id = $application_id;
		$this->application_name = $application_name;
		$this->application_link = $application_link;
		$this->copyright = $copyright;
	}
	public static function getAll()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT application_id, application_name, application_link, copyright FROM application WHERE stsrc='a'");
		$applicationList = $command->queryAll();
		return $applicationList;
	}
	public static function get($id)
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT application_id, application_name, application_link, copyright FROM application WHERE stsrc='a' AND application_id='$id'");
		$applicationList = $command->queryAll();
		$data = $applicationList[0];
		return new UserApplication($data['application_id'],$data['application_name'],$data['application_link'], $data['copyright']);
	}
	public function insert()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("INSERT INTO application(application_name, application_link, copyright, stsrc, userchange, datechange) VALUES('".$this->application_name."','".$this->application_link."','".$this->copyright."','a','".Yii::app()->user->name."',NOW())");
		return $command->execute();
	}
	public function update($application_name, $application_link, $copyright)
	{
		if($this->application_name!==$application_name || $this->application_link!==$application_link || $this->copyright!==$copyright)
		{
			$connection = Yii::app()->db;
			$command = $connection->createCommand("UPDATE application SET application_name='$application_name', application_link='$application_link', copyright='$copyright', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE stsrc='a' AND application_id='".$this->application_id."'");
			return $command->execute();
		}
		return 0;
	}
	public function delete()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("UPDATE application SET stsrc='d', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE application_id='".$this->application_id."'");
		return $command->execute();
	}
}
?>