<?php
require_once('../../core/ac_boot.php');

if(!$currmodule -> is_system())
{
	redirect(URL_ROOT_PATH . "/login.php?redirect_path=" . URL_ROOT_PATH . "/module/admin");
}


// Step1. Load required CSS/JavaScript
$currtpl -> add_css("jquery-ui-css/smoothness/jquery-ui-1.8.13.custom.css", true);

$currtpl -> add_js("jquery-ui-1.8.13.custom.min.js", true);
$currtpl -> add_js("ui/jquery.ui.core.js", true);
$currtpl -> add_js("ui/jquery.ui.widget.js", true);

$currtpl -> add_js("ui/jquery.ui.tabs.js", true);
$currtpl -> add_js("ui/jquery.ui.draggable.js",true);
$currtpl -> add_js("ui/jquery.ui.position.js",true);
$currtpl -> add_js("ui/jquery.ui.resizable.js",true);
$currtpl -> add_js("ui/jquery.ui.dialog.js",true);


// Step2. Tab1: Module information
$module_src = $currdb -> sql_query("SELECT * FROM `ac_module` ORDER BY `mid` ASC");
$array_module = array();
while($array_1D = $currdb -> sql_fetch_assoc($module_src))
{
	$array_1D['adm_user']	= ac_module::get_adm_user_by_mid($array_1D['mid']);
	$array_1D['adm_group']	= ac_module::get_adm_group_by_mid($array_1D['mid']);
	
	array_push($array_module, $array_1D);
}
$currtpl -> assign('array_module', $array_module);
$currtpl -> assign('array_module_js', convert_js_array($array_module));

// Step3. Tab2: Block management
$block_src = $currdb -> sql_query("SELECT `ac_block`.*, `ac_module`.`module_name` FROM `ac_block` LEFT JOIN `ac_module` ON `ac_block`.`mid` = `ac_module`.`mid` ORDER BY `ac_block`.`bid` ASC");
$array_block = array();
while($array_1D = $currdb -> sql_fetch_assoc($block_src))
{
	array_push($array_block, $array_1D);
}

$currtpl -> assign('array_block', $array_block);
$currtpl -> assign('array_block_js', convert_js_array($array_block));

// Step4. Tab3: Group management
$group_src = $currdb -> sql_query("SELECT * FROM `ac_group` ORDER BY `gid` ASC");
$array_group = array();
while($array_1D = $currdb -> sql_fetch_assoc($group_src))
{
	$array_1D['member'] = ac_group::get_user_of_group_by_gid($array_1D['gid']);
	
	array_push($array_group, $array_1D);
}

$currtpl -> assign('array_group', $array_group);
$currtpl -> assign('array_group_js', convert_js_array($array_group));

// Step5. Tab4: User management


$currtpl -> display("index.tpl.htm");
?>