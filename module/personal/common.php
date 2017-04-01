<?php
	require_once('../../core/ac_boot.php');

    global $curruser;
    $login_status = $curruser -> is_login();

    //媽啊居然沒檢查...假表單可以直接送資料 sntc06 0809
    if (!$login_status){
        header('location: ' . URL_ROOT_PATH . '/index.php?action=need_login');
        exit();
    }
	
	$uid = get_cur_user_uid();
	$currtpl -> assign('uid', $uid);
	
	$info_id = get_cur_info_id();
	$currtpl -> assign('info_id', $info_id);
	
	// $currtpl -> assign('top_menu', $top_menu);
	
	function check_field($post_index)
	{
		if(is_array($post_index))
		{
			foreach($post_index as $index)
			{
				if(!isset($_POST[$index])||isset($_POST[$index]) && $_POST[$index]=="")
					return false;
			}
			return true;
		}
		else
		{
			if(isset($_POST[$post_index]) && $_POST[$post_index]!="")
				return true;
			else
				return false;
		}
	}
	
	function get_cur_user_uid()
	{
		//check login
        global $login_status;

		if($login_status)
		{
			return $_SESSION['uid'];
		}
		else
		{
			if(!isset($_GET['info_id']) || isset($_GET['info_id']) && $_GET['info_id']=="" && !$login_status)
            {
				header('location: ' . URL_ROOT_PATH . '/index.php?action=need_login');
                exit();
            }
		}
	}
	
	function get_cur_info_id()
	{
		//Get someone's uid -> person_id
		global $currdb;
		
		if(isset($_GET['info_id']) && $_GET['info_id']!="")
		{
			$info_id = $_GET['info_id'];
		
			$src = $currdb -> sql_query("SELECT * FROM `ac_user` WHERE `uid` = '$info_id';");
	
			if($currdb -> sql_num_rows($src) > 0)
				return $_GET['info_id'];
			else
				return $_SESSION['uid'];
		}
		else
			return $_SESSION['uid'];
	}
	
	
	function is_friend_or_self($info_id)
	{
		global $uid;
		global $currdb;
		$info_id = (int)$info_id;
		//Check whether friends
		$src = $currdb -> sql_query("SELECT * FROM `personal_friends` WHERE `uid` = '$uid' AND `friendid` = '$info_id' AND `state` = 'friend';");
	
		if($currdb -> sql_num_rows($src) > 0 || $uid==$info_id){
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function is_friend($info_id){
		global $uid;
		global $currdb;
		$info_id = (int)$info_id;
		//Check whether friends
		$src = $currdb -> sql_query("SELECT * FROM `personal_friends` WHERE `uid` = '$uid' AND `friendid` = '$info_id' AND `state` = 'friend';");
		if($currdb -> sql_num_rows($src) > 0){
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function personal_strlen($str){
		return mb_strwidth($str, 'UTF8');
	}
	
	function string_handle($str){
		return htmlspecialchars(addslashes($str));
	}
	
	function string_handle_guestbook($str){
		return htmlentities($str, ENT_QUOTES, "UTF-8");
	}
	
	function string_handle_mail_content($str){
		return htmlspecialchars($str);
	}
	
?>
