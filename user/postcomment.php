<?php
    session_start();
    include('../assets/connection.php');
    $uid = $_SESSION['uid'];
    $bid = $_POST['bid'];
    $comment = $_POST['comment'];

    $commentInsertQuery = "insert into comments(bid,uid,comment) values('$bid','$uid','$comment')";
    $commentQuery = mysqli_query($con,$commentInsertQuery);

    if($commentQuery){
        $redirectUrl = 'preview.php?bid=' . urlencode($bid);
        header('Location: ' . $redirectUrl);
    }
?>