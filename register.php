<?php
$display_alert = false;
$display_error = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include('dbconnection.php');

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $user_type = $_POST['user_type'];
    $password = md5($_POST['password']);
    $confirm_password = md5($_POST['Confirm_password']);
    $user_otp = rand(100000, 999999);  // Generates a 6-digit OTP

    $exist_sql = "SELECT * FROM `users` WHERE email = '$email'";
    $res = mysqli_query($conn, $exist_sql);
    $num_exist_row = mysqli_num_rows($res);

    if ($num_exist_row > 0) {
        $display_error = "Email ID already exists.";
    } else {
        if ($password === $confirm_password) {
            $sql = "INSERT INTO `users` (`name`, `email`, `user_type`, `password`, `user_otp`) 
                    VALUES ('$name', '$email', '$user_type', '$password', '$user_otp')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $display_alert = true;
            } else {
                $display_error = "Registration failed. Please try again.";
            }
        } else {
            $display_error = "Passwords do not match.";
        }
    }

    if (isset($conn) && $conn !== null) {
        mysqli_close($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="style.css">
<title>Registration Form</title>
</head>
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
  #count {
    margin-bottom: 15px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    display: flex;
    flex-direction: column;
  }
  button {
    margin: 10px 0px;
  }
</style>
<body>

<nav>
    <div class="logo">
        <img src="images/WhatsApp Image 2025-04-05 at 15.36.16_0b1f2f03.jpg" height="60px" width="200px" alt="Logo">
    </div>
    <ul id="menuList">
        <li><a href="home.php"><i class="bi bi-house"></i> Home</a></li>
        <li><a href="about.php"><i class="bi bi-info-circle"></i> About</a></li>
        <li><a href="contact.php"><i class="bi bi-envelope"></i> Contact</a></li>
        <li><a href="login.php"><i class="bi bi-person"></i> Sign in</a></li>
    </ul>
</nav>

<form action="register.php" method="post">
  <h2>Registration Form</h2>

  <?php
  if ($display_alert) {
      echo "<script>
      Swal.fire({
          title: 'Registration successful!',
          text: 'Your account is created and now you can login!',
          icon: 'success'
      }).then(() => {
          window.location.href = 'login.php';
      });
      </script>";
  }

  if ($display_error) {
      echo "<script>
      Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: '$display_error'
      });
      </script>";
  }
  ?>

  <label for="name">Name:</label> 
  <input type="text" id="name" name="name" placeholder="Enter your name *" required>

  <label for="email">Email ID:</label>
  <input type="email" id="email" name="email" placeholder="Enter your email ID *" required>

  <div class="category">
      <label for="user_category">User Category:</label>
  </div>
  
  <select name="user_type" id="count">
      <option value="user">User</option>
      <option value="admin">Admin</option>
  </select>

  <label for="password">Password:</label>
  <input type="password" id="password" name="password" placeholder="Enter your password *" required>

  <label for="Confirm_password">Confirm Password:</label>
  <input type="password" id="Confirm_password" name="Confirm_password" placeholder="Confirm your password *" required>

  <button name="submit" type="submit">Register Now</button>

  <div>
    <p>Already have an account? <a style="color: lightgreen;" href="login.php">Sign in</a>.</p>
  </div>
</form>

<script src="script.js"></script>
</body>
</html>
