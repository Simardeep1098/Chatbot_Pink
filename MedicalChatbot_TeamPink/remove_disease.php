<!DOCTYPE html>
<html>
<head>
    <title>Remove Disease</title>
    <script>
        function displayPromptAndRedirect() {
            if (confirm("Disease removed successfully. Click 'OK' to return to the admin panel.")) {
                window.location.href = "admin_panel.php"; // Redirect to the admin panel
            } else {
                window.location.href = "admin_panel.php"; // Redirect to the admin panel on cancel as well
            }
        }
    </script>
</head>
<body>
    <?php
    // Establish a database connection
    $con = mysqli_connect("localhost", "root", "", "chatbot");

    if (isset($_POST['disease_id'])) {
        $diseaseId = $_POST['disease_id'];
        
        // Perform the deletion based on the provided disease ID
        $deleteQuery = "DELETE FROM newdiseases WHERE disease_id = $diseaseId";
        if (mysqli_query($con, $deleteQuery)) {
            echo "<script>displayPromptAndRedirect();</script>";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }

    // Close the database connection
    mysqli_close($con);
    ?>
</body>
</html>
