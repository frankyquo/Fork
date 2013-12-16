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
					<h3>Group Users</h3>
				</div>
				<div class="widget-content">
					<form method="post" class="form uniformForm">
						<p>
							<div class="field-group">
								<label for="application_id">Application:</label>
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
							</div>
							<div class="field-group">
								<label for="group_id">Group:</label>
								<div class="field">
									<select name="group_id" id="group_id">
									<?php
										if($groupList==0)
										{
									?>
										<option selected="selected">Please Select An Application First</option>
									<?php
										}
										else
										{
											foreach($groupList as $group)
											{
									?>
										<option <?php if($group_id===$group['group_id']) {?>selected="selected" <?php } ?>value="<?=$group['group_id']?>"><?=$group['group_name']?></option>
									<?php
											}
										}
									?>
									</select>
								</div>
							</div>
							<div class="actions">						
								<button type="submit" class="btn btn-primary"><span class="icon-users"></span>Search</button>
							</div>
						</p>
					</form>
					<form method="post" >
						<input type="hidden" name="group_id_new" id="group_id_new" value=""/>
						<input type="hidden" name="action" id="action" value="" />
						<div class="grid-10">
							<div style="text-align:center;margin:5px auto 5px auto">
								Users Not In Group
							</div>
							<select name="notActive[]" id="notActive" multiple="multiple" class="multiple" style="height:300px; width:100%">
							<?php
								if($userOut!=null)
								{
									foreach($userOut as $user)
									{
							?>
								<option value="<?=$user['user_id']?>" ><?=$user['username']?></option>
							<?php
									}
								}
							?>
							</select>
						</div>
						<div class="grid-4">
							<div class="dualControl" style="text-align:center;margin:125px auto 125px auto">
								<button id="add" type="button" class="btn mr5 mb15">&nbsp;&gt;&nbsp;</button>
								<button id="remove" type="button" class="btn mr5">&nbsp;&lt;&nbsp;</button>
							</div>
						</div>
						<div class="grid-10">
							<div style="text-align:center;margin:5px auto 5px auto">
								User In Group
							</div>
							<select name="active[]" id="active" multiple="multiple" class="multiple" style="height:300px; width:100%">
							<?php
								if($userIn!=null)
								{
									foreach($userIn as $user)
									{
							?>
								<option value="<?=$user['user_id']?>" ><?=$user['username']?></option>
							<?php
									}
								}
							?>
							</select>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
$('#remove').live ('click', function (e) {
	$('#group_id_new').val($('#group_id').val());
	$('#action').val('remove');
	$.ajax({
		url:'<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/addGroupUsers',
		type:'post',
		data: $(this.form).serialize(),
		success: function(data){
			$.ajax({
				url:'<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/groupList&action=in&app='+$('#application_id').val()+'&group='+$('#group_id').val(),
				type:'get',
				success: function(data){
					$('#active').html(data);
				}
			});
			$.ajax({
				url:'<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/groupList&action=out&app='+$('#application_id').val()+'&group='+$('#group_id').val(),
				type:'get',
				success: function(data){
					$('#notActive').html(data);
				}
			});
		}
	});
	//$(this.form).submit();
});
$('#add').live ('click', function (e) {
	$('#group_id_new').val($('#group_id').val());
	$('#action').val('add');
	$.ajax({
		url:'<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/addGroupUsers',
		type:'post',
		data: $(this.form).serialize(),
		success: function(data){
			$.ajax({
				url:'<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/groupList&action=in&app='+$('#application_id').val()+'&group='+$('#group_id').val(),
				type:'get',
				success: function(data){
					$('#active').html(data);
				}
			});
			$.ajax({
				url:'<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/groupList&action=out&app='+$('#application_id').val()+'&group='+$('#group_id').val(),
				type:'get',
				success: function(data){
					$('#notActive').html(data);
				}
			});
		}
	});
	//$(this.form).submit();
});
$('#application_id').change(function(){
	$.ajax({
		url:'<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/groupList&id='+$('#application_id').val(),
		type:'get',
		success: function(data){
			$('#group_id').html(data);
		}
	});
});
/*
$('#group_id').change(function(){
	$.ajax({
		url:'<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/groupList&action=in&app='+$('#application_id').val()+'&group='+$('#group_id').val(),
		type:'get',
		success: function(data){
			$('#active').html(data);
		}
	});
	$.ajax({
		url:'<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/groupList&action=out&app='+$('#application_id').val()+'&group='+$('#group_id').val(),
		type:'get',
		success: function(data){
			$('#notActive').html(data);
		}
	});
});
*/
</script>