<?php

    session_start();

    include '../assets/connection.php';

    $uid = $_SESSION['id'];

    $title = mysqli_real_escape_string($con , $_POST['title']);
    $shortDesc = mysqli_real_escape_string($con , $_POST['shortDesc']);
    $tags = mysqli_real_escape_string($con , $_POST['tags']);
    $description = mysqli_real_escape_string($con , $_POST['description']);
    $blogimg =  $_FILES['blogimg'];
    
    $filename = $blogimg['name'];
    $filepath = $blogimg['tmp_name'];
    $fileerror = $blogimg['error'];

    if($fileerror == 0){
        $destfile = '../blogImg/'.$filename;

        move_uploaded_file($filepath,$destfile);

        $insertquery = "insert into blogs(uid,title,shortDesc,tags,description,blogImg) values('$uid','$title','$shortDesc','$tags','$description','$destfile')";

        $query = mysqli_query($con,$insertquery);

            if($query){
                echo "inserted";
                header('location:index.php');
            }else{
                echo "not inserted";
            }
    }

?>