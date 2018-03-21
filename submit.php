<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$dbname = "myDB";
	$conn = new mysqli($host,$user,$pass, $dbname);
	include 'ChromePhp.php';
	if($conn->connect_errno) {
		ChromePhp::log("Connection failed: " . $conn->connect_error);
	}
	/* $sql = "CREATE DATABASE myDB";
	if ($conn->query($sql) === TRUE) {
		echo "Database created successfully";
	} else {
		echo "Error creating database: " . $conn->error;
	} 
	$sqlB = "CREATE TABLE powerUpFinal(
				teamName VARCHAR(30),
				teamNo VARCHAR(30),
				techFouls INT,
				yelCards INT,
				redCards INT,
				autonPosition VARCHAR(30),
				crossedBaseline BOOLEAN,
				autonTimeScale INT,
				autonCountScale INT,
				autonCountSwitch INT,
				deliveredBlockCount INT,
				speed INT,
				climbPerformance VARCHAR(30),
				climbAbility VARCHAR(30),
				comments VARCHAR(1000)
			)";
	if ($conn->query($sqlB) === TRUE) {
		echo "Table MyGuests created successfully";
	} else {
		echo "Error creating table: " . $conn->error;
	}*/
	ChromePhp::log("got here");
	if(isset($_POST['teamNo'])&&isset($_POST['teamName']))
	{
		$teamNo = $_POST['teamNo'];
		$teamName = $_POST['teamName'];
		$techFouls = $_POST['techFouls'];
		$yelCards = $_POST['yelCards'];
		$redCards = $_POST['redCards'];
		$autonPosition = $_POST['autonPosition'];
		$crossedBaseline = $_POST['crossedBaseline'];
		$autonTimeScale = $_POST['autonTimeScale'];
		$autonCountScale = $_POST['autonCountScale'];
		$autonCountSwitch = $_POST['autonCountSwitch'];
		$deliveredBlockCount = $_POST['deliveredBlockCount'];
		$speed = $_POST['speed'];
		$climbPerformance = $_POST['climbPerformance'];
		$climbAbility = $_POST['climbAbility'];
		$comments = $_POST['comments'];
		ChromePhp::log("got here");
		$query = "INSERT INTO powerUpFinal(teamName, teamNo,fouls, techFouls, yelCards, redCards, autonPosition, crossedBaseline, autonTimeScale,autonTimeSwitch,autonCountScale,autonCountSwitch,deliveredBlockCount,speed,climbPerformance,climbAbility,comments) VALUES('$teamName', '$teamNo','$fouls', $techFouls, $yelCards, $redCards, '$autonPosition', $crossedBaseline, $autonTimeScale,$autonTimeSwitch,$autonCountScale,$autonCountSwitch,$deliveredBlockCount,$speed,'$climbPerformance','$climbAbility','$comments')"
		ChromePhp::log("idk if i got here");
		if ($conn->query($query) === TRUE) {
			ChromePhp::log("New record created successfully");
		} else {
			ChromePhp::log("Error: " . $query . "<br>" . $conn->error);
		}
	}else{
		ChromePhp::log("Didn't get it");
	}
	$sqlC = "SELECT teamName, teamNO FROM powerUpFinal";
	$result = $conn->query($sqlC);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			ChromePhp::log($row['teamName'] . " " . $row['teamNO'] . " " . $row['techFouls'] . " " . $row['yelCards'] . " " . $row['redCards'] . " " . $row['autonPosition'] . " " . $row['crossedBaseline'] . " " . $row['autonTimeScale'] . " " . $row['autonCountScale'] . " " . $row['autonCountSwitch'] . " " . $row['deliveredBlockCount'] . " " . $row['speed'] . " " . $row['climbPerformance'] . " " . $row['climbAbility'] . " " . $row['comments']);
		}
	} else {
		//echo("<script>console.log('0 results');</script>");
		ChromePhp::log("hellow2");
	}
	echo "Connection successful";
	mysqli_close($conn);
	/*
	 Stuff for real but not for testing
	
	$host = "localhost";
	$user = "root";
	$pass = "team868!";
	$dbname = "techHounds";
	$link = new mysqli($host,$user,$pass,$dbname);
	*/
	
?>