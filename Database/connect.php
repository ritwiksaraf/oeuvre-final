<?php
    $db = new SQLite3('/Master.db');#change path later


    if(!$db){
        echo $db->lastErrorCode();
    }
?>
