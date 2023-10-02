<?php
    session_start();
    if(!isset($_SESSION['username_u'])){
        header('location:../index.html');
    }
    include('../assets/connection.php');
    $uid = $_SESSION['uid'];
    $bid = $_POST['bid'];
    $comment = $_POST['comment'];

    $commentInsertQuery = "insert into comments(bid,uid,comment) values('$bid','$uid','$comment')";
    $commentQuery = mysqli_query($con,$commentInsertQuery);

    if($commentQuery){
        $redirectUrl = 'preview.php?bid=' . urlencode($bid);
        
        
        echo "<script>window.location.replace('$redirectUrl');</script>";
    }
?>