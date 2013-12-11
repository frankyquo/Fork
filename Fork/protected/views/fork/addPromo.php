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
	<div class="row">
		<div class="grid-24">				
			<div class="widget">
				<div class="widget-header">
					<h3>Add Promotion</h3>
				</div>
				<div class="widget-content">
					<form class="form uniformForm validateForm">
						<div class="field-group">
							<label for="name">Promo Name:</label>
							<div class="field">
								<input type="text" name="name" id="name" size="20" class="validate[required]" />	
							</div>
						</div>
						<div class="field-group inlineField">
							<label for="datepicker">Start Date:</label>
							<div class="field">
								<input type="text" name="datepicker" id="datepicker" class="hasDatepicker">
							</div>
						</div>
						<div class="field-group inlineField">
							<label for="datepicker2">End Date:</label>
							<div class="field">
								<input type="text" name="datepicker2" id="datepicker2" class="hasDatepicker">
							</div>
						</div>
						<div class="field-group">
							<label for="message">Promo Description:</label>
							<div class="field">
								<textarea name="message" id="message" rows="5" cols="50"></textarea>
							</div>
						</div>
						<div class="field-group inlineField">	
							<label for="myfile">Promo Image:</label>
	
							<div class="field">
								<input type="file" name="myfile" id="myfile" />
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
</div>
<script>
$(function () { 
	$( "#datepicker" ).datepicker();
	$( "#datepicker2" ).datepicker();
});

</script>