<?php
// Initialize ArmoredCore
require_once('../../core/ac_boot.php');
require_once('common.php');
include('mailbox.php');
//寫入資料庫
if(isset($_POST['reciever'])){
        
        if(check_field(array("title","mail","reciever")))
                {   
                            
                            if(personal_strlen($_POST['title']) > 22){
                                            echo '標題太長！';
                                                        exit;
                                                                }
                                    if(personal_strlen($_POST['mail']) > 342){
                                                    echo '內容太長！';
                                                                exit;
                                                                        }
                                            
                                            
                                            //這個條件可以改↓
                                            if($_SESSION['uid'] == 113 && $_POST['reciever'] == '[ALL_USER]'){
                                                            $title = string_handle($_POST['title']);
                                                                        $content = htmlentities($_POST['mail'], ENT_QUOTES, "UTF-8");
                                                                                    $date = time();
                                                                                                
                                                                                                //QUERY 的 serder_id 也要跟著改!!
                                                                                                $sql = "INSERT INTO `personal_mails`(`uid`, `title`, `content`, `senderid`, `is_read`, `date`) SELECT `uid`, '$title', '$content', '113', '0', '$date' FROM `ac_user` ;";
                                                                                                            $currdb -> sql_query($sql);
                                                                                                                    }
                                                    else{
                                                                    $title = string_handle($_POST['title']);
                                                                                $content = htmlentities($_POST['mail'], ENT_QUOTES, "UTF-8");
                                                                                            $reciever_id = string_handle_mail_content($_POST['reciever']);
                                                                                                        
                                                                                                        $r_src = $currdb -> sql_query("SELECT `uid` FROM `ac_user` WHERE `username` = '$reciever_id';");
                                                                                                                    $r = $currdb -> sql_fetch_assoc($r_src);
                                                                                                                                if($r == false){
                                                                                                                                                    echo '此人不存在！';
                                                                                                                                                                    exit;
                                                                                                                                                                                }
                                                                                                                                            $reciever = $r['uid'];
                                                                                                                                                        $date = time();
                                                                                                                                                                    $sql = "INSERT INTO `personal_mails`(`uid`, `title`, `content`, `senderid`, `is_read`, `date`) VALUES('$reciever','$title','$content','$uid', '0', '$date')";
                                                                                                                                                                                $currdb -> sql_query($sql);
                                                                                                                                                                                            
                                                                                                                                                                                        }
                                                            
                                                            echo 'SUCCESS';
                                                                    exit;
                                                                        }
            else{
                        echo '不能為空！';
                                exit;
                                    }
}

if(isset($_GET['rid']) && isset($_GET['title'])){
        $currtpl -> assign('rid', $_GET['rid']);
            $currtpl -> assign('title', $_GET['title']);
}



$currtpl -> add_js('mail.js');
// Display with template file compiled
$currtpl -> display("newmail.htm");
?>
