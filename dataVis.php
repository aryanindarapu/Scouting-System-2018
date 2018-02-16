<html>
	<head>
		<link rel = "stylesheet" type = "text/css" href = "dataVis.css">
		<title>Data Vis</title>
	</head>
	<body>
		<?php
			$teamNumber = $_POST['teamNumber'];
			$host = "localhost";
			$user = "root";
			$pass = "team868!";
			$dbname = "techHounds";
			$link = new mysqli($host,$user,$pass,$dbname);
			if($link->connect_errno) {
				echo "Connection failed: " . $link->connect_error;
			}
			$query = "SELECT * FROM powerUp WHERE teamNumber='" . $teamNumber . "';";
			$result = $link->query($query);
			
			$teleBlocks = array(
				"chart" => array(
				  "caption" => "Top 10 Most Populous Countries",
				  "showValues" => "0",
				  "theme" => "ocean"
				)
			);

			$teleBlocks["data"] = array();
			$count = 1;
			while($row = mysqli_fetch_array($result)) {
				$speed = row[
				array_push($teleBlocks["data"], array(
					"label" => "Match" + $count,
					"value" => row["blocksTele"];
					)
				);
				$count++;
        	}

        	/*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

        	$jsonEncodedTeleBlock = json_encode($teleBlocks);
        	$blocksTele = new FusionCharts("line", "myFirstChart" , 600, 300, "teleBlocks", "json", $jsonEncodedTeleBlock);
        	$blocksTele->render();
		?>
		<h1>Data Visualization</h1>
		<form method = "post">
			<input type = "number" placeholder = "868" name = "teamNumber">
			<input type = "submit" value = "submit">			
		</form>
		<div id = "teleBlocks"></div>
		<div id = "teleBlocks"></div>
		<div id = "teleBlocks"></div>
		<div id = "teleBlocks"></div>		
	</body>
</html>