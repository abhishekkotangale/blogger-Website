<?php
    session_start();

    include '../assets/connection.php';

    $uid = $_SESSION['id'];

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
                header('location:profile.php');
            }else{
                echo "not inserted";
            }

    }
?>