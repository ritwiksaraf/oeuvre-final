<?php

include '../Database/connect.php';
session_start();
$username = $_SESSION['user'];

if(!empty($_COOKIE[$username])){
    header("Location: index.php");
}

//function to delete a dir with all its contents
function delete_directory($dirname) {
    if (is_dir($dirname))
      $dir_handle = opendir($dirname);
if (!$dir_handle)
     return false;
while($myfile = readdir($dir_handle)) {
      if ($myfile != "." && $myfile != "..") {
           if (!is_dir($dirname."/".$myfile))
                unlink($dirname."/".$myfile);
           else
                delete_directory($dirname.'/'.$myfile);
      }
}
closedir($dir_handle);
rmdir($dirname);
return true;
}

//get the file location
$myfile = $_GET['file'];
$decision = $_POST['decision'];


//extract file title
$explode1 = explode('/', $myfile);
$explode2 = explode(".", $explode1[1]);
$title = $explode2[0];

if($decision == 'disapprove'){
    //delete the file and its entry from the db if disapproved
    $statement = $db->prepare("DELETE FROM postDetails WHERE Title=?;");
    $statement->bindValue(1, $title);
    $result = $statement->execute();
    unlink($myfile);
    unlink("/var/www/html/Includes/posts/images/".$title."image1.jpeg");
    rmdir("/var/www/html/Includes/posts/images/".$title);
    header("Location: dashboard.php");
}
elseif($decision == 'approve'){
    //insert file data into approvedPosts table, remove it from the postDetails table, and move the file to blog/posts if approved
    $get_data = $db->prepare("SELECT * FROM postDetails WHERE Title=?;");
    $get_data->bindValue(1, $title);
    $result = $get_data->execute();

    $row = $result->fetchArray();

    $put_data = $db->prepare("INSERT INTO approvedPosts(Date, Author, Title, small_content, tags) VALUES(?,?,?,?,?);");
    $put_data->bindValue(1,$row['Date']);
    $put_data->bindValue(2,$row['Author']);
    $put_data->bindValue(3,$row['Title']);
    $put_data->bindValue(4,$row['small_content']);
    $put_data->bindValue(5,$row['tags']);
    $put_data->execute();

    rename($row['profanity']."-posts/".$title.".html", "../Blog/posts/".$title.".html"); //move approved file to blog posts

    $delete_data = $db->prepare("DELETE FROM postDetails WHERE Title=?;");
    $delete_data->bindValue(1, $title);
    $delete_data->execute();
    header("Location: dashboard.php");
}
?>
