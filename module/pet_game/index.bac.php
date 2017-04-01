<?php

require('common.php');

$currtpl -> add_css('style.css');

//自己可以去的地方
$currtpl -> assign('actions', $actions);

//狀態名稱
$currtpl -> assign('states', $states);

//中英對照表
$currtpl -> assign('en_ch_list', $en_ch_list);

$uid = isset( $_GET['uid']) ?  (int)$_GET['uid'] : $_SESSION['uid'];

//讀取寵物
if ( $uid == $_SESSION['uid']) {
    // $test  = new pet(10, 1, null, 100, 1);
    // $test -> load(1);
    // $test -> _die();
    // $test -> save();
    
    $user_pet_object = new pet();
    $user_pet_object -> load($uid);
    
    //$user_pet_object -> addLife(+10);
    $user_pet_object -> save();

    $pet_name = $user_pet_object -> getName();
    $pet_state = $user_pet_object -> getStateStringArray();
    $pet_life = $user_pet_object -> getLife();
    $pet_sex = $user_pet_object -> getSex();
    $img_src = URL_IMAGES_PATH. '/pets/240/' . pet_pic_encode($user_pet_object -> getType(),$user_pet_object -> getLevel());
    
    if($user_pet_object -> isDead()){
        $img_src = URL_IMAGES_PATH . '/pets/240/ghost.png'; 
    }
    
    
    $currtpl -> assign('img_src', $img_src);
    $currtpl -> assign('pet_name', $pet_name);
    $currtpl -> assign('pet_state', $pet_state);
    $currtpl -> assign('pet_life', $pet_life);
    $currtpl -> assign('pet_sex', $pet_sex);
    
    
    //讀取使用者好友個數
    $friends_src = $currdb -> sql_query("SELECT `id` FROM `personal_friends` WHERE `uid` = '" . $_SESSION['uid'] . "' AND `state` = 'friend';");
    $num_friends = $currdb -> sql_num_rows($friends_src);
    $currtpl -> assign('num_friends', $num_friends);
    
    //讀取加好友通知
    $new_friends_src = $currdb -> sql_query("SELECT `personal_friends`.*, `personal_data`.`name` FROM `personal_friends` INNER JOIN `personal_data` ON (`personal_data`.`uid` = `personal_friends`.`friendid`) WHERE `personal_friends`.`uid` = '" . $_SESSION['uid'] . "' AND `personal_friends`.`state` = 'receive' LIMIT 0, 5;");
    $new_friends = array();
    while($new_friend = $currdb -> sql_fetch_assoc($new_friends_src)){
        $new_friends[] = $new_friend;
    }
    $currtpl -> assign('new_friends', $new_friends);
    
    //讀取使用者記錄個數
    $interations_src = $currdb -> sql_query("SELECT `id` FROM `pets_interation_log` WHERE `friend_id` = '" . $_SESSION['uid'] . "';");
    $num_interations = $currdb -> sql_num_rows($interations_src);
    $currtpl -> assign('num_interations', $num_interations);
    
    $currtpl -> add_css('dialog.css');
    
    $currtpl -> add_js('jquery.min.js');
    $currtpl -> add_js('jquery-ui.min.js');
    $currtpl -> add_js('slides.min.jquery.js');
    $currtpl -> add_js('game.bac.js');
    
    $currtpl -> display("index.tpl.bac.htm");
} else {
    $user_pet_object = new pet();
    $result = $user_pet_object -> load($uid);
    if($result == false) header('loaction: index.php');
    // $user_pet_object = new pet(3,2,null,90);
    // save_pet($uid, $user_pet_object);
    
    $pet_name = $user_pet_object -> getName();
    $pet_state = $user_pet_object -> getStateStringArray();
    //$pet_life = $user_pet_object -> getLife();
    $pet_sex = $user_pet_object -> getSex();
    $img_src = URL_IMAGES_PATH. '/pets/240/' . pet_pic_encode($user_pet_object -> getType(), $user_pet_object -> getLevel());
    
    if($user_pet_object -> isDead()){
        $img_src = URL_IMAGES_PATH . '/pets/240/ghost.png'; 
    }
    $currtpl -> assign('img_src', $img_src);
    

    $currtpl -> add_css('dialog.css');
    
    $currtpl -> add_js('slides.min.jquery.js');
    $currtpl -> add_js('jquery.min.js');
    $currtpl -> add_js('jquery-ui.min.js');
    $currtpl -> add_js('game.js');
    
    $currtpl -> assign('interations', $interations);
    $currtpl -> assign('pid', $uid);
    $currtpl -> assign('pet_name', $pet_name);
    $currtpl -> assign('pet_state', $pet_state);
    $currtpl -> assign('pet_sex', $pet_sex);
    $currtpl -> display("friend_pet.tpl.html");
}

?>
