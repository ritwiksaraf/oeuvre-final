<?php
    include 'Database/connect.php';
    
    $username= $_POST['user'];
    $password= hash("sha256", $_POST['pass']);

    $statement = $db->prepare('SELECT * FROM User WHERE username=? AND password=?');
    $statement->bindValue(1, $username);
    $statement->bindValue(2, $password);
    $result = $statement->execute();

    if(!empty($username) && !empty($password)){
        if(!empty($result-> fetchArray(SQLITE3_ASSOC))){
            session_start();
            $_SESSION['user'] = $username;
            $random = md5(rand(1,1000)); //encoded with md5, avoid bad string output.
            setcookie($username, $random, time()+3600);
            header("Location: Blog/home.php");
        }
    else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
    }

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
    <link rel="stylesheet" href="Includes/stylesheets/buttons.css">
    <link rel="stylesheet" href="Includes/stylesheets/forms.css">


    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Includes/stylesheets/extramainpageopening.css">
    <title>Login Page | Oeuvre | FCRIT Official Blog</title>
    <!--todo Font new for header-->
    <link href="https://fonts.googleapis.com/css2?family=Sedgwick+Ave&display=swap" rel="stylesheet">
    <style>
        .font-new {
            font-family: "Sedgwick Ave", cursive;
        }
    </style>
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
            <a class="navbar-brand logold" href="Blog/home.php"><img src="../Includes/img/logo.png"></a>


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
                        <h1 class="text-center font-new">Login</h1>
                        <br>
                        <form action='index.php' method="POST">
                            <input type="email" id="exampleInputEmail1" class="form-control" id="user" name="user"
                                placeholder="Email" style="margin-bottom:1vw;">
                            <input type="password" id="exampleInputPassword1" class="form-control" id="pass" name="pass"
                                placeholder="Password" style="margin-bottom:1vw;">
                            <input type="checkbox" class="pr-3" required id="privacypolicycheckbox"
                                name="privacypolicycheckbox" value="check">
                            <label for="privacypolicycheckbox">I have read and agreed to the
                                <a data-toggle="modal" data-target="#staticBackdrop" href="#"
                                    style="text-decoration: none;">policy
                                    documents</a>
                            </label><br>
                            <input type="submit" class="btn btn-block py-3 button-login" value="LOGIN"
                                name="sumbit-btn">
                        </form><br>
                        <p>Are you an admin?Click <a style="text-decoration: none;" href="Admin/">here </a>to login</p>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
            <!--todo modal code starts here-->
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="staticBackdropLabel">Privacy Policy</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="">
                                    <p class="text-justify">
                                    <h1 class="text-center">GENERAL POLICY</h1>
                                    To maintain the integrity of the content displayed on the webpage is a sole
                                    responsibility of the team
                                    working to ensure maximum user satisfaction and competitive reader standards.
                                    The writers and contributors
                                    of the blog are part of this team and will have made a great contribution by
                                    ensuring the removal and
                                    omission of ideas conflicting areas of common interest and/or ideas and words
                                    that surpass the general level
                                    of social acceptance. While we work our hardest to ensure that every article is
                                    thoroughly edited before
                                    getting passed, it will be a great promotion to our vigor to know that the users
                                    consider this policy sacred
                                    and hold this project as close to their hearts as we do<br><br>
                                    1. The content submitted must remain in all aspects neutral to all ideas of
                                    religion, faith and any topics
                                    related to caste, country, race and gender. Any grey area that lies in the
                                    greater meaning of any posts
                                    shall be omitted from the post. The final authority in case of any
                                    misunderstanding or misuse of the
                                    writer's power shall lie with the administration and will be dealt with in
                                    strict measures
                                    <br>2. To ensure originality the content must be written and thought of by the
                                    user. A breach in this policy
                                    will lead to immediate termination of the post and subsequent offence of any
                                    manner would lead to
                                    termination of the user service and account
                                    <br>3. The blog is a place for academic recreation. Any topic beyond the scope
                                    of this vector shall be
                                    considered an attempt to deviate and will lead to termination of the post
                                    <br>4. The idea once submitted over the portal shall be considered the content
                                    of the blog and is free to
                                    get moderated or edited or even rewritten as per the moderator and the editor.
                                    However, the original credit
                                    to the article shall remain untouched
                                    <br>5. The breach of the policy or any other social decorum over the blog shall
                                    lead to the termination of
                                    the account permanently and shall get reported to the authorities with immediate
                                    effect.
                                    <br><br>CONTENT POLICY-
                                    <br>1. The content posted on “Oeuvre FCRIT” will be solely the property of the
                                    website, the authors of every
                                    post shall be given credit in the Author Page section of the website
                                    <br>2. The content submitted to the website must remain original. Any copied
                                    content or content that
                                    violates the user rights of any other entity shall be immediately taken down and
                                    will cause an immediate
                                    termination of the user account that submitted it
                                    <br>3. No content submitted to the website shall contain any words, pictures or
                                    any other source of
                                    information that could potentially be morally disputable or illegal. Further any
                                    content defaming or evoking
                                    any kind of negative attitude towards the institute shall immediately cause
                                    termination of the respective
                                    post and the user. Any such attempts will prompt the use of strong action from
                                    the side of the institution
                                    and result in irreversible deletion of the said account and further blocking the
                                    user from interacting with
                                    the website
                                    <br>4. Use of any obscene or morally questionable content for whatsoever reasons
                                    shall be dealt with the
                                    strictest of measures and the identity of the defaulter shall be reported to the
                                    highest authorities of the
                                    institution.
                                    <br>5. A minor default shall include any socially disproportionate idea which
                                    shall cause the reported post
                                    to be taken down immediately. A repeated default and lacking of following any of
                                    the content policies shall
                                    result in termination of the user from the website
                                    <br>6. A major default like the breach of originality clause or the use of
                                    strong language with weak basis
                                    or boundaries shall cause the termination of the account and the defaulter shall
                                    be reported to the higher
                                    authorities
                                    <br>7. The content submitted to the website should remain spam free, in line
                                    with the general philosophy of
                                    decency and the management shall remain the final authority on deciding the
                                    nature of the submitted article
                                    in the website
                                    <br>8. The Website is for creative and informative purposes only thus any topics
                                    or post that are beyond
                                    these scopes shall be excluded from consideration
                                    <br>9. The users shall have to undergo extreme consequences if the privacy or
                                    content policy of the website
                                    is not followed.
                                    <br>10. Sharing of the website content outside the bounds of the website using
                                    it shall remain forbidden
                                    unless prompted by the author.
                                    <br>11. Any content must follow basic criteria of human social behavior, rules
                                    and regulations set by the
                                    institution and must remain within the bounds of consideration during the
                                    submission.
                                    <br>12. The website owners, institution or management shall have the entire
                                    authority to decide the fate of
                                    the article or content posted on the website
                                    <br>13. The content must undergo thorough consideration before getting passed to
                                    be displayed on the
                                    website.
                                    <br><br>PRIVACY POLICY
                                    <br>No content, view or ideas from the blog shall be shared with anyone besides
                                    the students and faculty at
                                    Fr. C. Rodriguez institute. Failure to comply with the content sharing or any
                                    other clause in the general
                                    policy shall result in immediate termination of the account and subsequent
                                    sharing of user details with the
                                    institution management for further processing.
                                    <br>1. The user accounts are part of the user interface and are not customizable
                                    to the user request. The
                                    user information shall not be used by any other outside sources to access the
                                    website.
                                    <br>2. The website shall remain in the beta phase and all the user accounts
                                    shall be used to test the
                                    feasibility of features.
                                    <br>3. No other data or account passwords are collected by the website.
                                    <br>4. The website may use cookies to maximize the usability in the future.
                                    <br>5. Every user is responsible for their own state of mind and the management
                                    or the blog shall not be
                                    responsible for the harm or emotional stress caused by the material posted on
                                    the blog.
                                    <br>6. The user must remain beware of malicious content and websites. No part of
                                    our website will ask for
                                    any details or personal queries such as credit card numbers, account passwords
                                    etc.
                                    <br>7. The website shall remain private and accessible to only people inside Fr.
                                    C Rodriguez institute.
                                    <br><br> MODERATORS POLICY
                                    <br>The moderators and the team members continue to remain the core members of
                                    the Oeuvre team and are
                                    require to shoulder this responsibility keeping in mind the consequences of
                                    failure to comply with the
                                    general rules and regulations and the code of conduct of the institute and the
                                    website. The moderators are
                                    the pillars of the content and are expected to hold up the standard of the
                                    articles that flow through to the
                                    final live version of the blog. The moderators are requested to keep in mind the
                                    following-
                                    <br>1. No part of the blog shall remain unedited before going live on the
                                    webpage.
                                    <br>2. Every part of every article must be thoroughly scrutinized before
                                    proceeding
                                    <br>3. The moderators must remain alert irrespective of the origin and flagging
                                    of the post.
                                    <br>4. The idea of free content is limited only by the bounds of culture and
                                    values of this institution.
                                    Failure to recognize those is a grave misdemeanor and on recognition shall be
                                    dealt with harsh measures.
                                    <br>5. The moderators remain responsible of ensuring the availability of content
                                    in the website and are
                                    required to process, edit, rewrite and correct any article received to maintain
                                    the steady flow of articles.
                                    <br>6. No part of any articles shall remain unread by the Moderators as well as
                                    the faculty representatives
                                    to ensure maximum security.
                                    <br>7. The moderators who do not wish to take up the responsibility shall be
                                    overseen via senior moderators
                                    who remain final authority on creative matters.
                                    <br>8. Any reproduced or recycled part of any post of the blog if detected by
                                    the moderators should
                                    immediately be reported to the administration. Failure to do so will be
                                    considered as a breach of the job
                                    requirement and the responsibility entrusted within the moderator's job.
                                    <br>9. It is the duty of every moderator to avert any kind of oncoming apparent
                                    blunders and to efficiently
                                    manage every article to ensure that no violation of policy gets off free of
                                    official consequences. Any
                                    moderator failing to report the violation in policy shall be placed under
                                    training under the administrator
                                    and repeat offenders shall be dealt with strict measures.

                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-block" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--todo modal code Ends here-->

            <!--todo steps to use start-->
            <div id="scrollforstepstouse" class="box-steps-to-use">
                <h1 class=" text-center my-5 font-new">How can I upload my content? </h1>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card team-item" style="height: 14rem;">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Step 1</h5>
                                    <p class="card-text">Create your content which is interesting.<br> <br></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card team-item" style="height: 14rem;">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Step 2</h5>
                                    <p class="card-text">Login to our website and choose upload content.<br></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card team-item" style="height: 14rem;">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Step 3</h5>
                                    <p class="card-text">Our Moderator's team consisting of college faculties and
                                        students will
                                        review your Article.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card team-item" style="height: 14rem;">
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
                <h1 class="text-center font-new">Languages & Frameworks</h1>
                <div class="container">
                    <br>
                    <div class="row text-center">
                        <div class="col-xl-2 col-sm-6 p-5"><i style="color:darkorange" class="fa fa-5x fa-html5"></i>
                        </div>
                        <br>
                        <div class="col-xl-2 col-sm-6  p-5"><i style="color:rgb(41, 125, 194)"
                                class="fa fa-5x fa-css3"></i>
                        </div><br>
                        <div class="col-xl-2 col-sm-6 p-5"><i style="color:#ffdd01;" class="fab fa-5x fa-js"></i></div>
                        <br>
                        <div class="col-xl-2 col-sm-6 p-5 text-center">
                            <svg style="color:rgb(153, 0, 255)" xmlns="http://www.w3.org/2000/svg" height="70"
                                class="d-block" viewBox="0 0 118 94" role="img">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"
                                    fill="currentColor">
                                </path>
                            </svg>
                        </div>
                        <br>
                        <div class="col-xl-2 col-sm-6  p-5"><i style="color:#8892BF;" class='fab fa-5x fa-php'></i>
                        </div><br>
                        <div class="col-xl-2 col-sm-6  p-5"><i style="color:rgb(0, 0, 0)"
                                class="fab fa-5x fa-python"></i>
                        </div><br>
                    </div>
                    <br>
                </div>
            </div>
            <!--todo programming languages-end-->
        </div>
    </div>
    <!--todo forms-->



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