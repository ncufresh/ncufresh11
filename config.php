<?php
/**
 * Armored Core - Global configuration
 * Jessee Hsin-Wen Kung @ 2011.05.24
 * Department of Computer Science and Information Engineering, National Central University
 * 
 * Included project information, MySQL connection information, Language
 * Setting and Main template file
 */
 
/**
 * Project information settings
 *
 * @param PROJECT_NAME The codename of current project
 * @param PROJECT_VERSION The version of current project, usually refers to framework version
 */
define('PROJECT_NAME', "2011 國立中央大學 大一生活知訊網");
define('FRAMEWORK_NAME', "ArmoredCore PHP Framework");
define('FRAMEWORK_VERSION', "20110524");

/**
 * MySQL Connection settings
 * 
 * @param SQL_HOST Hostname of MySQL Server current project using, should be IP address or domain name
 * @param SQL_CTRL_USERNAME Username of MySQL database connection handler 
 * @param SQL_CTRL_PASSWORD Password corresponed to parameter SQL_CTRL_USERNAME
 * @param SQL_DB_NAME The database of current project using
 */
define('SQL_HOST', "localhost");
define('SQL_CTRL_USERNAME', "");
define('SQL_CTRL_PASSWORD', "");
define('SQL_DB_NAME', "");

/**
 * Language Settings
 *
 * @param DEFAULT_LANG Dummy parameter, should be zh_tw for the project
 */
define('DEFAULT_LANG', "zh_tw");

/**
 * Keep-alive time for user online counter
 *
 * @param ONLINE_ALIVE_TIME Keep-alive time interval for online user counter, in seconds
 */
define('ONLINE_ALIVE_TIME', 300);

/**
 * Main frame template settings. Notice that you can use ONLY 1 main
 * frame for whole project.
 * 
 * @param MAIN_FRAME_EXEC Main exectutable file
 * @param MAIN_FRAME_TPL Template file corresponded to MAIN_FRAME_EXEC
 */
define('MAIN_FRAME_EXEC', "main_frame.php");
define('MAIN_FRAME_TPL', "main_frame.tpl.htm");
?>
