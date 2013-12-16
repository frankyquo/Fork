<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<!--
<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>
-->

<div id="contentHeader">
	<h1><?php echo Yii::app()->name; ?> - Forks</h1>
</div>

<div class="container">
	<div class="grid-24">				
		<div class="widget">
			<div class="widget-header">
				<h3><?php
				if($id<1)
					echo "Add Food";
				else
					echo "Edit Food";
				?></h3>
			</div>
			<div class="widget-content">
				<form method="post" class="form uniformForm validateForm" enctype="multipart/form-data">
					<?php
					if($id>=1)
					{
					?>
					<input type="hidden" name="food_id" id="food_id" value="<?=$id?>" />
					<?php
					}
					?>
					<div class="field-group">
						<label for="restaurant">Restaurant Name:</label>
						<div class="field">
							<select name="restaurant" id="restaurant">
								<?php
									foreach($restaurantList as $restaurant)
									{
								?>
								<option value="<?=$restaurant['restaurant_id']?>" <?php if($data!=null && $data->restaurant_id===$restaurant['restaurant_id']) echo "selected=\"selected\""; ?> ><?=$restaurant['restaurant_name']?></option>
								<?php
									}
								?>
							</select>
						</div>	
					</div>
					<div class="field-group">
						<label for="food_cat">Food Category:</label>
						<div class="field">
							<select name="food_cat" id="food_cat">
								<?php
									foreach($foodCatList as $foodCat)
									{
								?>
								<option value="<?=$foodCat['food_category_id']?>" <?php if($data!=null && $data->food_category_id===$foodCat['food_category_id']) echo "selected=\"selected\""; ?> ><?=$foodCat['food_category_name']?></option>
								<?php
									}
								?>
							</select>
						</div>	
					</div>
					<div class="field-group">
						<label for="food_name">Food Name:</label>
						<div class="field">
							<input type="text" name="food_name" id="food_name" size="20" class="validate[required]" value="<?php if($data!=null) echo $data->food_name; ?>" />	
						</div>
					</div>
					<div class="field-group">
						<label for="description">Food Description:</label>
						<div class="field">
							<textarea name="description" id="description" rows="5" cols="50"><?php if($data!=null) echo $data->description; ?></textarea>
						</div>	
					</div>
					<div class="field-group inlineField">	
						<label for="food_img">Food Image:</label>
						<div class="field">
							<input type="file" name="food_img" id="food_img" value="<?php if($data!=null) echo $data->image; ?>" />
						</div>	
					</div>
					<div class="field-group inlineField">
						<label for="price">Price:</label>
						<div class="field">
							<input type="text" name="price" id="price" size="8" class="validate[required,min[1000],max[1000000]]" value="<?php if($data!=null) echo $data->price; ?>" />
						</div>
					</div>
					<div class="actions">						
						<button type="submit" class="btn btn-primary">Submit</button>
						<a href="index.php?r=fork/food">
							<button type="button" class="btn btn-error">Back</button>
						</a>
					</div>
				</form>
			</div>
		</div>					
	</div>
</div>