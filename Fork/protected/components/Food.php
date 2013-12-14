<?php
class Food
{
	public $restaurant_food_id;
	public $restaurant_id;
	public $food_category_id;
	public $food_name;
	public $description;
	public $image;
	public $price;
	
	public function __construct($restaurant_food_id, $restaurant_id, $food_category_id, $food_name, $description, $image, $price)
	{
		$this->restaurant_food_id = $restaurant_food_id;
		$this->restaurant_id = $restaurant_id;
		$this->food_category_id = $food_category_id;
		$this->food_name = $food_name;
		$this->description = $description;
		$this->image = $image;
		$this->price = $price;
	}
	public static function getAll()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT restaurant_food_id, restaurant_name, food_category_name, food_name, description, image, price FROM restaurantfood f JOIN restaurant r ON f.restaurant_id = r.restaurant_id JOIN foodcategory c ON f.food_category_id = c.food_category_id WHERE f.stsrc='a' AND r.stsrc='a' AND c.stsrc='a'");
		$foodList = $command->queryAll();
		return $foodList;
	}
	public static function get($id)
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT restaurant_food_id, restaurant_id, food_category_id, food_name, description, image, price FROM restaurantfood WHERE stsrc='a' AND restaurant_food_id='$id'");
		$foodList = $command->queryAll();
		$data = $foodList[0];
		return new Food($data['restaurant_food_id'], $data['restaurant_id'], $data['food_category_id'], $data['food_name'], $data['description'], $data['image'], $data['price']);
	}
	public function insert()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("INSERT INTO restaurantfood(restaurant_id, food_category_id, food_name, description, image, price, stsrc, userchange, datechange)  VALUES('".$this->restaurant_id."','".$this->food_category_id."','".$this->food_name."','".$this->description."','".$this->image."','".$this->price."','a','".Yii::app()->user->name."',NOW())");
		return $command->execute();
	}
	public function update($restaurant_id, $food_category_id, $food_name, $description, $image, $price)
	{
		if($this->restaurant_id!==$restaurant_id || $this->food_category_id!==$food_category_id || $this->food_name!==$food_name || $this->description!==$description || $this->image!==$image || $this->price!==$price)
		{
			$connection = Yii::app()->db;
			$command = $connection->createCommand("UPDATE restaurantfood SET restaurant_id='".$restaurant_id."', food_category_id='".$food_category_id."', food_name='".$food_name."', description='".$description."', image='".$image."', price='".$price."', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE stsrc='a' AND restaurant_food_id='".$this->restaurant_food_id."'");
			return $command->execute();
		}
		return 0;
	}
	public function delete()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("UPDATE restaurantfood SET stsrc='d', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE restaurant_food_id='".$this->restaurant_food_id."'");
		return $command->execute();
	}
}
?>