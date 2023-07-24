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

    if ($fileerror == 0) {
        $destfile = '../postuploadimg/' . $filename;
    
        move_uploaded_file($filepath, $destfile);
    
        $insertquery = "INSERT INTO blogs (uid, title, shortDesc, tags, description, blogImg) VALUES ('$uid', '$title', '$shortDesc', '$tags', '$description', '$destfile')";
    
        $query = mysqli_query($con, $insertquery);
    
        if ($query) {
            header("Location: preview.php?bid=" . mysqli_insert_id($con));
        } else {
            header('location:dashboard.php');
        }
    }


    

?>