<head>
    <style>
        @media (max-width: 768px) {
            .inputBox{
                width:90%;
            }
        }
    </style>
</head>
<?php 
    session_start();

    if(!isset($_SESSION['username_u'])){
        header('location:../index.html');
    }
    include('../assets/connection.php');
    include('user_nav.php');
    $uid = $_SESSION['uid'];
    $userdataquery = "select * from users where uid='$uid' ";
    $userShowData = mysqli_query($con,$userdataquery);
    
    $userData = mysqli_fetch_array($userShowData);

    ?>
     
    <div class="container m-lg-5">
        <div class="mt-5 row">
            <div class="col">
                <img src="<?php echo $userData['avatar']; ?>" alt="" srcset="" width="250px" height="250px" style="border-radius: 50%;">
            </div>
            <form action="changeavatar.php" method="post" enctype="multipart/form-data" style="width:60%;" class="inputBox mt-5">
                <div class="d-flex">
                    <div>
                        <input type="file" name="avatar" class="form-control">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary mb-4 " name="submit">Change Avatar</button>
                    </div>
                </div>
            </form>
        </div>
        <center>
            <div class="p-lg-4 container">
                username
                <form action="profileUpdate/updateusername.php" method="post">
                    <input type="text" class="form-control" value="<?php echo $userData['username'];?>" name="username" style="width:60%;" class="inputBox">
                    <button type="submit" class="btn btn-primary mb-4 " name="submit">Change</button>
                </form>
            </div>
            <div class="p-lg-4 container">
                Bio
                <form action="profileUpdate/updateBio.php" method="post">
                    <input type="text" class="form-control" value="<?php echo $userData['bio'];?>" name="bio" style="width:60%;" class="inputBox">
                    <button type="submit"  class="btn btn-primary mb-4 " name="submit">Change</button>
                </form>
            </div>
        </center>
    <div class="container text-center m-2  ">
         <div class="card shadow-lg rounded p-4">
            <h1 class="pt-lg-4">Change Password</h1>
            <form action="profileUpdate/changepass.php" method="POST">
               <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">Old Password</label>
                 <input type="password" class="form-control" id="exampleInputEmail1" name="oldPass" required>
               </div>
               <div class="mb-3">
                 <label for="exampleInputPassword1" class="form-label">New Password</label>
                 <input type="password" class="form-control" id="exampleInputPassword1" name="newpass" required>
               </div>
               <div class="mb-3">
                   <label for="exampleInputPassword1" class="form-label">Re-Enter New Password</label>
                   <input type="password" class="form-control" id="exampleInputPassword1" name="cnewpass" required>
                 </div>
                 <button type="submit" class="btn btn-primary" name="submit">Submit</button>
               
             </form>
            
         </div>
     </div>

    <div class="m-4 mt-5 container text-center">
            <a href="profileUpdate/deleteAccount.php?deleteAccount=<?php echo $uid; ?>" class="btn-primary p-3" style="text-decoration:none; border-radius:12px;">Delete Account</i></a></td>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <?php

    include('../assets/footer.php');
?>