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
		<h3>Add to Armor</h3>
		<br>

		<div class="addaccount">

<?php	
if(!($stmt = $db->prepare("INSERT INTO Armor (Name, Defense) VALUES (?,?)"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
if(!($stmt->bind_param("si",$_POST['Name'],$_POST['Defense']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->execute()){
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
} else {
	echo "Added " . $stmt->affected_rows . " rows to Armor.";
}
?>
		<br>
		<br>
    	<br>
		<a href="armor.php"><button class="btn">Return to Armor</button></a>
		<br>
		</div>
	</body>
</html>