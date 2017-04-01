<?php
/**
 * Armored Core - Module handler
 * Jessee Hsin-Wen Kung @ 2011.05.24
 * Department of Computer Science and Information Engineering, National Central University
 *
 * Check if module is installed properly, and controls the module permissions of
 * users and groups by judging the related data in data table ac_perm.
 */
require_once('ac_common.php');

class ac_module
{
	/**
	 * Database connection handler, fetched from array $currcfg
	 */
	var $currdb;
	
	/**
	 * Handler of current user, fetched from array $currcfg
	 */
	var $curruser;
	
	/**
	 * Handler of current group, fetched from array $currcfg
	 */
	var $currgroup;
	
	/**
	 * Module ID, which would be built by constructor with data in data table ac_module
	 */
	var $mid;
	
	/**
	 * Module name, which would be built by constructor with data in data table ac_module
	 */
	var $module_name;
	
	/**
	 * True if current module has been installed properly
	 */
	var $is_module_install;
	
	/**
	 * Constructor, check if current module has been set and installed properly
	 */
	public function __construct()
	{
		global $currcfg;
		
		// Step1. Database/User connection
		$this -> currdb		= &$currcfg['DB_SOURCE'];
		$this -> curruser	= &$currcfg['USER_SOURCE'];
		$this -> currgroup	= &$currcfg['GROUP_SOURCE'];
		
		// Step2. Build module info from path of current script
		$module_info = explode("/" ,substr($_SERVER['SCRIPT_FILENAME'], strlen(ROOT_PATH)));
		$this -> module_name = (count($module_info) > 2) ? $module_info[2] : "system";
		
		$module_db_src = $this -> currdb -> sql_query("SELECT * FROM `ac_module` WHERE `module_name` = '".$this -> module_name."'");
		
		if($this -> currdb -> sql_num_rows($module_db_src) != 0)
		{
			$this -> is_module_install = true;
			$module_db_arr = $this -> currdb -> sql_fetch_assoc($module_db_src);
			$this -> mid = $module_db_arr['mid'];
		}
		else
		{
			$this -> is_module_install = false;
			echo "<strong>Armored Core</strong>: ac_module:: __construct(): module <strong><u>". $this -> module_name ."</u></strong> is not installed properly. Please reinstall this module.</br>";
            exit();
		}
	}
	
	
	/**
	 * Permission handler, used by is_valid(int), is_admin(int) and is_system(int)
	 * Return true if curruser has corresponded permission
	 *
	 * @param field Permission type to checked, should be "system", "admin" or "valid"
	 * @param input_uid User's serial number uid in data table ac_user. If empty, current user will be checked
	 * @return True if current user in current module has the permission, false otherwise
	 */
	public function is_perm($field, $input_uid = null)
	{
		$result = false;
		
		// Step1. Check for group permission
		$curr_src = $this -> currdb -> sql_query("SELECT `ac_perm`.`".$field."` FROM `ac_perm` RIGHT JOIN `ac_group_list` ON `ac_perm`.`u_g_id` = `ac_group_list`.`gid` WHERE `ac_perm`.`u_g_type` = 'group' AND `ac_perm`.`mid` = '".($field == "is_system" ? 1 : $this -> mid)."' AND `ac_group_list`.`uid` ='".($input_uid == null ? $this -> curruser -> uid : $input_uid)."'");
		while($curr_processing = $this -> currdb -> sql_fetch_assoc($curr_src))
		{
			$result = (intval($curr_processing[$field]) == 1 || $result) ? true : false;
		}
		
		// Step2. Check for user permission. If there are still settings for user, overwrite it.
		$curr_src = $this -> currdb -> sql_query("SELECT `".$field."` FROM `ac_perm` WHERE `u_g_type` = 'user' AND `u_g_id` = '".($input_uid == null ? $this -> curruser -> uid : $input_uid)."' AND `mid` = '".($field == "is_system" ? 1 : $this -> mid)."'");
		while($curr_processing = $this -> currdb -> sql_fetch_assoc($curr_src))
		{
			$result = (intval($curr_processing[$field]) == 1) ? true : false;
		}
		
		return $result;
	}

	/**
	 * Permission handler, check if current user is global system administrator
	 *
	 * @param input_uid User's serial number uid in data table ac_user. If empty, current user will be checked
	 * @return True if current user in current module has the permission, false otherwise
	 */
	public function is_system($input_uid = null)
	{
		return $this -> is_perm("is_system", $input_uid);
	}
	
	/**
	 * Permission handler, check if current user is a manager of current module
	 *
	 * @param input_uid User's serial number uid in data table ac_user. If empty, current user will be checked
	 * @return True if current user in current module has the permission, false otherwise
	 */
	public function is_admin($input_uid = null)
	{
		return $this -> is_system() ? true : $this -> is_perm("is_admin", $input_uid);
	}
	
	/**
	 * Permission handler, check if current user has the permission with this module.
	 *
	 * @param input_uid User's serial number uid in data table ac_user. If empty, current user will be checked
	 * @return True if current user in current module has the permission, false otherwise
	 */
	public function is_valid($input_uid = null)
	{
		return $this -> is_system() ? true : $this -> is_perm("is_valid", $input_uid);
	}
	
	/**
	 * Get all groups which has permission controlling requested module by module id
	 *
	 * @param mid Serial number of module
	 * @return Result array, contains 
	 */
	public static function get_adm_group_by_mid($mid)
	{
		global $currdb;
		if(intval($mid) > 0)
		{
			$src = $currdb -> sql_query("SELECT `ac_perm`.*, `ac_group`.* FROM `ac_perm` LEFT JOIN `ac_group` ON `ac_perm`.`u_g_id` = `ac_group`.`gid` WHERE `ac_perm`.`u_g_type` = 'group' AND `ac_perm`.". ($mid == 1 ? "`is_system`" : "`is_admin`") ." = '1' AND `ac_perm`.`mid` = '".intval($mid)."'");
			$result = array();
			while($data = $currdb -> sql_fetch_assoc($src))
			{
				array_push($result, $data);
			}
			return $result;
		}
	}
	
	/**
	 * Get all users which has permission controlling requested module by module id
	 *
	 * @param mid Serial number of module
	 * @return Result array, contains 
	 */
	public static function get_adm_user_by_mid($mid)
	{
		global $currdb;
		if(intval($mid) > 0)
		{
			$src = $currdb -> sql_query("SELECT `ac_perm`.*, `ac_user`.* FROM `ac_perm` LEFT JOIN `ac_user` ON `ac_perm`.`u_g_id` = `ac_user`.`uid` WHERE `ac_perm`.`u_g_type` = 'user' AND `ac_perm`.". ($mid == 1 ? "`is_system`" : "`is_admin`") ." = '1' AND `ac_perm`.`mid` = '".intval($mid)."'");
			$result = array();
			while($data = $currdb -> sql_fetch_assoc($src))
			{
				array_push($result, $data);
			}
			return $result;
		}
	}
	
	/**
	 * Check if requested module exist by module id
	 *
	 * @param mid Module serial number in data table ac_module
	 * @return True if module exist, false otherwise
	 */
	public static function is_module_exist_by_mid($mid)
	{
		global $currdb;
		$count = $currdb -> sql_fetch_array($currdb -> sql_query("SELECT count(*) FROM `ac_module` WHERE `mid` = '".intval($mid)."'"));
		if(intval($count['count(*)']) > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Check if requested module exist by module name
	 *
	 * @param module_name Module name in data table ac_module
	 * @return True if module exist, false otherwise
	 */
	public static function is_module_exist_by_name($module_name)
	{
		global $currdb;
		$count = $currdb -> sql_fetch_array($currdb -> sql_query("SELECT count(*) FROM `ac_module` WHERE `module_name` = '".$module_name."'"));
		if(intval($count['count(*)']) > 0)
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
