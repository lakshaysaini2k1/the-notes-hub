<?php
include('dbconnection.php');
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = md5($_POST["password"]);

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0){
        $allowed_types = ['txt', 'pdf', 'jpg'];
        $max_size = 10 * 1024 * 1024; // 10MB
        $file_name = basename($_FILES["file"]["name"]);
        $file_tmp = $_FILES["file"]["tmp_name"];
        $file_size = $_FILES["file"]["size"];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (!in_array($file_ext, $allowed_types)) {
            $message = "File type not allowed.";
        } elseif ($file_size > $max_size) {
            $message = "File is too large.";
        } else {
            $safe_name = mysqli_real_escape_string($conn, $file_name);
            $check_query = "SELECT * FROM uploaded_files WHERE filename = '$safe_name'";
            $check_result = mysqli_query($conn, $check_query);

            if ($check_result && mysqli_num_rows($check_result) > 0) {
                $message = "File already exists in the database.";
            } else {
                $upload_dir = "uploads/";
                if (!is_dir($upload_dir)) mkdir($upload_dir);

                $unique_name = uniqid() . "_" . $file_name;
                $target_path = $upload_dir . $unique_name;

                if (move_uploaded_file($file_tmp, $target_path)) {
                    $sql = "INSERT INTO uploaded_files (filename, filepath, filetype, filesize)
                            VALUES ('$safe_name', '$target_path', '$file_ext', $file_size)";
                    if (mysqli_query($conn, $sql)) {
                        $message = "File uploaded successfully.";
                    } else {
                        $message = "Database error: " . mysqli_error($conn);
                    }
                } else {
                    $message = "Failed to move file.";
                }
            }
        }
    } else {
        $message = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Secure File Upload</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
    }

    body {
      min-height: 100vh;
      background: linear-gradient(135deg, #1f1c2c, #928dab);
      display: flex;
      justify-content: center;
      align-items: center;
      color: #fff;
    }

    .container {
      background: rgba(255, 255, 255, 0.05);
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.37);
      backdrop-filter: blur(10px);
      width: 100%;
      max-width: 400px;
      text-align: center;
    }

    h2 {
      margin-bottom: 20px;
      font-size: 26px;
    }

    input[type="email"],
    input[type="password"],
    input[type="file"] {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: none;
      border-radius: 8px;
      background: rgba(255, 255, 255, 0.1);
      color: #fff;
    }

    input::placeholder {
      color: #ddd;
    }

    input[type="submit"] {
      width: 100%;
      background-color: #00c9a7;
      color: white;
      border: none;
      padding: 12px;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #00b89c;
    }

    .message {
      margin: 15px 0;
      padding: 10px;
      border-radius: 8px;
      background-color: rgba(0, 0, 0, 0.3);
      color: #ffdddd;
    }

    a {
      display: inline-block;
      margin-top: 15px;
      color: #a8ff78;
      text-decoration: none;
      font-weight: bold;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Secure File Upload</h2>
    <?php if (!empty($message)) echo "<div class='message'>$message</div>"; ?>
    <form method="POST" enctype="multipart/form-data">
      <input type="email" name="email" placeholder="Enter your email" required>
      <input type="password" name="password" placeholder="Enter your password" required>
      <input type="file" name="file" required>
      <input type="submit" value="Upload">
    </form>
    <a href="adminnotes.php">📁 View Uploaded Files</a>
  </div>
</body>
</html>
