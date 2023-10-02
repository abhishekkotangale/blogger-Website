<?php

    session_start();

    include '../../assets/connection.php';
    $uid = $_SESSION['uid'];


        $bio = mysqli_real_escape_string($con , $_POST['bio']);
    
        $updatequery = "update users set bio='$bio' where uid='$uid'";
    
            $query = mysqli_query($con,$updatequery);
    
            if($query){
                ?>
                    <script>location.replace('../dashboard.php');</script>
                <?php
            }else{
                echo "not inserted";
            }
?>