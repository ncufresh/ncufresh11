<?php
    // Initialize ArmoredCore
    require_once('core/ac_boot.php');
    require(ROOT_PATH . '/module/pet_game/core.php');
    
    //若已經登入，直接導向
    if($curruser -> is_login()){
        header('location: '. URL_ROOT_PATH . '/module/personal/');
    }
    
    $string_handle = function($array){
        foreach($array as $item){
            $item = htmlentities($item,ENT_QUOTES,"UTF-8");
        }
        return $array;
    };
    
    $departments = array(
        '中文系',
        '英文系',
        '法文系',
        '物理系',
        '數學系',
        '化學系',
        '生科系',
        '光電系',
        '理學院學士班',
        '化材系',
        '土木系',
        '機械系',
        '企管系',
        '資管系',
        '財金系',
        '經濟系',
        '電機系',
        '資工系',
        '通訊系',
        '地科系',
        '大氣系',
        '其他',
    );
    
    $currtpl -> assign('departments', $departments);
    
    $keys = array('account', 'password', 'password_check', 'name', 'nickname', 'email', 'graduatedschool', 'homepage', 'intro', 'birthday', 'department', 'guestbooks_public', 'pet', 'video');
    
    if(isset($_GET['action']) && $_GET['action'] == 'register' && check_field($keys)){
        $message_array = array();
        
        if($_POST['account'] == ''){
            $message_array['account'] = '帳號不能為空';
        }
        elseif(preg_match('/[^a-zA-Z0-9_]+/', $_POST['account'])){
            $message_array['account'] = '帳號只能使用數字、英文字母、底線';
        }
        elseif(register_strlen($_POST['account']) < 3 || register_strlen($_POST['account']) > 12){
            $message_array['account'] = '帳號請輸入3~12個字元';
        }
        else{
            $account = $_POST['account'];
            $src = $currdb -> sql_query("SELECT `uid` FROM `ac_user` WHERE `username` = '$account'");   
            if($currdb -> sql_num_rows($src) != 0){
                $message_array['account'] = '帳號已存在';
            }
        }
        
        if($_POST['password'] == ''){
            $message_array['password'] = '密碼不能為空';
        }
        elseif($_POST['password'] != $_POST['password_check']){
            $message_array['password'] = '密碼與確認密碼不符';
        }
        elseif(preg_match('/[^a-zA-Z0-9_]+/' ,$_POST['password'])){
            $message_array['password'] = '密碼只能使用數字、英文字母、底線';
        }
        elseif(register_strlen($_POST['password']) < 6){
            $message_array['password'] = '密碼不能少於六個字元';
        }
        
        if($_POST['password_check'] == ''){
            $message_array['password_check'] = '確認密碼不能為空';
        }

        
        if($_POST['name'] == ''){
            $message_array['name'] = '名字不能為空';
        }
        elseif(register_strlen($_POST['name']) > 20){
            $message_array['name'] = '名字不能超過20個字元';
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
        if(register_strlen($_POST['graduatedschool']) > 25){
            $message_array['graduatedschool'] = '畢業學校名稱太長';
        }
        if(register_strlen($_POST['homepage']) > 25){
            $message_array['homepage'] = '網址不能超過25個字元，建議至 http://0rz.tw/ 縮網址';
        }
        if(register_strlen($_POST['intro']) > 100){
            $message_array['intro'] = '自我介紹太長(100字)';
        }
        
        if ( $_POST['birthday'] != '' ) {
            if(!preg_match('/^[1-2][0-9]{3}-[0-9]{2}-[0-9]{2}$/', $_POST['birthday']) ){
                $message_array['birthday'] = '生日日期格式不正確';
            }
        }
        
        
        if(!in_array($_POST['department'], $departments)){
            $message_array['department'] = '不存在的系所';
        }
        
        if($_POST['guestbooks_public'] != '1' && $_POST['guestbooks_public'] != 0){
            $message_array['guestbooks_public'] = '請選擇是否開放留言板';
        }
        
        if(!array_key_exists($_POST['pet'], $pet_types) || !is_normal_pet($_POST['pet'])){
            $message_array['pet'] = '請選擇寵物';
        }
        
        
        if(empty($message_array)){
            $account            = string_handle($_POST['account']);
            $password           = ac_user_db_password_en_alg(string_handle($_POST['password']));
            $name               = string_handle($_POST['name']);
            $nickname           = string_handle($_POST['nickname']);
            $department         = string_handle($_POST['department']);
            $birthday           = string_handle($_POST['birthday']);
            $email              = string_handle($_POST['email']);
            $graduatedschool    = string_handle($_POST['graduatedschool']);
            $homepage           = string_handle($_POST['homepage']);
            $intro              = string_handle($_POST['intro']);
            $guestbooks_public  = string_handle($_POST['guestbooks_public']);
            $url = $_POST['video'] ;
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
            $pet_id             = string_handle($_POST['pet']);

            $time = time();
            
            //INSERT username & password into database
            $currdb -> sql_query("INSERT `ac_user` (`username`, `password`, `email`) VALUES ('$account', '$password', '$email');");
            
            //get uid
            $uid = $currdb -> sql_insert_id();
            
            //insert personal data into database
            $currdb -> sql_query("INSERT `personal_data` (`uid`, `name`, `nickname`, `department`, `birthday`, `email`, `graduatedschool`, `homepage`, `intro`, `guestbooks_public` ,`video`) VALUES ('$uid', '$name', '$nickname', '$department', '$birthday', '$email', '$graduatedschool', '$homepage', '$intro', '$guestbooks_public', '$video');");
            
            //insert new pet record
            $user_pet_object = new pet($pet_id, 1, null, 100, $uid);
            $user_pet_object -> unlockState(1);
            $user_pet_object -> save();
            
            
            //send pet infomation to user

            $fp = fopen('gameletter.txt', 'r');
            $mychar = '';
            while(!feof($fp)){
                $mychar .= fgets($fp, 1024);
            }
            fclose($fp);
            $date = time();
            $sql = "INSERT INTO `personal_mails`(`uid`, `title`, `content`, `senderid`, `is_read`, `date`) VALUES('$uid','關於寵物','$mychar','113', '0', '$date')";
            $currdb -> sql_query($sql);
            
            $fp = fopen('readme.txt', 'r');
            $mychar = '';
            while(!feof($fp)){
                $mychar .= fgets($fp, 1024);
            }
            fclose($fp);
            $date = time();
            $sql = "INSERT INTO `personal_mails`(`uid`, `title`, `content`, `senderid`, `is_read`, `date`) VALUES('$uid','歡迎使用2011知訊網','$mychar','113', '0', '$date')";
            $currdb -> sql_query($sql);
            

            echo 'SUCCESS';
        }
        else{
            echo json_encode($message_array);
        }
        
        exit;
    }
    
    $currtpl -> add_js('register.js');
    $currtpl -> add_js('jquery.tools.min.js');
    $currtpl -> add_js('jquery-ui-1.8.13.custom.min.js');
    
    $currtpl -> add_css('register.css');
    $currtpl -> add_css('jquery-ui-css/base/jquery.ui.all.css');
    $currtpl -> assign('post', $_POST);
    
    $currtpl -> assign('admin_pet_key_start', $admin_pet_key_start);
    $currtpl -> assign('pet', $pet_types);
    
    $currtpl -> display('register.tpl.html');
    
    
    function register_strlen($str){
        return mb_strwidth($str, 'UTF8');
    }
    
    function string_handle($str){
        return htmlspecialchars(addslashes($str));
    }
    
    
    function check_field($post_index)
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
