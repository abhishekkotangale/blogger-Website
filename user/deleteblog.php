<?php
    include '../assets/connection.php';

    $bid = $_GET['deleteblog'];

    $deleteQuery = "delete from blogs where bid='$bid' ";
    
    $query = mysqli_query($con,$deleteQuery);

    if($query){
        ?>
            <script>
                alert("Deleted Successfully");
            </script>
        <?php
            header('location:dashboard.php');
    }else{
        ?>
            <script>
                alert("Please Try again after Some time");
            </script>
        <?php
    }
?>