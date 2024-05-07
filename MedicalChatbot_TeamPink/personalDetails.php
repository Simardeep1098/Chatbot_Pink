<!DOCTYPE html>
<html>
<head>
	<title>Personal Details Page</title>
	<link rel="stylesheet" href="personalDetails.css">
</head>
<?php include ('h.php'); ?> 
<!--including header -->
<body>
<br><br><br>
	<form action="personalDetailsphp.php" method="post" name="personalDetailsForm" onsubmit="return personalDetails()">
		<h1>Personal Details</h1><br>
		<table>
			<tr>
				<td colspan="3">
					<label for="username">Confirm your User Name:</label>
					<input type="text" id="username" name="username" required autocomplete="off">					
				</td>
			</tr>
			<tr>
				<td> 
					<label for="name">First Name:</label>
					<input type="text" id="fname" name="fname" pattern="[A-Za-z ]+" required oninvalid="this.setCustomValidity('Please enter a valid first name with alphabets only')" onchange="this.setCustomValidity('')" autocomplete="off">
				</td> 
				<td></td>
				<td>
					<label for="name">Last Name:</label>
					<input type="text" id="lname" name="lname" pattern="[A-Za-z ]+" oninvalid="this.setCustomValidity('Please enter a valid last name with alphabets only')" onchange="this.setCustomValidity('')" required autocomplete="off">
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<label for="email">Email:</label>
					<input type="email" id="email" name="email" required autocomplete="off">
				</td>
			</tr>
			<tr>
				<td>
					<label for="phone">Phone Number:</label>
					<input type="tel" id="phone" name="phone" pattern="[0-9]{9}" oninvalid="this.setCustomValidity('Please enter a valid phone number. Digits only')" onchange="this.setCustomValidity('')" required autocomplete="off">
				</td>
				<td></td>
				<td>
					<label for="age">Age:</label>
					<input type="number" id="age" name="age" min="1" required autocomplete="off">
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<label for="Gender">Gender:</label><br>
					<input type="radio" id="male" name="gender" value="male" required>
					<label for="male">Male</label> &nbsp &nbsp &nbsp &nbsp &nbsp
					<input type="radio" id="female" name="gender" value="female">
					<label for="female">Female</label> &nbsp &nbsp &nbsp &nbsp &nbsp
					<input type="radio" id="other" name="gender" value="other">
					<label for="other">Other</label><br><br>
				</td>
			</tr>
			<tr>
				<td>
					<label for="height">Height: (in cms)</label>
					<input type="number" id="height" name="height" min="0" required autocomplete="off">	
				</td>
				<td> &nbsp &nbsp </td>
				<td>
					<label for="weight">Weight: (in kgs)</label>
					<input type="number" id="weight" name="weight" min="0" required autocomplete="off">
				</td>
			</tr>
		
		</table>
		<input type="submit" value="Submit">
	</form>
<?php include ('footer.php'); ?> 
<!--including footer -->
</body>
</html>