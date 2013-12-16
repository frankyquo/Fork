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
										if($groupList==0 || count($groupList)==0)
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
					<form class="form uniformForm">
						<input type="hidden" name="application_id_new" id="application_id_new" value="<?php if($application_id!==0) echo $application_id;?>"/>
						<input type="hidden" name="group_id_new" id="group_id_new" value="<?php if($group_id!==0) echo $group_id;?>"/>
						<table class="table table-striped table-bordered field-group control-group">
							<thead>
								<tr>
									<th>Menu Name</th>
									<th>Modify</th>
								</tr>
							</thead>
							<tbody id="tableBody">
								<?php
									if($menuList!=null)
									{
										foreach($menuList as $menu)
										{
											if($menu['menu_link']==='this')
											{
								?>
								<tr class="odd gradeX">
									<td class="menu-parent"><?=$menu['menu_name']?></td>
									<td class="menu-parent">
										<input type="checkbox" name="checkbox" id="checkbox1" value="<?=$menu['menu_id']?>" class="changeGroupAccess" style="opacity: 0;" <?php if($menu['status']==='1') { ?>checked="checked" <?php } ?>>
									</td>
								</tr>
								<?php
											}
											else
											{
								?>
								<tr class="even gradeC">
									<td class="menu-child"><?=$menu['menu_name']?></td>
									<td class="menu-child">
										<input type="checkbox" name="checkbox" id="checkbox1" value="<?=$menu['menu_id']?>" class="changeGroupAccess" style="opacity: 0;" <?php if($menu['status']==='1') { ?>checked="checked" <?php } ?>>
									</td>
								</tr>
								<?php
											}
										}
									}
								?>
							</tbody>
						</table>
					</form>
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
$('.changeGroupAccess').live('click',function(e)
{
	$check = $(this).attr('checked');
	$.modal({
		title:'Changing Access',
		html:'Please Wait',
		overlay: true,
		overlayClose: false,
		escClose: false
	});
	$.ajax({
		url:'<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/changeGroupAccess',
		type:'post',
		data: 'application_id='+$('#application_id_new').val()+'&group_id='+$('#group_id_new').val()+'&menu_id='+$(this).val()+'&checked='+$check,
		success: function(data){
			$.ajax({
				url:'<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/menuGroupAccessList&app='+$('#application_id_new').val()+'&group='+$('#group_id_new').val(),
				type:'get',
				success: function(data){
					//$('#tableBody').html(data);
					$('a.close').click();
					//$('#modal').dialog("close");
				}
			});
		}
	});
});
</script>
<style type="text/css">
a.close {
	display:none;
}
</style>