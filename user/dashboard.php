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
                <a class="addBlogBut" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Blogs</a>
            </div>
        </div>
    </div>



    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="ms-auto p-3">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="content">
            <center>
                <h4>Add Blog</h4>
            </center>
            <form class="container" action="blogdatasubmit.php" method="post">
                <div class="mb-3">
                    <input type="text" class="form-control" Placeholder="Enter Your Blog Title" name="title" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" Placeholder="Enter Your Short Desc" name="shortDesc" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" Placeholder="Enter Tags" name="tags" required>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="floatingTextarea" name="description" required></textarea>
                </div>
                <div class="mb-3">
                <input type="file" class="form-control" name="blogimg">
                </div>
                <center><button type="submit" class="btn btn-primary mb-4 " name="submit">Preview</button></center>
            </form>
        </div>
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
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>