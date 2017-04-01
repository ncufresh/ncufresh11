<?php
/**
 * Armored Core - POP3 authorization
 */
class ac_pop3_auth
{
	var $hostname;
	
	var $port;
	
	var $timeout;
	
	var $conn_consistent;
	
	var $conn_state;
	
	var $conn_msg;
	
	var $conn_error_number;
	
	var $f_conn;
	
	var $error_msg_displayed;
	
	/**
	 * Constructor
	 * Create basic information before connect to pop3 server
	 * 
	 * @param $hostname input pop3 server's hostname
	 * @param $port input port, default is 110
	 * @param $timeout try $timeout seconds while connection failed
	 * @param $conn_consistent connection will be consistent after constructor called if this paramater true
	 * @param $error_msg_displayed connection's state and messages will be displayed after function invoked
	 */
	function __construct($hostname, $port = 110, $timeout = 3, $conn_consistent = false, $error_msg_displayed = false)
	{
		if(!preg_match("/^([a-zA-Z0-9]|_)+(.[a-zA-Z0-9]+)*$/", $hostname))
		{
			echo "<strong>Armored Core</strong>: ac_pop3_auth:: __construct(): input format of <i>hostname</i> is invalid.<br />\n";
		}
		else
		{
			$this -> hostname = $hostname;
		}
		
		
		if(!is_int($port) || !is_int($timeout))
		{
			echo "<strong>Armored Core</strong>: ac_pop3_auth:: __construct(): input format of <i>port</i> and <i>timeout</i> should be <i>int</i>.<br />\n";
		}
		else
		{
			$this -> port = $port;
			$this -> timeout = $timeout;
		}
		
		
		if(!is_bool($conn_consistent) || !is_bool($error_msg_displayed))
		{
			echo "<strong>Armored Core</strong>: ac_pop3_auth:: __construct(): input format of <i>conn_consistent</i> and <i>error_msg_displayed</i> should be <i>bool</i>.<br />\n";
		}
		else
		{
			$this -> conn_consistent = $conn_consistent;
			$this -> error_msg_displayed = $error_msg_displayed;
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
	 * Disconnect with POP3 server, close socket connection created by `fsockopen()`.
	 */
	function conn_close()
	{
		fputs($this -> f_conn, "QUIT\r\n");
		$this -> conn_msg = fgets($this -> f_conn);
		fclose($this -> f_conn);
	}
	
	/**
	 * Connect to server
	 *
	 * @return true if connection successfully
	 */
	function conn_open()
	{
		$this -> f_conn = fsockopen($this -> hostname, $this -> port, $this -> conn_error_no, $this -> conn_msg, $this -> timeout);
		if(!$this -> f_conn)
		{
			if($error_msg_displayed)
			{
				echo "<strong>Armored Core</strong>: ac_pop3_auth:: __construct(): POP3 server connection failed, with error message:<br />[".$this -> conn_error_no."] - ".$this -> conn_msg."<br />\n";
			}
			return false;
		}
		else
		{
			$this -> conn_msg = fgets($this -> f_conn);
			
			$this -> conn_state = (substr($this -> conn_msg, 0, 3) == "+OK");
			return $this -> conn_state;
		}
	}
	
	/**
	 * Login POP3 server with username and password
	 * 
	 * @param $username input username of pop3 server
	 * @param $password input password of pop3 server
	 * @return true if authorization success
	 */
	function login($username, $password)
	{
		fputs($this -> f_conn, "USER ".$username."\r\n");
		$this -> conn_msg = fgets($this -> f_conn);
		if(substr($this -> conn_msg, 0, 3) != "+OK")
		{
			if($error_msg_displayed)
			{
				echo "<strong>Armored Core</strong>: ac_pop3_auth:: __construct(): Invalid username of POP3 server, with error message: ".$this -> conn_msg."<br />\n";
			}
			return false;
		}
		else
		{
			fputs($this -> f_conn, "PASS ".$password."\r\n");
			$this -> conn_msg = fgets($this -> f_conn);
			if(substr($this -> conn_msg, 0, 3) != "+OK")
			{
				if($error_msg_displayed)
				{
					echo "<strong>Armored Core</strong>: ac_pop3_auth:: __construct(): Invalid password of username, with error message: ".$this -> conn_msg."<br />\n";
				}
				return false;
			}
			else
			{
				return true;
			}
		}
	}
}
?>