<?php 
session_start();
$username = $_SESSION['username'];
	if (!isset($_SESSION['username'])) {
		header("Location:login.php");
	  } 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Donors</title>

</head>
<body>
<?php include('../view/templete/header.php')  ?> 
<?php 

$handle = fopen("../Data/feedback.json", "r");
$fr = fread($handle, filesize("../Data/feedback.json"));
$arr1 = json_decode($fr);	

    
	echo "<table border=1>";
	echo "<tr>";
		echo "<th>Name</th>";
		echo "<th>Email</th>";
        echo "<th>Rating</th>";
        echo "<th>Suggestion</th>";
		echo "</tr>";
		for ($i=0; $i < count($arr1) ; $i++) {
		echo "<tr>";
			echo "<td>" . $arr1[$i]->name . "</td>";
			echo "<td>" . $arr1[$i]->email . "</td>";
            echo "<td>" . $arr1[$i]->rating . "</td>";
            echo "<td>" . $arr1[$i]->suggestion . "</td>";
		echo "</tr>";
	}
	echo "</table>";

	fclose($handle);
?>
<br>
<a href="../view/homePage.php">Go Back</a>
<?php include('../view/templete/footer.php') ?> 

</html>