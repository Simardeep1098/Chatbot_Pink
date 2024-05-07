<?php
session_start();

// Check if the user is logged in as an admin
if (isset($_SESSION['admin'])) {
    // Unset the admin flag to log them out
    unset($_SESSION['admin']);

    // Redirect to the admin login page after logout
    header("Location: admin_login.php");
    exit();
} else {
    // If the user is not logged in as an admin, redirect them to the login page
    header("Location: admin_login.php");
    exit();
}
?>
