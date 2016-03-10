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
        <title>Accounts</title>
    </head>
	
	<body>
		<h3>Insert to Accounts</h3>
		<br>

		<div class="addaccount">

<?php	
if(!($stmt = $db->prepare("INSERT INTO Accounts(User_Name, Platform) VALUES (?,?)"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
if(!($stmt->bind_param("ss",$_POST['User_Name'],$_POST['Platform']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->execute()){
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
} else {
	echo "Added " . $stmt->affected_rows . " rows to Accounts.";
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