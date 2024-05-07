<?php
$conn = mysqli_connect("localhost", "root", "", "chatbot");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInput = $_POST["user_input"];

    // Split the user input into individual words
    $userWords = explode(" ", $userInput);

    // Initialize the disease variable to an empty string
    $disease = "";

    // Construct a database query based on the user words
    $query = "SELECT * FROM medical_information WHERE ";
    $conditions = array();

    foreach ($userWords as $word) {
        $conditions[] = "disease LIKE '%$word%' OR symptoms LIKE '%$word%'";
    }

    $query .= implode(" OR ", $conditions);

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $disease = $row["disease"];
        $symptoms = $row["symptoms"];
        $precautions = $row["precautions"];
        $remedies = $row["remedies"];

        $botResponse = "<br>";
        $botResponse .= "Here's some information about $disease <br>";
        $botResponse .= "Symptoms: $symptoms<br>";
        $botResponse .= "Precautions: $precautions<br>";
        $botResponse .= "Remedies: $remedies";
    } else {

        $createTable = "CREATE TABLE newDiseases (
        disease_id INT AUTO_INCREMENT PRIMARY KEY,
        disease_name VARCHAR(255) NOT NULL,
        date_time DATETIME DEFAULT CURRENT_TIMESTAMP
        )";
        mysqli_query($conn, $createTable);

        $disease = mysqli_real_escape_string($conn, $userInput); 
        $insertQuery = "INSERT INTO newDiseases (disease_name) VALUES ('$disease')";

        if ($conn->query($insertQuery) === TRUE) {
            $botResponse = "Sorry, I couldn't find information about the disease you mentioned.";
            $botResponse .= "<br><br>We truly appreciate your interest in our platform and your query about the specific disease. Unfortunately, we don't have information on it in our system right now. But please know that we've recorded your request and are dedicated to expanding our knowledge base. <br><br> Your curiosity inspires us to do better, and we're actively working to gather accurate information about the disease you mentioned. We promise to make it available to you as soon as we have it. <br><br> Thank you for being a part of our community, and for your patience. If you have any other questions or need assistance with anything else, please don't hesitate to ask. We're here for you. <br><br> Warm regards, <br> Medical Chatbot";
        } else {
            $botResponse = "Error while recording the disease: " . $conn->error;
        }
   
    }

    echo $botResponse;
}
?>
