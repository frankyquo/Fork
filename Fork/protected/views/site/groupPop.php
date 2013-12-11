<!--div class="widget-content">
	<form class="form uniformForm validateForm">
		<div class="field-group">
			<input type="text" name="name" id="name" size="32" class="validate[required,minSize[5]]" />	
		</div>
		<div class="actions">						
			<button type="submit" class="btn btn-primary">Submit</button>
			<button type="reset" class="btn btn-error">Reset</button>
		</div>
	</form>
</div-->

<div class="widget-content">
	<form class="form uniformForm validateForm">
		<div class="field-group">
			<label for="required">Group Name:</label>
			<div class="field">
				<?php
					if(isset($groupData))
					{
				?>
				<input type="hidden" name="group_id" id="group_id" value="<?=$groupData[0]['group_id']?>" />
				<input type="text" name="name" id="name" size="20" value="<?=$groupData[0]['group_name']?>" class="validate[required,minSize[5]]" />	
				<?php
					}
					else
					{
				?>
				<input type="text" name="name" id="name" size="20" class="validate[required,minSize[5]]" />	
				<?php
					}
				?>
			</div>
		</div>
		<div class="actions">						
			<button type="submit" class="btn btn-primary">Submit</button>
			<button type="reset" class="btn btn-error">Reset</button>
		</div>
	</form>
</div>