<?php

class ForkController extends Controller
{
	public function actionLocations ()
	{
	
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT location_id, location_name FROM location WHERE stsrc='a'");
		$locationList = $command->queryAll();
		$this->render('locations',array('locationList'=>$locationList));
	}
	public function actionAddLocations()
	{
		$success = 0;
		$success2 = 0;
		if(isset($_POST['loc_name'])) {
			//insert or update submit
			$locationName = $_POST['loc_name'];
			
			if(isset($_POST['loc_id']))
			{
				//update submit
				$id = $_POST['loc_id'];
				$connection = Yii::app()->db;
				$command = $connection->createCommand("UPDATE location SET stsrc='d', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE location_id='$id'");
				$success = $command->execute();
				if($success==1)
				{
					$command = $connection->createCommand("INSERT INTO location(location_name, stsrc, userchange, datechange) VALUES('$locationName','a','".Yii::app()->user->name."',NOW())");
					$success2 = $command->execute();
				}
				if($success==1 && $success2==1)
				{
					$this->redirect("index.php?r=fork/locations",array('success'=>2));
				}
			}
			else
			{
				//insert submit
				$connection = Yii::app()->db;
				$command = $connection->createCommand("INSERT INTO location(location_name, stsrc, userchange, datechange) VALUES('$locationName','a','".Yii::app()->user->name."',NOW())");
				$success = $command->execute();
				if($success==1)
				{
					$this->redirect("index.php?r=fork/locations",array('success'=>1));
				}
			}
		}
		$id = 0;
		$data = null;
		$connection = Yii::app()->db;
		if(isset($_GET['id'])) {
			//update
			$id = $_GET['id'];
			$command = $connection->createCommand("SELECT location_id, location_name FROM location WHERE stsrc='a' AND location_id='$id'");
			$locationList = $command->queryAll();
			$data = $locationList[0];
		}
		$this->render('addLocations',array('id'=>$id,'data'=>$data));
	}
	public function actionRestaurant ()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT restaurant_id, restaurant_name FROM restaurant WHERE stsrc='a'");
		$restaurantList = $command->queryAll();
		$this->render('restaurant',array('restaurantList'=>$restaurantList));
	}
	public function actionAddRestaurant()
	{
		$success = 0;
		$success2 = 0;
		if(isset($_POST['res_name'])) {
			//insert or update submit
			$restaurantName = $_POST['res_name'];
			
			if(isset($_POST['res_id']))
			{
				//update submit
				$id = $_POST['res_id'];
				$connection = Yii::app()->db;
				$command = $connection->createCommand("UPDATE restaurant SET stsrc='d', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE restaurant_id='$id'");
				$success = $command->execute();
				if($success==1)
				{
					$command = $connection->createCommand("INSERT INTO restaurant(restaurant_name, stsrc, userchange, datechange) VALUES('$restaurantName','a','".Yii::app()->user->name."',NOW())");
					$success2 = $command->execute();
				}
				if($success==1 && $success2==1)
				{
					$this->redirect("index.php?r=fork/restaurant",array('success'=>2));
				}
			}
			else
			{
				//insert submit
				$connection = Yii::app()->db;
				$command = $connection->createCommand("INSERT INTO restaurant(restaurant_name, stsrc, userchange, datechange) VALUES('$restaurantName','a','".Yii::app()->user->name."',NOW())");
				$success = $command->execute();
				if($success==1)
				{
					$this->redirect("index.php?r=fork/restaurant",array('success'=>1));
				}
			}
		}
		$id = 0;
		$data = null;
		$connection = Yii::app()->db;
		if(isset($_GET['id'])) {
			//update
			$id = $_GET['id'];
			$command = $connection->createCommand("SELECT restaurant_id, restaurant_name FROM restaurant WHERE stsrc='a' AND restaurant_id='$id'");
			$restaurantList = $command->queryAll();
			$data = $restaurantList[0];
		}
		$this->render('addRestaurant',array('id'=>$id,'data'=>$data));
	}
	
	public function actionFoodCategory ()
	{
	
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT food_category_id, food_category_name FROM foodcategory WHERE stsrc='a'");
		$foodCategoryList = $command->queryAll();
		$this->render('foodCategory',array('foodCategoryList'=>$foodCategoryList));
	}
	
	public function actionAddFoodCategory ()
	{
		$success = 0;
		$success2 = 0;
		if(isset($_POST['cat_name'])) {
			//insert or update submit
			$categoryName = $_POST['cat_name'];
			
			if(isset($_POST['cat_id']))
			{
				//update submit
				$id = $_POST['cat_id'];
				$connection = Yii::app()->db;
				$command = $connection->createCommand("UPDATE foodcategory SET stsrc='d', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE food_category_id='$id'");
				$success = $command->execute();
				if($success==1)
				{
					$command = $connection->createCommand("INSERT INTO foodcategory(food_category_name, stsrc, userchange, datechange) VALUES('$categoryName','a','".Yii::app()->user->name."',NOW())");
					$success2 = $command->execute();
				}
				if($success==1 && $success2==1)
				{
					$this->redirect("index.php?r=fork/foodCategory",array('success'=>2));
				}
			}
			else
			{
				//insert submit
				$connection = Yii::app()->db;
				$command = $connection->createCommand("INSERT INTO foodcategory(food_category_name, stsrc, userchange, datechange) VALUES('$categoryName','a','".Yii::app()->user->name."',NOW())");
				$success = $command->execute();
				if($success==1)
				{
					$this->redirect("index.php?r=fork/foodCategory",array('success'=>1));
				}
			}
		}
		$id = 0;
		$data = null;
		$connection = Yii::app()->db;
		if(isset($_GET['id'])) {
			//update
			$id = $_GET['id'];
			$command = $connection->createCommand("SELECT food_category_id, food_category_name FROM foodcategory WHERE stsrc='a' AND food_category_id='$id'");
			$foodCategoryList = $command->queryAll();
			$data = $foodCategoryList[0];
		}
		$this->render('addFoodCategory',array('id'=>$id,'data'=>$data));
	}
	
	public function actionFood ()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT restaurant_food_id, restaurant_name, food_category_name, food_name, description, image, price FROM restaurantfood f JOIN restaurant r ON f.restaurant_id = r.restaurant_id JOIN foodcategory c ON f.food_category_id = c.food_category_id WHERE f.stsrc='a' AND r.stsrc='a' AND c.stsrc='a'");
		$foodList = $command->queryAll();
		$this->render('food',array('foodList'=>$foodList));
	}
	
	public function actionAddFood ()
	{
		$success = 0;
		$success2 = 0;
		if(isset($_POST['restaurant']) && isset($_POST['food_cat']) && isset($_POST['food_name']) && isset($_POST['description']) && isset($_POST['food_img']) && isset($_POST['price'])) {
			//insert or update submit
			$restaurant = $_POST['restaurant'];
			$food_cat = $_POST['food_cat'];
			$food_name = $_POST['food_name'];
			$description = $_POST['description'];
			$food_img = $_POST['food_img'];
			$price = $_POST['price'];
			
			if(isset($_POST['food_id']))
			{
				//update submit
				$id = $_POST['food_id'];
				$connection = Yii::app()->db;
				$command = $connection->createCommand("UPDATE restaurantfood SET stsrc='d', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE restaurant_food_id='$id'");
				$success = $command->execute();
				if($success==1)
				{
					$command = $connection->createCommand("INSERT INTO restaurantfood(restaurant_id, food_category_id, food_name, description, image, price, stsrc, userchange, datechange) VALUES('$restaurant', '$food_cat', '$food_name', '$description', '$food_img','$price','a','".Yii::app()->user->name."',NOW())");
					$success2 = $command->execute();
				}
				if($success==1 && $success2==1)
				{
					$this->redirect("index.php?r=fork/food",array('success'=>2));
				}
			}
			else
			{
				//insert submit
				$connection = Yii::app()->db;
				$command = $connection->createCommand("INSERT INTO restaurantfood(restaurant_id, food_category_id, food_name, description, image, price, stsrc, userchange, datechange) VALUES('$restaurant', '$food_cat', '$food_name', '$description', '$food_img','$price','a','".Yii::app()->user->name."',NOW())");
				$success = $command->execute();
				if($success==1)
				{
					$this->redirect("index.php?r=fork/food",array('success'=>1));
				}
			}
		}
		$id = 0;
		$data = null;
		$connection = Yii::app()->db;
		if(isset($_GET['id'])) {
			//update
			$id = $_GET['id'];
			$command = $connection->createCommand("SELECT restaurant_food_id, restaurant_name, food_category_name, food_name, description, image, price FROM restaurantfood f JOIN restaurant r ON f.restaurant_id = r.restaurant_id JOIN foodcategory c ON f.food_category_id = c.food_category_id WHERE f.stsrc='a' AND r.stsrc='a' AND c.stsrc='a' AND restaurant_food_id='$id'");
			$foodList = $command->queryAll();
			$data = $foodList[0];
		}
		$command = $connection->createCommand("SELECT restaurant_id, restaurant_name FROM restaurant WHERE stsrc='a'");
		$restaurantList = $command->queryAll();
		$command = $connection->createCommand("SELECT food_category_id, food_category_name FROM foodcategory WHERE stsrc='a'");
		$foodCatList = $command->queryAll();
		$this->render('addFood',array('id'=>$id,'data'=>$data,'restaurantList'=>$restaurantList,'foodCatList'=>$foodCatList));
	}
	
	public function actionRestaurantReview()
	{
		$this->render('restaurantReview');
	}
	public function actionRestaurantReviewPop()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->layout= false;
		$this->render('restaurantReviewPop');
	}
	public function actionRestaurantLocation()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT restaurant_location_id, restaurant_name, location_name, branch, address, longitude, latitude, phones, minprice, maxprice FROM restaurantlocation rl JOIN restaurant r ON rl.restaurant_id = r.restaurant_id JOIN location l ON rl.location_id = l.location_id WHERE rl.stsrc='a' AND r.stsrc='a' AND l.stsrc='a'");
		$restaurantLocationList = $command->queryAll();
		$this->render('restaurantLocation',array('restaurantLocationList'=>$restaurantLocationList));
	}
	public function actionAddRestaurantLocation()
	{
		$success = 0;
		$success2 = 0;
		if(isset($_POST['restaurant']) && isset($_POST['location']) && isset($_POST['branch']) && isset($_POST['address']) && isset($_POST['longitude']) && isset($_POST['latitude']) && isset($_POST['phones']) && isset($_POST['minPrice']) && isset($_POST['maxPrice'])) {
			//insert or update submit
			$restaurant = $_POST['restaurant'];
			$location = $_POST['location'];
			$branch = $_POST['branch'];
			$address = $_POST['address'];
			$longitude = $_POST['longitude'];
			$latitude = $_POST['latitude'];
			$phones = $_POST['phones'];
			$minPrice = $_POST['minPrice'];
			$maxPrice = $_POST['maxPrice'];
			
			if(isset($_POST['restaurant_location_id']))
			{
				//update submit
				$id = $_POST['restaurant_location_id'];
				$connection = Yii::app()->db;
				$command = $connection->createCommand("UPDATE restaurantlocation SET stsrc='d', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE restaurant_location_id='$id'");
				$success = $command->execute();
				if($success==1)
				{
					$command = $connection->createCommand("INSERT INTO restaurantlocation(restaurant_id, location_id, branch, address, longitude, latitude, phones, minprice, maxprice, stsrc, userchange, datechange) VALUES('$restaurant', '$location', '$branch', '$address', '$longitude', '$latitude', '$phones', '$minPrice', '$maxPrice', 'a', '".Yii::app()->user->name."', NOW())");
					$success2 = $command->execute();
				}
				if($success==1 && $success2==1)
				{
					$this->redirect("index.php?r=fork/restaurantLocation",array('success'=>2));
				}
			}
			else
			{
				//insert submit
				$connection = Yii::app()->db;
				$command = $connection->createCommand("INSERT INTO restaurantlocation(restaurant_id, location_id, branch, address, longitude, latitude, phones, minprice, maxprice, stsrc, userchange, datechange) VALUES('$restaurant', '$location', '$branch', '$address', '$longitude', '$latitude', '$phones', '$minPrice', '$maxPrice', 'a', '".Yii::app()->user->name."', NOW())");
				$success = $command->execute();
				if($success==1)
				{
					$this->redirect("index.php?r=fork/restaurantLocation",array('success'=>1));
				}
			}
		}
		$id = 0;
		$data = null;
		$connection = Yii::app()->db;
		if(isset($_GET['id'])) {
			//update
			$id = $_GET['id'];
			$command = $connection->createCommand("SELECT restaurant_location_id, restaurant_name, location_name, branch, address, longitude, latitude, phones, minprice, maxprice FROM restaurantlocation rl JOIN restaurant r ON rl.restaurant_id = r.restaurant_id JOIN location l ON rl.location_id = l.location_id WHERE rl.stsrc='a' AND r.stsrc='a' AND l.stsrc='a' AND restaurant_location_id='$id'");
			$restaurantLocationList = $command->queryAll();
			$data = $restaurantLocationList[0];
		}
		$command = $connection->createCommand("SELECT restaurant_id, restaurant_name FROM restaurant WHERE stsrc='a'");
		$restaurantList = $command->queryAll();
		$command = $connection->createCommand("SELECT location_id, location_name FROM location WHERE stsrc='a'");
		$locationList = $command->queryAll();
		$this->render('addRestaurantLocation',array('id'=>$id,'data'=>$data,'restaurantList'=>$restaurantList,'locationList'=>$locationList));
	}
	public function actionProvider ()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT provider_id, provider_name, provider_image FROM provider WHERE stsrc='a'");
		$providerList = $command->queryAll();
		$this->render('provider',array('providerList'=>$providerList));
	}
	public function actionAddProvider()
	{
		$success = 0;
		$success2 = 0;
		if(isset($_POST['provider_name']) && isset($_POST['provider_img'])) {
			//insert or update submit
			$providerName = $_POST['provider_name'];
			$providerImage = $_POST['provider_img'];
			
			if(isset($_POST['provider_id']))
			{
				//update submit
				$id = $_POST['provider_id'];
				$connection = Yii::app()->db;
				$command = $connection->createCommand("UPDATE provider SET stsrc='d', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE provider_id='$id'");
				$success = $command->execute();
				if($success==1)
				{
					$command = $connection->createCommand("INSERT INTO provider(provider_name, provider_image, stsrc, userchange, datechange) VALUES('$providerName','$providerImage','a','".Yii::app()->user->name."',NOW())");
					$success2 = $command->execute();
				}
				if($success==1 && $success2==1)
				{
					$this->redirect("index.php?r=fork/provider",array('success'=>2));
				}
			}
			else
			{
				//insert submit
				$connection = Yii::app()->db;
				$command = $connection->createCommand("INSERT INTO provider(provider_name, provider_image, stsrc, userchange, datechange) VALUES('$providerName','$providerImage','a','".Yii::app()->user->name."',NOW())");
				$success = $command->execute();
				if($success==1)
				{
					$this->redirect("index.php?r=fork/provider",array('success'=>1));
				}
			}
		}
		$id = 0;
		$data = null;
		$connection = Yii::app()->db;
		if(isset($_GET['id'])) {
			//update
			$id = $_GET['id'];
			$command = $connection->createCommand("SELECT provider_id, provider_name, provider_image FROM provider WHERE stsrc='a' AND provider_id='$id'");
			$providerList = $command->queryAll();
			$data = $providerList[0];
		}
		$this->render('addProvider',array('id'=>$id,'data'=>$data));
	}
	public function actionRestaurantPromo()
	{
		$this->render('restaurantPromo');
	}
	public function actionAddPromo()
	{
		$this->render('addPromo');
	}
}