<?php
    require('../../core/ac_boot.php');
    require('core.php');
    
    define('URL_IMAGES_PATH', 'templates/zh_tw/images');
    if($curruser -> is_guest()){
        header('location: ' . URL_ROOT_PATH . '/login.php'); 
        exit;
    }  
?>
