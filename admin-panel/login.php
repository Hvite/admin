<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<h2>Login Page</h2>
	<form action="login.php" method="POST" accept-charset="utf-8">
		<input name="user" placeholder="ID">
		<input type="password" name="pass" placeholder="PASSWORD">
		<input type="submit" value="Login!">
	</form>
	<a href="register.php">Register a new account!</a>
</body>
</html>

<?php
	include("config.php");
	session_start();

	if(isset($_SESSION['error']))
	{
		print  '<p>' . $_SESSION['error'] . '</p>';
	}


	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$myusername = mysqli_real_escape_string($db, $_POST['user']);
    	$mypassword = mysqli_real_escape_string($db, $_POST['pass']); 

    	$sql = "SELECT ID FROM Users WHERE USERNAME = '$myusername' AND PASSWORD = '$mypassword' ";
    	$result = mysqli_query($db, $sql);
    	$row = mysqli_fetch_assoc($result);
    	$count = mysqli_num_rows($result);

    	if($count == 1)
    	{
    		$_SESSION['logged_user'] = $myusername;
    		unset($_SESSION['error']);

    		header("location: index.php");
    	}
    	
    	$_SESSION['error'] = "Your Login Name or Password is invalid";
    	

	}

?>