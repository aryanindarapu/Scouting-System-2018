<?php
	$host = "localhost";
	$user = "root";
	$pass = "team868!";
	$dbname = "techHounds";
	$conn = new mysqli($host,$user,$pass, $dbname);
	include 'ChromePhp.php';
	if($conn->connect_errno) {
		ChromePhp::log("Connection failed: " . $conn->connect_error);
	}
	/* $sql = "CREATE DATABASE techHounds";
	if ($conn->query($sql) === TRUE) {
		echo "Database created successfully";
	} else {
		echo "Error creating database: " . $conn->error;
	}
	$sqlB = "CREATE TABLE powerUpCompetitionFinal(
				teamName VARCHAR(30),
				teamNo VARCHAR(30),
				fouls INT DEFAULT 0,
				techFouls INT DEFAULT 0,
				yelCards INT DEFAULT 0,
				redCards INT DEFAULT 0,
				autonPosition VARCHAR(30) DEFAULT 'none',
				crossedBaseline INT DEFAULT 0,
				autonTimeScale INT DEFAULT 30,
				autonTimeSwitch INT DEFAULT 30,
				autonCountScale INT DEFAULT 0,
				autonCountSwitch INT DEFAULT 0,
				deliveredBlockScale INT DEFAULT 0,
				deliveredBlockSwitch INT DEFAULT 0,
				deliveredBlockVault INT DEFAULT 0,
				speed DECIMAL(4,2) DEFAULT 0,
				climbPerformance VARCHAR(30) DEFAULT 'none',
				climbAbility VARCHAR(30) DEFAULT 'none',
				comments VARCHAR(1000) DEFAULT ''
			)";
	if ($conn->query($sqlB) === TRUE) {
		echo "Table powerUpCompetitionFinal created successfully";
	}*/ 
	ChromePhp::log("got here");
	if(isset($_POST['teamNo'])&&isset($_POST['teamName']))
	{
		$teamNo = $_POST['teamNo'];
		$teamName = $_POST['teamName'];
		$fouls = $_POST['fouls'];
		$techFouls = $_POST['techFouls'];
		$yelCards = $_POST['yelCards'];
		$redCards = $_POST['redCards'];
		$autonPosition = $_POST['autonPosition'];
		$crossedBaseline = $_POST['crossedBaseline'];
		$autonTimeScale = $_POST['autonTimeScale'];
		$autonTimeSwitch = $_POST['autonTimeSwitch'];
		$autonCountScale = $_POST['autonCountScale'];
		$autonCountSwitch = $_POST['autonCountSwitch'];
		$deliveredBlockSwitch = $_POST['deliveredBlockSwitch'];
		$deliveredBlockScale = $_POST['deliveredBlockScale'];
		$deliveredBlockVault = $_POST['deliveredBlockVault'];
		$speed = $_POST['speed'];
		$climbPerformance = $_POST['climbPerformance'];
		$climbAbility = $_POST['climbAbility'];
		$comments = $_POST['comments'];
		ChromePhp::log("got here");
		$query = "INSERT INTO powerUpCompetitionFinal(teamName, teamNo, fouls, techFouls, yelCards, redCards, autonPosition, crossedBaseline, autonTimeScale,autonTimeSwitch,autonCountScale,autonCountSwitch,deliveredBlockScale, deliveredBlockSwitch, deliveredBlockVault,speed,climbPerformance,climbAbility,comments) VALUES('$teamName', '$teamNo',$fouls, $techFouls, $yelCards, $redCards, '$autonPosition', $crossedBaseline, $autonTimeScale,$autonTimeSwitch,$autonCountScale,$autonCountSwitch,$deliveredBlockScale,$deliveredBlockSwitch,$deliveredBlockVault,$speed,'$climbPerformance','$climbAbility','$comments')";
		ChromePhp::log("idk if i got here");
		if ($conn->query($query) === TRUE) {
			ChromePhp::log("New record created successfully");
		} else {
			ChromePhp::log("Error: " . $query . "<br>" . $conn->error);
		}
	}else{
		ChromePhp::log("Didn't get it");
	}
	$sqlC = "SELECT teamName, teamNo, fouls, techFouls, yelCards, redCards, autonPosition, crossedBaseline, autonTimeScale, autonTimeSwitch, autonCountScale, autonCountSwitch, deliveredBlockScale, deliveredBlockSwitch, deliveredBlockVault, speed, climbPerformance, climbAbility, comments FROM powerUpCompetitionFinal";
	$result = $conn->query($sqlC);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			ChromePhp::log($row['teamName'] . " " . $row['teamNo'] . " " . $row['fouls'] . " " . $row['techFouls'] . " " . $row['yelCards'] . " " . $row['redCards'] . " " . $row['autonPosition'] . " " . $row['crossedBaseline'] . " " . $row['autonTimeScale'] . " " . $row['autonCountScale'] . " " . $row['autonCountSwitch'] . " " . $row['deliveredBlockScale'] . " " . $row['deliveredBlockSwitch'] . " " . $row['deliveredBlockVault'] . " " . $row['speed'] . " " . $row['climbPerformance'] . " " . $row['climbAbility'] . " " . $row['comments']);
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