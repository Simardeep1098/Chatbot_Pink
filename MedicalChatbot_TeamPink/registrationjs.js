// This function checks if the password and confirm password fields in the registration form match
function checkPasswordMatch() {
			// Get the value of the password and confirm password fields
			var password = document.getElementById("password").value;
			var confirmPassword = document.getElementById("confirm_password").value;

			// Check if the password and confirm password values are the same
			if (password != confirmPassword) {
				// If they don't match, show an error message with styling
				document.getElementById("error_message").innerHTML = "<span style='color: red;'>Password and Confirm Password does not match!</span>";
				document.getElementById("error_message").style.marginBottom = "10px";
				return false;
			}
			else {
				// If they match, clear the error message
				document.getElementById("error_message").innerHTML = "";
				// Return true to allow the form to be submitted
				return true;
			}
		}