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
	<div class="grid-12">				
		<div class="widget">
			<div class="widget-header">Add Food Category</div>
			<div class="widget-content">
					<div class="field-group">
				<form method="post" class="form uniformForm validateForm">
						<label for="cat_name">Food Category Name:</label>
						<div class="field">
							<select name="location" id="location">	
								<option>test</option>
							</select>
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
	<div class="grid-12">
		<div class="widget">
			<div class="widget-header">
				Manage Restaurant Food Category
			</div>
			<div class="widget-content">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Restaurant Food Category Name</th>
							<th>Modify</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>aa</td>
							<td><button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
						</tr>
						<tr>
							<td>aa</td>
							<td><button class="btn btn-red"><span class="icon-trash-fill"></span></button></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>