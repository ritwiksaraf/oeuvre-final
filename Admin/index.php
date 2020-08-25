<?php
    include 'Database/connect.php';

    $username= $_POST['user'];
    $password= hash("sha256", $_POST['pass']);

    $statement = $db->prepare('SELECT * FROM Admin WHERE username=? AND password=?');
    $statement->bindValue(1, $username);
    $statement->bindValue(2, $password);
    $result = $statement->execute();

    if(!empty($username) && !empty($password)){
    if(empty($result->fetchArray(SQLITE3_ASSOC))){
        echo "<script>alert('Invalid Credentials')</script>";
        }
    else{
        session_start();
        $_SESSION['user'] = $username;
        $random = md5(rand(1,1000)); //encoded with md5, avoid bad string output.
        setcookie($username, $random, time()+3600);
        header("Location: dashboard.php");
        }
    }

    ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../Inludes/img/small_icon.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../Includes/css/style.css">
    <link rel="stylesheet" href="../Includes/stylesheets/style.css">
    <link rel="stylesheet" href="../Includes/stylesheets/hdft.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>OEUVRE</title>
  </head>

  <body>

   <!--------navigation bar------------>
   <section id="nav-bar">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light ">
        <a class="navbar-brand" href="#"><img src="../Includes/img/logo.png" width="100" height="50" ></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>
</section>


<br><br><br><br><br>

<!-----------------forms-->

<div id="boxform" class="form-group">
  <h1 class="display-4" >Login</h1>
  <br><br>

  <form action='index.php' method="POST">
  <input type="email" id="exampleInputEmail1" class="form-control" name="user" placeholder="Login" style="margin-bottom:1vw;">
  <input type="password" id="exampleInputPassword1" class="form-control" name="pass" placeholder="Password" style="margin-bottom:1vw;">
  <input type="submit" class="btn btn-danger" value="Log In" name="sumbit-btn">
  </form>
  <p>Are you an user?Click <a href="/">here </a>to login</p>
</div>























  <!-- Site footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="row">


        <div class="col-sm-1 col-md-3">


          <a  href="#"><img src="../Includes/img/mr carter.png" width="150px" height="250px" ></a>

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
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="../Includes/scripts/script.js"></script>
</body>
</html>
