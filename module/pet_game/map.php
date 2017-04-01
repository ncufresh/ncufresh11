<?php
require('common.php');

switch(isset($_GET['action']) ||  $_GET['action'] == ''? $_GET['action'] : 'error'){
    case 'info':
        //if url is invalid, header to the index 
        if(isset($_GET['type']) && isset($_GET['id']) && isset($actions[$_GET['type']][$_GET['id']])){
            //get user id, map id and pet
            $uid = $_SESSION['uid'];
            $life_id = $actions[$_GET['type']][$_GET['id']]['life_id'];
            $currtpl -> assign('type' ,$_GET['type']);
            $currtpl -> assign('id' ,$_GET['id']);
            $user_pet_object = new pet();
            $user_pet_object -> load($uid);
            
            //load the infomation of the map by map id
            $map_src = $currdb -> sql_query("SELECT `name`, `content` FROM `life_pet_map` WHERE `id` = '$life_id';");
            $map = $currdb -> sql_fetch_assoc($map_src);
            $currtpl -> assign('title', $map['name']);
            $currtpl -> assign('content', $map['content']);

            //load one question about this map randomly 
            $question_src = $currdb -> sql_query("SELECT * FROM `life_questions` WHERE `life_id` = '$life_id' ORDER BY RAND()  LIMIT 1;");
            $question_array = $currdb -> sql_fetch_assoc($question_src);
            $currtpl -> assign('question_array', $question_array);
            
            //if anwser the questions of the same map after 24 hours or the pet does need to go this map, open the question 
            $is_question_open = (map_is_after_a_day($uid, $life_id) && $user_pet_object -> isPetNeed($_GET['type']));
            
            $currtpl -> assign('is_question_open', $is_question_open);
            
            //if the action is right, 
            // $user_pet_object -> addLife($actions[$_GET['type']][$_GET['id']]['life_earn']);
            // save_pet($uid, $user_pet_object);
        }
        else{
            header('location: index.php');
            exit;
        }
        $currtpl -> set_display(false);
        $currtpl -> display('map.tpl.html');
        break;
    case 'answer':
        //check all value in $_GET
        if(isset($_GET['question_id']) && isset($_GET['answer']) && isset($_GET['type']) && isset($_GET['id']) && isset($actions[$_GET['type']][$_GET['id']]) && $_GET['question_id'] != '' && $_GET['answer'] != ''){
            $uid = $_SESSION['uid'];
            $life_id = $actions[$_GET['type']][$_GET['id']]['life_id'];
            $user_pet_object = new pet();
            $user_pet_object -> load($_SESSION['uid']);
            //if anwser the questions of the same map in 24 hours or the pet does not need to go this map, echo failure
            if(map_is_after_a_day($uid, $life_id) && $user_pet_object -> isPetNeed($_GET['type'])){
                $question_src = $currdb -> sql_query("SELECT * FROM `life_questions` WHERE `id` = '".$_GET['question_id']."';");
                
                $question_array = $currdb -> sql_fetch_assoc($question_src);
                $right = false;
                if((bool)$_GET['answer'] == (bool)$question_array['answer']){
                    $user_pet_object -> doAction($_GET['type'], $_GET['id']);
                    $user_pet_object -> save();
                    $right = true;
                }
                
                echo json_encode(array(
                    'life'  => $user_pet_object->getLife(),
                    'state' => $user_pet_object->getStateStringArrayString(),
                    'right' => $right
                ));
                //save the latest time in database
                map_update_time($uid, $life_id);
            }
            else{
                echo "FAILURE";
            }
            
        }
        else{
            echo 'ERROR';
        }
        
        exit;
        break;
    case 'interate':
        include('../personal/common.php');
        if(!isset($_GET['pid']) || !isset($interations[$_GET['type']][$_GET['option']]) || $_GET['pid'] == ''){
            header('location: index.php');
            exit;
        }
        
        $uid = $_SESSION['uid'];
        $pid = (int)$_GET['pid'];
        $type = $_GET['type'];
        $option = (int)$_GET['option'];
        $time = time();
        $user_pet_object = new pet();
        $user_pet_object -> load($uid);
        $other_pet_object = new pet();
        $other_pet_object -> load($pid);
        
        /*判斷時間*/
        $src = $currdb->sql_query("SELECT COUNT(`uid`) AS `count` FROM `pets_interation_log` WHERE `uid` ='$uid' AND `type` = '$type' AND  ( ('$time' - `time`) < 28800 );");
        $data = $currdb ->  sql_fetch_assoc($src);
        $count = $data['count'];
        
        if($user_pet_object -> isDead()){
            echo '你的寵物死掉了，重養一隻吧！';
        }
        elseif($other_pet_object -> isDead()){
            echo '他的寵物死掉了！';
        }
        elseif ( $count > 0 ) {
            echo '你已經跟好友一起' . $en_ch_list[$_GET['type']] . '，玩點別的或晚點再來吧！';
        } 
        elseif(!is_friend_or_self($pid)){
            echo '你們還不是朋友唷！';
        }
        else {
            $my_pet = new pet();
            $someone_pet = new pet();
            $my_pet -> load($_SESSION['uid']);
            $someone_pet -> load($pid);
            
            $result = $someone_pet -> interate($my_pet, $type, $option);
            
            save_log($_SESSION['uid'], $pid, $type, $option, $result);
            $currtpl -> assign('result', $result);
            
            $my_pet -> save();
            $someone_pet -> save();
            echo $result;
        }
        
        exit;
        break;
    case 'interation':
        if(!isset($_GET['pid']) || !isset($interations[$_GET['type']])){
            header('location: index.php');
            exit;
        }
        $currtpl -> assign('type', $_GET['type']);
        $currtpl -> assign('pid', $_GET['pid']);
        $currtpl -> assign('interation', $interations[$_GET['type']]);
        $currtpl -> set_display(false);
        $currtpl -> display('interation_show.tpl.html');
        break;
    case 'error':
        header('location: index.php');
        exit;
        break;
    default:
        header('location: index.php');
        exit;
}

?>

