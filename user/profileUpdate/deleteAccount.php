<?php

    session_start();


?>

<?php

    include '../../assets/connection.php';

    $uid = $_GET['deleteAccount'];

    $deleteQuery = "delete from users where uid='$uid' ";
    
    $query = mysqli_query($con,$deleteQuery);

    if($query){
        ?>
        <script>
            alert("deleted Successfully");
            location.replace('../../index.html');
        </script>

        <?php
    }else{
        ?>
        <script>
            alert("can not deleted Successfully");
        </script>

        <?php
    }

?>