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
					echo "Add Restaurant";
				else
					echo "Edit Restaurant";
				?></h3>
			</div>
			<div class="widget-content">
				<form method="post" class="form uniformForm validateForm">
					<?php
					if($id>=1)
					{
					?>
					<input type="hidden" name="res_id" id="res_id" value="<?=$id?>" />
					<?php
					}
					?>
					<div class="field-group">
						<label for="res_name">Restaurant Name:</label>
						<div class="field">
							<input type="text" name="res_name" id="res_name" size="20" class="validate[required]" value="<?php if($data!=null) echo $data->restaurant_name; ?>" />	
						</div>
					</div>
					<div class="actions">						
						<button type="submit" class="btn btn-primary">Submit</button>
						<a href="index.php?r=fork/restaurant">
							<button type="button" class="btn btn-error">Back</button>
						</a>
					</div>
				</form>
			</div>
		</div>					
	</div>
</div>