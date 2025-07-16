<?php
//  db connection.
$servername = "localhost";
$username = "root";
$password = "root";
$database = "dblakshay";
$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("Sorry we failed to connect" . mysqli_connect_error());
}
?>