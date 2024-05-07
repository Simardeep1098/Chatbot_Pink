<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "chatbot");

// Check if the user is already logged in as an admin
if (isset($_SESSION['admin'])) {
    header("Location: admin_panel.php");
    exit();
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database to check if the username exists and is an admin
    $query = "SELECT * FROM user WHERE username='$username' AND isadmin = 1";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {

        // Fetch the admins password from the database
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row['password'];

         // Check if the password matches
         if (password_verify($password, $stored_password)) {
            // Start the user session and redirect to the dashboard
            session_start();
            // Store admin flag in the session to mark them as authenticated
            $_SESSION['admin'] = true;
            header("refresh:0;url=admin_panel.php");
            exit;
        } else {
            $error_message = "Invalid username or password.";
        }
    } else {
        $error_message = "Admin not found or not authorized.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            text-align: center;
        }
        
        h1 {
            color: #333;
        }

        form {
            width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        p.error-message {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Admin Login</h1>
    <?php
    if (isset($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
    }
    ?>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
