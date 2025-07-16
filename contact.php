<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact us</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
  body{
  height : 120%;
  background: linear-gradient(135deg, #1f1c2c, #928dab);
  }
 
  form{
    width: 400px;
  }
  textarea{
    margin-bottom: 15px;
   padding: 10px;
   border: 1px solid #ccc;
   border-radius: 4px;
   font-size: 14px;
  }
  button{
    margin: 10px 0px;
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
  <h2>Contact form</h2>
  <label for="Name">Name :</label>
  <input type="email" id="Name" name="Name" placeholder="enter your name *" required>
  <label for="Email_ID">Email ID :</label>
  <input type="email" id="password" name="Email_ID" placeholder="enter your Email id *" required>
  <label for="Phone_Number">Phone number :</label>
  <input type="text" id="Phone_number" name="Phone_number" placeholder="enter your phone number " required>
  <label for="subject">Subject :</label>
  <textarea id="subject" name="subject" placeholder="Write your message ..." style="height:200px"></textarea>
  <button name="Submit" type="submit">Submit</button>
</form>
<script src="script.js"></script>
</body>
</html>
