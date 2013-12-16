<?php
class MenuGroupAccess
{
	public $group_id;
	public $menu_id;
	public $application_id;
	public $status;
	
	public function __construct($group_id, $menu_id, $application_id, $status)
	{
		$this->group_id = $group_id;
		$this->menu_id = $menu_id;
		$this->application_id = $application_id;
		$this->status = $status;
	}
	public static function getAll($app_id,$group_id)
	{
		if($app_id>0 && $group_id>0)
		{
			$connection = Yii::app()->db;
			$command = $connection->createCommand("SELECT mga.menu_id, menu_name, menu_link, status FROM menu m JOIN menugroupaccess mga ON m.menu_id = mga.menu_id WHERE m.stsrc='a' AND mga.group_id='$group_id' AND mga.application_id='$app_id'");
			return $command->queryAll();
		}
		else
		{
			return null;
		}
	}
}
?>