
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="Includes/img/small_icon.png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="Includes/stylesheets/style.css">
  <link rel="stylesheet" href="Includes/stylesheets/hdft.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="Includes/stylesheets/overlay.css">
  <title>OEUVRE</title>
</head>

<body>
<section id="nav-bar">
 <nav class="navbar fixed-top navbar-expand-lg navbar-light ">
     <a class="navbar-brand" href="#"><img src="../Includes/img/logol.png" width="100" height="50" ></a>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">CMS ADMIN</h1>
        <div class="list-group">
          <a href="Upload.php" class="list-group-item">Upload</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">


        <h5>Recently Submitted Posts(Red if we found profane words):</h5>
        <div class="row">


        <!-- shows all recently submitted posts, for review by admin, footers is red if said post contains profane words, else green -->


<?php
$statement = $db->prepare("select * From postDetails;");
$result = $statement->execute();
while ($row = $result->fetchArray()){ ?>
        <div class="col-md-4 pb-1 pb-md-0">
        <div class="card shadow bg-light">
            <a href="viewer.php?file=<?php echo $row['profanity']. '-posts/'. $row['Title']; ?>.html"><img class="card-img-top" src="/Includes/posts/images/<?php echo $row['Title']; ?>/blog1.jpg" alt="Card image cap"></a>
            <div class="card-body">
              <h5 class="card-title"><?php echo str_replace("_"," ", $row['Title']); ?></h5>
              <p class="card-text"><?php echo $row['small_content']; ?></p>
              <a href="viewer.php?file=<?php echo $row['profanity'].'-posts/'. $row['Title']; ?>.html" class="btn">View Article</a>
            </div>
          </div>
        </div>
<?php } ?>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->


  <!-- Bootstrap core JavaScript -->
  <script src="/includes/js/jquery.min.js"></script>
  <script src="/includes/js/dashboard.min.js"></script>

    </body>
</html>

<?php

include '../Database/connect.php';
session_start();

$username = $_SESSION['user'];

if (empty($username)){
	header("Location: index.php");
}

?>