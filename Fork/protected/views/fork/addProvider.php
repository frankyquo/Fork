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
					echo "Add Provider";
				else
					echo "Edit Provider";
				?></h3>
			</div>
			<div class="widget-content">
				<form method="post" class="form uniformForm validateForm">
					<?php
					if($id>=1)
					{
					?>
					<input type="hidden" name="provider_id" id="provider_id" value="<?=$id?>" />
					<?php
					}
					?>
					<div class="field-group">
						<label for="provider_name">Provider Name:</label>
						<div class="field">
							<input type="text" name="provider_name" id="provider_name" size="20" class="validate[required]" value="<?php if($data!=null) echo $data['provider_name']; ?>" />	
						</div>
					</div>
					<div class="field-group inlineField">	
						<label for="provider_img">Provider Image:</label>
						<div class="field">
							<input type="file" name="provider_img" id="provider_img" value="<?php if($data!=null) echo $data['provider_image']; ?>" />
						</div>	
					</div>
					<div class="actions">						
						<button type="submit" class="btn btn-primary">Submit</button>
						<button type="reset" class="btn btn-error">Reset</button>
					</div>
				</form>
			</div>
		</div>					
	</div>
</div>