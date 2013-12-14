<?php

class ForkController extends Controller
{
	public function actionLocations ()
	{
		$this->render('locations',array('locationList'=>Location::getAll()));
	}
	
	public function actionAddLocations()
	{
		if(isset($_POST['loc_name'])) {
			//insert or update submit
			
			if(isset($_POST['loc_id']))
			{
				//update submit
				$newLocation = Location::get($_POST['loc_id']);
				if($newLocation->update($_POST['loc_name'])==1)
				{
					$this->redirect(array("fork/locations",'success'=>2));
				}
				else
				{
					$this->redirect(array("fork/locations",'success'=>-2));
				}
			}
			else
			{
				//insert submit
				$newLocation = new Location(0,$_POST['loc_name']);
				if($newLocation->insert()==1)
				{
					$this->redirect(array("fork/locations",'success'=>1));
				}
				else
				{
					$this->redirect(array("fork/locations",'success'=>-1));
				}
			}
		}
		$id = 0;
		$data = null;
		if(isset($_GET['id'])) {
			//update page
			$id = $_GET['id'];
			$data = Location::get($_GET['id']);
		}
		$this->render('addLocations',array('id'=>$id,'data'=>$data));
	}
	
	public function actionDeleteLocations ()
	{
		if(isset($_GET['id']))
		{
			//delete
			$id = $_GET['id'];
			$newLocation = Location::get($id);
			if($newLocation->delete()==1)
			{
				$this->redirect(array("fork/locations",'success'=>3));
			}
			else
			{
				$this->redirect(array("fork/locations",'success'=>-3));
			}
		}
		else
		{
			$this->redirect('fork/locations');
		}
	}
	
	public function actionFood ()
	{
		$this->render('food',array('foodList'=>Food::getAll()));
	}
	
	public function actionAddFood ()
	{
		if(isset($_POST['restaurant']) && isset($_POST['food_cat']) && isset($_POST['food_name']) && isset($_POST['description']) && isset($_POST['food_img']) && isset($_POST['price']))
		{
			//insert or update submit
			
			if(isset($_POST['food_id']))
			{
				//update submit
				$newFood = Food::get($_POST['food_id']);
				if($newFood->update($_POST['restaurant'], $_POST['food_cat'], $_POST['food_name'], $_POST['description'], $_POST['food_img'], $_POST['price'])==1)
				{
					$this->redirect(array("fork/food",'success'=>2));
				}
				else
				{
					$this->redirect(array("fork/food",'success'=>-2));
				}
			}
			else
			{
				//insert submit
				$newFood = new Food(0, $_POST['restaurant'], $_POST['food_cat'], $_POST['food_name'], $_POST['description'], $_POST['food_img'], $_POST['price']);
				if($newFood->insert()==1)
				{
					$this->redirect(array("fork/food",'success'=>1));
				}
				else
				{
					$this->redirect(array("fork/food",'success'=>-1));
				}
			}
		}
		$id = 0;
		$data = null;
		if(isset($_GET['id'])) {
			//update page
			$id = $_GET['id'];
			$data = Food::get($_GET['id']);
		}
		$this->render('addFood',array('id'=>$id,'data'=>$data,'restaurantList'=>Restaurant::getAll(),'foodCatList'=>FoodCategory::getAll()));
	}
	
	public function actionDeleteFood ()
	{
		if(isset($_GET['id']))
		{
			//delete
			$id = $_GET['id'];
			$newLocation = Food::get($id);
			if($newLocation->delete()==1)
			{
				$this->redirect(array("fork/food",'success'=>3));
			}
			else
			{
				$this->redirect(array("fork/food",'success'=>-3));
			}
		}
		else
		{
			$this->redirect('fork/food');
		}
	}
	
	public function actionProvider ()
	{
		$this->render('provider',array('providerList'=>Provider::getAll()));
	}
	
	public function actionAddProvider()
	{
		if(isset($_POST['provider_name']) && isset($_POST['provider_img'])) {
			//insert or update submit
			
			if(isset($_POST['provider_id']))
			{
				//update submit
				$newProvider = Provider::get($_POST['provider_id']);
				if($newProvider->update($_POST['provider_name'], $_POST['provider_img'])==1)
				{
					$this->redirect(array("fork/provider",'success'=>2));
				}
				else
				{
					$this->redirect(array("fork/provider",'success'=>-2));
				}
			}
			else
			{
				//insert submit
				$newProvider = new Provider(0,$_POST['provider_name'],$_POST['provider_img']);
				if($newProvider->insert()==1)
				{
					$this->redirect(array("fork/provider",'success'=>1));
				}
				else
				{
					$this->redirect(array("fork/provider",'success'=>-1));
				}
			}
		}
		$id = 0;
		$data = null;
		if(isset($_GET['id'])) {
			//update page
			$id = $_GET['id'];
			$data = Provider::get($_GET['id']);
		}
		$this->render('addProvider',array('id'=>$id,'data'=>$data));
	}
	
	public function actionDeleteProvider ()
	{
		if(isset($_GET['id']))
		{
			//delete
			$id = $_GET['id'];
			$newProvider = Provider::get($id);
			if($newProvider->delete()==1)
			{
				$this->redirect(array("fork/provider",'success'=>3));
			}
			else
			{
				$this->redirect(array("fork/provider",'success'=>-3));
			}
		}
		else
		{
			$this->redirect('fork/provider');
		}
	}
	
	public function actionRestaurant ()
	{
		$this->render('restaurant',array('restaurantList'=>Restaurant::getAll()));
	}
	
	public function actionAddRestaurant()
	{
		if(isset($_POST['res_name'])) {
			//insert or update submit
			
			if(isset($_POST['res_id']))
			{
				//update submit
				$newRestaurant = Restaurant::get($_POST['res_id']);
				if($newRestaurant->update($_POST['res_name'])==1)
				{
					$this->redirect(array("fork/restaurant",'success'=>2));
				}
				else
				{
					$this->redirect(array("fork/restaurant",'success'=>-2));
				}
			}
			else
			{
				//insert submit
				$newRestaurant = new Restaurant(0,$_POST['res_name']);
				if($newRestaurant->insert()==1)
				{
					$this->redirect(array("fork/restaurant",'success'=>1));
				}
				else
				{
					$this->redirect(array("fork/restaurant",'success'=>-1));
				}
			}
		}
		$id = 0;
		$data = null;
		if(isset($_GET['id'])) {
			//update page
			$id = $_GET['id'];
			$data = Restaurant::get($_GET['id']);
		}
		$this->render('addRestaurant',array('id'=>$id,'data'=>$data));
	}
	
	public function actionDeleteRestaurant ()
	{
		if(isset($_GET['id']))
		{
			//delete
			$id = $_GET['id'];
			$newRestaurant = Restaurant::get($id);
			if($newRestaurant->delete()==1)
			{
				$this->redirect(array("fork/restaurant",'success'=>3));
			}
			else
			{
				$this->redirect(array("fork/restaurant",'success'=>-3));
			}
		}
		else
		{
			$this->redirect('fork/restaurant');
		}
	}
	
	public function actionAddRestaurantFoodCategory ()
	{
		if(isset($_GET['id']))
		{
			if(isset($_POST['action']))
			{
				if($_POST['action']==='add')
				{
					//insert submit
					RestaurantFoodCategory::insert($_POST['category'], $_POST['res_id']);
				}
				else if($_POST['action']==='delete')
				{
					//delete submit
					RestaurantFoodCategory::delete($_POST['category'], $_POST['res_id']);
				}
			}
			$id = $_GET['id'];
			$this->render('addRestaurantFoodCategory',array('restaurant'=>Restaurant::get($id),'foodCategoryNotIn'=>RestaurantFoodCategory::getNotIn($id),'foodCategoryIn'=>RestaurantFoodCategory::getIn($id)));
		}
		else
		{
			$this->redirect('fork/restaurant');
		}
		
	}
	
	public function actionRestaurantLocation()
	{
		$this->render('restaurantLocation',array('restaurantLocationList'=>RestaurantLocation::getAll()));
	}
	public function actionAddRestaurantLocation()
	{
		if(isset($_POST['restaurant']) && isset($_POST['location']) && isset($_POST['branch']) && isset($_POST['address']) && isset($_POST['longitude']) && isset($_POST['latitude']) && isset($_POST['phones']) && isset($_POST['minPrice']) && isset($_POST['maxPrice'])) {
			//insert or update submit
			
			if(isset($_POST['restaurant_location_id']))
			{
				//update submit
				$newRestaurantLocation = RestaurantLocation::get($_POST['restaurant_location_id']);
				if($newRestaurantLocation->update($_POST['restaurant'],$_POST['location'],$_POST['branch'],$_POST['address'],$_POST['longitude'],$_POST['latitude'],$_POST['phones'],$_POST['minPrice'],$_POST['maxPrice'])==1)
				{
					$this->redirect(array("fork/restaurantLocation",'success'=>2));
				}
				else
				{
					$this->redirect(array("fork/restaurantLocation",'success'=>-2));
				}
			}
			else
			{
				//insert submit
				$newRestaurantLocation = new RestaurantLocation(0,$_POST['restaurant'],$_POST['location'],$_POST['branch'],$_POST['address'],$_POST['longitude'],$_POST['latitude'],$_POST['phones'],$_POST['minPrice'],$_POST['maxPrice']);
				if($newRestaurantLocation->insert()==1)
				{
					$this->redirect(array("fork/restaurantLocation",'success'=>1));
				}
				else
				{
					$this->redirect(array("fork/restaurantLocation",'success'=>-1));
				}
			}
		}
		$id = 0;
		$data = null;
		if(isset($_GET['id'])) {
			//update page
			$id = $_GET['id'];
			$data = RestaurantLocation::get($_GET['id']);
		}
		$this->render('addRestaurantLocation',array('id'=>$id,'data'=>$data,'restaurantList'=>Restaurant::getAll(),'locationList'=>Location::getAll()));
	}
	
	public function actionDeleteRestaurantLocation ()
	{
		if(isset($_GET['id']))
		{
			//delete
			$id = $_GET['id'];
			$newRestaurantLocation = RestaurantLocation::get($id);
			if($newRestaurantLocation->delete()==1)
			{
				$this->redirect(array("fork/restaurantLocation",'success'=>3));
			}
			else
			{
				$this->redirect(array("fork/restaurantLocation",'success'=>-3));
			}
		}
		else
		{
			$this->redirect('fork/restaurantLocation');
		}
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
		if(isset($_POST['cat_name'])) {
			//insert or update submit
			
			if(isset($_POST['cat_id']))
			{
				//update submit
				$newFoodCategory = FoodCategory::get($_POST['cat_id']);
				if($newFoodCategory->update($_POST['cat_name'])==1)
				{
					$this->redirect(array("fork/foodCategory",'success'=>2));
				}
				else
				{
					$this->redirect(array("fork/foodCategory",'success'=>-2));
				}
			}
			else
			{
				//insert submit
				$newFoodCategory = new FoodCategory(0,$_POST['cat_name']);
				if($newFoodCategory->insert()==1)
				{
					$this->redirect(array("fork/foodCategory",'success'=>1));
				}
				else
				{
					$this->redirect(array("fork/foodCategory",'success'=>-1));
				}
			}
		}
		$id = 0;
		$data = null;
		if(isset($_GET['id'])) {
			//update page
			$id = $_GET['id'];
			$data = FoodCategory::get($_GET['id']);
		}
		$this->render('addFoodCategory',array('id'=>$id,'data'=>$data));
	}
	
	public function actionDeleteFoodCategory ()
	{
		if(isset($_GET['id']))
		{
			//delete
			$id = $_GET['id'];
			$newFoodCategory = FoodCategory::get($id);
			if($newFoodCategory->delete()==1)
			{
				$this->redirect(array("fork/foodCategory",'success'=>3));
			}
			else
			{
				$this->redirect(array("fork/foodCategory",'success'=>-3));
			}
		}
		else
		{
			$this->redirect('fork/foodCategory');
		}
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
	
	public function actionRestaurantPromo()
	{
		$this->render('restaurantPromo');
	}
	
	public function actionAddPromo()
	{
		$this->render('addPromo');
	}
}