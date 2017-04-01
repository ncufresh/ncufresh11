

<?php
	 $url = "http://www.youtube.com/watch?v=kI-09zY3GPA";
	    /**split the query string into an array**/ 
    if($link == null) $arr['v'] = $url; 
    else  parse_str($link, $arr); 
    /** end split the query string into an array**/ 
    if(! isset($arr['v'])) return false; //fast fail for links with no v attrib - youtube only 
    $checklink = YOUTUBE_CHECK . $arr['v']; 
    //** curl the check link ***// 
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL,$checklink); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
    curl_setopt($ch, CURLOPT_TIMEOUT, 5); 
    $result = curl_exec($ch); 
    curl_close($ch); 
    $return = $arr['v']; 
    if(trim($result)=="Invalid id") $return = false; //you tube response 
    echo  $return; //the stream is a valid youtube id. 





?>