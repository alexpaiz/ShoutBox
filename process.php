<?php 
	include 'database.php';

//heck if form is submmited
if(isset($_POST['submit'])){
	// This function makes sure whats typed in the user field doesn't harm the code.
	// $con comes from the database.php file.
	//mysqli_real_escape_string is a function used to create a legal SQL string that you can use in an SQL statement. The given string is encoded to an escaped SQL string, taking into account the current character set of the connection.
	$user = mysqli_real_escape_string($con, $_POST['user']);
	$message = mysqli_real_escape_string($con, $_POST['message']);
	
	//Set timezone 
	date_default_timezone_set('America/Pacific');
	//'h:i:s a' corresponds to the format for time. There fore the date(...) returns the current time in the format specified
	$time = date('h:i:s a', time());
	
	// isset determines if a variable is set and is not NULL
	if(!isset($user) || $user == '' || !isset($message) || $message == ''){
		// If inputs were invalid
		$error = "Fill both name and message";
		header("Location: index.php?error=".urlencode($error));
		exit();
	}
	else{
		// if inputs were valid 
		
		// create query to inserts validated values into shouts
		$query = "INSERT INTO shouts (user, message, time) 
				VALUES ('$user', '$message', '$time')";
		// check if insert was succesfull 
		if(!mysqli_query($con,$query)){
			die('Error:'. mysqli_error($con)); // posts the error related to an unsuccesful insert to shouts
		}else{
			header("Location: index.php"); // if the insert was succesfull, then we need to redirect the client back to index.php
			exit();
		}
	}
	
} 
?>