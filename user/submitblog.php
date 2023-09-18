<?php

    include '../assets/connection.php';

    $bid = $_GET['submitblog'];
    $showquery = "select * from blogs where bid='$bid' ";
    $showData = mysqli_query($con,$showquery);

    $result = mysqli_fetch_array($showData);



    $updatequery = "update blogs set blogStatus='Published'where bid='$bid'";

    $query = mysqli_query($con,$updatequery);

    if($query){
        header('location:dashboard.php');
    }else{
        echo "not inserted";
    }


?>