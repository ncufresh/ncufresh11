<?php
// Initialize ArmoredCore
require_once('../../core/ac_boot.php');
require('common.php');

if(isset($_GET['mailid'])){
    
    $mailid = (int)$_GET['mailid'];
    
    
    $mail_src = $currdb -> sql_query("SELECT `personal_mails`.*, `ac_user`.`username` FROM `personal_mails` INNER JOIN `ac_user` ON (`ac_user`.`uid` = `personal_mails`.`senderid`) WHERE `personal_mails`.`id`='$mailid';");
    $mail = $currdb -> sql_fetch_array($mail_src) ;
    
    if($mail['uid'] != $_SESSION['uid'])
        header('location: ' . URL_ROOT_PATH . '/index.php');
    //設定成已讀
    $sql = "UPDATE `personal_mails` SET `is_read`='1' WHERE `id`='$mailid';" ;
    $currdb -> sql_query($sql) ;
    
    $mail['date'] = date('Y-m-d H:i:s' , $mail['date']);
    $currtpl -> assign('mail', $mail) ;
    
    // Display with template file compiled
    $currtpl -> display("show.htm");
}
else{
    header('location: ' . URL_ROOT_PATH . '/index.php');
}

?>
