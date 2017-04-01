<?php
if(!AC_INCLUDED)
{
	exit();
}

$main_block_var = array();

global $currdb, $currmodule, $currcounter, $curruser, $currtpl;

// Step1. Fetch login block
$login_block = new ac_block(1);
$main_block_var['login_block'] = $login_block -> fetch_block();

// Step2. Fetch online counter
$main_block_var['online_counter']	= $currcounter -> count_online();
$main_block_var['accu_counter']		= $currcounter -> count_accu();

// Step3. Fetch search block

?>