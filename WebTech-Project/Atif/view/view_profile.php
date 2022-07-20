<?php 
	session_start()
?>
<!DOCTYPE html>
<html>
<?php include('templete/header.php')  ?>
	<?php
	
	$username = $_SESSION['username'];
	$handle = fopen("../Data/User.json", "r");
	$fr = fread($handle, filesize("../Data/User.json"));
	$decode = json_decode($fr);
	for ($i=0; $i < count($decode) ; $i++)
	{ 		
		if ($username == $decode[$i]->Username)
		{
		
			$First_name= $decode[$i]->Fname;
			$Last_name= $decode[$i]->Lname;
			$Phone= $decode[$i]->Phone;
			$Username= $decode[$i]->Username;
		}
	}
	$fc = fclose($handle);
?>
	<b>Profile Information</b>	
				
	<?php
		echo "<br>";
		echo "<br>";
		echo "First Name: " . $First_name;
		echo "<br><br>";
        echo "Last Name: " . $Last_name;		
		echo "<br><br>";				 				
		echo "Phone: " . $Phone;
		echo "<br><br>";
	?>
	<a href="../view/homePage.php">Go Back</a>
</body>
	<?php include('templete/footer.php')  ?>
</html>