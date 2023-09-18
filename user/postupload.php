

<?php

    session_start();
    if(!isset($_SESSION['username_u'])){
        header('location:../index.html');
    }

    $userid = $_SESSION['id'];

    include '../assets/connection.php';

    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $content = $_POST['content'];
        $file = $_FILES['file'];

        $filename = $file['name'];
        $filepath = $file['tmp_name'];
        $fileerror = $file['error'];

        if($fileerror == 0){
            
            $destfile = '../postuploadimg/'.$filename;

            move_uploaded_file($filepath,$destfile);

            $insertquery = "insert into post(title,content,img) values('$title','$content','$destfile')";

            $query = mysqli_query($con,$insertquery);

            if($query){
                echo "inserted";
                header('location:allpost.php');
            }else{
                echo "not inserted";
            }
        }
    }

?>