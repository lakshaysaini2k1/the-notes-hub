<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>otp login</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    form {
      max-width: 400px;
      margin: 80px auto;
      padding: 20px;
      background: rgba(0, 0, 0, 0.6);
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.4);
    }

    input, button {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 5px;
      border: none;
    }

    input[type="email"] {
      background: #f8f8f8;
      color: #000;
    }

    button {
      background-color: #04AA6D;
      color: white;
      font-weight: bold;
      cursor: pointer;
    }

    button:hover {
      filter: brightness(0.9);
    }

    .forget {
      display: flex;
      justify-content: center;
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

    h4 {
      color: red;
    }

    nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: rgba(0, 0, 0, 0.8);
      padding: 10px 20px;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 15px;
    }

    nav a {
      color: white;
      text-decoration: none;
      font-weight: bold;
    }

    nav a:hover {
      color: lightgreen;
    }

    .menu-icon {
      font-size: 24px;
      color: white;
      cursor: pointer;
    }
  </style>
</head>
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

  <form action="/project-noteshub/send_otp.php" method="post" autocomplete="off">
    <h2>User Login</h2>
    <h4><?php if (isset($_REQUEST['msg'])) echo $_REQUEST['msg']; ?></h4>
    <label for="username">Email ID:</label>
    <input type="email" id="username" name="email" placeholder="Enter your email *" required>
    <button name="submit" type="submit">Send OTP</button>
    <div>
      <p>Don't have an account? <a style="color: lightgreen;" href="register.php">Register now!</a>.</p>
    </div>
  </form>

  <script src="script.js"></script>
</body>
</html>
