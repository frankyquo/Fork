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
				<button name2="0" class="btn btn-primary btn-header addGroup">
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
						<?php
							foreach($groupList as $group)
							{
						?>
						<tr class="gradeA">
							<td><?=$group['group_name']?></td>
							<td><?=$group['application_name']?></td>
							<td>
								<button name2="<?=$group['group_id']?>" class="btn btn-gray addGroup"><span class="icon-pen"></span></button>
								<button class="btn btn-red"><span class="icon-trash-fill"></span></button>
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

<script>
$(function () {
	
	$('.addGroup').live ('click', function (e) {
		$id = $(this).attr('name2');
		$url = '<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/groupPop';
		$id=='0' ? $url+='' : $url+='&id='+$id;
		e.preventDefault ();
		$.ajax({
			url:$url,
			type:'get',
			success: function(data) {
				$.modal({
					title: $id=='0'?'Add Group':'Edit Group',
					html:data
				});
			}
		});
	});
});

</script>