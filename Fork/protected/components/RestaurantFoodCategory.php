<?php
class RestaurantFoodCategory
{
	public $food_category_id;
	public $restaurant_location_id;
	
	public function __construct($food_category_id, $restaurant_location_id)
	{
		$this->food_category_id = $food_category_id;
		$this->restaurant_location_id = $restaurant_location_id;
	}
	public static function getNotIn($id)
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT food_category_id, food_category_name FROM foodcategory WHERE stsrc='a' AND food_category_id NOT IN(SELECT food_category_id FROM restaurantfoodcategory rfc JOIN restaurantlocation rl ON rfc.restaurant_location_id = rl.restaurant_location_id WHERE rfc.stsrc='a' AND rl.stsrc='a' AND rl.restaurant_id='$id')");
		$foodCategoryNotIn = $command->queryAll();
		return $foodCategoryNotIn;
	}
	public static function getIn($id)
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT food_category_id, food_category_name FROM foodcategory WHERE stsrc='a' AND food_category_id IN(SELECT food_category_id FROM restaurantfoodcategory rfc JOIN restaurantlocation rl ON rfc.restaurant_location_id = rl.restaurant_location_id WHERE rfc.stsrc='a' AND rl.stsrc='a' AND rl.restaurant_id='$id')");
		$foodCategoryIn = $command->queryAll();
		return $foodCategoryIn;
	}
	public static function insert($food_category_id, $restaurant_id)
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT restaurant_location_id FROM restaurantlocation WHERE stsrc='a' AND restaurant_id='$restaurant_id'");
		$restaurantLocationList = $command->queryAll();
		foreach($restaurantLocationList as $restaurantLocation)
		{
			$command = $connection->createCommand("INSERT INTO restaurantfoodcategory(food_category_id, restaurant_location_id, stsrc, userchange, datechange) VALUES ('$food_category_id','".$restaurantLocation['restaurant_location_id']."','a','".Yii::app()->user->name."',NOW())");
			$command->execute();
		}
	}
	public static function delete($food_category_id, $restaurant_id)
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("DELETE FROM restaurantfoodcategory WHERE stsrc='a' AND food_category_id='$food_category_id' AND restaurant_location_id IN (SELECT restaurant_location_id FROM restaurantlocation WHERE stsrc='a' AND restaurant_id='$restaurant_id')");
		$command->execute();
	}
}
?>