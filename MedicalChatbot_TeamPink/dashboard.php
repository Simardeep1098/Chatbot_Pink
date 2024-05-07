<?php
    $conn = new mysqli("localhost", "root", "", "chatbot");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    include ('h.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="dashboard.css">
    <title>Dashboard</title>

     <script>
    // JavaScript to handle adding new messages
    function sendMessage() {
        var userInput = document.getElementById('userInput').value;

        if (userInput.trim() !== "") {
            var chatDiv = document.getElementById('chatDiv');
            
            // Create and append user message
            var userMessage = document.createElement('div');
            userMessage.className = 'message user';
            userMessage.innerHTML = '<p> User: ' + userInput + '</p>';
            chatDiv.appendChild(userMessage);

            // Smooth scroll to the bottom after adding user message
            chatDiv.scrollTo({
                top: chatDiv.scrollHeight,
                behavior: 'smooth'
            });

            // Send user input to the server using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "dashboardphp.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Create and append bot message
                    var botMessage = document.createElement('div');
                    botMessage.className = 'message bot';
                    botMessage.innerHTML = '<p> Bot: ' + xhr.responseText + '</p>';
                    chatDiv.appendChild(botMessage);

                    // Smooth scroll to the bottom after adding bot message
                    chatDiv.scrollTo({
                        top: chatDiv.scrollHeight,
                        behavior: 'smooth'
                    });
                }
            };
            xhr.send("user_input=" + encodeURIComponent(userInput));

            // Clear the input field after sending
            document.getElementById('userInput').value = "";
        }
    }
</script>

</head>
<body>

<div id="main">
    <div class="side-menu">
        <table class="side-menu-table">
            <tr>
                <td class="icons">
                    <img src="menu_icon.svg" alt="Menu" height="40px" width="40px">
                </td>
                <td class="icon-name">Menu</td>
            </tr>
            <tr>
                <td class="icons">
                    <img src="profile_icon.svg" alt="profile" height="40px" width="40px">
                </td>
                <td class="icon-name">Profile</td>
            </tr>
            <tr>
                <td class="icons">
                    <a href="homepage.php">
                        <img src="home_icon.svg" alt="home" height="40px" width="40px">
                    </a>
                </td>
                <td class="icon-name"> <a href="homepage.php">Home</a></td>
            </tr>
            <tr>
                <td class="icons">
                    <img src="settings_icon.svg" alt="settings" height="40px" width="40px">
                </td>
                <td class="icon-name">Settings</td>
            </tr>
            <tr>
                <td class="icons">
                    <a href="medicalDetails.php">
                        <img src="medicalHistory_icon.svg" alt="medicalHistory" height="40px" width="40px">
                    </a>
                </td>
                <td class="icon-name"><a href="medicalDetails.php">Medical Details</a></td>
            </tr>
            <tr>
                <td class="icons">
                    <img src="exit_icon.svg" alt="exit" height="40px" width="40px">
                </td>
                <td class="icon-name"> <a href="dashboard.php"> Start New Chat </a></td>
            </tr>
        </table>
    </div>

    <div id="seperator">
        <!-- just a seperator line -->
    </div>

    <div class="chat" id="chatDiv">
        <div class="messages">
            <p>Bot: Welcome to the chat! How can I help you today?</p>
        </div>
    </div>

</div>     
         <!-- Display user messages here -->

         <!-- Form with input field to collect user input -->
        <form action="dashboardphp.php" method="post" onsubmit="sendMessage(); return false;">
        <input type="text" name="user_input" id="userInput" placeholder="I am suffering from....." autocomplete="off">
        <button type="submit">Send</button> 
        </form>


</body>
</html>

<?php include ('footer.php'); ?> 
    