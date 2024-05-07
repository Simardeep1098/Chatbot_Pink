<?php

// establishing database connection
$con = mysqli_connect("localhost","root","","chatbot");

// getting form data
$username = $_POST['username'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirm_password'];

// creating user table
$usertablequery =  "create table `user` (
  `userID` int(9) NOT NULL AUTO_INCREMENT UNIQUE,
  `username` varchar(50) NOT NULL PRIMARY KEY,
  `password` varchar(60) NOT NULL
)";
mysqli_query($con,$usertablequery);

// creating user data table
$userdatatablequery =  "create table userdata (
username varchar(50) NOT NULL PRIMARY KEY,
firstName varchar(50) NOT NULL,
lastName varchar(50) NOT NULL,
email varchar(100) NOT NULL,
phone BIGINT NOT NULL,
age INT(3) NOT NULL,
gender varchar(30) NOT NULL,
height float NOT NULL,
weight float NOT NULL
)";
mysqli_query($con,$userdatatablequery);

// hashing the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// inserting user data into user table
$insertquery = "insert into user(username,password) values('$username','$hashed_password')";

// checking if query is successful
if(mysqli_query($con,$insertquery)){
	echo "<script> alert('Registration successful');</script>";
	header("refresh:0;url=personalDetails.php");
	// if successful, present user with registration successful pop up and send user to personalDetails.php page
}
else{
	echo "<script> alert('Something went wrong, please try again'); </script>";
	header("refresh:0;url=registration.php");
	// if not successful, present user with try again pop up and send user to registration.php page
}

// Close the database connection
mysqli_close($con);

?>
