<?php

include '../Database/connect.php';

?>

    <div class="container">
        <div class="row text-center">
                      <?php
          $statement = $db->prepare("select * From approvedPosts limit 4 tags = 'creative';");
          $result = $statement->execute();
          while ($row = $result->fetchArray()){ ?>
            <div class="col-sm-12 pb-1 pb-md-0">
                <div class="card shadow bg-primary">
                    <a href="posts/<?php echo $row['Title']; ?>.html"><img class="card-img-top"
                            src="/Includes/posts/images/<?php echo $row['Title']; ?>/image1.jpeg"
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