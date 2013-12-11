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
	<h1><?php echo Yii::app()->name; ?> - Groups</h1>
</div>

<div class="container">
	<div class="grid-24">
		<div class="widget widget-table">
					
			<div class="widget-header">
				<h3 class="icon chart">Group Data</h3>
				<button id="addGroup" class="btn btn-primary btn-header">
					<span class="icon-plus-alt"></span>Add
				</button>				
			</div>
		
			<div class="widget-content">
				
				<table class="table table-bordered table-striped data-table">
					<thead>
						<tr>
							<th>Application Name</th>
							<th>Group Name</th>
							<th>Modify</th>
						</tr>
					</thead>
					<tbody>
						<tr class="gradeA">
							<td>User Management</td>
							<td>Admin</td>
							<td>
								<button id="editGroup" class="btn btn-gray"><span class="icon-pen"></span></button>
								<button id="deleteGroup" class="btn btn-red"><span class="icon-trash-fill"></span></button>
							</td>
						</tr>
						<tr class="gradeA">
							<td>User Management</td>
							<td>Group2</td>
							<td>
								<button id="editGroup" class="btn btn-gray"><span class="icon-pen"></span></button>
								<button id="deleteGroup" class="btn btn-red"><span class="icon-trash-fill"></span></button>
							</td>
						</tr>				
						<tr class="gradeA">
							<td>User Management</td>
							<td>Group3</td>
							<td>
								<button id="editGroup" class="btn btn-gray"><span class="icon-pen"></span></button>
								<button id="deleteGroup" class="btn btn-red"><span class="icon-trash-fill"></span></button>
							</td>
						</tr>		
						<tr class="gradeA">
							<td>User Management</td>
							<td>Group4</td>
							<td>
								<button id="editGroup" class="btn btn-gray"><span class="icon-pen"></span></button>
								<button id="deleteGroup" class="btn btn-red"><span class="icon-trash-fill"></span></button>
							</td>
						</tr>		
						<tr class="gradeA">
							<td>User Management</td>
							<td>Group5</td>
							<td>
								<button id="editGroup" class="btn btn-gray"><span class="icon-pen"></span></button>
								<button id="deleteGroup" class="btn btn-red"><span class="icon-trash-fill"></span></button>
							</td>
						</tr>												
					</tbody>
				</table>
			</div> <!-- .widget-content -->
			
		</div> <!-- .widget -->
	</div>
</div>

<script>
$(function () {
	
	$('#addGroup').live ('click', function (e) {
		e.preventDefault ();
		$.ajax({
			url:'<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/groupPop',
			type:'get',
			success: function(data) {
				$.modal({
					title:'Add Group',
					html:data
				});
			}
		});
	});
});

</script>