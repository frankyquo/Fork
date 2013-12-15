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
					<a href="index.php?r=site/addMenu">
						<button type="submit" class="btn btn-primary btn-header-right"><span class="icon-plus-alt"></span>Add</button>
					</a>
				</div>
				<div class="widget-content">
					<form method="post" class="form uniformForm">
						<p>
							<div class="field-group">
								<label>Application:</label>
								<div class="field">
									<select name="application_id" id="application_id">
										<?php
											foreach($applicationList as $application)
											{
										?>
										<option value="<?=$application['application_id']?>" <?php if(count($menuList)!=0 && $menuList[0]['application_id']===$application['application_id']) echo "selected=\"selected\""; ?> ><?=$application['application_name']?></option>
										<?php
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
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Menu Name</th>
								<th>Menu Link</th>
								<th>Modify</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($menuList as $menu)
								{
									if($menu['menu_link']==='this')
									{
							?>
							<tr class="odd gradeX">
								<td class="menu-parent"><?=$menu['menu_name']?></td>
								<td class="menu-parent"><?=$menu['menu_link']?></td>
								<td class="menu-parent">
									<a href="?r=site/addMenu&id=<?=$menu['menu_id']?>"><button class="btn btn-gray"><span class="icon-pen"></span></button></a>
									<button name2="<?=$menu['menu_id']?>" class="btn btn-red delete-button"><span class="icon-trash-fill"></span></button>
								</td>
							</tr>
							<?php
									}
									else
									{
							?>
							<tr class="even gradeC">
								<td class="menu-child"><?=$menu['menu_name']?></td>
								<td class="menu-child"><?=$menu['menu_link']?></td>
								<td class="menu-child">
									<a href="?r=site/addMenu&id=<?=$menu['menu_id']?>"><button class="btn btn-gray"><span class="icon-pen"></span></button></a>
									<button name2="<?=$menu['menu_id']?>" class="btn btn-red delete-button"><span class="icon-trash-fill"></span></button>
								</td>
							</tr>
							<?php
									}
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
$('.delete-button').live ('click', function (e) {
	$id = $(this).attr('name2');
	e.preventDefault ();
	$.alert ({ 
		type: 'confirm'
		, title: 'Delete Menu?'
		, text: '<p>Are you sure you want to delete this menu?</p>'
		, callback: function () { window.location.replace('index.php?r=site/deleteMenu&id='+$id); }	
	});		
});
</script>