

<?php
session_start();

// Check if the user is logged in as an admin
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

$con = mysqli_connect("localhost", "root", "", "chatbot");
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['diseaseName'])) {
    // Get the disease details from the form
    if (isset($_POST['diseaseName'])) {
        $diseaseName = $_POST['diseaseName'];
    }

    if (isset($_POST['remedies'])) {
        $remedies = $_POST['remedies'];
    }

    if (isset($_POST['precautions'])) {
        $precautions = $_POST['precautions'];
    }

    if (isset($_POST['symptoms'])) {
        $symptoms = $_POST['symptoms'];
    }

    // Perform input validation and database insertion
    if (!empty($diseaseName) && !empty($remedies) && !empty($precautions) && !empty($symptoms)) {
        $insertQuery = "INSERT INTO medical_information (disease, remedies, precautions, symptoms) VALUES ('$diseaseName', '$remedies', '$precautions', '$symptoms')";
        $insertResult = mysqli_query($con, $insertQuery);

        if ($insertResult) {
            // Successfully added the disease
            $success = "Disease added successfully!";
            echo '<script>alert("Disease added successfully!");</script>';
            echo '<script>setTimeout(function(){ window.location = "admin_panel.php"; }, 100);</script>';
        } else {
            // Handle the error if insertion fails
            $error_message= "Error adding disease: " . mysqli_error($con);
        }
    } else {
        // Handle input validation error
        $error_message = "Please fill in all required fields.";
    }
}

// Close the database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Disease</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
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
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="text"]:focus,
        textarea:focus {
            border: 1px solid #007BFF;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        p.error-message {
            color: red;
            margin-top: 10px;
        }

        p.success-message {
            color: #00C853;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Add Disease</h1>
    <?php
    if (isset($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
    }
    if (isset($success)) {
        echo "<p style='color: green;'>$success</p>";
    }
    ?>
    <form method="post" action="">
        <label for="diseaseName">Disease Name:</label>
        <input type="text" id="diseaseName" name="diseaseName" required><br>
        <label for="remedies">Remedies:</label>
        <textarea id="remedies" name="remedies" required></textarea><br>
        <label for="precautions">Precautions:</label>
        <textarea id="precautions" name="precautions" required></textarea><br>
        <label for="symptoms">Symptoms:</label>
        <textarea id="symptoms" name="symptoms" required></textarea><br>
        <input type="submit" value="Add Disease">
    </form>
</body>
</html>