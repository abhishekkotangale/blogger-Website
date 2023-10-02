<?php

    session_start();

    include '../../assets/connection.php';
    $uid = $_SESSION['uid'];


        $username = mysqli_real_escape_string($con , $_POST['username']);
    
        $updatequery = "update users set username='$username' where uid='$uid'";
    
            $query = mysqli_query($con,$updatequery);
    
            if($query){
                ?>
                    <script>location.replace('../dashboard.php');</script>
                <?php
            }else{
                echo "not inserted";
            }
?>