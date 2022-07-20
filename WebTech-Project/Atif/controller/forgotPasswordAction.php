<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Change Password</title>
</head>
<body>
	<h1 >Change Password Action</h1>	
	
	<?php

		function test($users)	
		{
			$users = trim($users);
			$users = stripslashes($users);
			$users = htmlspecialchars($users);
			return $users;
		}		
	?>		
	<?php 
		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{	
			
			$Npassword = test($_POST['Npassword']);
			$CNpassword = test($_POST['CNpassword']);
			if (empty($_POST['Npassword']) || empty($_POST['CNpassword']))
			{
				echo "Fill up the boxes properly";			
				?>
				<br>
				<p><b>Password did not changed</b></p>
				<?php				
			}
			else
			{		
				if ($Npassword==$CNpassword)				
			{	$handle = fopen("../Data/User.json", "r");
		        $fr = fread($handle, filesize("../Data/User.json"));  
		        $arr1 = json_decode($fr);		        
		        fclose($handle);

		        $handle = fopen("../Data/User.json", "w");

		        for ($i=0; $i < count($arr1); $i++) { 
		        	
		        		$arr1[$i]->Password = $Npassword;
		        		
		        	
		        			        	
		        }
		        $user = json_encode($arr1);
            	$fw = fwrite($handle, $user);
            	$fc = fclose($handle);

            		echo "Password Reset succesful";
				
			}
			else{
				echo"Password doesn't match";
			}	
		}			
		}
		else
		{
			echo "Can not process GET REQUEST METHOD";
		}	        
	?>
	<br><br>
	<a href="../view/login.php">Go Back</a>
</body>
</html>
