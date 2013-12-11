<?php

class ForkController extends Controller
{
	public function actionLocations()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		// $this->layout= "//layout/main.php";
		$this->render('locations');
	}
	public function actionLocationsPop()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->layout= false;
		$this->render('locationsPop');
	}
	
	public function actionRestaurant()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		// $this->layout= "//layout/main.php";
		$this->render('restaurant');
	}
	public function actionRestaurantPop()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->layout= false;
		$this->render('restaurantPop');
	}
	public function actionFoodCategory()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		// $this->layout= "//layout/main.php";
		$this->render('foodCategory');
	}
	public function actionFoodCategoryPop()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->layout= false;
		$this->render('foodCategoryPop');
	}
	
	public function actionRestaurantReview(){
		$this->render('restaurantReview');
	}
	public function actionRestaurantReviewPop()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->layout= false;
		$this->render('restaurantReviewPop');
	}
	public function actionRestaurantLocation(){
		$this->render('restaurantLocation');
	}
	public function actionRestaurantLocationPop()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->layout= false;
		$this->render('restaurantLocationPop');
	}
	public function actionProvider() {
		$this->render('provider');
	}
	public function actionRestaurantPromo() {
		$this->render('restaurantPromo');
	}
	public function actionAddProvider() {
		$this->render('addProvider');
	}
	public function actionAddPromo() {
		$this->render('addPromo');
	}
}