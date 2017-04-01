<?php
/**
 * Armored Core - Boot
 * Jessee Hsin-Wen Kung @ 2011.05.24
 * Department of Computer Science and Information Engineering, National Central University
 *
 * Initialize handlers, settings and configuration
 */

define('AC_INCLUDED', true);
session_start();
header('P3P: CP="CAO PSA OUR"');

// Step1. Include configuration/setting file of required settings
require_once('ac_common.php');
ac_session_init();

require_once(ROOT_PATH.'/config.php');
require_once(ROOT_PATH.'/core/ac_database.php');
require_once(ROOT_PATH.'/core/ac_user.php');
require_once(ROOT_PATH.'/core/ac_group.php');
require_once(ROOT_PATH.'/core/ac_template.php');
require_once(ROOT_PATH.'/core/ac_module.php');
require_once(ROOT_PATH.'/core/ac_block.php');
require_once(ROOT_PATH.'/core/ac_online_counter.php');

$currcfg = array();
$currcfg['ROOT_PATH']		= ROOT_PATH;
$currcfg['URL_ROOT_PATH']	= URL_ROOT_PATH;
$currcfg['FILE_PATH']		= FILE_PATH;
$currcfg['URL_FILE_PATH']	= URL_FILE_PATH;
$currcfg['DEFAULT_LANG']	= DEFAULT_LANG;
$currcfg['CSS_HEADER']		= "";
$currcfg['JS_HEADER']		= "";
$currcfg['PROJECT_NAME']	= PROJECT_NAME;
$currcfg['FRAMEWORK_NAME']	= FRAMEWORK_NAME;
$currcfg['FRAMEWORK_VERSION']= FRAMEWORK_VERSION;

$currdb		= new ac_database(SQL_HOST, SQL_CTRL_USERNAME, SQL_CTRL_PASSWORD, SQL_DB_NAME);
$currcfg['DB_SOURCE']		= &$currdb;

$curruser	= new ac_user();
$currcfg['USER_SOURCE']		= &$curruser;

$currgroup	= new ac_group();
$currcfg['GROUP_SOURCE']	= &$currgroup;

$currmodule	= new ac_module();
$currcfg['MODULE_SOURCE']	= &$currmodule;

$currtpl	= new ac_template();
$currcfg['TPL_SOURCE']		= &$currtpl;

$currcounter= new ac_online_counter();
$currcfg['COUNTER_SOURCE']	= &$currcounter;

$currtpl -> assign('curruser',	$curruser);
$currtpl -> assign('currgroup',	$currgroup);
$currtpl -> assign('currmodule',$currmodule);

// Step2. Security check for banned IP and magic quotes addition
ac_magic_quote_add($_GET);
ac_magic_quote_add($_POST);

// Step3. Add jquery & global CSS
$currtpl -> add_css('style.css', true);
/* $currtpl -> add_js("jquery-1.5.1.min.js", true); */
$currtpl -> add_js("jquery_1.6.2.js", true);
$currtpl -> add_js("DD_belatedPNG.js", true);
$currtpl -> add_js("fw2011_init.js", true);
$currtpl -> add_js("jquery_button.js", true);
$currtpl -> add_js("youTubeEmbed/youTubeEmbed_jquery_1.0.js", true);
$currtpl -> add_js("youTubeEmbed/jquery.swfobject.1-1-1.min.js", true);
$currtpl -> add_js("konamiCode_index.js", true);
$currtpl -> add_css("konamiCode.css", true);
$currtpl -> add_css("youTubeEmbed/youTubeEmbed_jquery_1.0.css", true);
?>
