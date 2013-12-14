<?php
class RestaurantLocation
{
	public $restaurant_location_id;
	public $restaurant_id;
	public $location_id;
	public $branch;
	public $address;
	public $longitude;
	public $latitude;
	public $phones;
	public $minprice;
	public $maxprice;
	
	public function __construct($restaurant_location_id, $restaurant_id, $location_id, $branch, $address, $longitude, $latitude, $phones, $minprice, $maxprice)
	{
		$this->restaurant_location_id = $restaurant_location_id;
		$this->restaurant_id = $restaurant_id;
		$this->location_id = $location_id;
		$this->branch = $branch;
		$this->address = $address;
		$this->longitude = $longitude;
		$this->latitude = $latitude;
		$this->phones = $phones;
		$this->minprice = $minprice;
		$this->maxprice = $maxprice;
	}
	public static function getAll()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT restaurant_location_id, restaurant_name, location_name, branch, address, longitude, latitude, phones, minprice, maxprice FROM restaurantlocation rl JOIN restaurant r ON rl.restaurant_id = r.restaurant_id JOIN location l ON rl.location_id = l.location_id WHERE rl.stsrc='a' AND r.stsrc='a' AND l.stsrc='a'");
		$restaurantLocationList = $command->queryAll();
		return $restaurantLocationList;
	}
	public static function get($id)
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT restaurant_location_id, restaurant_id, location_id, branch, address, longitude, latitude, phones, minprice, maxprice FROM restaurantlocation WHERE stsrc='a' AND restaurant_location_id='$id'");
		$restaurantLocationList = $command->queryAll();
		$data = $restaurantLocationList[0];
		return new RestaurantLocation($data['restaurant_location_id'],$data['restaurant_id'],$data['location_id'],$data['branch'],$data['address'],$data['longitude'],$data['latitude'],$data['phones'],$data['minprice'],$data['maxprice']);
	}
	public function insert()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("INSERT INTO restaurantlocation(restaurant_id, location_id, branch, address, longitude, latitude, phones, minprice, maxprice, stsrc, userchange, datechange) VALUES('".$this->restaurant_id."','".$this->location_id."','".$this->branch."','".$this->address."','".$this->longitude."','".$this->latitude."','".$this->phones."','".$this->minprice."','".$this->maxprice."','a','".Yii::app()->user->name."',NOW())");
		return $command->execute();
	}
	public function update($restaurant_id, $location_id, $branch, $address, $longitude, $latitude, $phones, $minprice, $maxprice)
	{
		if($this->restaurant_id!==$restaurant_id || $this->location_id!==$location_id || $this->branch!==$branch || $this->address!==$address || $this->longitude!==$longitude || $this->latitude!==$latitude || $this->phones!==$phones || $this->minprice!==$minprice || $this->maxprice!==$maxprice)
		{
			$connection = Yii::app()->db;
			$command = $connection->createCommand("UPDATE restaurantlocation SET restaurant_id='".$restaurant_id."', location_id='".$location_id."', branch='".$branch."', address='".$address."', longitude='".$longitude."', latitude='".$latitude."', phones='".$phones."', minprice='".$minprice."', maxprice='".$maxprice."', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE stsrc='a' AND restaurant_location_id='".$this->restaurant_location_id."'");
			return $command->execute();
		}
		return 0;
	}
	public function delete()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("UPDATE restaurantlocation SET stsrc='d', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE restaurant_location_id='".$this->restaurant_location_id."'");
		return $command->execute();
	}
}
?>