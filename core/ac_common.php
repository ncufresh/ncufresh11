<?php
/**
 * Armored Core - Common functions and constants definition
 * Jessee Hsin-Wen Kung @ 2011.05.24
 * Department of Computer Science and Information Engineering, National Central University
 */
define('ROOT_PATH',		str_replace(DIRECTORY_SEPARATOR, "/", realpath(dirname(__FILE__)."/../")));
define('FILE_PATH',		$_SERVER['SCRIPT_NAME']);
define('URL_ROOT_PATH',	str_replace(DIRECTORY_SEPARATOR, "/", substr(ROOT_PATH, strlen(realpath($_SERVER["DOCUMENT_ROOT"])))));
define('URL_FILE_PATH',	str_replace(ROOT_PATH, "", $_SERVER['SCRIPT_NAME']));


//define('URL_ROOT_PATH', "http://ncufresh.snowtec.org");


require_once('lib/ac_init_security.php');

/**
 * Redirect to request URL path
 *
 * @param url URL address for redirection, can be absolute path or relative path
 * @param sec Optional parameter, default will be 0. If the parameter has been assigned with a custom value x, The page will be redirected after x seconds
 */
function redirect($url, $sec = 0)
{
	if(intval($sec) > 0)
	{
		header("Refresh:".$sec."; URL=".$url);
	}
	else
	{
		header("location: ".$url);
	}
}

/**
 * Return client's IP address
 *
 * @return result
 */
function get_client_ip_addr()
{
	$ip;
	if(getenv("HTTP_CLIENT_IP"))
	{
		$ip = getenv("HTTP_CLIENT_IP");
	}
	else
	if(getenv("HTTP_X_FORWARDED_FOR"))
	{
		$ip = getenv("HTTP_X_FORWARDED_FOR");
	}
	else
	if(getenv("REMOTE_ADDR"))
	{
		$ip = getenv("REMOTE_ADDR");
	}
	else
	{
		$ip = '*.*.*.*';
	}
	return $ip;
}


/**
 * Replace escape characters and XML left/right brackets to HTML's display symbols
 *
 * @param input_str Input string to be processed
 * @return Result after encoded
 */
function htmlencode($input_str)
{
	$origin = array("&", " ", "<", ">", "\"", "\n", "\t");
	$replacements = array("&amp;", "&nbsp;", "&lt;", "&gt;", "&quot;", "<br />\n", "&nbsp;&nbsp;&nbsp;&nbsp;");
	
	return str_replace($origin, $replacements, $input_str);
}

/**
 * Remove XML/HTML tags if input string contains XML style left, right brackets.
 * For example:
 *     input: <a href="x.php">DISPLAY_X</a>
 *     output: DISPLAY_X
 *
 * @param input Input string to be processed
 * @return Result after XML tags removed
 */
function htmleliminate($input)
{
	return preg_replace("/(<\/?)(\w+)([^>]*>)/e", "", $input);
}


/**
 * Return true if input string is a valid E-mail address
 *
 * @param input_str E-mail address, formatted in a character sequence
 * @return true if input is in correct format, false otherwise
 */
function validate_email($input_str)
{
	return preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*$/", $input_str) > 0;
}


/**
 * Return true if input string is a valid R.O.C idenfication number
 *
 * @param input_str R.O.C idenfication number, formatted in a character sequence
 * @return true if input is in correct format, false otherwise
 */
function validate_ROC_sid($input_str)
{
	if(strlen($input_str) != 10)
	{
		return false;
	}
	else
	if(substr($input_str, 1, 1)!= '1' && substr($input_str, 1, 1)!= '2')
	{
		return false;
	}
	else
	{
		$sid_sum = 0;
		switch(strtoupper(substr($input_str, 0, 1)))
		{
			case 'A':
				$sid_sum = $sid_sum + 1 + 0*9;
				break;
			case 'B':
				$sid_sum = $sid_sum + 1 + 1*9;
				break;
			case 'C':
				$sid_sum = $sid_sum + 1 + 2*9;
				break;
			case 'D':
				$sid_sum = $sid_sum + 1 + 3*9;
				break;
			case 'E':
				$sid_sum = $sid_sum + 1 + 4*9;
				break;
			case 'F':
				$sid_sum = $sid_sum + 1 + 5*9;
				break;
			case 'G':
				$sid_sum = $sid_sum + 1 + 6*9;
				break;
			case 'H':
				$sid_sum = $sid_sum + 1 + 7*9;
				break;
			case 'I':
				$sid_sum = $sid_sum + 3 + 4*9;
				break;
			case 'J':
				$sid_sum = $sid_sum + 1 + 8*9;
				break;
			case 'K':
				$sid_sum = $sid_sum + 1 + 9*9;
				break;
			case 'L':
				$sid_sum = $sid_sum + 2 + 0*9;
				break;
			case 'M':
				$sid_sum = $sid_sum + 2 + 1*9;
				break;
			case 'N':
				$sid_sum = $sid_sum + 2 + 2*9;
				break;
			case 'O':
				$sid_sum = $sid_sum + 3 + 5*9;
				break;
			case 'P':
				$sid_sum = $sid_sum + 2 + 3*9;
				break;
			case 'Q':
				$sid_sum = $sid_sum + 2 + 4*9;
				break;
			case 'R':
				$sid_sum = $sid_sum + 2 + 5*9;
				break;
			case 'S':
				$sid_sum = $sid_sum + 2 + 6*9;
				break;
			case 'T':
				$sid_sum = $sid_sum + 2 + 7*9;
				break;
			case 'U':
				$sid_sum = $sid_sum + 2 + 8*9;
				break;
			case 'V':
				$sid_sum = $sid_sum + 2 + 9*9;
				break;
			case 'W':
				$sid_sum = $sid_sum + 3 + 2*9;
				break;
			case 'X':
				$sid_sum = $sid_sum + 3 + 0*9;
				break;
			case 'Y':
				$sid_sum = $sid_sum + 3 + 1*9;
				break;
			case 'Z':
				$sid_sum = $sid_sum + 3 + 3*9;
				break;
		}
		
		$sid_sum = $sid_sum + intval(substr($input_str, 1, 1)) * 8 
							+ intval(substr($input_str, 2, 1)) * 7 
							+ intval(substr($input_str, 3, 1)) * 6 
							+ intval(substr($input_str, 4, 1)) * 5 
							+ intval(substr($input_str, 5, 1)) * 4 
							+ intval(substr($input_str, 6, 1)) * 3 
							+ intval(substr($input_str, 7, 1)) * 2 
							+ intval(substr($input_str, 8, 1)) * 1;
		
		if(substr($input_str, -1, 1) == substr((10 - ($sid_sum % 10)), -1, 1))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}


/**
 * Generate the code of an JavaScript array by PHP array
 *
 * @param phpArr Array written in PHP, can be a nested array
 * @return String records array in JavaScript
 */
function convert_js_array($phpArr)
{
	$result = "";
	$index = 0;
	$last_index = count($phpArr);
	if(count($phpArr) == 0)
	{
		$result = "new Array()";
	}
	
	foreach($phpArr as $key => $value)
	{
		if(is_array($value))
		{
			$result .=	($index++ == 0 ? 
							  (is_int($key) ? "new Array(" : "{'". $key . "':") . convert_js_array($value) . ($index == $last_index ? (is_int($key) ? ")" : "}") : "") :
						(($index == $last_index) ?
						"," . (is_int($key) ? "" : "'" .$key."':") . convert_js_array($value) . (is_int($key) ? ")" : "}") : 
						"," . (is_int($key) ? "" : "'" .$key."':") . convert_js_array($value) )
						);
		}
		else
		{
			$result .=	($index++ == 0 ?
							  (is_int($key) ? "new Array(" : "{'" . $key . "':"). (is_numeric($value) ? $value : "'".$value."'") . ($index == $last_index ? (is_int($key) ? ")" : "}") : "") :
						(($index == $last_index) ? 
						"," . (is_int($key) ? "" : "'".$key."':"). (is_numeric($value) ? $value : "'".$value."'") . (is_int($key) ? ")" : "}") : 
						"," . (is_int($key) ? "" : "'".$key."':"). (is_numeric($value) ? $value : "'".$value."'"))
						);
		}
	}
	
	return $result;
}
?>
