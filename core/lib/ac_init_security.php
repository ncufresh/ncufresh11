<?php
/**
 * Armored Core - Security Check and initial
 */

/**
 * Password encoding algorithm
 */
function ac_user_db_password_en_alg($str)
{
	return md5(substr($str, 0, strlen($str)/2)) . sha1(substr($str, strlen($str)/2));
}

/**
 * Add magic quotes to each global variables to avoid SQL injection
 */
function ac_magic_quote_add(&$input)
{
	$is_magic_quote_on = get_magic_quotes_gpc();
	$result = array();
	foreach($input as $array_key => $array_value)
	{
		if(is_array($array_value))
		{
			ac_magic_quote_add($array_value);
		}
		else
		{
			$array_value = $is_magic_quote_on ? $array_value : addslashes($array_value);
		}
		
		$result[$array_key] = $array_value;
	}
	
	$input = $result;
}

/**
 * Start session service, and prevent session hijacking
 */
function ac_session_init()
{
    global $curruser;
    if(!isset($_SESSION))
    {
        session_start();
    }
    session_regenerate_id(true);

    if (isset($_SESSION['HTTP_USER_AGENT']))
    {
        if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT']))
        {
            $curruser->logout();
            header("location: ".URL_ROOT_PATH."/login.php");
            exit();
        }
    }
    else
    {
        $_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT']);
    }
}
?>
