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
				$data = null;
				if(!isset($_GET['id'])||$_GET['id']<1)
					echo "Add User";
				else
				{
					echo "Edit User";
					$id = $_GET['id'];
					$connection = Yii::app()->db;
					$command = $connection->createCommand("SELECT user_id, username, email, gender, age, location_name FROM users u JOIN location l ON u.location_id = l.location_id WHERE u.stsrc=1 AND l.stsrc=1 AND user_id='$id'");
					$userList = $command->queryAll();
					$data = $userList[0];
				}
				?></h3>
			</div>
			<div class="widget-content">
				<form action="?r=site/addUser" method="post" class="form uniformForm validateForm">
				<?php
					if($data!=null)
					{
				?>
				<input type="hidden" name="uid" id="uid" value="<?=$data['user_id']?>" />
				<?php
					}
				?>
					<div class="field-group">
						<label for="uname">Username:</label>
						<div class="field">
							<input type="text" name="uname" id="uname" size="20" class="validate[required,minSize[5]]" <?php if($data!=null) echo "value=\"".$data['username']."\""?> />	
						</div>
					</div>
					<div class="field-group">
						<label for="email">Email:</label>
						<div class="field">
							<input type="text" name="email" id="email" size="20" class="validate[required,minSize[5],custom[email]]" <?php if($data!=null) echo "value=\"".$data['email']."\""?> />	
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
					<div class="field-group control-group inline">	
						<label>Gender:</label>	
		
						<div class="field">
							<div class="radio" id="uniform-radio1"><span><input type="radio" name="gender" id="radio1" value="1" class="validate[required]" style="opacity: 0;" <?php if($data!=null && $data['gender']==1) echo "checked=\"checked\""?> /></span></div>
							<label for="radio1">Male</label>
						</div>
		
						<div class="field">
							<div class="radio" id="uniform-radio2"><span><input type="radio" name="gender" id="radio2" value="2" class="validate[required]" style="opacity: 0;" <?php if($data!=null && $data['gender']==2) echo "checked=\"checked\""?> /></span></div>
							<label for="radio2">Female</label>
						</div>
					</div>
					<div class="field-group inlineField">
						<label for="age">Age:</label>
						<div class="field">
							<input type="text" name="age" id="age" size="8" class="validate[required,min[16],max[100]]" <?php if($data!=null) echo "value=\"".$data['age']."\""?> />
						</div>
					</div>
					<div class="field-group">
						<label for="location">Location:</label>
						<div class="field">
							<select name="location" id="location">
								<?php
									foreach($locationList as $location) {
								?>
								<option value="<?=$location['location_id']?>" <?php if($data!=null && $data['location_name']==$location['location_name']) echo "selected=\"selected\""; ?> ><?=$location['location_name']?></option>
								<?php
									}
								?>
							</select>
						</div>	
					</div>
					<?php
						if(isset($error)) {
						?>
					<div class="field">
						<span class="ticket ticket-important"><?=UserData::getErrorMessage($error)?><?=$error?></span>
					</div>
					<?php
						}
					?>
					<div class="actions">						
						<button type="submit" class="btn btn-primary">Submit</button>
						<button type="reset" class="btn btn-error">Reset</button>
					</div>
				</form>
			</div>
		</div>					
	</div>
</div>