<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Action</title>
</head>
<body>
	<h1>Sign Up</h1>

	
	<?php

		function test($data)	
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}		
	?>
	<?php
	$flag=0;


	$firstnameErrMsg=$lastnameErrMsg=$genderErrMsg=$emailErrMsg=$mobilenoErr="None";
		if($_SERVER['REQUEST_METHOD']==="POST")
		{
			$First_name= test($_POST['fname']);
            $Last_name=test($_POST['lname']);
			$Phone= test($_POST['phone']);
			$Username= test($_POST['username']);
			$Password= test($_POST['password']);
			$Email= test($_POST['email']);
			

			if(empty($First_name) || empty($Last_name) || empty($Phone) || empty($Username) || empty($Password))
			{
				$flag=1;
				echo "Fill up the form properly";
				echo "<br><br>";
				?>
				<p><b>Registration Failed</b></p>
				<?php
			}
			else
			{
				if (!preg_match("/^[a-zA-Z-' ]*$/",$First_name)) {
					$firstnameErrMsg = "Only letters and spaces allowed.";
					$flag=1;
					}
				
				
					if (!preg_match("/^[a-zA-Z-' ]*$/",$Last_name)) {
					$lastnameErrMsg = "Only letters and spaces allowed.";
					$flag=1;
					}
				
				
				
					if(!empty($Email)){
						if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
							$emailErrMsg = "Please enter valid email .";
							$flag=1;
						}
					}
				
				
					if (!preg_match("/^[0-9]*$/",$Phone)) {
					$mobilenoErr = "Only numbers are allowed.";
					$flag=1;
	
					}

					if ($flag===1)
					{
						echo"<h4> Erros :</h4>";
						echo "<br><br>";
						echo "First name: " . $firstnameErrMsg;
						echo "<br><br>";
						echo "Last name: " . $lastnameErrMsg;
						echo "<br><br>";
				
						echo "Phone: " . $mobilenoErr;
						echo "<br><br>";
						echo "Email: " . $emailErrMsg;
						echo "<br><br>";
					}

			

if ($flag===0)
{


	if($_POST['password'] != NULL)
	{
	$user=array("Fname"=>$First_name,"Lname"=>$Last_name, "Phone"=>$Phone, "Username"=>$Username, "Password"=>$Password,);

	$handle = fopen("../Data/User.json","r");

	$fr = fread($handle, filesize("../Data/User.json"));
	
	$arr1=json_decode($fr);
	$fc=fclose($handle);
	$handle= fopen("../Data/User.json","w");

	if($arr1 === NULL)
	{
		$user=array($user);
		$user=json_encode($user);
		$fw=fwrite($handle, $user);
	}
	else
	{
		$arr1[]= $user;
		$user=json_encode($arr1);
		$fw=fwrite($handle, $user);
	}
	$fc=fclose($handle);


				echo "First name: " . $First_name;
				echo "<br><br>";
                echo "Last name: " . $Last_name;
				echo "<br><br>";

				echo "Phone: " . $Phone;
				echo "<br><br>";
				echo "Username: " . $Username;
				echo "<br><br>";

				echo"Registration Successful";
		}
		else
		{
			echo "Password can't be empty.";
		}
	}
}



			}


		else
		{
			echo "Can not process GET REQUEST METHOD";
		}

		
		/*if(filesize("../model/user.json")==0)
		{
			//
		}

		else
		{*/
			

	?>
	<a href="../view/login.php">Go Back</a>
</body>
</html>