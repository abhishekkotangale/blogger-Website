<?php
include('../assets/connection.php');
include('user_nav.php');

$search = $_POST['search'];

?>

<form action="searchresult.php" method="post">
    Search <input type="text" name="search"><br>
    <input type ="submit">
    </form>

<div class="blogs pt-lg-5">
    <center>
        <h1>Blogs</h1>
    </center>
                <div class="album py-5 bg-body-tertiary">
                    <div class="container">

                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        
                <?php 
                $sql = "SELECT * FROM blogs WHERE (title LIKE '%$search%' OR description LIKE '%$search%' OR tags LIKE '%$search%') AND blogStatus='Published' ORDER BY bid DESC";
                $query = mysqli_query($con , $sql);
                while($result = mysqli_fetch_array($query)){
                    
                  ?>
                  <div class="col">
                            <div class="card shadow-sm">
                            <img src="<?php echo $result['blogImg'];?>" width="100" height="100" class="card-img-top mt-lg-4 mb-lg-5" alt="...">
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