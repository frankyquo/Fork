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
<?php
	if(isset($success)&&($success==1||$success==2))
	{
?>
<script>
	$.alert ({ 
		type: 'ok'
		, title: '<?=$success=='1'?'Insert Success':'Update Success'?>'
		, callback: function () { }	
	});	
</script>
<?php
	}
?>
<div class="container">
	<div class="row">
		<div class="grid-24">				
			<div class="widget widget-table">
				<div class="widget-header">
					<h3>Food</h3>
					<a href="index.php?r=fork/addFood">
						<button type="submit" class="btn btn-primary btn-header"><span class="icon-plus-alt"></span>Add</button>
					</a>
				</div>
				<div class="widget-content">
					<table class="table table-bordered table-striped data-table">
						<thead>
							<tr>
								<th>Restaurant Name</th>
								<th>Food Category</th>
								<th>Food Name</th>
								<th>Description</th>
								<th>Image</th>
								<th>Price</th>
								<th>Modify</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($foodList as $food)
								{
							?>
							<tr class="gradeA">
								<td><?=$food['restaurant_name']?></td>
								<td><?=$food['food_category_name']?></td>
								<td><?=$food['food_name']?></td>
								<td><?=$food['description']?></td>
								<td><img src="<?=$food['image']?>" alt="<?=$food['food_name']?>" width="200px" height="200px" /></td>
								<td><?=$food['price']?></td>
								<td>
									<a href="?r=fork/addFood&id=<?=$food['restaurant_food_id']?>"><button class="btn btn-gray"><span class="icon-pen"></span></button></a>
									<button name2="<?=$food['restaurant_food_id']?>" class="btn btn-red delete-button"><span class="icon-trash-fill"></span></button>
								</td>
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>
				</div>
			</div>					
		</div>
	</div>
</div>

<script>
$('.delete-button').live ('click', function (e) {
	$id = $(this).attr('name2');
	e.preventDefault ();
	$.alert ({ 
		type: 'confirm'
		, title: 'Delete Food?'
		, text: '<p>Are you sure you want to delete this food?</p>'
		, callback: function () { window.location.replace('index.php?r=fork/deleteFood&id='+$id); }	
	});		
});
</script>