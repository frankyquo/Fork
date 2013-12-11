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
<?php
	if(isset($success)&&$success==1) {
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
	<div class="grid-24">
		<div class="widget widget-table">
					
			<div class="widget-header">
				<h3 class="icon chart">User Data</h3>
				<a href="index.php?r=site/addUser">
					<button type="submit" class="btn btn-primary btn-header"><span class="icon-plus-alt"></span>Add</button>
				</a>			
			</div>
		
			<div class="widget-content">
				
				<table class="table table-bordered table-striped data-table">
					<thead>
						<tr>
							<th>Username</th>
							<th>Email</th>
							<th>Password</th>
							<th>Gender</th>
							<th>Age</th>
							<th>Location</th>
							<th>Modify</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($userList as $user)
							{
						?>
						<tr class="gradeA">
							<td><?=$user['username']?></td>
							<td><?=$user['email']?></td>
							<td>********</td>
							<td><?php if($user['gender']==1) echo "Male"; else echo "Female";?></td>
							<td><?=$user['age']?></td>
							<td><?=$user['location_name']?></td>
							<td>
								<a href="?r=site/addUser&id=<?=$user['user_id']?>"><button id="editGroup" class="btn btn-gray"><span class="icon-pen"></span></button></a>
								<button id="deleteGroup" class="btn btn-red"><span class="icon-trash-fill"></span></button>
							</td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</div> <!-- .widget-content -->
			
		</div> <!-- .widget -->
	</div>
</div>