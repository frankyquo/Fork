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
	<div class="row">
		<div class="grid-24">				
			<div class="widget widget-table">
				<div class="widget-header">
					<h3>Locations</h3>
					<!--button id="restaurantReviewModal" class="btn btn-primary btn-header"><span class="icon-plus-alt"></span>Add</button-->
				</div>
				<div class="widget-content">
					<table class="table table-bordered table-striped data-table">
						<thead>
							<tr>
								<th>Restaurant Name</th>
								<th>Restaurant Location Name</th>
								<th>Branch</th>
								<th>UserName</th>
								<th>Score</th>
								<th>Review</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($restaurantReviewList as $restaurantReview)
								{
							?>
							<tr class="gradeA">
								<td><?=$restaurantReview['restaurant_name']?></td>
								<td><?=$restaurantReview['location_name']?></td>
								<td><?=$restaurantReview['branch']?></td>
								<td><?=$restaurantReview['username']?></td>
								<td><?=$restaurantReview['score']?></td>
								<td><?=$restaurantReview['review']?></td>
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
$(function () {
	$('#restaurantReviewModal').live ('click', function (e) {
		e.preventDefault ();
		
		$.ajax({
			url: '<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=fork/restaurantReviewPop',
			type:'get',
			success: function(data){
				$.modal({
					title: 'Add Restaurant Review'
					, html: data
				});
			}
		});
	});
});
</script>
