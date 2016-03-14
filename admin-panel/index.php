<?php
	include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<style type="text/css" media="screen">
		div {
			padding: 10px 10px;
		}
		input {
			padding: 10px;
			margin-top:10px;
			border: 1px solid #ddeecc;
		}
		a, h1 {
			position: relative;
			display: inline;
			padding-right:40px;
		}
		#descr {
			position:relative;
			min-width:32%;
			height 20%;
			top:0%;
			right:0%;
			z-index:10;
			background-color:#CCC;
			border: 1px solid grey;
		}
		.post {
			width: 512px;
    		margin: 0 auto;
			border:1px solid black;
			border-radius: 5px;
			margin: 15px;
			display:inline-block;
		}
		.timestamp {
			font-size: 12px;
			position: relative;
			left: 70%;
			display: inline;
		}
		.description {
			background-color: #eeddcc;
		}
	</style>
</head>
<body>
	<h1><?php echo "Hello, $user!"; ?></h1>
	<a href="logout.php">Logout</a>
	<a href="profile.php"><?php echo  strtoupper ($user . '\'s profile');?></a>

	<hr>
	<div>
		<form action="add.php" method="POST" accept-charset="utf-8">
			<input type="text" id="descr" name="description" placeholder="Posting something?"><br>
			Public:<input type="checkbox" name="public" accept="image/*">
			<input type="submit" value="POST">
		</form>
	</div>
	<hr>
	<h2>Public posts:</h2>
	<?php
		$sql = "SELECT * FROM Posts WHERE public = 'yes' OR userid = '$userId'";

		$result = mysqli_query($db, $sql);

		while($row = mysqli_fetch_assoc($result))
		{
			$who = mysqli_query($db,
				"SELECT username FROM Users Where id = '" . $row['USERID']  ."';");
			$who = mysqli_fetch_assoc($who);
	?>

			<!-- //print $row['ID'] . '<br>';
			print $who['username'] . '<br>';
			print $row['DESCRIPTION'] . '<br>';
			//print $row['public'] . '<br>';
			print $row['created_at'] . '<br>';
			print $row['updated_at'] . '<br>'; -->
	<div class="post">
		<div class="title"><?php print $who['username'] ?></div>
		<div class="description"><?php print $row['DESCRIPTION'] ?></div>
		<div class="timestamp">
			<?php
				if(isset($row['updated_at']))
				{
					print 'Updated at ' . $row['updated_at'];
				}
				else
				{
					print 'Posted at ' . $row['created_at'];
				}
			?>
		</div>
	</div>
	<?php
		}
	?>
</body>
</html>