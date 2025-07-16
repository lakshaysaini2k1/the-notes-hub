<?php
include ('dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>forget password</title>
</head>
<style>
      .forget{
  display : flex;
  justify-content :center;
  }
      #count{
    margin-bottom: 15px;
     padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
     font-size: 14px;
     display : flex;
     flex-direction : column;
 }
 button{
  margin:10px 0px;
 }
</style>
<body>
<nav>
    <div class="logo">
        <img src="images/WhatsApp Image 2025-04-05 at 15.36.16_0b1f2f03.jpg" height="60px" width="200px" alt="error">
    </div>
    <ul id="menuList">
        <li><a href="home.php"><i class="bi bi-house"></i>Home</a></li>
        <li><a href="about.php"><i class="bi bi-info-circle"></i>About</a></li>
        <li><a href="contact.php"><i class="bi bi-envelope"></i>Contact</a></li>
        <li><a href="login.php"><i class="bi bi-person"></i>Sign in</a></li>
    </ul>
    <div class="menu-icon">
            <i class="bi bi-list" onclick="menu()"></i>
    </div>
</nav>
<form action="/project-noteshub/login.php" method="post">
  <h2>reset your password</h2>
  <label for="username">email:</label>
  <input type="email" id="username" name="email" placeholder="enter your email *" required>
  <label for="password">Create Password:</label>
  <input type="password" id="Create_password" name="Create_password" placeholder="Create a new password *" required>
  <label for="password"> Confirm Password:</label>
  <input type="password" id="Confirm_password" name="Confirm_password" placeholder="Confirm your password *" required>
    <button name="submit" type="submit">Submit</button>
    <div class=forget>
     <a style="color : lightgreen;" href="login.php">Back to Sign in</a>
      </div>
</form>
<script src="script.js"></script>
</body>
</html>