<!-- <?php
// include('db_conn.php');
// $message = "";
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
//     $sql = "SELECT * FROM users WHERE email ='$email' AND Password = '$password'";
//     $res = mysqli_query($conn,$sql);
//     if(mysqli_num_rows($res) > 0){
//     $allowed_types = ['txt', 'pdf', 'jpg',];
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
// }else{

// }
?>
<!DOCTYPE html>
<html>
<head><title>Upload File</title></head>
<body>
    <h2>Upload File</h2>
    <?php //if (!empty($message)) echo "<p><strong>$message</strong></p>"; ?>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="file" required><br><br>
        <input type="submit" value="Upload">
    </form>
    <br>
    <a href="index.php">View Uploaded Files</a>
</body>
</html> -->
<?php
// include('db_conn.php');
// $message = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
//     // Sanitize user input
//     $email = mysqli_real_escape_string($conn, $_POST["email"]);
//     $password = mysqli_real_escape_string($conn, $_POST["password"]);
//     // Check user in database
//     $sql = "SELECT * FROM regis WHERE email = '$email' AND password = '$password'";
//     $res = mysqli_query($conn, $sql);
//     if (mysqli_num_rows($res) > 0){
//         // User is authenticated, proceed with file upload
//         $allowed_types = ['txt', 'pdf', 'jpg'];
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
//             $check_query = "SELECT id FROM uploaded_files WHERE filename = '$safe_name'";
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
//     } else {
//         $message = "Invalid email or password.";
//     }
// }
// ?>
// <!DOCTYPE html>
// <html>
// <head><title>Upload File</title></head>
// <style>
//     *{
//         text-align : center;
//     }
// </style>
// <body>
//     <h2>Upload File</h2>
//     <?php if (!empty($message)) echo "<p><strong>$message</strong></p>"; ?>
//     <form method="POST" enctype="multipart/form-data">
//     <input type="email" name="email" placeholder="enter your email id" required><br><br>
//     <input type="password" name="password" placeholder="enter your password" required><br><br>
//     <input type="file" name="file" required><br><br>
//     <input type="submit" value="Upload">
//     </form>
//     <br>
//     <a href="index.php">View Uploaded Files</a>
// </body>
// </html>
// <?php
// include('db_conn.php');
// $message = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
//     // File upload settings
//     $allowed_types = ['txt', 'pdf', 'jpg'];
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
?>
