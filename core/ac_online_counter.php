<?php
/**
 * Armored Core - Online counter class
 * Jessee Hsin-Wen Kung @ 2011.05.24
 * Department of Computer Science and Information Engineering, National Central University
 */
class ac_online_counter
{
	/**
	 * Reference for database connector, initialized on constructor
	 */
	var $currdb;
	
	/**
	 * Constructor, initialize the source of database connector
	 */
	function __construct()
	{
		global $currcfg;
		$this -> currdb = &$currcfg['DB_SOURCE'];
	}
	
	/**
	 * Counter for online amount calculation
	 *
	 * @return the result
	 */
	function count_online()
	{
		if(!defined('ONLINE_ALIVE_TIME'))
		{
			define('ONLINE_ALIVE_TIME', 300);
		}
		
		// Step1. Initialize
		$curr_time = time();
		
		// Step2. Check if there exist online session
		if(!isset($_SESSION['hash_code']) || ($_SESSION['hash_code'])=="")
		{
			$_SESSION['hash_code'] = md5($_SERVER['REMOTE_ADDR'] . strval($curr_time));
		}
		
		// Step3. Check if current visitor's data is in the database
		$curr_visitor = $this -> currdb -> sql_query("SELECT * FROM `ac_online` WHERE `md5_hash` = '".$_SESSION['hash_code']."'");
		if($this -> currdb -> sql_num_rows($curr_visitor) != 0)
		{
			$this -> currdb -> sql_query("UPDATE `ac_online` SET `last_active_time`='".$curr_time."' WHERE `md5_hash`='".$_SESSION['hash_code']."'");
		}
		else
		{
			$this -> currdb -> sql_query("INSERT INTO `ac_online` (`md5_hash`, `ip_addr`, `last_active_time`) VALUES ('".$_SESSION['hash_code']."', '".$_SERVER['REMOTE_ADDR']."', '".$curr_time."')");
			
			$this -> currdb -> sql_query("UPDATE `ac_config` SET `value` = '".(($this -> count_accu()) + 1)."' WHERE `var_name` = 'counter_accu'");
		}
		
		// Step4. Clear those who are not online
		$non_avail_Time = $curr_time - ONLINE_ALIVE_TIME;
		$this -> currdb -> sql_query("DELETE FROM `ac_online` WHERE `last_active_time` <= ".$non_avail_Time."");
		
		// Step5. Calculate total counts
		$total_counts = $this -> currdb -> sql_fetch_array($this -> currdb -> sql_query("SELECT count(*) FROM `ac_online` WHERE 1"));
		
		return intval($total_counts['count(*)']);
	}
	
	/**
	 * Counter for accumulative amount calculation
	 *
	 * @return the result
	 */
	function count_accu()
	{
		$result = $this -> currdb -> sql_fetch_array($this -> currdb -> sql_query("SELECT `value` FROM `ac_config` WHERE `var_name` = 'counter_accu'"));
		return intval($result['value']);
	}
}
?>
