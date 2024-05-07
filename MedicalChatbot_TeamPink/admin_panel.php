<?php
session_start();

// Check if the user is logged in as an admin
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

$con = mysqli_connect("localhost", "root", "", "chatbot");

// Query to retrieve user data
$userQuery = "SELECT * FROM userdata";
$userResult = mysqli_query($con, $userQuery);

// Query to retrieve new disease data
$diseaseQuery = "SELECT * FROM newdiseases";
$diseaseResult = mysqli_query($con, $diseaseQuery);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - User List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            text-align: center;
        }
        
        h1 {
            color: #333;
        }

        h2 {
            color: #007BFF;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            text-decoration: underline;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Welcome, Admin!</h1>

    <h2>Registered Users:</h2>
    <table>
        <tr>
            <th>User Name</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($userResult)) {
            echo "<tr>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['firstName'] . "</td>";
            echo "<td>" . $row['lastName'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h2>New Diseases to Add:</h2>
<table>
    <tr>
        <th>Disease Name</th>
        <th>Actions</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($diseaseResult)) {
        echo "<tr>";
        echo "<td>" . $row['disease_name'] . "</td>";
        echo '<td><form method="post" action="remove_disease.php">';
        echo '<input type="hidden" name="disease_id" value="' . $row['disease_id'] . '">';
        echo '<button type="submit">Remove</button>';
        echo '</form></td>';
        echo "</tr>";
    }
    ?>
    </table>

    <!-- Add Disease Button -->
    <form action="admin_add_disease.php" method="post">
        <button type="submit">Add Disease</button>
    </form>
    <a href="admin_logout.php">Logout</a>
</body>
</html>

<?php
// Close the database connection
mysqli_close($con);
?>
