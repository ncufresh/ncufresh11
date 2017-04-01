<?php
    // Initialize ArmoredCore
    require_once('../../core/ac_boot.php');
    require_once('common.php');
    require('../pet_game/core.php');
    include('mailbox.php');
    $friendship = is_friend_or_self($info_id);
    
    //Check wheather post guestbook
    if(isset($_POST['content']))
    {
        if(personal_strlen($_POST['content']) > 50){
            echo '字太多了！';
            exit;
        }
        if(personal_strlen($_POST['content']) == 0){
            echo '空空如也！';
            exit;
        }
        if(!is_guestbook_public() && !$friendship){
            echo '留言板不公開，請先加入好友！';
            exit;
        }
        $content = string_handle_guestbook($_POST['content']);
        $currdb -> sql_query("INSERT INTO `personal_guestbooks` (`uid`, `guestid`, `content`) VALUES ('$info_id', '$uid', '$content');");
        echo 'SUCCESS';
        exit;
    }
    else{
        if(!$curruser -> is_login()){
            redirect($currcfg['URL_ROOT_PATH'] . "/index.php?action=need_login");
            //echo 'NEED_LOGIN';
            exit;
        }
    }
    
    //invite friend
    if(isset($_GET["action"]) && $_GET["action"]=="invite")
    {
        $msg = '';
        $friend_id = (int)$_GET["info_id"];
        $friend_src = $currdb -> sql_query("SELECT * FROM `personal_friends` WHERE `uid` = '$uid' AND `friendid` = '$friend_id';");
        $friend_count = $currdb -> sql_num_rows($friend_src);

        if($friend_count == 0){
            
            $data_src = $currdb -> sql_query("SELECT `uid` FROM `personal_data` WHERE `uid` = '$friend_id';");
            $data_count = $currdb -> sql_num_rows($data_src);
            if($data_count == 1){
                $currdb -> sql_query("INSERT INTO `personal_friends` (`uid`, `friendid`, `state`) VALUES ('$uid', '$friend_id', 'send');");
                $currdb -> sql_query("INSERT INTO `personal_friends` (`uid`, `friendid`, `state`) VALUES ('$friend_id', '$uid', 'receive');");
                $msg = "您的邀請已經送出囉!!";
            }
            else{
                $msg = "不存在的使用者";
            }
        }
        else{
            $friend = $currdb -> sql_fetch_assoc($friend_src);
            switch($friend['state']){
                case 'send':
                    $msg = "等待同意中!!";
                    break;
                case 'receive':
                    $currdb -> sql_query("UPDATE `personal_friends` SET `state` = 'friend' WHERE ((`uid` = '$uid' AND `friendid` = '$friend_id') OR (`uid` = '$friend_id' AND `friendid` = '$uid'));");
                    $msg = "已加為好友";
                    break;
                case 'friend':
                    $msg = "已經為好友";
                    break;
                default:
                    $msg = '不會發生!';
            }
        }
        echo $msg;
        exit;
    }
    
    // Delete friend
    if(isset($_GET['action'])&& $_GET['action'] =="del" && isset($_GET['did']) && $_GET['did']!="" )
    {
        if(preg_match('/[0-9]+/', $_GET['did']))
        {
            $friend_id = (int)$_GET['did'];
            $currdb -> sql_query("DELETE FROM `personal_friends` WHERE ((`uid` = '$uid' AND `friendid` = '$friend_id') OR (`uid` = '$friend_id' AND `friendid` = '$uid'));");
            echo '好友已刪除';
        }else{
            echo 'ERROR';
        }
        exit;
    }
    
    $currtpl -> assign('personal_data', fetch_person_data_by_info_id());

    
    $is_friend = is_friend($info_id);
    $is_self = ($_SESSION['uid'] == $info_id);
    
    $currtpl -> assign('is_friend', $is_friend);
    $currtpl -> assign('is_self', $is_self);
    
    //Get personal guestbooks by person_id  
    if(is_guestbook_public()||$friendship)
    {
        $personal_guestbooks = array();
    
        $personal_guestbooks_src = $currdb -> sql_query("SELECT `personal_guestbooks`.`id`, `personal_guestbooks`.`uid`, `guestid`, `content`, `nickname`, `pets`.`type`, `pets`.`level` FROM `personal_guestbooks` INNER JOIN `personal_data` ON (`personal_guestbooks`.`guestid` = `personal_data`.`uid`) INNER JOIN `pets` ON (`personal_guestbooks`.`guestid` = `pets`.`uid`) WHERE `personal_guestbooks`.`uid` = '$info_id' ORDER BY `id` DESC;");
        
        
        while($guestbook = $currdb -> sql_fetch_assoc($personal_guestbooks_src))
        {
            $img_src = '../pet_game/templates/zh_tw/images/pets/40/' . pet_pic_encode($guestbook['type'], $guestbook['level']);
            $guestbook['img_src'] = $img_src;
            array_push($personal_guestbooks, $guestbook);
        }

        // include('personal_topbar.php');
        $currtpl -> assign('personal_guestbooks', $personal_guestbooks);
        $currtpl -> assign("guestbooks_is_valid", true);
    }
    else
        $currtpl -> assign("guestbooks_is_valid", false);
    
    function fetch_person_data_by_info_id()
    {
        global $info_id;
        global $currdb;
        
        //Get personal data by person_id
        $personal_data_src = $currdb -> sql_query("SELECT `personal_data`.*, `pets`.`type`, `pets`.`level` FROM `personal_data` INNER JOIN `pets` ON (`pets`.`uid` = `personal_data`.`uid`) WHERE `personal_data`.`uid` = '$info_id';");
        $personal_data = $currdb -> sql_fetch_assoc($personal_data_src);
        $img_src = '../pet_game/templates/zh_tw/images/pets/120/' . pet_pic_encode($personal_data['type'],  $personal_data['level']);
        $someone_pet = new pet();
        $someone_pet -> load($info_id);
        $personal_data['pet_name'] = $someone_pet -> getName();
        $personal_data['img_src'] = $img_src;
        $personal_data['birthday'] = $personal_data['birthday'];
        return $personal_data;
    }
    
    
    function is_guestbook_public()
    {
        global $info_id;
        global $currdb;

        //Check whether friends
        $src = $currdb -> sql_query("SELECT `guestbooks_public` FROM `personal_data` WHERE `uid` = '$info_id';");
        
        $person_data = $currdb -> sql_fetch_assoc($src);
    
        if($person_data['guestbooks_public']=="1")
            return true;
        else
            return false;
    }
    
    //抓取videoId
    $is_me = 0 ;
    if(isset($_GET['info_id']))
        $uid = $_GET['info_id'] ;
    else{
        $uid = $_SESSION['uid'] ;
        $is_me = 1 ;
    }
    $module_list_src = $currdb -> sql_query("SELECT `video` FROM `personal_data` WHERE `uid`='$uid'") ;
    if($array_1D = $currdb -> sql_fetch_array($module_list_src)){
        if(strlen($array_1D[0])>0)
            $vid = $array_1D[0] ;
        else
            $vid = '9mBARKn3UU' ; //invalid id
    }
    $currtpl -> assign('is_me', $is_me) ;
    $currtpl -> assign('vid', $vid) ;
    
    
    $currtpl -> add_js('jquery.mousewheel.min.js');
    $currtpl -> add_js('slides.min.jquery.js');
    $currtpl -> add_js('loopedscroll.js');
    $currtpl -> add_js('personal.js');
    // Display with template file compiled
    $currtpl -> display("index.tpl.htm");
?>
