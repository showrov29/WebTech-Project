<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<?php include('templete/header.php')  ?>

	<?php 

	$username = "";
	$password = "";

	//var_dump($_SESSION['username']);
	if (isset($_SESSION['username'])) 
	{
		$handle = fopen("../Data/User.json", "r");
		$fr = fread($handle, filesize("../Data/User.json"));

		$arr1 = json_decode($fr);		
		fclose($handle);

		for ($i=0; $i < count($arr1); $i++) 
		{ 
			if ($username == $arr1[$i]->Username) 
			{
				if($password == NULL )
				{
					//echo "Please fill password";
				}
				else
				{
					$password = $arr1[$i]->Password;
				}

			}
		}
	}
	else
	{	
		die("Invalid REQUEST");
	}
	?>

	<h1 >Update Password</h1>

	<form action="../controller/changePasswordAction.php" method="POST" enctype="application/x-www-form-urlencoded">

		<label for="uname">Username</label>
		<input type="text" name="username" id="uname" value="<?php echo $_SESSION['username'] ?>" size="25" maxlength="5" disabled >			
		<br><br>
		<label for="password"> New Password</label>
		<input type="password" name="password" id="password" >
		<br><br>		
		<input type="submit" name="Update" value="Update">

		<br><br>
		<a href="../view/homePage.php">Go Back</a>
		
	</form>
	<?php include('templete/footer.php')  ?>
</html>