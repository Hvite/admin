<?php


$conn = mysqli_connect("localhost", "root","") or die(mysql_error());

if($conn)
	print "Success!<br>";

// create a database

//$sql = 'create database social';
//$query = mysqli_query($conn, $sql);

$db = mysqli_select_db($conn, "social") or die("Cannot connect to database"); //Connect to database

if($db)
{
	print 'database loaded!<br>';
}

// create a table

$sql = "
	CREATE TABLE Posts(
		ID INT NOT NULL auto_increment,
		USERID INT NOT NULL,
		DESCRIPTION VARCHAR(32) NOT NULL,
		public varchar(3) not null,
		created_at TIMESTAMP,
		updated_at TIMESTAMP,
		PRIMARY KEY (ID)
	);
";


// insert a user into users
//$sql = "INSERT INTO Users (ID, USERNAME, PASSWORD, created_at) values ('1', 'test', '1234', now())";

//$sql = "SELECT * FROM Posts";

$query = mysqli_query($conn, $sql);

$sql = "SELECT * FROM Posts";

$query = mysqli_query($conn, $sql);


while($row = mysqli_fetch_assoc($query))
{
	print $row['ID'] . '<br>';
	print $row['USERID'] . '<br>';
	print $row['DESCRIPTION'] . '<br>';
	print $row['public'] . '<br>';
	print $row['created_at'] . '<br>';
	print $row['updated_at'] . '<br>';
}