<!DOCTYPE html>
<html>
<head>
	<title>Medical Details</title>
	<link rel="stylesheet" href="medicalDetails.css">
</head>
<?php include ('h.php'); ?> 
<!--including header -->
<body>
    <br>
    <form action="medicalDetailsphp.php" method="post" name="medicalDetailsForm">
        <h1>Medical Details</h1><br>
        <tr>
            <td colspan="3"> 
                <label>Any Previous Medication:</label>
                <input type="text" id="prevMedication" name="prevMedication" >					
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <label1>Any Allergies:</label1>
                <input type="text" id="allergies" name="allergies" >
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <label2>Any Ongoing Treatments:</label2>
                <input type="text" id="treatments" name="treatments" >
            </td>
        </tr>
        <input type="submit" value="Submit">
    </form>
<br>

<?php include ('footer.php'); ?> 
<!--including footer -->
</body>
</html>