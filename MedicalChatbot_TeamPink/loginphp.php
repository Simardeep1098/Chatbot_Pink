<?php
// Connect to the database
$con = mysqli_connect("localhost","root","","chatbot");

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the submitted username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database to check if the username exists
    $query = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($con, $query);

    // Check if the query was successful and if the user exists
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the user's password from the database
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row['password'];

        // Check if the password matches
        if (password_verify($password, $stored_password)) {
            // Start the user session and redirect to the dashboard
            session_start();
            $_SESSION['username'] = $username;
            header("refresh:0;url=dashboard.php");
            exit;
        } else {
            // Password is incorrect
            echo "<script>alert('Password is incorrect. Please check your password');</script>";
            header("refresh:0;url=login.php");
        }
    } else {
        // User not found
        echo "<script>alert('Username not found. Please register first');</script>";
        header("refresh:0;url=registration.php");
    }
}
?>
