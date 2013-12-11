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
	<h1><?php echo Yii::app()->name; ?> - Index</h1>
</div>

<div class="container">
	<div class="row">
		<div class="grid-24">
			<div class="widget">
				<div class="widget-header">
					<h3>Menu</h3>
					<button id="addMenu" class="btn btn-primary btn-header-right">
						<span class="icon-plus-alt"></span>Add
					</button>
				</div>
				<div class="widget-content">
					<form class="form uniformForm">
						<p>
							<div class="field-group">
								<label>Application:</label>
								<div class="field">
									<select name="cardtype" id="cardtype">
										<option>Fork</option>
									</select>
								</div>
							</div>
							<div class="actions">						
								<button type="button" class="btn btn-primary"><span class="icon-users"></span>Search</button>
							</div>						
						</p>
					</form>
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Menu Name</th>
								<th>Menu Link</th>
								<th>Modify</th>
							</tr>
						</thead>
						<tbody>
							<tr class="odd gradeX">
								<td class="menu-parent">User Management</td>
								<td class="menu-parent">this</td>
								<td class="menu-parent">
									<button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button>
								</td>
							</tr>
							<tr class="even gradeC">
								<td class="menu-child">User</td>
								<td class="menu-child">site/user</td>
								<td class="menu-child">
									<button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button>
								</td>
							</tr>
							<tr class="odd gradeA">
								<td class="menu-child">Group</td>
								<td class="menu-child">site/group</td>
								<td class="menu-child">
									<button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button>
								</td>
							</tr>
							<tr class="even gradeA">
								<td class="menu-child">Group User</td>
								<td class="menu-child">site/groupUser</td>
								<td class="menu-child">
									<button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button>
								</td>
							</tr>
							<tr class="odd gradeX">
								<td class="menu-parent">Management Content</td>
								<td class="menu-parent">this</td>
								<td class="menu-parent">
									<button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button>
								</td>
							</tr>
							<tr class="even gradeC">
								<td class="menu-child">Location</td>
								<td class="menu-child">management/location</td>
								<td class="menu-child">
									<button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button>
								</td>
							</tr>
							<tr class="odd gradeA">
								<td class="menu-child">Restaurant</td>
								<td class="menu-child">management/restaurant</td>
								<td class="menu-child">
									<button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button>
								</td>
							</tr>
							<tr class="even gradeA">
								<td class="menu-child">Restaurant Review</td>
								<td class="menu-child">management/restaurantReview</td>
								<td class="menu-child">
									<button class="btn btn-gray"><span class="icon-pen"></span></button>
									<button class="btn btn-red"><span class="icon-trash-fill"></span></button>
								</td>
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
	
	$('#addMenu').live ('click', function (e) {
		e.preventDefault ();
		$.ajax({
			url:'<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/menuPop',
			type:'get',
			success: function(data) {
				$.modal({
					title:'Add Menu',
					html:data
				});
			}
		});
	});
});

</script>