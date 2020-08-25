<?php
    $db = new SQLite3('/var/www/html/Database/Master.db');#change path later


    if(!$db){
        echo $db->lastErrorCode();
    }
    else {
    	echo serialize($db);
    }
?>
