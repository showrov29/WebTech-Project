<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1>Welcome </h1>
	<h1>Login</h1>
	<form action="../controller/loginAction.php" method="POST" novalidate >
		
			<label for="username">Username:</label>
			<input type="text" name="username" id="username" autofocus >
			<br><br>
			<label for="password">Password:</label>
			<input type="password" name="password" id="password" >
			<br><br>
			<input type="submit" name="login" value="Login">
		
		<br>
		<P>Not a member yet?</P>
		<a href="Registration.php">
			Sign Up
		</a>
		<br>
		<br>
		
		<a href="ForgotPassword.php">
			Forgot Password
		</a>
	</form>
</body>
	<?php include('templete/footer.php');?>
</html>