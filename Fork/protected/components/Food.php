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
		$temp = explode(".", $this->image->name);
		$extension = ".".end($temp);
		$newFileName = '';
		$imageUpload = 0;
		if($this->image->name!=='')
		{
			$newFileName = $this->generateRandomFileName();
			if($this->image->saveAs("images/foods/".$newFileName.$extension))
			{
				$imageUpload = 1;
			}
		}
		if($imageUpload==1)
		{
			$connection = Yii::app()->db;
			$command = $connection->createCommand("INSERT INTO restaurantfood(restaurant_id, food_category_id, food_name, description, image, price, stsrc, userchange, datechange)  VALUES('".$this->restaurant_id."','".$this->food_category_id."','".$this->food_name."','".$this->description."','".$newFileName.$extension."','".$this->price."','a','".Yii::app()->user->name."',NOW())");
			return $command->execute();
		}
		else
			return 0;
	}
	public function update($restaurant_id, $food_category_id, $food_name, $description, $image, $price)
	{
		if($this->restaurant_id!==$restaurant_id || $this->food_category_id!==$food_category_id || $this->food_name!==$food_name || $this->description!==$description || $image->name!=='' || $this->price!==$price)
		{
			$temp = explode(".", $image->name);
			$extension = ".".end($temp);
			$imageUpload = 1;
			$updateOther = 1;
			if($image->name!=='')
			{
				$imageUpload = 0;
				if($image->saveAs("images/foods/".$this->image))
				{
					$imageUpload = 1;
				}
			}
			if($this->restaurant_id!==$restaurant_id || $this->food_category_id!==$food_category_id || $this->food_name!==$food_name || $this->description!==$description || $this->price!==$price)
			{
				$updateOther = 0;
				$connection = Yii::app()->db;
				$command = $connection->createCommand("UPDATE restaurantfood SET restaurant_id='".$restaurant_id."', food_category_id='".$food_category_id."', food_name='".$food_name."', description='".$description."', price='".$price."', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE stsrc='a' AND restaurant_food_id='".$this->restaurant_food_id."'");
				$updateOther = $command->execute();
			}
			if($imageUpload==1 && $updateOther==1)
				return 1;
			else
				return 0;
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