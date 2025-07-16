<?php
// Start the session to check for authentication status
session_start();

// Check if the user is authenticated
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
    // Redirect to user.php if authenticated
    header("Location: user.php");
    exit();  // Make sure to stop further script execution
} else {
    // Redirect to home.php if not authenticated
    header("Location: home.php");
    exit();  // Make sure to stop further script execution
}
?>
