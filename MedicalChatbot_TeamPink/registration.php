<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="registration.css">
    <!-- Link to the external JavaScript file -->
    <script src="registrationjs.js"></script>
</head>
<?php include ('h.php'); ?> 
<!--including header -->
<body>
<br>
    <!-- Registration form -->
    <form action="registrationphp.php" method="post" name="registrationForm" onsubmit="return checkPasswordMatch()">
        <h1>Registration</h1><br>
        <label for="name">Username:</label>
        <input type="text" id="username" name="username" required autocomplete="off">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required autocomplete="off">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required autocomplete="off">
        <!-- Error message will be displayed here -->
        <div id="error_message"></div>
        <input type="submit" value="Register">
    </form>
<br>

<?php include ('footer.php'); ?> 
<!--including footer -->
</body>
</html>
