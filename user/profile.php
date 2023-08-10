<?php 
    session_start();
    include('user_nav.php');

    ?>
     
    <div class="container p-lg-5">
        <div>
            <img src="../img/1.jpg" alt="" srcset="" width="250px" height="250px" style="border-radius: 50%;">
            <form action="changeavatar.php" method="post" enctype="multipart/form-data">
                <input type="file" name="avatar" class="form-control">
                <button type="submit" class="btn btn-primary mb-4 " name="submit">Change Avatar</button>
            </form>
        </div>
        <div class="p-lg-4">
            username
            <input type="text">
            <button>Change</button>
        </div>
        <div class="p-lg-4">
            Bio
            <input type="text">
            <button>Bio</button>
        </div>

        <div class="p-lg-4">
            <h1>Update Password</h1>
            <input type="password">
            <input type="password">
            <button>submit</button>
        </div>

        <div class="p-lg-4">
            delete Account
        </div>
    </div>

    <?php

    include('../assets/footer.php');
?>