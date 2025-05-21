<?php
// Start session to manage user login state
session_start();

// Check if user is already logged in
if (isset($_SESSION['admin_id'])) {
    // If logged in, redirect to dashboard
    header("Location: dashboard.php");
    exit();
} else {
    // If not logged in, redirect to login page
    header("Location: Login.php");
    exit();
}
?>