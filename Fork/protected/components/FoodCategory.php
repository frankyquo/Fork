<?php
class FoodCategory
{
	public $food_category_id;
	public $food_category_name;
	
	public function __construct($food_category_id, $food_category_name)
	{
		$this->food_category_id = $food_category_id;
		$this->food_category_name = $food_category_name;
	}
	public static function getAll()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT food_category_id, food_category_name FROM foodcategory WHERE stsrc='a'");
		$foodCategoryList = $command->queryAll();
		return $foodCategoryList;
	}
	public static function get($id)
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT food_category_id, food_category_name FROM foodcategory WHERE stsrc='a' AND food_category_id='$id'");
		$foodCategoryList = $command->queryAll();
		$data = $foodCategoryList[0];
		return new FoodCategory($data['food_category_id'],$data['food_category_name']);
	}
	public function insert()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("INSERT INTO foodcategory(food_category_name, stsrc, userchange, datechange) VALUES('".$this->food_category_name."','a','".Yii::app()->user->name."',NOW())");
		return $command->execute();
	}
	public function update($food_category_name)
	{
		if($this->food_category_name!==$food_category_name)
		{
			$connection = Yii::app()->db;
			$command = $connection->createCommand("UPDATE foodcategory SET food_category_name='".$food_category_name."', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE stsrc='a' AND food_category_id='".$this->food_category_id."'");
			return $command->execute();
		}
		return 0;
	}
	public function delete()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("UPDATE foodcategory SET stsrc='d', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE food_category_id='".$this->food_category_id."'");
		return $command->execute();
	}
}
?>