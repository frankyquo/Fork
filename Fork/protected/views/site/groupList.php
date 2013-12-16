<?php
	if(isset($groupList))
	{
		if(count($groupList)!=0)
		{
?>
	<option>Please Select A Group</option>
<?php
			foreach($groupList as $group)
			{
?>
		<option value="<?=$group['group_id']?>" ><?=$group['group_name']?></option>
<?php
			}
		}
		else
		{
?>
	<option>No Group Available for Selected Application!</option>
<?php
		}
	}
	else if(isset($userList))
	{
		if(count($userList)!=0)
		{
			foreach($userList as $user)
			{
?>
	<option value="<?=$user['user_id']?>"><?=$user['username']?></option>
<?php
			}
		}
	}
?>