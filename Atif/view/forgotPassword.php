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
	<title>Forgot password</title>
	
</head>
<body>
	<h1>Reset Password</h1>
	<form action="../view/forgotPassword.php" method="POST" novalidate >
		<label for="username">Username:</label>
		<input type="text" name="username" id="username" autofocus >
		<br><br>
		<label for="phone">Phone number:</label>
		<input type="tel" name="phone" id="phone" required>
		<br><br>
		<input type="submit" name="submit" value="Check">
		<br><br>
		<a href="../view/login.php">Go back</a>
	
	<?php 

    $link_address="../controller/forgotPassword2.php";
		function test($data)	
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

	if ($_SERVER['REQUEST_METHOD'] == "POST")
		{

			$uname = test($_POST['username']);
			$Phone = test($_POST['phone']);

			if(!isset($uname) || $uname === null || !isset($Phone)||$Phone=== null)
			{
				echo "Fill up the box";
				echo "<br>";
			}
			else
			{

				$handle = fopen("../Data/User.json", "r");
				$fr = fread($handle, filesize("../Data/User.json"));
				$arr1 = json_decode($fr);

				$flag = false;
				for ($i=0; $i < count($arr1) ; $i++) 
				{ 
					if(($uname === $arr1[$i]->Username) && ($Phone ===$arr1[$i]->Phone))
					{
							$flag = true;
							$fc = fclose($handle);
							break;
					}
					else
					{						
						$flag == false;
					}
				}
				if ($flag === true)
				{
                    echo '<h4>User "' . $uname . '" found</h4>';
                    echo"<br>";
                    echo" Click the Link below to continue ";
					echo "<br>";
					echo "<a href='".$link_address."'>Reset Password</a>";

				}
				else
				{
					echo '<h4 >' . $uname . ' not found </h4>';
					echo "<br>Please insert the correct information";
				}
				?>
				
	<?php

            	
			}
		}
	?>
		
</body>
	<?php include('templete/footer.php');?>
</html>
