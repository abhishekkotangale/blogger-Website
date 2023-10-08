<?php 
    session_start();
    if(!isset($_SESSION['username_u'])){
        header('location:../index.html');
    }
    
    include('../assets/connection.php');
    
    
    $uid = $_SESSION['uid'];
    if (isset($_GET["bid"])) {
        $id = mysqli_real_escape_string($con, $_GET["bid"]);

        $sql = "SELECT * FROM blogs inner join users on blogs.uid = users.uid WHERE bid = $id";
        $result = mysqli_query($con, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);


            ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Blog : <?php echo  $row['title']; ?></title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  </head>
  <body>

    <?php include('user_nav.php'); ?>



                <div class="container mt-5 pb-lg-5">
                    <div class="row">
                        <div class="mb-3 col-lg-11 col-md-10 col-6"><a id="backButton" style="margin-top:25px;color:black; cursor:pointer;"><i class="fas fa-arrow-left" style="padding-right:12px;"></i>Go Back</a></div>
                    </div>
                    <?php 
                        if(($row['blogStatus']=='preview') and ($row['uid']==$uid)){
                            ?>
                                <h4><span class="badge bg-secondary">Preview</span></h4>
                                <p class="text-danger">You have not Publish this post yet</p>

                            <?php
                        }
                    ?>
                    <h1><?php echo  $row['title']; ?></h1>
                    <div class="d-flex">
                        <div class="me-auto"><p>Author: <a href="author.php?authorinfo=<?php echo $row['uid'];?>"><?php echo $row['username']; ?></a></p></div>
                        <div class="ms-auto"><p><span class="text-success">Publish on: </span><?php echo $row['date']; ?></p></div>
                    </div>
                    <div>
                        <img src="<?php echo $row['blogImg'];?>" width="100" height="100" class="card-img-top mt-lg-4 mb-lg-5" alt="..." style="height: 400px;">
                    </div>
                    <p class="mt-4"><?php echo nl2br($row['description']); ?></p>

                    <center>
                        <?php 
                            if(($row['blogStatus']=='Published') and ($row['uid']==$uid)){
                                ?>
                                    <a href="deleteblog.php?deleteblog=<?php echo $row['bid']; ?>" style="border:2px solid black; padding:12px; border-radius:50px; color:black; text-decoration:none;" class="me-lg-5">Delete Blog</a>
                                    <a href="updateblog.php?updateblog=<?php echo $row['bid']; ?>" style="border:2px solid black; padding:12px; border-radius:50px; color:black; text-decoration:none;" class="me-lg-5">Update</a>
                                <?php

                            }else if(($row['blogStatus']=='preview') and ($row['uid']==$uid)){
                                ?>
                                    <a href="deleteblog.php?deleteblog=<?php echo $row['bid']; ?>" style="border:2px solid black; padding:12px; border-radius:50px; color:black; text-decoration:none;" class="me-lg-5">Delete Blog</a>
                                    <a href="updateblog.php?updateblog=<?php echo $row['bid']; ?>" style="border:2px solid black; padding:12px; border-radius:50px; color:black; text-decoration:none;" class="me-lg-5">Update</a>
                                    <a href="submitblog.php?submitblog=<?php echo $row['bid']; ?>" style="border:2px solid black; padding:12px; border-radius:50px; color:black; text-decoration:none;">Publish</a>
                                <?php
                            }
                        ?>
                        
                    </center>
                </div>

                <div class="container mt-5">
                    <center>
                        <h1>Comment</h1>
                    </center>
                    <center>
                    <form action="postcomment.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="bid" value="<?php echo htmlspecialchars($id); ?>">
                        <div class="mb-3">
                            <textarea class="form-control" name="comment" rows="3" placeholder="Type Your Comment Here..."></textarea>
                        </div>
                        <center><button type="submit" class="btn btn-primary mb-4 " name="submit">Post</button></center>
                    </form>
                    
                </div>
                


            

                <div class="container" style="width:50%; margin:auto;">
                <?php

                    $commentsqlquery = "SELECT * FROM comments inner join users on comments.uid = users.uid WHERE bid = $id";
                    $comments = mysqli_query($con, $commentsqlquery);
            
                    while($commentsresult = mysqli_fetch_array($comments)){
                
                ?>
                    <div class="mb-4">
                       <div class="row">
                            <div class="col-lg-1 col-md-2 col-4"><img style=" border-radius:50px;" src="<?php echo $commentsresult['avatar']; ?>" alt="" srcset="" width="40px" height="40px"></div>
                            <div class="col-lg-4 col-md-5 col-8" style=" float:left";><h4 style=" float:left;"><?php echo $commentsresult['username']; ?></h3></div>
                            <div class="col-lg-3 col-md-4 col-12"><p><?php echo $commentsresult['timestamps']; ?></p></div>
                            
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-1 col-md-2"></div>
                            <div class="col-lg-6 col-md-7"><div style=""><p><?php echo $commentsresult['comment']; ?></p></div></div>
                            <div class="col-lg-5 col-md-3">
                            <?php
                                if(($commentsresult['bid'] == $row['bid']) && ($commentsresult['uid'] == $_SESSION['uid'])){
                                    $msgId = $commentsresult['mid'];
                                    ?>
                                        <a href="deleteComment.php?deleteCommentId=<?php echo $msgId; ?>&bid=<?php echo $id; ?>">Delete</a>
                                    <?php
                                }
                            ?>
                            </div>
                        </div>
                        
                    </div>
                <?php } ?>

                </div>

            <?php
            
        } else {
            echo "No data found.";
        }
    } else {
        echo "Invalid ID parameter.";
    }


    ?>
        
    <?php

    include('../assets/footer.php');
?> 

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="../js/back-page.js"></script>
    <script src="../js/like&save.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>