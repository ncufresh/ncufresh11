<?php
/**
 * Armored Core - LDAP authorization
 */
class ac_ldap_auth
{
	var $hostname;
	
	var $port;
	
	var $conn_state;
	
	var $conn_error_number;
	
	var $f_conn;
	
	var $error_msg_displayed;
	
	/**
	 * Constructor
	 * Create basic information before connect to LDAP server
	 * 
	 * @param $hostname input ldap server's hostname
	 * @param $port input port, default is 389
	 * @param $error_msg_displayed connection's state and messages will be displayed after function invoked
	 */
	function __construct($hostname, $port = 389, $error_msg_displayed = false)
	{
		if(!preg_match("/^(ldap:\/\/)?([a-zA-Z0-9]|_)+(.[a-zA-Z0-9]+)*$/", $hostname))
		{
			echo "<strong>Armored Core</strong>: ac_ldap_auth:: __construct(): input format of <i>hostname</i> is invalid.<br />\n";
		}
		else
		{
			$this -> hostname = $hostname;
		}
		
		
		if(!is_int($port))
		{
			echo "<strong>Armored Core</strong>: ac_ldap_auth:: __construct(): input format of <i>port</i> should be <i>int</i>.<br />\n";
		}
		else
		{
			$this -> port = $port;
		}
		
		$this -> conn_state = false;
	}
	
	/**
	 * Destructor
	 */
	function __destruct()
	{
		$this -> conn_close();
	}
	
	/**
	 * Connect to server
	 *
	 * @return true if connection successfully
	 */
	function conn_open()
	{
		$this -> f_conn = ldap_connect($this -> hostname, $this -> port);
		
		if(!$this -> f_conn)
		{
			if($error_msg_displayed)
			{
				echo "<strong>Armored Core</strong>: ac_ldap_auth:: conn_open(): LDAP server connection failed, with error message:<br />[".ldap_errno($this -> f_conn)."] - ".ldap_error($this -> f_conn)."<br />\n";
			}
			$this -> conn_state = false;
		}
		else
		{
			$this -> conn_state = true;
		}
		
		return $this -> conn_state;
	}
	
	/**
	 * Disconnect with LDAP server, close socket connection created by `fsockopen()`.
	 */
	function conn_close()
	{
		ldap_close($this -> f_conn);
	}
	
	/**
	 * Login LDAP server with username and password
	 * 
	 * @param $username input username of LDAP server
	 * @param $password input password of LDAP server
	 * @return true if authorization success
	 */
	function login($username, $password)
	{
		$result = ldap_bind($this->f_conn, $username, $password);
		if(!$result)
		{
			echo "<strong>Armored Core</strong>: ac_ldap_auth:: login(): Invalid password of username, with error message: ".ldap_error($this -> f_conn)."<br />\n";
		}
		return $result;
	}
}


?>
