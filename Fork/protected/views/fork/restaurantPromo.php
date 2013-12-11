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
					<h3>Promotions</h3>
					<a href="index.php?r=fork/addPromo">
						<button type="submit" class="btn btn-primary btn-header"><span class="icon-plus-alt"></span>Add</button>
					</a>
				</div>
				<div class="widget-content">
					<table class="table table-bordered table-striped data-table">
						<thead>
							<tr>
								<th>Promo Name</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Promo Description</th>
								<th>Image</th>
								<th>Modify</th>
							</tr>
						</thead>
						<tbody>
							<tr class="gradeA">
								<td>Promo 1</td>
								<td>12-10-2013</td>
								<td>12-30-2013</td>
								<td><p>This is a Promotion's Description</p></td>
								<td><img src="images/gallery/rain_small.jpg"/></td>
								<td>
									<button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button>
								</td>
							</tr>
							<tr class="gradeA">
								<td>Promo 2</td>
								<td>12-10-2013</td>
								<td>12-30-2013</td>
								<td><p>This is a Promotion's Description</p></td>
								<td><img src="images/gallery/rain_small.jpg"/></td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Promo 3</td>
								<td>12-10-2013</td>
								<td>12-30-2013</td>
								<td><p>This is a Promotion's Description</p></td>
								<td><img src="images/gallery/rain_small.jpg"/></td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Promo 4</td>
								<td>12-10-2013</td>
								<td>12-30-2013</td>
								<td><p>This is a Promotion's Description</p></td>
								<td><img src="images/gallery/rain_small.jpg"/></td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Promo 5</td>
								<td>12-10-2013</td>
								<td>12-30-2013</td>
								<td><p>This is a Promotion's Description</p></td>
								<td><img src="images/gallery/rain_small.jpg"/></td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Promo 6</td>
								<td>12-10-2013</td>
								<td>12-30-2013</td>
								<td><p>This is a Promotion's Description</p></td>
								<td><img src="images/gallery/rain_small.jpg"/></td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Promo 7</td>
								<td>12-10-2013</td>
								<td>12-30-2013</td>
								<td><p>This is a Promotion's Description</p></td>
								<td><img src="images/gallery/rain_small.jpg"/></td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Promo 8</td>
								<td>12-10-2013</td>
								<td>12-30-2013</td>
								<td><p>This is a Promotion's Description</p></td>
								<td><img src="images/gallery/rain_small.jpg"/></td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Promo 9</td>
								<td>12-10-2013</td>
								<td>12-30-2013</td>
								<td><p>This is a Promotion's Description</p></td>
								<td><img src="images/gallery/rain_small.jpg"/></td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Promo 10</td>
								<td>12-10-2013</td>
								<td>12-30-2013</td>
								<td><p>This is a Promotion's Description</p></td>
								<td><img src="images/gallery/rain_small.jpg"/></td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Promo 11</td>
								<td>12-10-2013</td>
								<td>12-30-2013</td>
								<td><p>This is a Promotion's Description</p></td>
								<td><img src="images/gallery/rain_small.jpg"/></td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Promo 12</td>
								<td>12-10-2013</td>
								<td>12-30-2013</td>
								<td><p>This is a Promotion's Description</p></td>
								<td><img src="images/gallery/rain_small.jpg"/></td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Promo 13</td>
								<td>12-10-2013</td>
								<td>12-30-2013</td>
								<td><p>This is a Promotion's Description</p></td>
								<td><img src="images/gallery/rain_small.jpg"/></td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Promo 14</td>
								<td>12-10-2013</td>
								<td>12-30-2013</td>
								<td><p>This is a Promotion's Description</p></td>
								<td><img src="images/gallery/rain_small.jpg"/></td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Promo 15</td>
								<td>12-10-2013</td>
								<td>12-30-2013</td>
								<td><p>This is a Promotion's Description</p></td>
								<td><img src="images/gallery/rain_small.jpg"/></td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>					
		</div>
	</div>
</div>

<script>
$(function () {
	$('#addProvider').live ('click', function (e) {
		e.preventDefault ();
		window.location('<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=fork/addProvider');
		/*
		$.ajax({
			url: '<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=fork/locationsPop',
			type:'get',
			success: function(data){
				$.modal({
					title: 'Add Locations'
					, html: data
				});
			}
		});*/
	});
});
</script>
