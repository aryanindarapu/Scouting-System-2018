<?php
	
	$host = "localhost";
	$user = "root";
	$pass = "team868!";
	$dbname = "techHounds";

	$link = new mysqli($host,$user,$pass,$dbname);
	if($link->connect_errno) {
		echo "Connection failed: " . $link->connect_error;
	}
	
	$sql = "CREATE DATABASE Scouting2018";
	if(mysqli_query($link, $sql)){
		echo "Database created successfully";
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	
	// Attempt create table query execution
	$sql = "CREATE TABLE ScoutingData(
		startingPosition CHAR,
		crossedBaseline BOOLEAN,
		autonTimes VARCHAR,
		pickUpLocations VARCHAR,
		dropOffLocations VARCHAR,
		totalBlocks INT,
		climb BOOLEAN,
		fouls INT,
		techs INT,
		yellowCard BOOLEAN,
		redCard BOOLEAN,
		comments VARCHAR
	)";
	if(mysqli_query($link, $sql)){
		echo "Table created successfully.";
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	
	mysqli_close($link);
?>