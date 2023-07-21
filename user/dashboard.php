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
</head>
<body style="background-color: lightgreen;">

    <?php include('user_nav.php'); ?>
    
    <div class="container pt-lg-5">
        <div class="row">
            <div class="col-3">
                <img src="<?php echo $_SESSION['avatar']; ?>" alt="" class="img-fluid rounded-circle">
            </div>
            <div class="col-6 p-lg-5">
                <h3 style="padding-left: 40px;"><b><?php echo $_SESSION['username_u'] ?></b></h3>
                <p class="pt-lg-2" style="padding-left: 40px;"><b>111</b> &rightarrow; Blogs || <b>111</b>Follower || <b>111</b>Following </p>
                <p class="pt-lg-1" style="padding-left: 40px;">I write About Technology</p>
            </div>
            <div class="col-3 p-lg-5">
                <a href="addblog.php">Add Blog</a>
            </div>
        </div>
    </div>

    
        <div class="container">
          
            <div class="d-flex p-lg-4 justify-content-center">
                <div class="allBlogs p-lg-4">All Blogs</div>
                <div class="allDrafts p-lg-4">Draft</div>
            </div>
          
          
           <div class="blogs">
                <div class="album py-5 bg-body-tertiary">
                    <div class="container">

                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            <div class="col">
                            <div class="card shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                                <div class="card-body pt-md-4">
                                <h2>Blogs</h2>
                                <p class="card-text pt-md-2">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.<a href="#">read more...</a></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-body-secondary">9 mins</small>
                                </div>
                                </div>
                            </div>
                            </div>   
                        </div>
                        </div>
                </div>
           </div>
          
          <div class="draft">
          <div class="album py-5 bg-body-tertiary">
                    <div class="container">

                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            <div class="col">
                            <div class="card shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                                <div class="card-body pt-md-4">
                                <h2>Technology</h2>
                                <p class="card-text pt-md-2">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-body-secondary">9 mins</small>
                                </div>
                                </div>
                            </div>
                            </div>
                              
                        </div>
                        </div>
                </div>
           </div>
          
        </div>

      <?php include('../assets/footer.php'); ?>
      
      <script src="../js/tabs.js"></script>
</body>
</html>