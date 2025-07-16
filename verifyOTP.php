<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>verify OTP</title>
</head>
<body>
    <style>
         body {
      margin: 0;
      padding: 0;
      font-family: sans-serif;
      background-image: url('https://t3.ftcdn.net/jpg/09/61/27/48/360_F_961274808_fX06eKzHJDCX9LO1Uew8YsL8Gk7RDZBu.jpg'); /* Replace with your image */
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-position: center;
      color: #fff;
    }
        h4{
            color :lightgreen;
        }
    </style>
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
<form action="/project-noteshub/verify_LOGIN.php" method="post">
  <h2>Verify OTP</h2>
  <h4><?php
      if (isset($_REQUEST['msg'])){
        echo $_REQUEST['msg'];
      }
  ?></h4>
 <!-- name -->
 <label for="otp">Enter OTP</label> 
  <input type="number" id="otp" name="otp" placeholder="Enter 7-Digit OTP" required>
  <small>Please check your email for OTP.</small>
  <button name="submit" type="submit">Verify OTP</button>
<script src="script.js"></script>
</body>
</html>