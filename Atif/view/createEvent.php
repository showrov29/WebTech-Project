<?php 
session_start();
$username = $_SESSION['username'];
	if (!isset($_SESSION['username'])) {
		header("Location:login.php");
	  } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
</head>
<body>
<?php include('../view/templete/header.php')  ?> 
    
<form action="../controller/createEventAction.php" method="POST" novalidate>
    <fieldset>
        <legend>Create Event</legend>
        <label for="edate"> Event Date</label>
        <input type="date" id="edate" name="edate">
        &nbsp;
        <label for="etime"> Event Time</label>
        <input type="time" id="etime" name="etime">
        <br><br>
        <label for="location"> Location </label>
        <input type="text" id="location" name="location" size="50">
        <br>
        <hr>
        <input type="submit" name="Create" value="Create">


    </fieldset>
</form>
<a href="../view/homePage.php">Go Back</a>
<?php include('../view/templete/footer.php') ?> 
</body>
</html>