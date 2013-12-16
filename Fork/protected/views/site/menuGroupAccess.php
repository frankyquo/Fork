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
					<h3>Menu Access</h3>
				</div>
				<div class="widget-content">
					<form class="form uniformForm">
						<p>
							<div class="field-group">
								<label>Application:</label>
								<div class="field">
									<select name="application_id" id="application_id">
										<option <?php if($application_id==0) { ?>selected="selected" <?php }?> value="0" >Please Select An Application</option>
										<?php
											foreach($applicationList as $application)
											{
										?>
										<option value="<?=$application['application_id']?>" <?php if($application_id===$application['application_id']) echo "selected=\"selected\""; ?> ><?=$application['application_name']?></option>
										<?php
											}
										?>
									</select>
								</div>
								<label>Group:</label>
								<div class="field">
									<select name="group_id" id="group_id">
										<option selected="selected">Please Select An Application First</option>
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
								<th>Modify</th>
							</tr>
						</thead>
						<tbody>
							<tr class="odd gradeX">
								<td class="menu-parent">User Management</td>
								<td class="menu-parent">
									<div class="field">
										<div class="checker" id="uniform-checkbox1"><span><input type="checkbox" name="checkbox" id="checkbox1" value="1" class="validate[minCheckbox[2]]" style="opacity: 0;"></span></div>
										<label for="checkbox1"></label>
									</div>
								</td>
							</tr>
							<tr class="even gradeC">
								<td class="menu-child">User</td>
								<td class="menu-parent">
									<div class="field">
										<div class="checker" id="uniform-checkbox1"><span><input type="checkbox" name="checkbox" id="checkbox1" value="1" class="validate[minCheckbox[2]]" style="opacity: 0;"></span></div>
										<label for="checkbox1"></label>
									</div>
								</td>
							</tr>
							<tr class="odd gradeA">
								<td class="menu-child">Group</td>
								<td class="menu-parent">
									<div class="field">
										<div class="checker" id="uniform-checkbox1"><span><input type="checkbox" name="checkbox" id="checkbox1" value="1" class="validate[minCheckbox[2]]" style="opacity: 0;"></span></div>
										<label for="checkbox1"></label>
									</div>
								</td>
							</tr>
							<tr class="even gradeA">
								<td class="menu-child">Group User</td>
								<td class="menu-parent">
									<div class="field">
										<div class="checker" id="uniform-checkbox1"><span><input type="checkbox" name="checkbox" id="checkbox1" value="1" class="validate[minCheckbox[2]]" style="opacity: 0;"></span></div>
										<label for="checkbox1"></label>
									</div>
								</td>
							</tr>
							<tr class="odd gradeX">
								<td class="menu-parent">Management Content</td>
								<td class="menu-parent">
									<div class="field">
										<div class="checker" id="uniform-checkbox1"><span><input type="checkbox" name="checkbox" id="checkbox1" value="1" class="validate[minCheckbox[2]]" style="opacity: 0;"></span></div>
										<label for="checkbox1"></label>
									</div>
								</td>
							</tr>
							<tr class="even gradeC">
								<td class="menu-child">Location</td>
								<td class="menu-parent">
									<div class="field">
										<div class="checker" id="uniform-checkbox1"><span><input type="checkbox" name="checkbox" id="checkbox1" value="1" class="validate[minCheckbox[2]]" style="opacity: 0;"></span></div>
										<label for="checkbox1"></label>
									</div>
								</td>
							</tr>
							<tr class="odd gradeA">
								<td class="menu-child">Restaurant</td>
								<td class="menu-parent">
									<div class="field">
										<div class="checker" id="uniform-checkbox1"><span><input type="checkbox" name="checkbox" id="checkbox1" value="1" class="validate[minCheckbox[2]]" style="opacity: 0;"></span></div>
										<label for="checkbox1"></label>
									</div>
								</td>
							</tr>
							<tr class="even gradeA">
								<td class="menu-child">Restaurant Review</td>
								<td class="menu-parent">
									<div class="field">
										<div class="checker" id="uniform-checkbox1"><span><input type="checkbox" name="checkbox" id="checkbox1" value="1" class="validate[minCheckbox[2]]" style="opacity: 0;"></span></div>
										<label for="checkbox1"></label>
									</div>
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
$('#application_id').change(function(){
	$.ajax({
		url:'<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/groupList&id='+$('#application_id').val(),
		type:'get',
		success: function(data){
			$('#group_id').html(data);
		}
	});
});

</script>