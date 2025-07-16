<?php
include('dbconnection.php');
session_start();
if(!isset($_SESSION['user_name'])){
  header('location:login.php');
}
$email= $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$email'";
$res = mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
$usr_name = $row['name'];
$usr_email = $row['email'];
$usr_type = $row['user_type'];
$usr_date_time = $row['date_time'];
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>user</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<style>
   body {
      margin: 0;
      padding: 0;
      font-family: sans-serif;
      background-image: url('https://img.freepik.com/free-vector/hand-drawn-school-supplies-pattern-background_23-2150855728.jpg'); /* Replace with your image */
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-position: center;
      color: #000;
    }
 section{
  line-height: 50px;
 display: flex;
 flex-direction: column;
 flex-wrap : wrap;
 width: 480px;
 padding: 20px;
 border: 1px solid #ccc;
 border-radius: 5px;
 margin: auto;
 color: #000;
 box-shadow: 4px 7px 14px white;
}
h1{
      text-align : center;
    }
    .container{
     margin-top : 20px;
    }
    .head{
      text-align : center;
    }
</style>
<body>
  <nav>
    <div class="logo">
        <img src="images/WhatsApp Image 2025-04-05 at 15.36.16_0b1f2f03.jpg" height="60px" width="200px" alt="error">
    </div>
    <ul id="menuList">
      <li><a href="view_notes.php"><i class="eye bi-eye"></i>View Notes</a></li>
      <!-- <li><a href="upload.php"><i class="bi-send"></i>Send request</a></li> -->
      <li><a href="logout.php"><i class="bi-box-arrow-right"></i>logout</a></li>
    </ul>
    <div class="menu-icon">
  <i class="bi bi-list" onclick="menu()"></i>
    </div>
</nav>
<div class="container">
<section >
        <h1>Hello , <span><?php echo $_SESSION['user_name'];?></span></h1>
        <h3 class="head"> Welcome to the NotesHub</h3>
        <p class="head">This is an User page</p>
      </section>
</div>
<div class="container">
  <section >
  <h1>User profile</h1>
  <table>
  <tr>
    <td>Name</td>
       <td><?php echo $usr_name?></td>
   </tr>
   <tr>
       <td>Email ID</td>
       <td><?php echo $usr_email?></td>
   </tr>
   <tr>
       <td>User_category</td>
       <td><?php echo $usr_type?></td>
   </tr>
   <tr>
      <td>Registration_date-time</td>
       <td><?php echo $usr_date_time?></td>
   </tr>
   <tr>
      <td>Registration_status</td>
       <td>Successfull</td>
   </tr>
  </table>
      </section>
</div>
<script src="script.js"></script>
</body>
</html>