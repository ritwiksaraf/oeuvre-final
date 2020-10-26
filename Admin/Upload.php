
<?php

include '../Database/connect.php';
session_start();

$username = $_SESSION['user'];

if (empty($username)){
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="../Includes/img/small_icon.png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="../Includes/stylesheets/style.css">
  <link rel="stylesheet" href="../Includes/stylesheets/hdft.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>OEUVRE</title>
    <title>Upload Article</title>
</head>
<body>
<div class="text-center">
<form action="Upload.php" method="POST" enctype="multipart/form-data">
<input type="file" name="file" id="file">
<input type="submit" name="submit">
</form>
<button onclick="location.href='action.php'" type="button">Anazlyze</button>
</div>
<br><br>
<!-- Site footer -->
<footer class="site-footer">
  <div class="container">
    <div class="row">
<div class="col-sm-1 col-md-3">


      <a  href="#"><img src="../Includes/img/mr carter.png" width="150px" height="250px" ></a>

      </div>




      <div class="col-sm-12 col-md-6">
        <h6><b>About</b></h6>
        <p class="text-justify">The official blog of Fr. C. Rodrigues Institute of Technology showcasing the up and coming creative talent in the institution. The Website is a showcase to the immense potential of engineering students around the world.</p>
      </div>

      <div class="col-xs-6 col-md-3">
        <h6>Sections</h6>
        <ul class="footer-links">
          <li><a href="#">Privacy policy</a></li>
        </ul>
      </div>
 </div>
    <hr>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-6 col-xs-12">
        <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by
     <a href="https://www.fcrit.ac.in/">FCRIT-Vashi</a>.
        </p>
      </div>
    </div>
  </div>
</footer>

</body>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="../Includes/scripts/script.js"></script>
<script src="../Includes/scripts/overlay.js"></script>
<script src="/Includes/scripts/file-upload.js"></script>
</html>

<?php
if(isset($_POST['submit']))
	{
$file=$_FILES['file'];
$file_name=$file['name'];
$file_type=$file['type'];
$file_tmp_name=$file['tmp_name'];
$file_extensions=end(explode('.',$file_name));

if($file_extensions=="docx" && $file_type="application/vnd.openxmlformats-officedocument.wordprocessingml.document")
 {
  move_uploaded_file($file_tmp_name,"../Uploads/".str_replace(" ","_",$file_name));
  echo "<script>alert('Submission Successful')</script>";
}
}
?>

