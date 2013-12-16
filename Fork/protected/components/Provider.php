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
	private function generateRandomFileName()
	{
		$randomName = "";
		for($i = 0;$i<15;$i++) {
			$temp = rand()%62;
			if($temp<10)
				$randomName .= $temp;
			else if($temp<36)
				$randomName .= chr(($temp-10)+97);
			else
				$randomName .= chr(($temp-36)+65);
		}
		return $randomName;
	}
	public function insert()
	{
		$temp = explode(".", $this->provider_image->name);
		$extension = ".".end($temp);
		$newFileName = '';
		$imageUpload = 0;
		if($this->provider_image->name!=='')
		{
			$newFileName = $this->generateRandomFileName();
			if($this->provider_image->saveAs("images/providers/".$newFileName.$extension))
			{
				$imageUpload = 1;
			}
		}
		if($imageUpload==1)
		{
			$connection = Yii::app()->db;
			$command = $connection->createCommand("INSERT INTO provider(provider_name, provider_image, stsrc, userchange, datechange) VALUES('".$this->provider_name."','".$newFileName.$extension."','a','".Yii::app()->user->name."',NOW())");
			return $command->execute();
		}
		else
			return 0;
	}
	public function update($provider_name, $provider_image)
	{
		if($this->provider_name!==$provider_name || $provider_image->name!=='')
		{
			$temp = explode(".", $provider_image->name);
			$extension = ".".end($temp);
			$imageUpload = 1;
			$nameChange = 1;
			if($provider_image->name!=='')
			{
				$imageUpload = 0;
				if($provider_image->saveAs("images/providers/".$this->provider_image))
				{
					$imageUpload = 1;
				}
			}
			if($this->provider_name!==$provider_name)
			{
				$nameChange = 0;
				$connection = Yii::app()->db;
				$command = $connection->createCommand("UPDATE provider SET provider_name='".$this->provider_name."', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE stsrc='a' AND provider_id='".$this->provider_id."'");
				$nameChange = $command->execute();
			}
			if($imageUpload==1 && $nameChange==1)
				return 1;
			else
				return 0;
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