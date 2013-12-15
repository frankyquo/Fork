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
	<div class="grid-24">				
		<div class="widget">
			<div class="widget-header">
				<h3><?php
				if($id<1)
					echo "Add Menu";
				else
					echo "Edit Menu";
				?></h3>
			</div>
			<div class="widget-content">
				<form method="post" class="form uniformForm validateForm">
					<?php
					if($id>=1)
					{
					?>
					<input type="hidden" name="menu_id" id="menu_id" value="<?=$id?>" />
					<?php
					}
					?>
					<div class="field-group">
						<label for="application">Application Name:</label>
						<div class="field">
							<select name="application" id="application">
								<option <?php if($data==null) { ?>selected="selected" <?php }?>>Please Select An Application</option>
								<?php
									foreach($applicationList as $application)
									{
								?>
								<option value="<?=$application['application_id']?>" <?php if($data!=null && $data->application_id===$application['application_id']) echo "selected=\"selected\""; ?> ><?=$application['application_name']?></option>
								<?php
									}
								?>
							</select>
						</div>
					</div>
					<div class="field-group">
						<label for="menu_name">Menu Name:</label>
						<div class="field">
							<input type="text" name="menu_name" id="menu_name" size="20" class="validate[required,minSize[3]]" value="<?php if($data!=null) echo $data->menu_name; ?>" />	
						</div>
					</div>
					<div class="field-group">
						<label for="menu_link">Menu Link:</label>
						<div class="field">
							<input type="text" name="menu_link" id="menu_link" size="20" class="validate[required,minSize[3]]" value="<?php if($data!=null) echo $data->menu_link; ?>" />	
						</div>
					</div>
					<div class="field-group">
						<label for="parent">Menu Parent:</label>
						<div class="field">
							<select name="parent" id="parent">
								<option value="0" <?php if($data==null || $data->menu_parent_id==='0') { ?>selected="selected" <?php }?>>Add as Parent</option>
								<?php
									foreach($parentList as $parent)
									{
								?>
								<option value="<?=$parent['menu_id']?>" <?php if($data!=null && $data->menu_parent_id===$parent['menu_id']) echo "selected=\"selected\""; ?> ><?=$parent['menu_name']?></option>
								<?php
									}
								?>
							</select>
						</div>
					</div>
					<div class="actions">						
						<button type="submit" class="btn btn-primary">Submit</button>
						<a href="index.php?r=site/menu">
							<button type="button" class="btn btn-error">Back</button>
						</a>
					</div>
				</form>
			</div>
		</div>					
	</div>
</div>