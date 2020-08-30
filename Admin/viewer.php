<?php

include '../Database/connect.php';
session_start();
$username = $_SESSION['user'];
if (!empty($_COOKIE[$username])){
    header("Location: index.php");
}

$file = $_GET['file'];
echo file_get_contents($file);

?>

<form action="approval.php?file=<?php echo $file; ?>" method="POST">
    <input type="submit" value="approve" name="decision">
    <input type="submit" value="disapprove" name="decision">
</form>
