<?php
session_start();
include ("dbconnection.php");
$email = $_SESSION['email'];
$otp = $_POST['otp'];
$sql = "SELECT * FROM `users` WHERE email = '$email' AND user_otp ='$otp'";
$rs = mysqli_query($conn , $sql);
if(mysqli_num_rows($rs)>0){
    $row = mysqli_fetch_array($rs); 
    if($row['user_type'] == 'admin'){
          $_SESSION['admin_name'] = $row['name'];
          $email = $_SESSION['email'];
          $sqle = "UPDATE users SET user_otp='' WHERE email = '$email'";
          mysqli_query($conn , $sqle);
          header('location:admin.php');
        }
        elseif($row['user_type'] == 'user'){
          $_SESSION['user_name'] = $row['name'];
          $email = $_SESSION['email'];
          $sqle = "UPDATE users SET user_otp='' WHERE email = '$email'";
         mysqli_query($conn , $sqle);
          header('location:user.php');
        }
}
else{
  $sqle = "UPDATE users SET user_otp='' WHERE email = '$email'";
  mysqli_query($conn , $sqle);
 header('location:login.php?msg = Wrong OTP ! . please try Again.');
}
?>