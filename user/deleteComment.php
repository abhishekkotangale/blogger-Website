<?php
    session_start();
    if(!isset($_SESSION['username_u'])){
        header('location:../index.html');
    }
    include('../assets/connection.php');
    if (isset($_GET['deleteCommentId'])) {
        $deleteCommentId = $_GET['deleteCommentId'];
        $userId = $_SESSION['uid'];
        $bid = $_GET['bid'];

        $query = "DELETE FROM comments WHERE mid = $deleteCommentId AND uid = $userId";

        if (mysqli_query($con, $query)) {
            $redirectUrl = 'preview.php?bid=' . urlencode($bid);
            header('Location: ' . $redirectUrl);    
            exit;
        }
    }
?>