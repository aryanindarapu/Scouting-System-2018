<?php
	
	$host = "localhost";
	$user = "root";
	$pass = "team868!";
	$dbname = "techHounds";

	$con = new mysqli($host,$user,$pass,$dbname);
	if($con->connect_errno) {
		echo "Connection failed: " . $con->connect_error;
	}
	
	for ($switch = 0; $switch < 10; $switch++) {
		switch($switch) {
			case 1:
				echo $switch;
				break;
			default:
				echo "lol";
		}
	}
?>