<?php
system("for i in $(ls /var/www/html/Uploads/ |grep docx); do python3 /var/www/html/Uploads/autorun.py $i; done");
header("Location: dashboard.php");
?>
