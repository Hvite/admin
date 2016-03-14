<?php

	include('session.php');


	if($_SERVER['REQUEST_METHOD'] = "POST")
	{
		$description = mysqli_real_escape_string($db, $_POST['description']);
		$public = isset($_POST['public']) ? 'yes' : 'no';

		$sql = "
			INSERT INTO Posts (USERID, DESCRIPTION, public, created_at) 
			VALUES ('$userId', '$description','$public', now());
		";

		$result = mysqli_query($db,$sql);

		header("location:index.php");
	}