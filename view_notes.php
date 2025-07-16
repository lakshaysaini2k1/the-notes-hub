<?php
include('dbconnection.php');
// Delete file
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $query = "SELECT * FROM uploaded_files WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        if (file_exists($row['filepath'])) {
            unlink($row['filepath']);
        }
        mysqli_query($conn, "DELETE FROM uploaded_files WHERE id = $id");
        echo "File deleted.<br>";
    }
}
// Read file
if (isset($_GET['read'])) {
    $id = intval($_GET['read']);
    $query = "SELECT * FROM uploaded_files WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_assoc($result)) {
            $file = $row['filepath'];
            header('Content-type: application/pdf');
            header('Content-Disposition: inline; filename="' . basename($file) . '"');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
    }
}
// Download file
if (isset($_GET['download'])) {
    $id = intval($_GET['download']);
    $query = "SELECT * FROM uploaded_files WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        $file_path = $row['filepath'];
        if (file_exists($file_path)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($row['filename']) . '"');
            header('Content-Length: ' . filesize($file_path));
            readfile($file_path);
            exit;
        }
    }
}
// $result = mysqli_query($conn, "SELECT * FROM uploaded_files ORDER BY uploaded_at DESC");
// Check if 'uploaded_at' column exists
$columns = mysqli_query($conn, "SHOW COLUMNS FROM uploaded_files LIKE 'uploaded_at'");
$uploadedAtExists = mysqli_num_rows($columns) > 0;

// Set the order by clause based on the existence of 'uploaded_at' column
$orderBy = $uploadedAtExists ? "uploaded_at DESC" : "id DESC";
$query = "SELECT * FROM uploaded_files ORDER BY $orderBy";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head><title>Uploaded Files</title></head>
  <link rel="stylesheet" href="style.css">
<style>
     *{
       box-sizing : border-box;
    }
   body {
            font-family: Arial, sans-serif;
            margin: 0px;
            padding: 10px;
            background-color: #fff;
            color : #000;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
            border-radius: 8px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: #000;
            font-weight: bold;
        }
        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        a:hover {
            color: #0056b3;
        }
    </style>
</style>
<body>
<div style="overflow-x:auto;"></div>
    <!-- <h2 class = "center">HOme Files</h2> -->
    <a class="center" href="user.php">← Back to Home</a><br><br>
    <table>
         <!-- class="center" border="1" cellpadding="8" -->
    <tr>
            <th>Filename</th>
            <th>Type</th>
            <th>Size</th>
            <th>Uploaded At</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
            <td><?php echo $row['filename']; ?></td>
<td><?php echo $row['filetype']; ?></td>
<td><?php echo round($row['filesize'] / 1024, 2) . ' KB'; ?></td>
<td><?php echo $row['upload_date'] ?? 'N/A'; ?></td>
<td>
    <a href="?read=<?php echo $row['id']; ?>">Read</a> |
    <a href="?download=<?php echo $row['id']; ?>">Download</a> |
    <!-- <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete?')">Delete</a> -->
</td>

            </tr>
        <?php endwhile; ?>
    </table>
    <!-- <script src="script.js"></script> -->
</body>
</html>