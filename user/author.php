 <?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <style>
        .allBlogs , .allDrafts , .addBlogBut{
            cursor: pointer;
        }
        .allBlogs{
            border-bottom: 2px solid rgb(133, 76, 230);
        }
    </style>
</head>
<body>

    <?php 
    
        include('user_nav.php'); 
        include('../assets/connection.php');
        $uid = $_GET['authorinfo'];
        $fuid =$_SESSION['uid'];
        $userdataquery = "select * from users where uid='$uid' ";
        $userShowData = mysqli_query($con,$userdataquery);
        $userData = mysqli_fetch_array($userShowData);

        $userblogquery = "SELECT COUNT(*) AS row_count FROM blogs WHERE uid='$uid' and blogStatus='Published'";
        $userblogData = mysqli_query($con, $userblogquery);
        if ($userblogData) {
            $userblog = mysqli_fetch_array($userblogData);
            $row_count = $userblog['row_count'];
        }

    
    ?>

    
    <div class="container pt-lg-5 pt-5">
        <div class="row">
            <div class="col-3">
                <img src="<?php echo $userData['avatar']; ?>" alt="User Profile"  class="img-fluid rounded-circle" style="height: 250px; width: 250px;">
            </div>
            <div class="col-6 p-lg-5">
                <h3 style="padding-left: 40px;"><b><?php echo $userData['username'] ?></b></h3>
                <p class="pt-lg-2" style="padding-left: 40px;"><b><?php echo $row_count; ?></b> &rightarrow; Blogs || <b>0</b> &rightarrow; Follower || <b>0</b> &rightarrow; Following </p>
                <p class="pt-lg-1" style="padding-left: 40px;"><?php echo $userData['bio'] ?></p>
            </div>
        </div>
    </div>


    

    

    
        <div class="container">
          
            <div class="d-flex p-lg-4 justify-content-center">
                <div class="allBlogs p-lg-4">All Blogs</div>
            </div>
            
          
           <div class="blogs">
                <div class="album py-5 bg-body-tertiary">
                    <div class="container">

                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        
                        <?php 
                include('../assets/connection.php');
                $selectQuery = "SELECT * FROM blogs WHERE uid = '$uid' and blogStatus='Published' order by bid desc";
                $query = mysqli_query($con , $selectQuery);
                while($result = mysqli_fetch_array($query)){

                  ?>
                            <div class="col">
                            <div class="card shadow-sm">
                            <img src="<?php echo $result['blogImg'];?>" class="card-img-top" alt="...">
                                <div class="card-body pt-md-4">
                                <h2><?php echo $result['title']; ?></h2>
                                <p class="card-text pt-md-2"><?php echo $result['shortDesc']; ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                    <a class="btn btn-sm btn-outline-secondary" href="preview.php?bid=<?php echo $result['bid']; ?>">View</a>
                                    </div>
                                    <small class="text-body-secondary"><?php echo $result['date']; ?></small>
                                </div>
                                </div>
                            </div>
                            </div>  
                            <?php
                                 }
                             ?> 
                        </div>
                        </div>
                </div>
           </div>
          
                </div>
           </div>
          
        </div>

      <?php include('../assets/footer.php'); ?>
      
      <script src="../js/tabs.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>