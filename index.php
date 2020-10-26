<?php
    include 'Database/connect.php';
?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="Includes/img/small_icon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="Includes/stylesheets/style.css">
    <link rel="stylesheet" href="Includes/stylesheets/hdft.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Includes/stylesheets/extramainpageopening.css">
    <title>OEUVRE</title>
</head>

<body>
    <!--todo :NAvigation Bar-->
    <div class="footer1 text-center">
        <a href="https://fcrit.ac.in/" id="nameofclg" target="_blank">Fr. C. Rodrigues Institute of Technology, Vashi,
            Navi
            Mumbai, India</a>
    </div>
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand logold" href="Home.php"><img src="../Includes/img/logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </nav>
    </section>
    <!--todo forms -->
    <div class="outerbox">
        <div class="container containera">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-4 text-center icon">
                    <img width="150px;" src="Includes/img/logincarter.png" alt="">
                </div>
                <div class="col-md-6">
                    <div id="boxform" class="form-group">
                        <h1 class="text-center">Login</h1>
                        <br>
                        <form action='index.php' method="POST">
                            <input type="email" id="exampleInputEmail1" class="form-control" id="user" name="user"
                                placeholder="Email" style="margin-bottom:1vw;">
                            <input type="password" id="exampleInputPassword1" class="form-control" id="pass" name="pass"
                                placeholder="Password" style="margin-bottom:1vw;">
                            <input type="checkbox" required id="privacypolicycheckbox" name="privacypolicycheckbox"
                                value="check">
                            <label for="privacypolicycheckbox">I have read and agreed to the <a style="color:blue; "
                                    onclick="myFunction()">policy
                                    documents</a></label><br>
                            <input type="submit" class="btn btn-block btn-danger" value="Log In" name="sumbit-btn">
                        </form><br>
                        <p>Are you an admin?Click <a href="Admin/">here </a>to login</p>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
            <!--todo steps to use start-->
            <div id="scrollforstepstouse" class="box-steps-to-use">
                <h3 class="display-4 text-center">How to upload on OEUVRE? <i class="fa fa-search"></i></h3>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card shadow" style="height: 14rem;">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Step 1</h5>
                                    <p class="card-text">Create your content which is interesting.<br> <br></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card shadow" style="height: 14rem;">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Step 2</h5>
                                    <p class="card-text">Login to our website and choose upload content.<br></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card shadow" style="height: 14rem;">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Step 3</h5>
                                    <p class="card-text">Our Moderator's team consisting of college faculties and
                                        students will
                                        review your Article.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card shadow" style="height: 14rem;">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Step 4</h5>
                                    <p class="card-text">If your article meets our standard, we will upload the content
                                        to
                                        OEUVRE.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <br><br>
            </div>
            <!--todo steps to use  end-->
            <!--todo programming languages-start-->
            <div class="boxprogramming">
                <h5 class="display-4 text-center">Languages & Frameworks</h5>
                <div class="container">
                    <br>
                    <div class="row text-center">
                        <div class="col-sm-2"><i style="color:darkorange" class="fa fa-5x fa-html5"></i></div><br>
                        <div class="col-sm-2"><i style="color:rgb(41, 125, 194)" class="fa fa-5x fa-css3"></i></div><br>
                        <div class="col-sm-2"><i style="color:#ffdd01;" class="fab fa-5x fa-js"></i></div><br>
                        <div class="col-sm-2 text-center">
                            <svg style="color:rgb(153, 0, 255)" xmlns="http://www.w3.org/2000/svg" height="70"
                                class="d-block" viewBox="0 0 118 94" role="img">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"
                                    fill="currentColor">
                                </path>
                            </svg>
                        </div>
                        <br>
                        <div class="col-sm-2"><i style="color:#8892BF;" class='fab fa-5x fa-php'></i></div><br>
                        <div class="col-sm-2"><i style="color:rgb(0, 0, 0)" class="fab fa-5x fa-python"></i></div><br>
                    </div>
                    <br>
                </div>
            </div>
            <!--todo programming languages-end-->
        </div>
    </div>
    <!--todo forms-->
    <!--TODO: forms-->



    <!--?Script for Privacy Policy--->
    <script>
        function myFunction() {
            var myWindow = window.open("privacypolicy.html", "", "width=500,height=500");
        }
    </script>
    <!--Checkbox script-->


            <!-- todo: Site footer -->
    <footer class="site-footer">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-3 text-center">
                    <a href="#"><img src="Includes/img/mr carter.png" width="250px" height="250px"></a>
                </div>
                <div class="col-md-6">
                    <h6><b>About</b></h6>
                    <p class="text-justify">The official blog of Fr. C. Rodrigues Institute of Technology showcasing the
                        up and coming creative talent in the institution. The Website is a showcase to the immense
                        potential of engineering students around the world.</p>
                </div>
                <div class="col-md-3">
                    <h6>Sections</h6>
                    <ul class="footer-links">
                        <li><a onclick="myFunction()">Privacy policy</a></li>
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
    <!--todo bootstrap Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
        </script>
    <script src="Includes/scripts/script.js"></script>
</body>

</html>


<?php

    $username= $_POST['user'];
    $password= hash("sha256", $_POST['pass']);

    $statement = $db->prepare('SELECT * FROM User WHERE username=? AND password=?');
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
        header("Location: Blog/home.php");
        }
    }

?>