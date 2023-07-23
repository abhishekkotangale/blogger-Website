<?php

    include '../assets/connection.php';
    
    
        $bid = $_GET['updateblog'];
        $showquery = "select * from blogs where bid='$bid' ";
        $showData = mysqli_query($con,$showquery);
    
        $row = mysqli_fetch_array($showData);
    
    
    if(isset($_POST['submit'])){

        $title = mysqli_real_escape_string($con , $_POST['title']);
        $shortDesc = mysqli_real_escape_string($con , $_POST['shortDesc']);
        $tags = mysqli_real_escape_string($con , $_POST['tags']);
        $description = mysqli_real_escape_string($con , $_POST['description']);
        $blogimg =  $_FILES['blogimg'];
    
        $filename = $blogimg['name'];
        $filepath = $blogimg['tmp_name'];
        $fileerror = $blogimg['error'];
        
    
        if($fileerror == 0){
            $destfile = '../blogImg/'.$filename;
    
            move_uploaded_file($filepath,$destfile);
    
            
    
            
    
            $updatequery = "update blogs set title='$title',shortDesc='$shortDesc', tags='$tags' ,description='$description',image = '$destfile' where bid='$bid'";
    
            $query = mysqli_query($con,$updatequery);
    
            if($query){
                header('location:dashboard.php');
            }else{
                echo "not inserted";
            }
        }
    }
    
?>
    
    <?php include('user_nav.php'); ?>
    
    <div class="content pt-lg-5">
            <center>
                <h4>Update Blog</h4>
            </center>
            <form class="container" action="blogdatasubmit.php" method="post">
                <div class="mb-3">
                    <input type="text" class="form-control" Placeholder="Enter Your Blog Title" name="title" value="<?php echo $row['title'];?>" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" Placeholder="Enter Your Short Desc" name="shortDesc" value="<?php echo $row['shortDesc'];?>" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" Placeholder="Enter Tags" name="tags" value="<?php echo $row['tags'];?>" required>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="description" required><?php echo $row['description']; ?></textarea>
                </div>
                <div class="mb-3">
                    <input type="file" class="form-control" name="blogimg">
                </div>
                <center><button type="submit" class="btn btn-primary mb-4 " name="submit">Preview</button></center>
            </form>
        </div>
?>