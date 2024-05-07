<?php
// Start the session to access session variables
session_start();

// Establish connection to the chatbot database
$con = mysqli_connect("localhost", "root", "", "chatbot");

$tableQuery = "CREATE TABLE medicalhistory (
    username VARCHAR(20) PRIMARY KEY,
    medication TEXT,
    allergy TEXT,
    ongoingtreatment TEXT,
    FOREIGN KEY (username) REFERENCES user(username)
)";

// Execute the table creation query
mysqli_query($con, $tableQuery);

// Retrieve user's personal details from the form submitted via POST method
$username = $_SESSION['username'];
$prevMedication = $_POST['prevMedication'];
$allergy = $_POST['allergy'];
$ongoingtreatment = $_POST['ongoingtreatment'];

// Insert the user's medical history into the medicalhistory table
$insertQuery = "INSERT INTO medicalhistory (username, prevmedication, allergy, ongoingtreatment)
                VALUES ('$username', '$prevMedication', '$allergy', '$ongoingtreatment')";

// Execute the insert query and display success/failure messages accordingly
if (mysqli_query($con, $insertQuery)) {
    echo "<script> alert('Medical data recorded successfully');</script>";
    header("refresh:0;url=dashboard.php");
} else {
    echo "<script> alert('Error. Medical data not recorded');</script>";
    header("refresh:0;url=dashboard.php");
}

// Close the database connection
mysqli_close($con);
?>
