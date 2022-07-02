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

$handle = fopen("../Data/donorList.json", "r");
$fr = fread($handle, filesize("../Data/donorList.json"));
$arr1 = json_decode($fr);	

    
	echo "<table border=1>";
	echo "<tr>";
		echo "<th>Fist Name </th>";
		echo "<th>Last Name</th>";
        echo "<th>Gender</th>";
        echo "<th>Email</th>";
        echo "<th>Mobile</th>";
        echo "<th>Blood Group</th>";
		echo "<th>Age</th>";
		echo "</tr>";
		for ($i=0; $i < count($arr1) ; $i++) {
		echo "<tr>";
			echo "<td>" . $arr1[$i]->Fname . "</td>";
			echo "<td>" . $arr1[$i]->Lname . "</td>";
            echo "<td>" . $arr1[$i]->gender . "</td>";
            echo "<td>" . $arr1[$i]->email . "</td>";
            echo "<td>" . $arr1[$i]->mobile . "</td>";
			echo "<td>" . $arr1[$i]->blood . "</td>";
			echo "<td>" . $arr1[$i]->age . "</td>";
		echo "</tr>";
	}
	echo "</table>";

	fclose($handle);
?>
<br>
<a href="../view/homePage.php">Go Back</a>
<?php include('../view/templete/footer.php') ?> 

</html>