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
					<button id="restaurantLocationModal" class="btn btn-primary btn-header"><span class="icon-plus-alt"></span>Add</button>
				</div>
				<div class="widget-content">
					<table class="table table-bordered table-striped data-table">
						<thead>
							<tr>
								<th>Restaurant Name</th>
								<th>Restaurant Location Name</th>
								<th>Food Category</th>
								<th>Branch</th>
								<th>Address</th>
								<th>Longitude</th>
								<th>Latitude</th>
								<th>Max Price</th>
								<th>Min Price</th>
								<th>Modify</th>
							</tr>
						</thead>
						<tbody>
							<tr class="gradeA">
								<td>Steak Holy Cow</td>
								<td>Surabaya</td>
								<td>Chinnesse food</td>
								<td>branch</td>
								<td>address</td>
								<td>108</td>
								<td>105</td>
								<td>5000000</td>
								<td>1100000</td>
								<td>
									<button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button>
								</td>
							</tr>
							<tr class="gradeA">
								<td>Steak Holy Cow</td>
								<td>Surabaya</td>
								<td>Chinnesse food</td>
								<td>branch</td>
								<td>address</td>
								<td>108</td>
								<td>105</td>
								<td>5000000</td>
								<td>1100000</td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Steak Holy Cow</td>
								<td>Surabaya</td>
								<td>Chinnesse food</td>
								<td>branch</td>
								<td>address</td>
								<td>108</td>
								<td>105</td>
								<td>5000000</td>
								<td>1100000</td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Steak Holy Cow</td>
								<td>Surabaya</td>
								<td>Chinnesse food</td>
								<td>branch</td>
								<td>address</td>
								<td>108</td>
								<td>105</td>
								<td>5000000</td>
								<td>1100000</td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Steak Holy Cow</td>
								<td>Surabaya</td>
								<td>Chinnesse food</td>
								<td>branch</td>
								<td>address</td>
								<td>108</td>
								<td>105</td>
								<td>5000000</td>
								<td>1100000</td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Steak Holy Cow</td>
								<td>Surabaya</td>
								<td>Chinnesse food</td>
								<td>branch</td>
								<td>address</td>
								<td>108</td>
								<td>105</td>
								<td>5000000</td>
								<td>1100000</td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Pepper lunch</td>
								<td>Jakarta</td>
								<td>Chinnesse food</td>
								<td>branch</td>
								<td>address</td>
								<td>108</td>
								<td>105</td>
								<td>5000000</td>
								<td>1100000</td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Pepper lunch</td>
								<td>Jakarta</td>
								<td>Chinnesse food</td>
								<td>branch</td>
								<td>address</td>
								<td>108</td>
								<td>105</td>
								<td>5000000</td>
								<td>1100000</td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Pepper lunch</td>
								<td>Jakarta</td>
								<td>Chinnesse food</td>
								<td>branch</td>
								<td>address</td>
								<td>108</td>
								<td>105</td>
								<td>5000000</td>
								<td>1100000</td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Pepper lunch</td>
								<td>Jakarta</td>
								<td>Chinnesse food</td>
								<td>branch</td>
								<td>address</td>
								<td>108</td>
								<td>105</td>
								<td>5000000</td>
								<td>1100000</td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Steak Holy Cow</td>
								<td>Surabaya</td>
								<td>Chinnesse food</td>
								<td>branch</td>
								<td>address</td>
								<td>108</td>
								<td>105</td>
								<td>5000000</td>
								<td>1100000</td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Steak Holy Cow</td>
								<td>Surabaya</td>
								<td>Chinnesse food</td>
								<td>branch</td>
								<td>address</td>
								<td>108</td>
								<td>105</td>
								<td>5000000</td>
								<td>1100000</td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Steak Holy Cow</td>
								<td>Surabaya</td>
								<td>Chinnesse food</td>
								<td>branch</td>
								<td>address</td>
								<td>108</td>
								<td>105</td>
								<td>5000000</td>
								<td>1100000</td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Steak Holy Cow</td>
								<td>Surabaya</td>
								<td>Chinnesse food</td>
								<td>branch</td>
								<td>address</td>
								<td>108</td>
								<td>105</td>
								<td>5000000</td>
								<td>1100000</td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Steak Holy Cow</td>
								<td>Surabaya</td>
								<td>Chinnesse food</td>
								<td>branch</td>
								<td>address</td>
								<td>108</td>
								<td>105</td>
								<td>5000000</td>
								<td>1100000</td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Steak Holy Cow</td>
								<td>Surabaya</td>
								<td>Chinnesse food</td>
								<td>branch</td>
								<td>address</td>
								<td>108</td>
								<td>105</td>
								<td>5000000</td>
								<td>1100000</td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Pepper lunch</td>
								<td>Jakarta</td>
								<td>Chinnesse food</td>
								<td>branch</td>
								<td>address</td>
								<td>108</td>
								<td>105</td>
								<td>5000000</td>
								<td>1100000</td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Pepper lunch</td>
								<td>Jakarta</td>
								<td>Chinnesse food</td>
								<td>branch</td>
								<td>address</td>
								<td>108</td>
								<td>105</td>
								<td>5000000</td>
								<td>1100000</td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Pepper lunch</td>
								<td>Jakarta</td>
								<td>Chinnesse food</td>
								<td>branch</td>
								<td>address</td>
								<td>108</td>
								<td>105</td>
								<td>5000000</td>
								<td>1100000</td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Pepper lunch</td>
								<td>Jakarta</td>
								<td>Chinnesse food</td>
								<td>branch</td>
								<td>address</td>
								<td>108</td>
								<td>105</td>
								<td>5000000</td>
								<td>1100000</td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>	
							<tr class="gradeA">
								<td>Steak Holy Cow</td>
								<td>Surabaya</td>
								<td>Chinnesse food</td>
								<td>branch</td>
								<td>address</td>
								<td>108</td>
								<td>105</td>
								<td>5000000</td>
								<td>1100000</td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Steak Holy Cow</td>
								<td>Surabaya</td>
								<td>Chinnesse food</td>
								<td>branch</td>
								<td>address</td>
								<td>108</td>
								<td>105</td>
								<td>5000000</td>
								<td>1100000</td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Steak Holy Cow</td>
								<td>Surabaya</td>
								<td>Chinnesse food</td>
								<td>branch</td>
								<td>address</td>
								<td>108</td>
								<td>105</td>
								<td>5000000</td>
								<td>1100000</td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Steak Holy Cow</td>
								<td>Surabaya</td>
								<td>Chinnesse food</td>
								<td>branch</td>
								<td>address</td>
								<td>108</td>
								<td>105</td>
								<td>5000000</td>
								<td>1100000</td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Steak Holy Cow</td>
								<td>Surabaya</td>
								<td>Chinnesse food</td>
								<td>branch</td>
								<td>address</td>
								<td>108</td>
								<td>105</td>
								<td>5000000</td>
								<td>1100000</td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Steak Holy Cow</td>
								<td>Surabaya</td>
								<td>Chinnesse food</td>
								<td>branch</td>
								<td>address</td>
								<td>108</td>
								<td>105</td>
								<td>5000000</td>
								<td>1100000</td>
								<td><button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
							</tr>
							<tr class="gradeA">
								<td>Pepper lunch</td>
								<td>Jakarta</td>
								<td>Chinnesse food</td>
								<td>branch</td>
								<td>address</td>
								<td>108</td>
								<td>105</td>
								<td>5000000</td>
								<td>1100000</td>
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
	$('#restaurantLocationModal').live ('click', function (e) {
		e.preventDefault ();
		
		$.ajax({
			url: '<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=fork/restaurantLocationPop',
			type:'get',
			success: function(data){
				$.modal({
					title: 'Add Restaurant Location'
					, html: data
				});
			}
		});
	});
});
</script>
