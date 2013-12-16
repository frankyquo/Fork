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
		$connection = Yii::app()->db;
		$this->priority = 0;
		$resultMove = 1;
		if($this->menu_parent_id==0)
		{
			$command = $connection->createCommand("SELECT max(priority) as priority	FROM menu");
			$result = $command->queryAll();
			$this->priority = $result[0]['priority'];
		}
		else
		{
			$command = $connection->createCommand("SELECT max(priority) as priority FROM menu WHERE menu_parent_id='".$this->menu_parent_id."'");
			$result = $command->queryAll();
			if($result[0]['priority']!=NULL)
			{
				$this->priority = $result[0]['priority'];
			}
			else
			{
				$command = $connection->createCommand("SELECT priority FROM menu WHERE menu_id='".$this->menu_parent_id."'");
				$result = $command->queryAll();
				$this->priority = $result[0]['priority'];
			}
			$command = $connection->createCommand("UPDATE menu SET priority=priority+1, userchange='".Yii::app()->user->name."', datechange=NOW() WHERE priority > ".$this->priority);
			$resultMove = $command->execute();
		}
		$this->priority = $this->priority+1;
		$command = $connection->createCommand("INSERT INTO menu(application_id, menu_name, menu_link, menu_parent_id, priority, stsrc, userchange, datechange) VALUES ('".$this->application_id."', '".$this->menu_name."', '".$this->menu_link."', '".$this->menu_parent_id."', '".$this->priority."', 'a', '".Yii::app()->user->name."', NOW())");
		$resultMenu = $command->execute();
		$menu_id = $connection->createCommand("SELECT menu_id FROM menu WHERE stsrc='a' AND priority='".$this->priority."'")->queryAll()[0]['menu_id'];
		foreach($connection->createCommand("SELECT group_id FROM groups")->queryAll() as $group)
		{
			$group_id = $group['group_id'];
			$command = $connection->createCommand("INSERT INTO menugroupaccess(group_id, menu_id, application_id, status, stsrc, userchange, datechange) VALUES ('".$group_id."', '".$menu_id."', '".$this->application_id."', '1', 'a', '".Yii::app()->user->name."', NOW())");
			$command->execute();
		}
		return $resultMenu;
	}
	public function update($application_id, $menu_name, $menu_link, $menu_parent_id)
	{
		if($this->application_id!==$application_id || $this->menu_name!==$menu_name || $this->menu_link!==$menu_link || $this->menu_parent_id!==$menu_parent_id)
		{
			$connection = Yii::app()->db;
			$command = $connection->createCommand("UPDATE menu SET application_id='".$application_id."', menu_name='".$menu_name."', menu_link='".$menu_link."', menu_parent_id='".$menu_parent_id."', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE stsrc='a' AND menu_id='".$this->menu_id."'");
			return $command->execute();
		}
		return 0;
	}
	public function delete()
	{
		$connection = Yii::app()->db;
		$command = $connection->createCommand("UPDATE menu SET stsrc='d', userchange='".Yii::app()->user->name."', datechange=NOW() WHERE menu_id='".$this->menu_id."'");
		return $command->execute();
	}
}
?>