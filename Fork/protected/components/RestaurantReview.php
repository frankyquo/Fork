<?php
class RestaurantReview
{
	// public $restaurant_location_id;
	// public $restaurant_id;
	// public $location_id;
	// public $branch;
	// public $address;
	// public $longitude;
	// public $latitude;
	// public $phones;
	// public $minprice;
	// public $maxprice;
	
	// public function __construct($restaurant_location_id, $restaurant_id, $location_id, $branch, $address, $longitude, $latitude, $phones, $minprice, $maxprice)
	// {
		// $this->restaurant_location_id = $restaurant_location_id;
		// $this->restaurant_id = $restaurant_id;
		// $this->location_id = $location_id;
		// $this->branch = $branch;
		// $this->address = $address;
		// $this->longitude = $longitude;
		// $this->latitude = $latitude;
		// $this->phones = $phones;
		// $this->minprice = $minprice;
		// $this->maxprice = $maxprice;
	// }
	public static function getAll()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT restaurant_review_id, restaurant_name, location_name, branch, username, score, review FROM restaurantreview rr join restaurantlocation rl on rr.restaurant_location_id = rl.restaurant_location_id JOIN restaurant r ON rl.restaurant_id = r.restaurant_id JOIN location l ON rl.location_id = l.location_id join users u on rr.user_id = u.user_id WHERE rl.stsrc='a' AND r.stsrc='a' AND l.stsrc='a'");
		$restaurantLocationList = $command->queryAll();
		return $restaurantLocationList;
	}
	// public function delete()
	// {
		// $connection = Yii::app()->db;
		// $command = $connection->createCommand("UPDATE restaurantlocation SET stsrc='d', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE restaurant_location_id='".$this->restaurant_location_id."'");
		// return $command->execute();
	// }
}
?>