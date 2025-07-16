<?php
include('dbconnection.php');
$message = "";
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {

    // Allowed file types and max size (2MB)
    $allowed_types = ['txt', 'pdf', 'jpg'];
    $max_size = 2 * 1024 * 1024; // 2MB

    // Get file details
    $file_name = basename($_FILES["file"]["name"]);
    $file_tmp = $_FILES["file"]["tmp_name"];
    $file_size = $_FILES["file"]["size"];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    // Check file extension
    if (!in_array($file_ext, $allowed_types)) {
        $message = "File type not allowed.";
    } 
    // Check file size
    elseif ($file_size > $max_size) {
        $message = "File is too large.";
    } 
    else {
        // Sanitize file name
        $safe_name = mysqli_real_escape_string($conn, $file_name);

        // Check if file already exists in the database
        $check_query = "SELECT id FROM uploaded_files WHERE filename = '$safe_name'";
        $check_result = mysqli_query($conn, $check_query);

        // Check if query was successful
        if ($check_result === false) {
            $message = "Error checking file existence in the database: " . mysqli_error($conn);
        } else {
            // If file exists in the database
            if (mysqli_num_rows($check_result) > 0) {
                $message = "File already exists in the database.";
            } else {
                // Create upload directory if it doesn't exist
                $upload_dir = "uploads/";
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir);
                }

                // Generate unique file name
                $unique_name = uniqid() . "_" . $file_name;
                $target_path = $upload_dir . $unique_name;

                // Move file to upload directory
                if (move_uploaded_file($file_tmp, $target_path)) {
                    // Insert file info into the database
                    $insert = "INSERT INTO uploaded_files (filename, filepath, filetype, filesize)
                               VALUES ('$safe_name', '$target_path', '$file_ext', $file_size)";
                    if (mysqli_query($conn, $insert)) {
                        $message = "File uploaded successfully.";
                    } else {
                        $message = "Database error: " . mysqli_error($conn);
                    }
                } else {
                    $message = "Failed to move file.";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
</head>
<body>
    <h2>Upload a File</h2>
    <?php if (!empty($message)) echo "<p><strong>$message</strong></p>"; ?>

    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="file" required><br><br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>







<?php
include('dbconnection.php');
$message = "";
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
//     // Sanitize user input
//     // $email = mysqli_real_escape_string($conn, $_POST["email"]);
//     // $password = md5(mysqli_real_escape_string($conn,$_POST["password"]));
//     //    $password_in= md5($_POST["password"]); // md5 encryption
//     //    $password = mysqli_real_escape_string($conn ,$password_in);
//     // $password_in = mysqli_real_escape_string($conn, md5($_POST["password"]));
//     // $password = md5(mysqli_real_escape_string($conn, $_POST["password"]));
//     // Check user in database
//     // $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password_in'";
//     // $res = mysqli_query($conn, $sql);
//     // if (mysqli_num_rows($res) > 0){
//         // User is authenticated, proceed with file upload
//         $allowed_types = ['txt', 'pdf'];
//         $max_size = 2 * 1024 * 1024; // 2MB
//         $file_name = basename($_FILES["file"]["name"]);
//         $file_tmp = $_FILES["file"]["tmp_name"];
//         $file_size = $_FILES["file"]["size"];
//         $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
//         if (!in_array($file_ext, $allowed_types)) {
//             $message = "File type not allowed.";
//         } elseif ($file_size > $max_size) {
//             $message = "File is too large.";
//         } else {
//             $safe_name = mysqli_real_escape_string($conn, $file_name);
//             $check_query = "SELECT id FROM uploaded_files WHERE filename = '$safe_name'"; //table name --> uploaded files
//             $check_result = mysqli_query($conn, $check_query);
//             if (mysqli_num_rows($check_result) > 0) {
//                 $message = "File already exists in the database.";
//             } else {
//                 $upload_dir = "uploads/";
//                 if (!is_dir($upload_dir)) mkdir($upload_dir);

//                 $unique_name = uniqid() . "_" . $file_name;
//                 $target_path = $upload_dir . $unique_name;

//                 if (move_uploaded_file($file_tmp, $target_path)) {
//                     $sql = "INSERT INTO uploaded_files (filename, filepath, filetype, filesize)
//                             VALUES ('$safe_name', '$target_path', '$file_ext', $file_size)";
//                     if (mysqli_query($conn, $sql)) {
//                         $message = "File uploaded successfully.";
//                     } else {
//                         $message = "Database error: " . mysqli_error($conn);
//                     }
//                 } else {
//                     $message = "Failed to move file.";
//                 }
//             }
//         }
// }
// $message = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
//     // File upload settings
//     $allowed_types = ['txt', 'pdf'];
//     $max_size = 2 * 1024 * 1024; // 2MB

//     $file_name = basename($_FILES["file"]["name"]);
//     $file_tmp = $_FILES["file"]["tmp_name"];
//     $file_size = $_FILES["file"]["size"];
//     $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

//     if (!in_array($file_ext, $allowed_types)) {
//         $message = "File type not allowed.";
//     } elseif ($file_size > $max_size) {
//         $message = "File is too large.";
//     } else {
//         $safe_name = mysqli_real_escape_string($conn, $file_name);
//         $check_query = "SELECT id FROM uploaded_files WHERE filename = '$safe_name'";
//         $check_result = mysqli_query($conn, $check_query);
//         if (mysqli_num_rows($check_result) > 0) {
//             $message = "File already exists in the database.";
//         } else {
//             $upload_dir = "uploads/";
//             if (!is_dir($upload_dir)) mkdir($upload_dir);

//             $unique_name = uniqid() . "_" . $file_name;
//             $target_path = $upload_dir . $unique_name;
//             if (move_uploaded_file($file_tmp, $target_path)) {
//                 $sql = "INSERT INTO uploaded_files (filename, filepath, filetype, filesize)
//                         VALUES ('$safe_name', '$target_path', '$file_ext', $file_size)";
//                 if (mysqli_query($conn, $sql)) {
//                     $message = "File uploaded successfully.";
//                 } else {
//                     $message = "Database error: " . mysqli_error($conn);
//                 }
//             } else {
//                 $message = "Failed to move file.";
//             }
//         }
//     }
// }

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {

    $allowed_types = ['txt', 'pdf', 'jpg'];
    $max_size = 2 * 1024 * 1024; // 2MB

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
        $check_query = "SELECT id FROM uploaded_files WHERE filename = '$safe_name'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            $message = "File already exists in the database.";
        } else {
            $upload_dir = "uploads/";
            if (!is_dir($upload_dir)) mkdir($upload_dir);

            $unique_name = uniqid() . "_" . $file_name;
            $target_path = $upload_dir . $unique_name;

            if (move_uploaded_file($file_tmp, $target_path)) {
                $insert = "INSERT INTO uploaded_files (filename, filepath, filetype, filesize)
                           VALUES ('$safe_name', '$target_path', '$file_ext', $file_size)";
                if (mysqli_query($conn, $insert)) {
                    $message = "File uploaded successfully.";
                } else {
                    $message = "Database error: " . mysqli_error($conn);
                }
            } else {
                $message = "Failed to move file.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang = "en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head><title>Upload File</title>
<link rel="stylesheet" href="style.css">
</head>
 <style>
.submit_btn{
    background-color: #007bff;
    color : white;
    cursor : pointer;
}
.submit_btn:hover {
      background-color: #0056b3;
     }
 </style>
<body>
    <!-- <form method="POST" enctype="multipart/form-data"> -->
      <?php // if (!empty($message)) echo "<p><strong>$message</strong></p>"; ?>
      <!-- <h2>Upload File</h2> -->
    <!-- <label for="email">Email ID:</label>
    <input type="email" name="email" placeholder="enter your email ID *" required>
    <label for="password">Password:</label>
    <input type="password" name="password" placeholder="enter your password" required> -->
    <!-- <label for="file">Upload file</label>
    <input type="file" name="file" placeholder="choose file" required/>
    <input class="submit_btn" type="submit" value="Upload">
    <a style="color:lightgreen;" href="view_notes.php">View Uploaded Files</a>
    </form> -->
  <!-- email -->
  <!-- <input type="email" id="email" name="email" placeholder="enter your email ID *" required> -->
  <!-- <div class="category">
      <label for="user_category">User Category :</label>
    </div> -->
    <!-- user_type -->
      <!-- <select name="user_type" id="count">
        <option value="user">user</option>
        <option value="admin">admin</option>
      </select> -->
      <!-- password -->
  <!-- <label for="password">Password:</label>
  <input type="password" id="password" name="password" placeholder="enter your password *" required> -->
  <!-- confirm_password -->
  <!-- <label for="Confirm_password">Confirm Password:</label>
  <input type="password" id="Confirm_password" name="Confirm_password" placeholder="Confirm your password *" required>
  <button name="submit" type="submit">Register Now</button>
  <div>
    <p>Already have an account? <a style="color : lightgreen;" href="login.php">Sign in</a>.</p>
    </div>
  </form> -->
</body>
</html>

