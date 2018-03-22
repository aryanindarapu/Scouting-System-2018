<html>
	<head>
		<link rel = "stylesheet" type = "text/css" href = "">
		<title>Data Vis</title>
		<script type="text/javascript" src="fusioncharts/js/fusioncharts.js"></script>
		<script type="text/javascript" src="fusioncharts/js/themes/fusioncharts.theme.fint.js"></script>
		<link rel = "stylesheet" type = "text/css" href = "dataVis.css">
		<link rel = "stylesheet" type = "text/css" href = "buttons.css">
		<link rel = "stylesheet" type = "text/css" href = "buttonsFooter.css">
	</head>
	<body>
		<?php
		include 'ChromePhp.php';
		include("php-wrapper/wrappers2/php-wrapper/fusioncharts.php");
			if(!empty($_POST['submit'])&&!empty($_POST['teamNo'])&&isset($_POST['submit'])&&isset($_POST['teamNo'])){
				ChromePhp::log("got to the point");
				$teamNumber = $_POST['teamNo'];
				$host = "localhost";
				$user = "root";
				$pass = "";
				$dbname = "myDB";
				$conn = new mysqli($host,$user,$pass, $dbname);
				$constant = 1;
				if($conn->connect_errno) {
					ChromePhp::log("Connection failed: " . $conn->connect_error);
				}
				$query = "SELECT * FROM powerUpCompetition WHERE teamNo='" . $teamNumber . "';";
				$result = $conn->query($query);
				
				$foulsArray = array();
				$techFoulsArray = array();
				$yelCardsArray = array();
				$redCardsArray = array();
				$autonPositionArray = array();
				$crossedBaselineArray = array();
				$autonTimeScaleArray = array();
				$autonTimeSwitchArray = array();
				$autonCountScaleArray = array();
				$autonCountSwitchArray = array();
				$deliveredBlockCountArray = array();
				$speedArray = array();
				$climbAbilityArray = array();
				$climbPerformanceArray = array();
				$commentsArray = array();
				
				if ($result->num_rows > 0) {
					// The `$arrData` array holds the chart attributes and data
					$foulsArray = array(
						"chart" => array(
						  "caption" => "Fouls",
						  "showValues" => "0",
						  "theme" => "fint"
						  )
					   );

					$foulsArray["data"] = array();
					
					$techFoulsArray = array(
						"chart" => array(
						  "caption" => "Tech Fouls",
						  "showValues" => "0",
						  "theme" => "fint"
						  )
					   );

					$techFoulsArray["data"] = array();
					
					$yelCardsArray = array(
						"chart" => array(
						  "caption" => "Yellow Cards",
						  "showValues" => "0",
						  "theme" => "fint"
						  )
					   );

					$yelCardsArray["data"] = array();
					
					$redCardsArray = array(
						"chart" => array(
						  "caption" => "Red Cards",
						  "showValues" => "0",
						  "theme" => "fint"
						  )
					   );

					$redCardsArray["data"] = array();
					
					$autonPositionArray = array(
						"chart" => array(
						  "caption" => "Auton Position Start",
						  "showValues" => "0",
						  "theme" => "fint"
						  )
					   );

					$autonPositionArray["data"] = array();
					
					$crossedBaselineArray = array(
						"chart" => array(
						  "caption" => "Crossed Baseline",
						  "showValues" => "0",
						  "theme" => "fint"
						  )
					   );

					$crossedBaselineArray["data"] = array();
					
					$autonTimeScaleArray = array(
						"chart" => array(
						  "caption" => "Time left, Block on Scale Auton",
						  "showValues" => "0",
						  "theme" => "fint"
						  )
					   );

					$autonTimeScaleArray["data"] = array();
					
					$autonTimeSwitchArray = array(
						"chart" => array(
						  "caption" => "Time left, Block on Switch Auton",
						  "showValues" => "0",
						  "theme" => "fint"
						  )
					   );

					$autonTimeSwitchArray["data"] = array();
					
					$autonCountScaleArray = array(
						"chart" => array(
						  "caption" => "Blocks on Scale Auton",
						  "showValues" => "0",
						  "theme" => "fint"
						  )
					   );

					$autonCountScaleArray["data"] = array();
					
					$autonCountSwitchArray = array(
						"chart" => array(
						  "caption" => "Blocks on Switch Auton",
						  "showValues" => "0",
						  "theme" => "fint"
						  )
					   );

					$autonCountSwitchArray["data"] = array();
					
					$deliveredBlockCountArray = array(
						"chart" => array(
						  "caption" => "Blocks Delivered Teleop",
						  "showValues" => "0",
						  "theme" => "fint"
						  )
					   );

					$deliveredBlockCountArray["data"] = array();
					
					$speedArray = array(
						"chart" => array(
						  "caption" => "Speed",
						  "showValues" => "0",
						  "theme" => "fint"
						  )
					   );

					$speedArray["data"] = array();
					
					$climbAbilityArray = array(
						"chart" => array(
						  "caption" => "Climb Ability",
						  "showValues" => "0",
						  "theme" => "fint"
						  )
					   );

					$climbAbilityArray["data"] = array();
					
					$climbPerformanceArray = array(
						"chart" => array(
						  "caption" => "Climb Performance",
						  "showValues" => "0",
						  "theme" => "fint"
						  )
					   );

					$climbPerformanceArray["data"] = array();
					
					$commentsArray = array(
						"chart" => array(
						  "caption" => "Comments",
						  "showValues" => "0",
						  "theme" => "fint"
						  )
					   );

					$commentsArray["data"] = array();
					
					$climbAbilityStarter["data"] = array();
					$climbPerformanceStarter["data"] = array();

					// Push the data into the array
					$counter = 1;
					while($row = mysqli_fetch_array($result)) {
					   array_push($foulsArray["data"], array(
						  "label" => $counter,
						  "value" => $row["fouls"]
						  )
					   );
					   array_push($techFoulsArray["data"], array(
						  "label" => $counter,
						  "value" => $row["techFouls"]
						  )
					   );
					   array_push($yelCardsArray["data"], array(
						  "label" => $counter,
						  "value" => $row["yelCards"]
						  )
					   );
					   array_push($redCardsArray["data"], array(
						  "label" => $counter,
						  "value" => $row["redCards"]
						  )
					   );
					   array_push($autonPositionArray["data"], array(
						  "label" => $counter,
						  "value" => $row["autonPosition"]
						  )
					   );
					   array_push($crossedBaselineArray["data"], array(
						  "label" => $counter,
						  "value" => $row["crossedBaseline"]
						  )
					   );
					   array_push($autonTimeSwitchArray["data"], array(
						  "label" => $counter,
						  "value" => $row["autonTimeSwitch"]
						  )
					   );
					   array_push($autonTimeScaleArray["data"], array(
						  "label" => $counter,
						  "value" => $row["autonTimeScale"]
						  )
					   );
					   array_push($autonCountScaleArray["data"], array(
						  "label" => $counter,
						  "value" => $row["autonCountScale"]
						  )
					   );
					   array_push($autonCountSwitchArray["data"], array(
						  "label" => $counter,
						  "value" => $row["autonCountSwitch"]
						  )
					   );
					   array_push($deliveredBlockCountArray["data"], array(
						  "label" => $counter,
						  "value" => $row["deliveredBlockCount"]
						  )
					   );
					   array_push($speedArray["data"], array(
						  "label" => $counter,
						  "value" => $row["speed"]
						  )
					   );
					   array_push($climbPerformanceStarter["data"], $row["climbPerformance"]);
					   array_push($climbAbilityStarter["data"], $row["climbAbility"]);
					   array_push($commentsArray["data"], array(
						  "label" => $counter,
						  "value" => $row["comments"]
						  )
					   );
					   $counter=$counter+1;
					}
					$climb = 0;
					$fail = 0;
					$levitate = 0;
					$noAttempt = 0;
					$single = 0;
					$double = 0;
					$triple = 0;
					$cant = 0;
					$underscoreP=0;
					$underscoreA=0;
					for($i=0;$i<sizeof($climbPerformanceStarter["data"]);$i++){
						ChromePhp::log($climbPerformanceStarter['data'][$i]);
						if($climbPerformanceStarter["data"][$i]==="climb"){$climb=$climb+1;}
						if($climbPerformanceStarter["data"][$i]==="fail"){$fail=$fail+1;}
						if($climbPerformanceStarter["data"][$i]==="levitate"){$levitate=$levitate+1;}
						if($climbPerformanceStarter["data"][$i]==="noAttempt"){$noAttempt=$noAttempt+1;}
						if($climbPerformanceStarter["data"][$i]==="_"){$underscoreP=$underscoreP+1;}
					}
					for($i=0;$i<sizeof($climbAbilityStarter["data"]);$i++){
						if($climbAbilityStarter["data"][$i]==="single"){$single=$single+1;}
						if($climbAbilityStarter["data"][$i]==="double"){$double=$double+1;}
						if($climbAbilityStarter["data"][$i]==="triple"){$triple=$triple+1;}
						if($climbAbilityStarter["data"][$i]==="cant"){$cant=$cant+1;}
						if($climbAbilityStarter["data"][$i]==="_"){$underscoreA=$underscoreA+1;}
					}
					array_push($climbAbilityArray["data"], array("label" => 'single',"value" => $single));
					array_push($climbAbilityArray["data"], array("label" => 'double',"value" => $double));
					array_push($climbAbilityArray["data"], array("label" => 'triple',"value" => $triple));
					array_push($climbAbilityArray["data"], array("label" => 'cant',"value" => $cant));
					array_push($climbAbilityArray["data"], array("label" => '_',"value" => $underscoreP));
					
					array_push($climbPerformanceArray["data"], array("label" => 'climb',"value" => $climb));
					array_push($climbPerformanceArray["data"], array("label" => 'fail',"value" => $fail));
					array_push($climbPerformanceArray["data"], array("label" => 'levitate',"value" => $levitate));
					array_push($climbPerformanceArray["data"], array("label" => 'noAttempt',"value" => $noAttempt));
					array_push($climbPerformanceArray["data"], array("label" => '_',"value" => $underscoreA));
					
				} else {
					ChromePhp::log("didn't find rows");
				}

            /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

            $jsonFouls = json_encode($foulsArray);
			$jsonTechFouls = json_encode($techFoulsArray);
			$jsonYelCards = json_encode($yelCardsArray);
			$jsonRedCards = json_encode($redCardsArray);
			$jsonAutonPosition = json_encode($autonPositionArray);
			$jsonCrossedBaseline = json_encode($crossedBaselineArray);
			$jsonAutonTimeScale = json_encode($autonTimeScaleArray);
			$jsonAutonTimeSwitch = json_encode($autonTimeSwitchArray);
			$jsonAutonCountScale = json_encode($autonCountScaleArray);
			$jsonAutonCountSwitch = json_encode($autonCountSwitchArray);
			$jsonDeliveredBlockCount = json_encode($deliveredBlockCountArray);
			$jsonSpeed = json_encode($speedArray);
			$jsonClimbAbility = json_encode($climbAbilityArray);
			$jsonClimbPerformance = json_encode($climbPerformanceArray);
			$jsonComments = json_encode($commentsArray);
			
			ChromePhp::log($jsonClimbAbility);

			/*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

            $foulsChart = new FusionCharts("line", "chart1" , 600, 300, "chart-1", "json", $jsonFouls);
			$techFoulsChart = new FusionCharts("line", "chart2" , 600, 300, "chart-2", "json", $jsonTechFouls);
			$yelCardsChart = new FusionCharts("line", "chart3" , 600, 300, "chart-3", "json", $jsonYelCards);
			$redCardsChart = new FusionCharts("line", "chart4" , 600, 300, "chart-4", "json", $jsonRedCards);
			$crossedBaselineChart = new FusionCharts("line", "chart5" , 600, 300, "chart-5", "json", $jsonCrossedBaseline);
			$autonTimeScaleChart = new FusionCharts("line", "chart6" , 600, 300, "chart-6", "json", $jsonAutonTimeScale);
			$autonTimeSwitchChart = new FusionCharts("line", "chart7" , 600, 300, "chart-7", "json", $jsonAutonTimeSwitch);
			$deliveredBlockCountChart = new FusionCharts("line", "chart8" , 600, 300, "chart-8", "json", $jsonDeliveredBlockCount);
			$speedChart = new FusionCharts("line", "chart9" , 600, 300, "chart-9", "json", $jsonSpeed);
			$climbAbilityChart = new FusionCharts("pie2d", "chart10" , 600, 300, "chart-10", "json", $jsonClimbAbility);
			$climbPerformanceChart = new FusionCharts("pie2d", "chart11" , 600, 300, "chart-11", "json", $jsonClimbPerformance);
			

            // Render the chart
            $foulsChart->render();
			$techFoulsChart->render();
			$yelCardsChart->render();
			$redCardsChart->render();
			$crossedBaselineChart->render();
			$autonTimeScaleChart->render();
			$autonTimeSwitchChart->render();
			$deliveredBlockCountChart->render();
			$speedChart->render();
			$climbAbilityChart->render();
			$climbPerformanceChart->render();
			
			mysqli_close($conn);
			}else{
				ChromePhp::log("not set");
			}
		?>
		
		<center>
			<div style = "display: flex; width: 100%; flex-direction: row; justify-content: space-between">
				<a href = "mainPage.html" style = "color: black;"> <img src = 'leftArrow.png' style = "height: 100px"><p style = "position: absolute; top: 45px; left: 35px; font-family: 'Press Start 2P'; font-size: 10px;">Main Page</p></a>
				<h1>Data Visualization</h1>
				<a href = "scoutingSystem.html" style = "color: black;"> <img src = 'rightArrow.png' style = "height: 100px; transform: rotate(180deg);"><p style = "font-family: 'Press Start 2P'; font-size: 10px; position: absolute; top: 45px; margin-left: 20px">Scouting</p></a>
			</div>
			<form name = "dataForm" action = "" method = "post">
				<input type = "number" placeholder = "868" name = "teamNo">
				<input type = "submit" value = "submit" name = "submit">			
			</form>
		</center>
		<div style = "margin-left:80px">
			<div style = "display:flex; flex-direction:row">
				<div id = "chart-1"></div>
				<div id = "chart-2"></div>
				<div id = "chart-3"></div>
			</div>
			<div style = "display:flex; flex-direction:row">
				<div id = "chart-4"></div>
				<div id = "chart-5"></div>
				<div id = "chart-6"></div>
			</div>
			<div style = "display:flex; flex-direction:row">
				<div id = "chart-7"></div>
				<div id = "chart-8"></div>
				<div id = "chart-9"></div>
			</div>
			<div style = "display:flex; flex-direction:row">
				<div id = "chart-10"></div>
				<div id = "chart-11"></div>
			</div>
		</div>
	</body>
</html>