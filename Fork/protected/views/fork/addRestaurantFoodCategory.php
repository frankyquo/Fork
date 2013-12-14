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
	<div class="grid-12">				
		<div class="widget">
			<div class="widget-header">Add Food Category</div>
			<div class="widget-content">
				<form method="post" class="form uniformForm validateForm">
					<input type="hidden" name="action" id="action" value="add" />
					<input type="hidden" name="res_id" id="res_id" value="<?=$restaurant->restaurant_id?>" />
					<div class="field-group">
						<label for="res_name">Restaurant Name:</label>
						<div class="field">
							<input type="text" name="res_name" id="res_name" size="20" disabled="disabled" value="<?=$restaurant->restaurant_name?>" />	
						</div>
					</div>
					<div class="field-group">
						<label for="category">Food Category Name:</label>
						<div class="field">
							<select name="category" id="category">
							<?php
								foreach($foodCategoryNotIn as $foodCategory)
								{
							?>
								<option value="<?=$foodCategory['food_category_id']?>"><?=$foodCategory['food_category_name']?></option>
							<?php
								}
							?>
							</select>
						</div>
					</div>
					<div class="actions">						
						<button type="submit" class="btn btn-primary">Submit</button>
						<a href="index.php?r=fork/restaurant">
							<button type="button" class="btn btn-error">Back</button>
						</a>
					</div>
				</form>
			</div>
		</div>					
	</div>
	<div class="grid-12">
		<div class="widget">
			<div class="widget-header">
				Manage Restaurant Food Category
			</div>
			<div class="widget-content">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Restaurant Food Category Name</th>
							<th>Modify</th>
						</tr>
					</thead>
					<tbody>
					<?php
						foreach($foodCategoryIn as $foodCategory)
						{
					?>
					<form method="post">
						<input type="hidden" name="action" id="action" value="delete" />
						<input type="hidden" name="res_id" id="res_id" value="<?=$restaurant->restaurant_id?>" />
						<input type="hidden" name="category" id="category" value="<?=$foodCategory['food_category_id']?>" />
						<tr>
							<td><?=$foodCategory['food_category_name']?></td>
							<td><button type="button" class="btn btn-red delete-button"><span class="icon-trash-fill"></span></button></td>
						</tr>
					</form>
					<?php
						}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script>
$('.delete-button').live ('click', function (e) {
	$form = $(this.form);
	e.preventDefault ();
	$.alert ({ 
		type: 'confirm'
		, title: 'Delete Restaurant Food Category?'
		, text: '<p>Are you sure you want to delete this Food Category from the current Restaurant?</p>'
		, callback: function () { ($form).submit(); }	
	});		
});
</script>