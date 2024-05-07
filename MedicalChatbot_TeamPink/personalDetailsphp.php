<?php
// Establish connection to the chatbot database
$con = mysqli_connect("localhost", "root", "", "chatbot");

// Retrieve user's personal details from the form submitted via POST method
$username = $_POST['username'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$height = $_POST['height'];
$weight = $_POST['weight'];

// Check if the username already exists in the user table
$query = "SELECT username FROM user WHERE username='$username'";
$result = mysqli_query($con, $query);

// Fetch the result from the query
$row = mysqli_fetch_assoc($result);

// If the username doesn't exist, redirect to registration page
if (!$row) {
    echo "<script> alert('You are not registered with the chatbot. Please register first'); </script>";
    header("refresh:0; url=personalDetails.php");
    exit();
}

// Insert the user's personal details into the userdata table
$insertquery = "INSERT INTO userdata (username, firstName, lastName, email, phone, age, gender, height, weight) 
                VALUES ('$username','$fname','$lname','$email','$phone','$age','$gender','$height','$weight')";

// Execute the insert query and display success/failure messages accordingly
if (mysqli_query($con, $insertquery)) {
    echo "<script> alert('Personal Details recorded successful'); </script>";
    header("refresh:0;url=dashboard.php");
} else {
    echo "<script> alert('Something went wrong, please try again'); </script>";
    header("refresh:0;url=personalDetails.php");
}

// Close the database connection
mysqli_close($con);
?>
