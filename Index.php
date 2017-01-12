<?php include 'database.php'; ?>
<?php
	//Create select query (to get the shouts)
	$query = "SELECT * FROM shouts ORDER BY id DESC";
	$shouts = mysqli_query($con, $query);
	// this only gets the shouts using the SQL query and stores them inside the variable shouts

?>
<!doctype html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>SHOUT IT!</title>
	<link rel = "stylesheet" href = "css/style.css" type = "text/css" />
</head>

<body>
	<div id = "container"> 
		<header>
			<h1>SHOUT IT! Shoutbox</h1>
		</header>
		
		<div id = "shouts">
			<ul>
<!--			row is the variable that holds the current item in shouts.-->
				<?php while($row = mysqli_fetch_assoc($shouts)): ?> 
					<li class = "shouts"><span><?php echo $row['time']?> -</span> <strong><?php echo $row['user']?>:</strong> <?php echo $row['message']?></li> 
				<?php endwhile; ?>
			</ul>
		</div>
		<div id = "input">
			<?php if(isset($_GET['error'])): ?>
				<div class="error"> <?php echo $_GET['error'];?></div>
			<?php endif; ?>
			<form method = "post" action = "process.php">
				<input type = "text" name = "user" placeholder="Enter your name" />
				<input type = "text" name = "message" placeholder="Enter a message" />
				<br />
				<input class = "shout-btn" type="submit" name="submit" value="shout it out" />
			</form>
			
		</div>
		
	</div>
</body>

</html>