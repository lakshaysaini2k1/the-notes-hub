<?php
session_start();
include ("dbconnection.php");
include ("email.php");
date_default_timezone_set("Asia/kolkata");
$email = $_POST['email'];
$sql = "SELECT * FROM `users` WHERE email = '$email'";
$rs = mysqli_query($conn , $sql);
if(mysqli_num_rows($rs) > 0){
    $_SESSION['email']= $email;
    $otp = rand(1111111,9999999); // <---------7 digit number
    send_otp($email,"THE NOTESHUB OTP",$otp);
    $sql = "UPDATE users SET user_otp='$otp' WHERE email = '$email'";
    $rs = mysqli_query($conn , $sql);
    header('location:verifyOTP.php?msg= OTP send success!');
}
else{
    header('location:login.php?msg= Email is Invalid... Please try Again!');
}
?>