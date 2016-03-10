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
        <title>Character Weapons</title>
    </head>
	
	<body>
		<h3>Add Character Weapons</h3>
		<br>	

		<div class="addaccount">

<?php	
if(!($stmt = $db->prepare("INSERT INTO CharacterWeapons (CID, WID) 
VALUES ((SELECT CID FROM Characters WHERE Name = ?),(SELECT WID FROM Weapons WHERE Name = ?) )"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
if(!($stmt->bind_param("ss",$_POST['CID'],$_POST['WID']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->execute()){
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
} else {
	echo "Added " . $stmt->affected_rows . " rows to Character Weapons.";
}
?>
		<br>
		<br>
    	<br>
		<a href="weapons.php"><button class="btn">Return to Weapons</button></a>
		<br>
		</div>
	</body>
</html>