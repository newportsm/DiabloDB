<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the databas
$db = new mysqli("oniddb.cws.oregonstate.edu","newports-db","NvvVDGmLeIPIomRU","newports-db");
if(!$db || $db->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
?>

<html>
    <head>
    	<link rel="stylesheet" type="text/css" href="main.css">
    	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <title>*</title>
    </head>
	
	<body>
		<h3>Results</h3>
		<br>
		<div class="secondbody">
			<div class="accountMAIN">
				<br>
				<br>


				<table class="table table-striped table-condensed">
					<tr>
						<caption>Characters<caption>
					</tr>

<?php
	if(!($stmt = $db->prepare("SELECT C.Name, A.User_Name
		FROM Accounts A
		JOIN Characters C ON C.AID=A.ID
		WHERE A.User_Name = ?"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}

	if(!($stmt->bind_param("s",$_POST['User_Name']))){
		echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
	}

	if(!$stmt->execute()){
		echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	if(!$stmt->bind_result($Name, $User_Name)){
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	while($stmt->fetch()){
		 echo "<tr>\n<td>\n" . $Name . "\n</td></tr>";
	}
	$stmt->close();
	?>

					</table>
				<br>
				<br>
				</div>
			</div>

		</body>
</html>