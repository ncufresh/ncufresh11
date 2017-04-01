<?php
    // Initialize ArmoredCore
    require_once('../../core/ac_boot.php');
    require_once('common.php');
    require('../pet_game/core.php');
    if($curruser -> is_guest())
    {
        header("location: " . URL_ROOT_PATH . "/login.php");
    }
    
    switch(isset($_GET['id'])? $_GET['id'] : '')
    {
        case "data":
            $keys = array('name', 'graduatedschool', 'birthday', 'nickname', 'email', 'homepage', 'guestbooks_public', 'intro', 'video');
            if(check_post($keys)){
                $message_array = array();
                
                if($_POST['name'] == ''){
                    $message_array['name'] = '名字不能為空';
                }
                elseif(register_strlen($_POST['name']) > 20){
                    $message_array['name'] = '名字不能超過20個字元';
                }
                
                if(register_strlen($_POST['graduatedschool']) > 25){
                    $message_array['graduatedschool'] = '畢業學校名稱太長';
                }
                
                if ( $_POST['birthday'] != '' ) {
                    if(!preg_match('/^[1-2][0-9]{3}-[0-9]{2}-[0-9]{2}$/', $_POST['birthday']) ){
                        $message_array['birthday'] = '生日日期格式不正確';
                    }
                }
                
                if($_POST['nickname'] == ''){
                    $message_array['nickname'] = '暱稱不能為空';
                }
                elseif(register_strlen($_POST['nickname']) > 10){
                    $message_array['nickname'] = '暱稱不能超過10個字元';
                }
                
                if(register_strlen($_POST['email']) > 25){
                    $message_array['email'] = '信箱地址太長';
                }
                
                if(register_strlen($_POST['homepage']) > 25){
                    $message_array['homepage'] = '網址不能超過25個字元，建議至 http://0rz.tw/ 縮網址';
                }
                
                if($_POST['guestbooks_public'] != '1' && $_POST['guestbooks_public'] != 0){
                    $message_array['guestbooks_public'] = '請選擇是否開放留言板';
                }
            
                if(register_strlen($_POST['intro']) > 100){
                    $message_array['intro'] = '自我介紹太長(100字)';
                }
            
                if(empty($message_array)){
                    $name               = string_handle($_POST['name']);
                    $nickname           = string_handle($_POST['nickname']);
                    $birthday           = $_POST['birthday'];
                    $email              = string_handle($_POST['email']);
                    $graduatedschool    = string_handle($_POST['graduatedschool']);
                    $homepage           = string_handle($_POST['homepage']);
                    $intro              = string_handle($_POST['intro']);
                    $guestbooks_public  = string_handle($_POST['guestbooks_public']);
                    
                    $url = $_POST['video'];
    /*              echo $url; */
                    $token = strtok($url, '/') ;
                    $videoId ;
                    $is_found = 1 ;
                    while($token && $is_found){
                        $token = strtolower($token) ;
                        if(substr_count($token, "youtube.com")){
                            $tok = strtok('/') ;
                            $tok = strstr($tok, '?') ;  
                            $tok = strtok($tok, '&') ;  
                            while($tok){
                                if(substr_count($tok, "v=")){
                                    $videoId = substr($tok, strpos($tok, '=')+1) ;
                                    $is_found = 0 ;
                                    break ;
                                }
                                $tok = strtok('&') ;
                            }
                        }
                        if(substr_count($token, "youtu.be")){
                            $videoId = strtok('/') ;
                            break ;
                        }
                        $token = strtok('/') ;
                    }
                    
                    $video = isset($videoId) ? $videoId : '' ; //如果沒有填影片就給他空值
                    
                    $time = time();
                    
                    //UPDATE
                    $currdb -> sql_query("UPDATE `personal_data` SET `name`='$name', `nickname`='$nickname', `birthday`='$birthday', `email`='$email', `graduatedschool`='$graduatedschool', `homepage`='$homepage', `intro`='$intro', `guestbooks_public`='$guestbooks_public', `video`='$video' WHERE `uid` = '$uid';");
                    //header('location: index.php?info_id='.$uid);
                
                    echo 'SUCCESS';
                }
                else{
                    echo json_encode($message_array);
                }
                exit;
            }
            
            break;
            
        case "password":
        
            $message_array = array();
            
            if(!check_field(array('password', 'new_password', 'new_password_check')))
            {
                $message_array['field'] = '密碼欄位皆不得為空';
            }
            else{
                if(!ac_user_db_password_en_alg($_POST['password']) == $_SESSION['password'])
                {
                    $message_array['password'] = '原始密碼錯誤';
                }
            
                if($_POST['new_password'] != $_POST['new_password_check'])
                {
                    $message_array['newpassword'] = '新密碼與確認密碼不符';
                }
                
                if(empty($message_array)){
                    $new_password = ac_user_db_password_en_alg($_POST['new_password']); 
                    $currdb -> sql_query("UPDATE `ac_user` SET `password` = '$new_password' WHERE `uid` = '$uid';");
                
                    echo 'SUCCESS';
                }
                else{
                    echo json_encode($message_array);
                }
                
                exit;
            }
            


            break;
        case 'choose_pet':
            if(check_post('pet')){
                $message_array = array();
                $user_pet = new pet();
                $user_pet -> load($_SESSION['uid']);
                if(!array_key_exists($_POST['pet'], $pet_types) || !is_normal_pet($_POST['pet'])){
                    $message_array['pet'] = '請選擇寵物';
                }
                elseif(!$user_pet -> isDead()){
                    $message_array['pet'] = '你的寵物還沒死喔!!';
                }
                
                if(empty($message_array)){
                    $user_pet = new pet($_POST['pet'], 1, null, 100, $_SESSION['uid']);
                    $user_pet -> save(true);
                    echo 'SUCCESS';
                }
                else{
                    echo json_encode($message_array);
                }
                exit;
            }
            break;
        default:
            break;
    }

    //send defalt personal data
    $personal_data_src = $currdb -> sql_query("SELECT * FROM `personal_data` WHERE `uid` = $uid");
    $personal_data = $currdb -> sql_fetch_assoc($personal_data_src);
    //$personal_data['birthday'] = date('Y-m-d',$personal_data['birthday']);
    
    $currtpl -> add_js("ajax.js");
    $currtpl -> add_js('jquery-ui-1.8.13.custom.min.js',true);
    $currtpl -> add_css('jquery-ui-css/base/jquery.ui.all.css',true);
    
    $user_pet = new pet();
    $user_pet -> load($_SESSION['uid']);
    $currtpl -> assign('admin_pet_key_start', $admin_pet_key_start);
    $currtpl -> assign('pet', $pet_types);
    $currtpl -> assign('is_pet_dead', $user_pet -> isDead());
    $currtpl -> assign('personal_data', $personal_data);
    $currtpl -> display('personal_data_edit.tpl.html');
    
    function register_strlen($str){
        return mb_strwidth($str, 'UTF8');
    }
    
    
    function check_post($post_index)
    {
        if(is_array($post_index))
        {
            foreach($post_index as $index)
            {
                if(!isset($_POST[$index]))
                    return false;
            }
            return true;
        }
        else
        {
            if(isset($_POST[$post_index]))
                return true;
            else
                return false;
        }
    }
    
?>
