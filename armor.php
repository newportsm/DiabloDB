<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","newports-db","NvvVDGmLeIPIomRU","newports-db");
if($mysqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
?>


<html>
    <head>
    	<link rel="stylesheet" type="text/css" href="main.css">
    	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <title>Armor Selection</title>
    </head>
	
	<body>
		<h3 id="h3">Armor Selection</h3>
		<div class="secondbody">

			<div class="armorWeapon">
			<a href="project.php">Home</a> - <a href="weapons.php">Current Weapons</a> - <a href="search.php">Search Database</a>
			</div>
		
		<br>
		<br>
		<div class ="accountMAIN">	
			<table class="table table-striped">	

<?php	
$sql = "SELECT Name, Defense FROM Armor";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    echo "<tr><th>Name</th><th>Defense</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Name"]."</td><td>".$row["Defense"]."</td></tr>";
    }
    echo "";
} else {
    echo "0 results";
}

?>
			</table>
		<br>
		<p id="links">All Armor can be found <a target="_blank" href="http://us.battle.net/d3/en/item/chest-armor/">here</a>.</p>
		<br>
	
		<form method="post" action="addarmor.php">
			<fieldset>
				<p>Armor Name: <input type="text" name="Name"></p>
			</fieldset>
			<fieldset>
				<p>Defense: <input type="number" name="Defense"></p>
			</fieldset>
			<p id="submit"><input type="submit" value="Add" /></p>
		</form>

		<br>
		<br>
		</div>
	</div>
	</body>
</html>
