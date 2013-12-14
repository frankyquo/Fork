<?php
class Restaurant
{
	public $restaurant_id;
	public $restaurant_name;
	
	public function __construct($restaurant_id, $restaurant_name)
	{
		$this->restaurant_id = $restaurant_id;
		$this->restaurant_name = $restaurant_name;
	}
	public static function getAll()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT restaurant_id, restaurant_name FROM restaurant WHERE stsrc='a'");
		$restaurantList = $command->queryAll();
		return $restaurantList;
	}
	public static function get($id)
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT restaurant_id, restaurant_name FROM restaurant WHERE stsrc='a' AND restaurant_id='$id'");
		$restaurantList = $command->queryAll();
		$data = $restaurantList[0];
		return new Restaurant($data['restaurant_id'],$data['restaurant_name']);
	}
	public function insert()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("INSERT INTO restaurant(restaurant_name, stsrc, userchange, datechange) VALUES('".$this->restaurant_name."','a','".Yii::app()->user->name."',NOW())");
		return $command->execute();
	}
	public function update($restaurant_name)
	{
		if($this->restaurant_name!==$restaurant_name)
		{
			$connection = Yii::app()->db;
			$command = $connection->createCommand("UPDATE restaurant SET restaurant_name='".$restaurant_name."', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE stsrc='a' AND restaurant_id='".$this->restaurant_id."'");
			return $command->execute();
		}
		return 0;
	}
	public function delete()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("UPDATE restaurant SET stsrc='d', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE restaurant_id='".$this->restaurant_id."'");
		return $command->execute();
	}
}
?>