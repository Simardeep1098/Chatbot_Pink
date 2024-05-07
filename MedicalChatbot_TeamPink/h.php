<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>header</title>

	<style>

    *{
      margin: 0px;
      padding: 0px;
    }
    /* Header Styles */
    #header {
      background-color: #f2f2f2;
      padding-top: 6px;
      padding-bottom: -10px;
      text-align: center;
      display: flex;
      align-items: center;
      position: fixed;
      top: 0;
      width: 100%;
    }
    #logo {
      flex: 1;
      text-align: left;
    }
    #logo img {
      height: 120px;
    }
    #websiteName {
      font-size: 40px;
      flex: 2;
      font-weight: bold;
    }
    #loginSignup {
      flex: 1;
      text-align: right;
      padding-right: 30px;
    }
    #loginBtn, #signupBtn {
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 10px 30px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 20px;
      margin-left: 10px;
      cursor: pointer;
    }
    #dynamicText {
      background-color: #f2f2f2;
      padding: 12px 20px 10px;
      text-align: center;
      margin-top: 140px; 
      width: 97.4%;
    }
  </style>

  <script>
    // JavaScript code
    window.onload = function() {
      var dynamicText = document.getElementById('dynamicTextContent');
      var texts = ["How are you?", "How can I help you?", "Feel free to talk to me!", "Hope you're feeling well!"]; // Array of dynamic texts
      
      var index = 0;
      setInterval(function() {
        dynamicText.textContent = texts[index];
        index = (index + 1) % texts.length;
      }, 2000); // Change text every 2 seconds
    };
	</script>

</head>

<body>
<div id="header">
    <div id="logo">
      <a href="homepage.php"><img src="logo.svg" alt="Logo"></a>
    </div>
    <div id="websiteName">
      Welcome to Chatbot for Medical Advice
    </div>

<?php
session_start();

// Check if the session is set after login
if (isset($_SESSION['username'])) {
    $loginButtonText = "Logout";
    $loginButtonLink = "logout.php"; // Replace with the actual logout script or page
    $registerButtonText = "Chat";
    $registerButtonLink = "dashboard.php"; // Replace with the actual chat page
} else {
    $loginButtonText = "Login";
    $loginButtonLink = "login.php"; // Replace with the actual login page
    $registerButtonText = "Register";
    $registerButtonLink = "registration.php"; // Replace with the actual registration page
}
?>

<div id="loginSignup">
<a href="<?php echo $loginButtonLink; ?>" id="loginBtn"><?php echo $loginButtonText; ?></a>
<a href="<?php echo $registerButtonLink; ?>" id="signupBtn"><?php echo $registerButtonText; ?></a>
</div>
</div>

<div id="dynamicText">
<h2 id="dynamicTextContent">Welcome to Chatbot for Medical Advice</h2>
</div>

</body>
</html>