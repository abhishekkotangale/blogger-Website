<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "blogger";

    $con = mysqli_connect($server,$user,$password,$db);

    if($con){
        ?>

        
    <?php
    }else{
        ?>
        <script>
            alert("connection not successful")
        </script>
    <?php
    }
?>
