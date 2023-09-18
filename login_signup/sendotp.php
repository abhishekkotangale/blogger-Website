<?php 

session_start();
include('../assets/connection.php');

echo $_SESSION['email'];
$uid = $_SESSION['uid'];
echo $uid;
$num =  rand(100000,999999);

$to = $_SESSION['email'];
$subject = "OTP for Account Verification";
$message = $num;

    $retval = mail ($to,$subject,$message);
     
     if( $retval == true ) {
        echo "otp sent";
     }else {
        echo "otp not sent";
     }

     $showquery = "select * from users where uid='$uid' ";
     $showData = mysqli_query($con,$showquery);
 
     $result = mysqli_fetch_array($showData);
 
         $updatequery = "update users set otp='$num' where uid='$uid'";
 
         $query = mysqli_query($con,$updatequery);
 
         if($query){
             header('location:otp.php');
         }else{
             echo "not inserted";
         }
?>