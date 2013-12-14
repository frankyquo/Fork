<?php
class Provider
{
	public $provider_id;
	public $provider_name;
	public $provider_image;
	
	public function __construct($provider_id, $provider_name, $provider_image)
	{
		$this->provider_id = $provider_id;
		$this->provider_name = $provider_name;
		$this->provider_image = $provider_image;
	}
	public static function getAll()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT provider_id, provider_name, provider_image FROM provider WHERE stsrc='a'");
		$providerList = $command->queryAll();
		return $providerList;
	}
	public static function get($id)
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT provider_id, provider_name, provider_image FROM provider WHERE stsrc='a' AND provider_id='$id'");
		$providerList = $command->queryAll();
		$data = $providerList[0];
		return new Provider($data['provider_id'],$data['provider_name'],$data['provider_image']);
	}
	public function insert()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("INSERT INTO provider(provider_name, provider_image, stsrc, userchange, datechange) VALUES('".$this->provider_name."','".$this->provider_image."','a','".Yii::app()->user->name."',NOW())");
		return $command->execute();
	}
	public function update($provider_name, $provider_image)
	{
		if($this->provider_name!==$provider_name || $this->provider_image!==$provider_image)
		{
			$connection = Yii::app()->db;
			$command = $connection->createCommand("UPDATE provider SET provider_name='".$this->provider_name."', provider_image='".$this->provider_image."', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE stsrc='a' AND provider_id='".$this->provider_id."'");
			return $command->execute();
		}
		return 0;
	}
	public function delete()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("UPDATE provider SET stsrc='d', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE provider_id='".$this->provider_id."'");
		return $command->execute();
	}
}
?>