<?php 
	
	session_start();
	if (isset($_SESSION['username'])) {
		header("Location: ../view/homePage.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>

	<?php

		function test($data)	
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}		
	
		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{

			$Username = test($_POST['username']);
			$Password = test($_POST['password']);

			$_SESSION['username']=$_POST['username'];
			if (empty($Username) || empty($Password)) 
			{
					echo "Fill up the form properly";
					echo "<br>";
					echo "Go back to Login Page and Try again with valid username or password";					
			}
			else
			{			

				$handle = fopen("../Data/User.json", "r");
				$fr = fread($handle, filesize("../Data/User.json"));
				$arr1 = json_decode($fr);	
					

				for ($i=0; $i < count($arr1) ; $i++) 
				{ 
					if(($Username == $arr1[$i]->Username) && $Password == $arr1[$i]->Password)			
					{
						//$_SESSION['username'] = $username;
						header("Location: ../view/homePage.php");
					}
					else
					{ 
						echo "Log in failed";
						break;
					}
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