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
		<div class="widget widget-table">
			<div class="widget-header">
				<h3>Add Promotion</h3>
			</div>
			<div class="widget-content">
				<form class="form uniformForm validateForm">
					<div class="field-group">
						<label for="name">Username:</label>
						<div class="field">
							<input type="text" name="name" id="name" size="20" class="validate[required,minSize[5]]" />	
						</div>
					</div>
					<div class="field-group">
						<label for="name">Email:</label>
						<div class="field">
							<input type="text" name="name" id="name" size="20" class="validate[required,minSize[5],custom[email]]" />	
						</div>
					</div>
					<div class="field-group">
						<label for="password1">Password:</label>
						<div class="field">
							<input type="password" name="password1" id="password1" size="25" class="validate[required,minSize[5]]" value="">	
						</div>
					</div>
					
					<div class="field-group">
						<label for="password2">Confirm Password:</label>
						<div class="field">
							<input type="password" name="password2" id="password2" size="25" class="validate[required,equals[password1]]" value="">	
						</div>
					</div>
					<div class="field-group inlineField">
						<label for="datepicker">Password:</label>
						<div class="field">
							<input type="text" name="datepicker" id="datepicker" class="hasDatepicker">
						</div>
					</div>
					<div class="field-group inlineField">
						<label for="datepicker2">Confirm Password:</label>
						<div class="field">
							<input type="text" name="datepicker2" id="datepicker2" class="hasDatepicker">
						</div>
					</div>
					<div class="field-group control-group inline">	
						<label>Gender:</label>	
		
						<div class="field">
							<div class="radio" id="uniform-radio1"><span><input type="radio" name="radio" id="radio1" value="1" class="validate[required]" style="opacity: 0;"></span></div>
							<label for="radio1">Male</label>
						</div>
		
						<div class="field">
							<div class="radio" id="uniform-radio2"><span><input type="radio" name="radio" id="radio2" value="2" class="validate[required]" style="opacity: 0;"></span></div>
							<label for="radio2">Female</label>
						</div>
					</div>
					<div class="field-group inlineField">
						<label for="datepicker2">Age:</label>
						<div class="field">
							<input type="text" name="name" id="name" size="20" class="validate[required]" />	
						</div>
					</div>
					<div class="field-group">
						<label for="required">Location:</label>
						<div class="field">
							<select name="cardtype" id="cardtype">
								<option>Jakarta</option>
								<option>Surabaya</option>
							</select>
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