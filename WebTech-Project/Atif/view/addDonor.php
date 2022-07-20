<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Donor</title>
</head>
<body>
<?php include('../view/templete/header.php')  ?> 
    <form action="../controller/addDonorAction.php" method="POST" novalidate>

    <fieldset>
        <legend>Add Donor</legend>
        <label for="fname"> First Name </label>
        <input type="text" id="fname" name="fname">
        &nbsp;
        <label for="lname">Last Name</label>
        <input type="lname" id="lname" name="lname">
        <br><br>
        <label for="age">Age</label>
        <input type="number" id="age" name="age" min="20" max="35">
        <br><br>

        <label>Gender</label>
        <input type="radio" name="gender" id="male" value="male">
			<label for="male">Male</label>
			<input type="radio" name="gender" id="female" value="female">
			<label for="female">Female</label>
			<br><br>

        <label for="email">Email</label>
        <input type="text" id="email" name="email">
        <br><br>
        <label for="Mobile No">Mobile no</label>
        <input type="text" id="mobile" name="mobile">
        <br><br>
        <label for="address">Address</label>
        <input type="text" id="address" name="address">
        <br><br>

        
		<label for="bloodGroup">Blood Group</label>
			<select name="bloodGroup" id="bloodGroup">
				<option disabled selected value> -- select an option -- </option>
				<option value="A+">A+</option>
				<option value="A-">A-</option>
                <option value="B+">B+</option>
				<option value="O-">O-</option>
                <option value="AB-">AB-</option>
			</select>
		
       
        <br>
        <hr>
        <input type="submit" name="addDonor" value="ADD DONOR">


    </fieldset>

    </form>
    <a href="../view/homePage.php">Go Back</a>
</body>
</html>