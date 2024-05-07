<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- This meta tag sets the viewport for responsive design -->
	<title>Login Page</title> <!-- This tag sets the title of the HTML document -->
	<link rel="stylesheet" href="logincss.css"> <!-- This tag links to an external stylesheet for styling -->
</head>
<?php include ('h.php'); ?> 
<!--including header -->
<body>
<br><br><br>
	<!-- This tag defines a form for the login inputs -->
	<form action="loginphp.php" method="post" name="loginForm"> 
		<h1>Login</h1> <!-- This tag defines a heading for the login form -->
		<label for="username">Username:</label> <!-- This tag defines a label for the username input field -->
		<input type="text" id="username" name="username" required autocomplete="off"> <!-- This tag defines an input field for the username -->
		<label for="password">Password:</label> <!-- This tag defines a label for the password input field -->
		<input type="password" id="password" name="password" required autocomplete="off"> <!-- This tag defines an input field for the password -->
		<input type="submit" value="Submit"> <!-- This tag defines a submit button for the form --><br><br>
		<p id="ntw"> New to website? <a href="registration.php"> Register </a></p> <!-- This tag defines a paragraph with a link to the registration page -->
	</form>
<br><br>

<?php include ('footer.php'); ?> 
<!--including footer -->
</body>
</html>