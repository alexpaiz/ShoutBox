<?php
//connect to MySQL
$con = mysqli_connect("localhost", "root" , "asqw1232","shoutit" ); // takes in host, database username, database password, name of database
	
//test connection
if(mysqli_connect_errno()){
	echo 'Failed to connect to MYSQL:'.mysqli_connect_error();
}