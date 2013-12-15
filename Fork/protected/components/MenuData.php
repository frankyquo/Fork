<?php
class MenuData
{
	public $menu_id;
	public $application_id;
	public $menu_name;
	public $menu_link;
	public $menu_parent_id;
	public $priority;
	
	public function __construct($menu_id, $application_id, $menu_name, $menu_link, $menu_parent_id, $priority)
	{
		$this->menu_id = $menu_id;
		$this->application_id = $application_id;
		$this->menu_name = $menu_name;
		$this->menu_link = $menu_link;
		$this->menu_parent_id = $menu_parent_id;
		$this->priority = $priority;
	}
	public static function getAll($id)
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT menu_id, application_id, menu_name, menu_link, menu_parent_id, priority FROM menu WHERE stsrc='a' AND application_id='$id' ORDER BY priority ASC");
		$menuList = $command->queryAll();
		return $menuList;
	}
	public static function getParent()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT menu_id, menu_name FROM menu WHERE stsrc='a' AND menu_parent_id='0' ORDER BY priority ASC");
		$menuParentList = $command->queryAll();
		return $menuParentList;
	}
	public static function get($id)
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("SELECT menu_id, application_id, menu_name, menu_link, menu_parent_id, priority FROM menu WHERE stsrc='a' AND menu_id='$id'");
		$menuList = $command->queryAll();
		$data = $menuList[0];
		return new MenuData($data['menu_id'], $data['application_id'], $data['menu_name'], $data['menu_link'], $data['menu_parent_id'], $data['priority']);
	}
	public function insert()
	{
		/*
		$connection = Yii::app()->db;
		$command = $connection->createCommand("INSERT INTO groups(group_name, application_id, stsrc, userchange, datechange) VALUES('".$this->group_name."','".$this->application_id."','a','".Yii::app()->user->name."',NOW())");
		return $command->execute();*/
		return 1;
	}
	public function update($group_name, $application_id)
	{
		/*
		if($this->group_name!==$group_name || $this->application_id!==$application_id)
		{
			$connection = Yii::app()->db;
			$command = $connection->createCommand("UPDATE groups SET group_name='".$group_name."', application_id='".$application_id."', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE stsrc='a' AND group_id='".$this->group_id."'");
			return $command->execute();
		}
		return 0;
		*/
		return 1;
	}
	public function delete()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("UPDATE groups SET stsrc='d', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE group_id='".$this->group_id."'");
		return $command->execute();
	}
}
?>