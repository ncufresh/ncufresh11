<?php
    if(empty($currdb) || empty($uid)) {
        header('location: index.php');
        exit;
    }
    else{
        $unread_mails_src = $currdb -> sql_query("SELECT * FROM `personal_mails` WHERE `uid`='$uid' AND `is_read` = '0';");
        $unread_mail_rows = $currdb -> sql_num_rows($unread_mails_src);
        $currtpl -> assign('unread_mail_rows', $unread_mail_rows);
    }
?>
