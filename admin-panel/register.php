<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
	<h2>Registration Page</h2>
	<form action="register.php" method="POST" accept-charset="utf-8">
		<input name="user" placeholder="Username" required="required">
		<input type="password" name="pass" placeholder="Password" required="required">
		<input type="submit" value="Register!">
	</form>
	<a href="login.php">Login with an existing account!</a>
</body>
</html>

<?php
	include("config.php");


	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$myusername = mysqli_real_escape_string($db, $_POST['user']);
    	$mypassword = mysqli_real_escape_string($db, $_POST['pass']); 
    	$bool = false;

    	$sql = "SELECT username FROM Users";
    	$result = mysqli_query($db, $sql);
    	//$count = mysqli_num_rows($result);

    	while($row = mysqli_fetch_assoc($result))
    	{
    		if($myusername == $row['username'])
    		{
    			$bool = false;
    			Print '<script>alert("Username has been taken!");</script>';
    			Print '<script>window.location.assign("register.php");</script>';
    		}
    		else
    		{
    			$bool = true;
    		}

    	}

    	if($bool) 
    	{
    		mysqli_query($db, "INSERT INTO Users (USERNAME, PASSWORD,created_at) VALUES ('$myusername','$mypassword', now())");
    		Print '<script>alert("Successfully Registered!");</script>';
			Print '<script>window.location.assign("login.php");</script>';
    	}
	}
?>
