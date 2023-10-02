<?php
    session_start();

    session_start();
    if(!isset($_SESSION['username_u'])){
        header('location:../index.html');
    }

    include '../assets/connection.php';

    $uid = $_SESSION['uid'];

    $avatar =  $_FILES['avatar'];
    
    $filename = $avatar['name'];
    $filepath = $avatar['tmp_name'];
    $fileerror = $avatar['error'];

    if($fileerror == 0){
        $destfile = '../avatar/'.$filename;

        move_uploaded_file($filepath,$destfile);

        $updatequery = "update users set avatar = '$destfile' where uid='$uid'";
    
            $query = mysqli_query($con,$updatequery);
    
            if($query){
                ?>
                    <script>location.replace('profile.php')</script>
                <?php
            }else{
                echo "not inserted";
            }

    }
?>