<?php 
    session_start();
    
    include('../assets/connection.php');
    
    include('user_nav.php');
    $uid = $_SESSION['id'];

    if (isset($_GET["bid"])) {
        $id = mysqli_real_escape_string($con, $_GET["bid"]);

        $sql = "SELECT * FROM blogs , users WHERE bid = $id";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);


            ?>

                <div class="container pt-lg-5 pb-lg-5">
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
                        <div class="me-auto"><p>Author: <?php echo $row['username']; ?></p></div>
                        <div class="ms-auto"><p>Publish on: <?php echo $row['date']; ?></p></div>
                    </div>
                    <img src="<?php echo $row['blogImg'];?>" width="100" height="100" class="card-img-top mt-lg-4 mb-lg-5" alt="..." style="height: 400px;">
                    <p class="pb-lg-4"><?php echo nl2br($row['description']); ?></p>

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
                                    <a href="submitblog.php?submitblog=<?php echo $row['bid']; ?>" style="border:2px solid black; padding:12px; border-radius:50px; color:black; text-decoration:none;">Submit</a>
                                <?php
                            }
                        ?>
                        
                    </center>
                </div>

            <?php
            
        } else {
            echo "No data found.";
        }
    } else {
        echo "Invalid ID parameter.";
    }

    include('../assets/footer.php');
?> 