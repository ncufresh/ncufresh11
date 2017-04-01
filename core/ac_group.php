<?php
/**
 * Armored Core - Group Class
 * Jessee Hsin-Wen Kung @ 2011.05.24
 * Department of Computer Science and Information Engineering, National Central University
 *
 * User group information managemment. Notice that public methods controls
 * the data of current user, you have to invoke the method by following
 * example:
 *     $currgroup -> is_curruser_in_group_by_gid(3)
 *
 * The operations checks if curruser belongs to group which gid is 3. Public
 * static methods controls the global information of all data in data table
 * ac_group, make sure you have to invoke public static methods by following
 * example:
 *     ac_group::get_user_of_group_by_group_name("wheel")
 *
 * The operation checks if curruser belongs to group which name is "wheel".
 */
require_once('ac_common.php');

class ac_group
{
	/**
	 * Handler of current user, fetched from array $currcfg
	 */
	var $curruser;
	
	/**
	 * Handler of current database connection, fetched from array $currcfg
	 */
	var $currdb;
	
	/**
	 * Related groups of current user, which will be fetch by constructor
	 */
	var $curr_g_arr;
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		global $currcfg;
		
		// Step1. Reference initial
		$this -> currdb		= &$currcfg['DB_SOURCE'];
		$this -> curruser	= &$currcfg['USER_SOURCE'];
		
		// Step2. Select all group for corresponded `curruser`
		$this -> curr_g_arr = array();
		if(!$this -> curruser -> is_guest)
		{
			$curr_g_src = $this -> currdb -> sql_query("SELECT `ac_group_list`.`uid`, `ac_group_list`.`gid`, `ac_group`.`group_name` FROM `ac_group_list` RIGHT JOIN `ac_group` ON `ac_group_list`.`gid` = `ac_group`.`gid` WHERE `ac_group_list`.`uid` = '".$this -> curruser -> uid."' ORDER BY `ac_group_list`.`gid` ASC");
			while($curr_g_processing = $this -> currdb -> sql_fetch_assoc($curr_g_src))
			{
				array_push($this -> curr_g_arr, $curr_g_processing);
			}
		}
	}
	
	
	/**
	 * Return true if curruser belongs to the group which gid is equal
	 * to parameterinput_gid
	 *
	 * @param input_gid Group serial number gid in ac_block data table, should be int
	 * @return true if curruser belongs to the corresponded group
	 */
	public function is_curruser_in_group_by_gid($input_gid)
	{
		$result = false;
		for($i=0; $i<count($this -> curr_g_arr); $i++)
		{
			if($this -> curr_g_arr[$i]['gid'] == $input_gid)
			{
				$result = true;
				break;
			}
		}
		return $result;
	}
	
	
	/**
	 * Return true if curruser belongs to the group which group_name
	 * is equal to parameter input_group_name
	 *
	 * @param input_group_name  Group name in ac_block data table, should be string
	 * @return true if curruser belongs to the corresponded group
	 */
	public function is_curruser_in_group_by_group_name($input_group_name)
	{
		$result = false;
		for($i=0; $i<count($this -> curr_g_arr); $i++)
		{
			if($this -> curr_g_arr[$i]['group_name'] == $input_group_name)
			{
				$result = true;
				break;
			}
		}
		return $result;
	}
	
	
	/**
	 * Returns all related groups of current user, which will be
	 * fetch by constructor
	 * 
	 * @return Groups array, which is equal to variable curr_g_arr
	 */
	public function get_group_of_curruser()
	{
		return $curr_g_arr;
	}
	
	
	/**
	 * Return users array of querying group by requested group_name
	 *
	 * @param group_name Group name in ac_block data table, should be string
	 * @return Result, combines users and groups information from ac_user and ac_group data tables
	 */
	public static function get_user_of_group_by_group_name($group_name)
	{
		global $currdb;
		$curr_src = $currdb -> sql_query("SELECT `ac_group_list`.*, `ac_group`.`group_name`, `ac_user`.`username` FROM `ac_group_list` RIGHT JOIN `ac_group` ON `ac_group_list`.`gid` = `ac_group`.`gid` RIGHT JOIN `ac_user` ON `ac_group_list`.`uid` = `ac_user`.`uid` WHERE `ac_group`.`group_name` = '".$group_name."'");
		$result = array();
		while($result_processing = $currdb -> sql_fetch_assoc($curr_src))
		{
			array_push($result, $result_processing);
		}
		
		return $result;
	}
	
	
	/**
	 * Return users array of querying group by requested gid
	 *
	 * @param gid Group serial number gid in ac_block data table, should be int
	 * @return Result, combines users and groups information from ac_user and ac_group data tables
	 */
	public static function get_user_of_group_by_gid($gid)
	{
		global $currdb;
		$curr_src = $currdb -> sql_query("SELECT `ac_group_list`.*, `ac_group`.`group_name`, `ac_user`.`username` FROM `ac_group_list` RIGHT JOIN `ac_group` ON `ac_group_list`.`gid` = `ac_group`.`gid` RIGHT JOIN `ac_user` ON `ac_group_list`.`uid` = `ac_user`.`uid` WHERE `ac_group`.`gid` = '".$gid."'");
		
		$result = array();
		while($result_processing = $currdb -> sql_fetch_assoc($curr_src))
		{
			array_push($result, $result_processing);
		}
		
		return $result;
	}
	
	
	/**
	 * Get the group information without members list by group name
	 *
	 * @param group_name Group name in ac_block data table, should be string
	 * @return Result, Notice that it only contains information of group, no members related to this result
	 */
	public static function get_group_by_name($group_name)
	{
		global $currdb;
		$curr_group_src = $currdb -> sql_query("SELECT * FROM `ac_group` WHERE `group_name` = '".$group_name."'");
		if($currdb -> sql_num_rows($curr_group_src) != 0)
		{
			$curr_group_array = $currdb -> sql_fetch_assoc($curr_group_src);
			return $curr_group_array;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Check if requested group is exist or not by group name
	 *
	 * @param group_name Group name in ac_block data table, should be string
	 * @return True if requested group existed, false otherwise
	 */
	public static function is_group_exist_by_name($group_name)
	{
		global $currdb;
		$curr_group_counting = $currdb -> sql_fetch_assoc($curr_group_src = $currdb -> sql_query("SELECT count(*) FROM `ac_group` WHERE `group_name` = '".$group_name."'"));
		if($curr_group_counting['count(*)'] != 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Get the group information without members list by group serial number gid
	 *
	 * @param gid Group serial number gid in ac_block data table, should be int
	 * @return Result, Notice that it only contains information of group, no members related to this result
	 */
	public static function get_group_by_gid($gid)
	{
		global $currdb;
		$curr_group_src = $currdb -> sql_query("SELECT * FROM `ac_group` WHERE `gid` = '".intval($gid)."'");
		if($currdb -> sql_num_rows($curr_group_src) != 0)
		{
			$curr_group_array = $currdb -> sql_fetch_assoc($curr_group_src);
			return $curr_group_array;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Check if requested group is exist or not by group serial number
	 *
	 * @param gid Group serial number gid in ac_block data table, should be int
	 * @return True if requested group existed, false otherwise
	 */
	public static function is_group_exist_by_gid($gid)
	{
		global $currdb;
		$curr_group_counting = $currdb -> sql_fetch_assoc($curr_group_src = $currdb -> sql_query("SELECT count(*) FROM `ac_group` WHERE `gid` = '".intval($gid)."'"));
		if($curr_group_counting['count(*)'] != 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>