
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>

  <?php

    include '../assets/connection.php';


    $id = $_GET['updateblog'];
    $showquery = "select * from blogs where bid='$id' ";
    $showData = mysqli_query($con,$showquery);

    $result = mysqli_fetch_array($showData);

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
            $destfile = '../postuploadimg/' . $filename;
    
            move_uploaded_file($filepath,$destfile);
    
            
    
            
    
            $updatequery = "update blogs set title='$title',shortDesc='$shortDesc', tags='$tags' ,description='$description',blogImg = '$destfile' where bid='$id'";
    
            $query = mysqli_query($con,$updatequery);
    
            if($query){
                $redirectUrl = 'preview.php?bid=' . urlencode($id);
                header('Location: ' . $redirectUrl);
            }else{
                echo "not inserted";
            }
        }
    }
    

?>
    <?php include('user_nav.php') ?>

    <div class="container-fluid form">
    <div class="container update-form">
        <div class="upload-form">
            <center>
                <h4>Update Blog</h4>
            </center>

            <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                    <input type="text" class="form-control" Placeholder="Enter Your Blog Title" name="title" value="<?php echo $result['title'];?>" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" Placeholder="Enter Your Short Desc" name="shortDesc" value="<?php echo $result['shortDesc'];?>" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" Placeholder="Enter Tags" name="tags" value="<?php echo $result['tags'];?>" required>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="description" required><?php echo $result['description']; ?></textarea>
                </div>
                <div class="mb-3">
                    <input type="file" class="form-control" name="blogimg">
                </div>
                <center><button type="submit" class="btn btn-primary mb-4 " name="submit">Update</button></center>

            </form>
        </div>
    </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>