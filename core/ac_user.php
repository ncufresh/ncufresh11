<?php
/**
 * Armored Core - User Class
 * Jessee Hsin-Wen Kung @ 2011.05.24
 * Department of Computer Science and Information Engineering, National Central University
 *
 * Processing login, logout or authorization about user. The handler for
 * single user will be constructed by ac_boot.php, which means you can
 * invoke following function directly to make a client logged in:
 *     $curruser -> login(Input Username, Input Password);
 *
 * Static function handles global information of data table ac_user, for
 * example, you can check whether a user is existed or not by directly
 * invoke following function:
 *     ac_user::is_user_exist_by_username(Input Username);
 *
 * The function returns true if corresponded user existed, false otherwise.
 */
require_once('ac_common.php');

class ac_user
{
	/**
	 * Database connection handler, fetched from array $currcfg
	 */
	var $currdb;
	
	/**
	 * Group handler, fetched from array $currcfg
	 */
	var $currgroup;
	
	/**
	 * Serial number of current user, built by constructor and fetched from column uid of data table ac_user
	 */
	var $uid;
	
	/**
	 * User account of current user, built by constructor and fetched from column username of data table ac_user
	 */
	var $username;
	
	/**
	 * True if current user is a guest, false if current user has been logged in
	 */
	var $is_guest;
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		global $currcfg;
		
		$this -> currdb		= &$currcfg['DB_SOURCE'];
		$this -> currgroup	= &$currcfg['GROUP_SOURCE'];
		
		$this -> is_guest	= true;
		
		if(isset($_SESSION['username']) && isset($_SESSION['password']))
		{
			$this -> login($_SESSION['username'], $_SESSION['password'], true);
		}
	}
	
	/**
	 * Making requested user login, setting cookies and return login status. Notice that
	 * the third paramater MUST BE FALSE when using HTML input form for safety concern,
	 * or the login process will be cracked easily by dictionary attacking. Parameter 
	 * is_pass_encoding_processed can be true ONLY for $_SESSION login
	 *
	 * @param username Input username
	 * @param password Input password
	 * @param is_pass_encoding_processed True if current password has been encoded, false otherwise
	 * @return True if login success, false if login failed
	 */
	public function login($username = null, $password = null, $is_pass_encoding_processed = false)
	{
		if($username != null && $password != null)
		{
			// Check if username & password are valid
			$curr_user_src = $this -> currdb -> sql_query("SELECT * FROM `ac_user` WHERE `username` = '".$username."' AND `password` = '".(!$is_pass_encoding_processed ? ac_user_db_password_en_alg($password) : $password)."'");
			
			if($this -> currdb -> sql_num_rows($curr_user_src) != 0)
			{
				$this -> is_guest = false;
				$curr_user_array = $this -> currdb -> sql_fetch_assoc($curr_user_src);
				
				$_SESSION['uid']		= $curr_user_array['uid'];
				$_SESSION['username']	= $curr_user_array['username'];
				$_SESSION['password']	= $curr_user_array['password'];	// Record the ENCODED password (such as password after md5 processed)
				
				$this -> uid		= $curr_user_array['uid'];
				$this -> username	= $curr_user_array['username'];
				
				return true;
			}
			else
			{
				$this -> is_guest = true;
				return false;
			}
		}
		else
		{
			$this -> is_guest = true;
			return false;
		}
	}
	
	/**
	 * Clear current session/login user
	 *
	 * @return Always true, since the process supposing that the session must be cleared
	 */
	public function logout()
	{
		$_SESSION['uid']		= NULL;
		$_SESSION['username']	= NULL;
		$_SESSION['password']	= NULL;
		
		$this -> is_guest = true;
		
		return true;
	}
	
	
	/**
	 * Check if current session is logged in
	 *
	 * @return True if current is not a guest, false otherwise
	 */
	public function is_login()
	{
		return !($this -> is_guest);
	}
	
	
	/**
	 * Check if current session is guest
	 *
	 * @return True if current is a guest, false otherwise
	 */
	public function is_guest()
	{
		return $this -> is_guest;
	}
	
	
	/**
	 * Get user information in array type by input username
	 * 
	 * @param username Input username
	 * @return Array fetched from data table ac_user, false if corresponded data doesn't exist
	 */
	public static function get_user_by_name($username)
	{
		global $currdb;
		$curr_user_src = $currdb -> sql_query("SELECT * FROM `ac_user` WHERE `username` = '".$username."'");
		if($currdb -> sql_num_rows($curr_user_src) != 0)
		{
			$curr_user_array = $currdb -> sql_fetch_assoc($curr_user_src);
			return $curr_user_array;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Check if requested user is exist or not by input username
	 *
	 * @param username Input username
	 * @return True if user existed, false otherwise
	 */
	public static function is_user_exist_by_name($username)
	{
		global $currdb;
		$curr_user_counting = $currdb -> sql_fetch_assoc($curr_user_src = $currdb -> sql_query("SELECT count(*) FROM `ac_user` WHERE `username` = '".$username."'"));
		if(intval($curr_user_counting['count(*)']) != 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Get user information in array type by input uid
	 * 
	 * @param uid Input uid
	 * @return Array fetched from data table ac_user, false if corresponded data doesn't exist
	 */
	public static function get_user_by_uid($uid)
	{
		global $currdb;
		$curr_user_src = $currdb -> sql_query("SELECT * FROM `ac_user` WHERE `uid` = '".intval($uid)."'");
		if($currdb -> sql_num_rows($curr_user_src) != 0)
		{
			$curr_user_array = $currdb -> sql_fetch_assoc($curr_user_src);
			return $curr_user_array;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Check if requested user is exist or not by input uid
	 *
	 * @param uid Input uid
	 * @return True if user existed, false otherwise
	 */
	public static function is_user_exist_by_uid($uid)
	{
		global $currdb;
		$curr_user_counting = $currdb -> sql_fetch_assoc($curr_user_src = $currdb -> sql_query("SELECT count(*) FROM `ac_user` WHERE `uid` = '".intval($uid)."'"));
		if($curr_user_counting['count(*)'] != 0)
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