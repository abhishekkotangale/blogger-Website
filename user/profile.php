<?php 
    session_start();
    include('../assets/connection.php');
    include('user_nav.php');
    $uid = $_SESSION['id'];
    $userdataquery = "select * from users where uid='$uid' ";
    $userShowData = mysqli_query($con,$userdataquery);
    
    $userData = mysqli_fetch_array($userShowData);

    ?>
     
    <div class="container p-lg-5">
        <div>
            <img src="<?php echo $userData['avatar']; ?>" alt="" srcset="" width="250px" height="250px" style="border-radius: 50%;">
            <form action="changeavatar.php" method="post" enctype="multipart/form-data">
                <input type="file" name="avatar" class="form-control">
                <button type="submit" class="btn btn-primary mb-4 " name="submit">Change Avatar</button>
            </form>
        </div>
        <div class="p-lg-4">
            username
            <form action="profileUpdate/updateusername.php" method="post">
                <input type="text" value="<?php echo $userData['username'];?>" name="username">
                <button type="submit" class="btn btn-primary mb-4 " name="submit">Change</button>
            </form>
        </div>
        <div class="p-lg-4">
            Bio
            <form action="profileUpdate/updateBio.php" method="post">
                <input type="text" value="<?php echo $userData['bio'];?>" name="bio">
                <button type="submit" class="btn btn-primary mb-4 " name="submit">Change</button>
            </form>
        </div>

        <div class="p-lg-4">
            <h1>Update Password</h1>
            <input type="password">
            <input type="password">
            <button>submit</button>
        </div>

        <div class="p-lg-4">
            <a href="profileUpdate/deleteAccount.php?deleteAccount=<?php echo $uid; ?>">Delete Account</i></a></td>
        </div>
    </div>

    <?php

    include('../assets/footer.php');
?>