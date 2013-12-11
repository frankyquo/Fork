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
					<h3>Group Users</h3>
				</div>
				<div class="widget-content">
					<form class="form uniformForm">
						<p>
							<div class="field-group">
								<label>Application:</label>
								<div class="field">
									<select name="cardtype" id="cardtype">
										<option>Fork</option>
									</select>
								</div>
							</div>
							<div class="field-group">
								<label>Group:</label>
								<div class="field">
									<select name="cardtype" id="cardtype">
										<option>Admin</option>
									</select>
								</div>
							</div>
							<div class="actions">						
								<button type="button" class="btn btn-primary"><span class="icon-users"></span>Search</button>
							</div>						
						</p>
					</form>
					<div class="grid-10">
						<select id="box1View" multiple="multiple" class="multiple" style="height:300px; width:100%">
							<option value="501649">2008-2009 "Mini" Baja</option>
							<option value="501497">AAPA - Asian American Psychological Association</option>
							<option value="501053">Academy of Film Geeks</option>
							<option value="500001">Accounting Association</option>
							<option value="501227">ACLU</option><option value="501610">Active Minds</option>
							<option value="501514">Activism with A Reel Edge (A.W.A.R.E.)</option>
							<option value="501656">Adopt a Grandparent Program</option>
							<option value="501050">Africa Awareness Student Organization</option>
							<option value="501075">African Diasporic Cultural RC Interns</option>
							<option value="501493">Agape</option>
							<option value="501562">AGE-Alliance for Graduate Excellence</option>
							<option value="500676">AICHE (American Inst of Chemical Engineers)</option>
							<option value="501460">AIDS Sensitivity Awareness Project ASAP</option>
							<option value="500004">Aikido Club</option>
							<option value="500336">Akanke</option>
							<option value="500336">Akanke</option>
							<option value="500336">Akanke</option>
							<option value="500336">Akanke</option>
							<option value="500336">Akanke</option>
						</select>
					</div>
					<div class="grid-4">
						<div class="dualControl" style="text-align:center;margin:125px auto 125px auto">
							<button id="to2" type="button" class="btn mr5 mb15">&nbsp;&gt;&nbsp;</button>
							<button id="to1" type="button" class="btn mr5">&nbsp;&lt;&nbsp;</button>
						</div>
					</div>
					<div class="grid-10">
						<select id="box1View" multiple="multiple" class="multiple" style="height:300px; width:100%">
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>