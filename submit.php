<?php
	$host = "localhost";
	$user = "root";
	$pass = "team868!";
	$dbname = "techHounds";
	$link = new mysqli($host,$user,$pass,$dbname);
	if($link->connect_errno) {
		echo "Connection failed: " . $link->connect_error;
	}
	$query = "INSERT INTO powerUp(teamNumber,teamColor, baselineCrossed, blockTimeAuton, blockPickAuton, blockDropAuton, robotStart, blockPickTele,blockDropTele,blockAccDrop,performance,abilities,comments) VALUES(however we decide to get js to php);";
	$link->query($query);
	mysqli_close($link);
?>