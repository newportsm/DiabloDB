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
		<h3>Add to End Game</h3>
		<br>

		<div class="addaccount">

<?php	
if(!($stmt = $db->prepare("INSERT INTO `End Game` (CID, Paragon_Level, Difficulty) VALUES ((SELECT CID FROM Characters WHERE Name=?),?,?)"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
if(!($stmt->bind_param("sis",$_POST['CID'],$_POST['Paragon_Level'],$_POST['Difficulty']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->execute()){
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
} else {
	echo "Added " . $stmt->affected_rows . " rows to End Game Table.";
}
?>
		<br>
		<br>
   		<br>
	
		<a href="project.php"><button class="btn">Return Home</button></a>
		<br>
		</div>
	</body>
</html>