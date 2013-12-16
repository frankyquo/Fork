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
					echo "Add Restaurant Location";
				else
					echo "Edit Restaurant Location";
				?></h3>
			</div>
			<div class="widget-content">
				<form id="addRestoLocation" method="post" class="form uniformForm validateForm">
					<?php
					if($id>=1)
					{
					?>
					<input type="hidden" name="restaurant_location_id" id="food_id" value="<?=$id?>" />
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
								<option value="<?=$restaurant['restaurant_id']?>" <?php if($data!=null && $data->restaurant_id==$restaurant['restaurant_id']) echo "selected=\"selected\""; ?> ><?=$restaurant['restaurant_name']?></option>
								<?php
									}
								?>
							</select>
						</div>	
					</div>
					<div class="field-group">
						<label for="location">Location:</label>
						<div class="field">
							<select name="location" id="location">
								<?php
									foreach($locationList as $location)
									{
								?>
								<option value="<?=$location['location_id']?>" <?php if($data!=null && $data->location_id==$location['location_id']) echo "selected=\"selected\""; ?> ><?=$location['location_name']?></option>
								<?php
									}
								?>
							</select>
						</div>	
					</div>
					<div class="field-group">
						<label for="branch">Branch Name:</label>
						<div class="field">
							<input type="text" name="branch" id="branch" size="20" class="validate[required]" value="<?php if($data!=null) echo $data->branch; ?>" />	
						</div>
					</div>
					<div class="field-group">
						<label for="address">Address:</label>
						<div class="field">
							<textarea name="address" id="address" rows="5" cols="50"><?php if($data!=null) echo $data->address; ?></textarea>
						</div>	
					</div>
					<div class="field-group inlineField">
						<label for="longitude">Longitude:</label>
						<div class="field">
							<input type="text" name="longitude" id="longitude" size="20" class="validate[required,custom[number],min[-180],max[180]]" value="<?php if($data!=null) echo $data->longitude; ?>" />
						</div>
					</div>
					<div class="field-group inlineField">
						<label for="latitude">Latitude:</label>
						<div class="field">
							<input type="text" name="latitude" id="latitude" size="20" class="validate[required,custom[number],min[-180],max[180]]" value="<?php if($data!=null) echo $data->latitude; ?>" />
						</div>
					</div>
					<div class="field-group inlineField">
						<label for="phones">Phones:</label>
						<div class="field">
							<input type="text" name="phones" id="phones" size="20" class="validate[required,minSize[5],maxSize[20]]" value="<?php if($data!=null) echo $data->phones; ?>" />
						</div>
					</div>
					<div class="field-group inlineField">
						<label for="minPrice">Min Price:</label>
						<div class="field">
							<input type="text" name="minPrice" id="minPrice" size="8" class="validate[required,custom[number],min[1000],max[1000000]]" value="<?php if($data!=null) echo $data->minprice; ?>" />
						</div>
					</div>
					<div class="field-group inlineField">
						<label for="maxPrice">Max Price:</label>
						<div class="field">
							<input type="text" name="maxPrice" id="maxPrice" size="8" class="validate[required,custom[number],min[1000],max[1000000]]" value="<?php if($data!=null) echo $data->maxprice; ?>" />
						</div>
					</div>
					<div class="actions">						
						<button type="submit" class="btn btn-primary">Submit</button>
						<a href="index.php?r=fork/restaurantLocation">
							<button type="button" class="btn btn-error">Back</button>
						</a>
					</div>
				</form>
			</div>
		</div>					
	</div>
</div>