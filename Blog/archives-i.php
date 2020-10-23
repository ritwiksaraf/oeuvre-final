<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../Includes/img/small_icon.png" />
  <title>Informative | Archives | OEUVRE</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/Includes/stylesheets/hdft.css">
  <link rel="stylesheet" href="/Includes/stylesheets/archives-c.css">
  <link rel="stylesheet" href="/Includes/stylesheets/dark-mode.css">

</head>

<body>
  <!--!navigation bar------------>
  <div class="footer1 text-center">
    <a href="https://fcrit.ac.in/" id="nameofclg" target="_blank">Fr. C. Rodrigues Institute of Technology, Vashi, Navi
      Mumbai, India</a>
  </div>
  <section id="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand logold" href="home.php"><img src="../Includes/img/logo.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item ml-auto">
            <div class="nav-link custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" id="darkSwitch">
              <label class="custom-control-label" for="darkSwitch"><i class="fa fa-moon-o"></i></label>
            </div>
          </li>
          <li class="nav-item ml-auto">
            <div class="dropdown nav-link ml-auto">
              <button class="dropbtn" href="">ARCHIVES</button>
              <div class="dropdown-content">
                <a href="archives-c.php">Creative</a>
                <a href="archives-i.php">Informative</a>
              </div>
            </div>
          </li>
          <li class="nav-item ml-auto">
            <a class="nav-link" href="faq.html">F.A.Q.</a>
          </li>
          <li class="nav-item ml-auto">
            <a class="nav-link" href="construction.html">HUMANS OF AGNELS</a>
          </li>
          <li class="nav-item ml-auto">
            <a class="nav-link" href="aboutus.html">ABOUT US</a>
          </li>
        </ul>
      </div>
    </nav>
  </section>
  <!--!navigation bar end-->
  <br><br>
  <!---------------------------------->
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 sticky">
        <!--!don't remove bg& fixed or effect will not take place-->
        <!--!even sticky-right works -->
        <section id="leftnavbar">
          <h5 class="display-5 text-center"><i>Navigation Menu</i></h5>
          <div class="accordion shadow" id="accordionExample">
            <div class="card bg-primary">
              <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn  btn-block collapsed" type="button" data-toggle="collapse"
                    data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    Informative
                  </button>
                </h2>
              </div>
              <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                  <a href="#guidancescroll" type="button" class="btn btn-secondary  btn-block">Senior Guidance</a>
                  <a href="#tutorialscroll" type="button" class="btn btn-secondary   btn-block">Tutorials</a>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <br>
      <div class="col-lg-9 bg-light">
        <!--!informative start-->
        <h3 id="guidancescroll" class="display-3 text-center">Informative Section</h3>
        <hr>
        <div class="container">
          <div class="row text-center">
                        <?php
            $statement = $db->prepare("select * From approvedPosts where tags='i';");
            $result = $statement->execute();
            while ($row = $result->fetchArray()){ ?>
              <div class="col-md-4 pb-1 pb-md-0">
                  <div class="card shadow bg-light">
                      <a href="posts/<?php echo $row['Title']; ?>.html"><img class="card-img-top"
                              src="../Includes/posts/images/<?php echo $row['Title']; ?>/image1.jpeg"
                              alt="Card image cap"></a>
                      <div class="card-body">
                          <h5 class="card-title"><?php echo str_replace("_"," ", $row['Title']); ?></h5>
                          <p class="card-text"><?php echo $row['small_content']; ?></p>
                          <a href="posts/<?php echo $row['Title']; ?>.html" class="btn">View Article</a>
                      </div>
                  </div>
              </div>
              <?php } ?>
          </div>
      </div>
        <!--!Senior Guidance starts-->
        <h4 class="display-4 text-center ">Senior Guidance</h4>
        <div class="container">
          <div class="row text-center">
            <div class="col-md-4 pb-1 pb-md-0">
              <div class="card shadow bg-primary">
                <a href=""><img class="card-img-top" src=""></a>
                <div class="card-body">
                  <h5 class="card-title"></h5>
                  <p class="card-text"></p>
                </div>
              </div>
            </div>
            <div class="col-md-4 pb-1 pb-md-0">
              <div class="card shadow bg-primary">
                <a href=""><img class="card-img-top" src=""></a>
                <div class="card-body">
                  <h5 class="card-title"></h5>
                  <p class="card-text"></p>
                </div>
              </div>
            </div>
            <div class="col-md-4 pb-1 pb-md-0">
              <div class="card shadow bg-primary">
                <a href=""><img class="card-img-top" src=""></a>
                <div class="card-body">
                  <h5 class="card-title"></h5>
                  <p class="card-text"></p>
                </div>
              </div>
            </div>
          </div>
          <div class="row text-center mt-4">
            <div class="col-md-4 pb-1 pb-md-0">
              <div class="card shadow bg-primary">
                <a href=""><img class="card-img-top" src=""></a>
                <div class="card-body">
                  <h5 class="card-title"></h5>
                  <p class="card-text"></p>
                </div>
              </div>
            </div>
            <div class="col-md-4 pb-1 pb-md-0">
              <div class="card shadow bg-primary">
                <a href=""><img class="card-img-top" src=""></a>
                <div class="card-body">
                  <h5 class="card-title"></h5>
                  <p class="card-text"></p>
                </div>
              </div>
            </div>
            <div class="col-md-4 pb-1 pb-md-0">
              <div class="card shadow bg-primary">
                <a href=""><img class="card-img-top" src=""></a>
                <div class="card-body">
                  <h5 class="card-title"></h5>
                  <p id="tutorialscroll" class="card-text"></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--!Senior guidance end-->
        <!--!tutorials start-->
        <h4 class="display-4 text-center">Tutorials</h4>
        <div class="container">
          <div class="row text-center">
            <div class="col-md-4 pb-1 pb-md-0">
              <div class="card shadow bg-primary">
                <a href=""><img class="card-img-top" src=""></a>
                <div class="card-body">
                  <h5 class="card-title"></h5>
                  <p class="card-text"></p>
                </div>
              </div>
            </div>
            <div class="col-md-4 pb-1 pb-md-0">
              <div class="card shadow bg-primary">
                <a href=""><img class="card-img-top" src=""></a>
                <div class="card-body">
                  <h5 class="card-title"></h5>
                  <p class="card-text"></p>
                </div>
              </div>
            </div>
            <div class="col-md-4 pb-1 pb-md-0">
              <div class="card shadow bg-primary">
                <a href=""><img class="card-img-top" src=""></a>
                <div class="card-body">
                  <h5 class="card-title"></h5>
                  <p class="card-text"></p>
                </div>
              </div>
            </div>
          </div>
          <div class="row text-center mt-4">
            <div class="col-md-4 pb-1 pb-md-0">
              <div class="card shadow bg-primary">
                <a href=""><img class="card-img-top" src=""></a>
                <div class="card-body">
                  <h5 class="card-title"></h5>
                  <p class="card-text"></p>
                </div>
              </div>
            </div>
            <div class="col-md-4 pb-1 pb-md-0">
              <div class="card shadow bg-primary">
                <a href=""><img class="card-img-top" src=""></a>
                <div class="card-body">
                  <h5 class="card-title"></h5>
                  <p class="card-text"></p>
                </div>
              </div>
            </div>
            <div class="col-md-4 pb-1 pb-md-0">
              <div class="card shadow bg-primary">
                <a href=""><img class="card-img-top" src=""></a>
                <div class="card-body">
                  <h5 class="card-title"></h5>
                  <p class="card-text"></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--!Tutorials end-->
        <!--!informative end--->
      </div>
      <!--!----------end of div of col-9-right side column----->
    </div>
  </div>
  <br><br>
  <!--todo Footer Starts-->
  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-1 col-md-3 col-xl-3">
          <a href="#"><img class="mx-auto d-block" src="../Includes/img/mr carter.png" width="250" height="250px"></a>
        </div>
        <div class="col-sm-12 col-md-6">
          <h6 class="text-center"><b>About</b></h6>
          <p class="text-center">The official blog of Fr. C. Rodrigues Institute of Technology showcasing the up and
            coming creative talent in the institution. The Website is a showcase to the immense potential of engineering
            students around the world.</p>
        </div>
        <div class="col-xs-6 col-md-3">
          <h6 class="text-center">Sections</h6>
          <ul class="footer-links" style="text-align:center;">
            <li><a href="archives-c.html#articlescroll">Articles</a></li>
            <li><a href="archives-c.html#poemscroll">Poems</a></li>
            <li><a href="archives-c.html#graphicscroll">Graphic Arts</a></li>
            <br>
            <li><a href="faq.html">FAQ</a></li>
            <li><a href="archives-i.html#guidancescroll">Senior Guidance</a></li>
            <li><a href="archives-i.html#tutorialscroll">Tutorials</a></li>
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
        <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li><a class="instagram" href="https://www.instagram.com/oeuvre.fcrit/" target="_blank"><i
                  class="fa fa-instagram"></i></a></li>
            <li><a class="facebook" href="https://www.facebook.com/Oeuvre-114987203566335/" target="_blank"><i
                  class="fa fa-facebook"></i></a></li>
            <li><a class="twitter" href="https://twitter.com/oeuvrefcrit" target="_blank"><i
                  class="fa fa-twitter"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!--!footer end-->
  <!-- !Optional JavaScript -->
  <!-- !jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"></script>
  <script src="../Includes/scripts/dark-mode-switch.min.js"></script>
</body>

</html>