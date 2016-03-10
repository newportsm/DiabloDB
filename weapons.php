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
        <title>Weapon Selection</title>
    </head>
	
	<body>
		<h3 id="h3">Weapon Selection</h3>
			<div class="secondbody">
				
				<div class="armorWeapon">
					<a href="project.php">Home</a> - <a href="armor.php">Current Armor</a> - <a href="search.php">Search Database</a>
				</div>
	
			<div class="accountMAIN">
				<br><br>
					<table class="table table-striped table-condensed">

<?php
$sql = "SELECT C.Name AS CN, W.Name AS WN FROM Weapons W JOIN CharacterWeapons CW ON CW.WID=W.WID JOIN Characters C ON C.CID=CW.CID";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    echo "<caption>CURRENTLY EQUIPPED</caption><tr><th>Character Name</th><th>Weapon Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["CN"]."</td><td>".$row["WN"]."</td></tr>";
    }
} else {
    echo "0 results";
}
?>
					</table>
				<br>
				
				<form method="post" action="addcharweap.php">
					<fieldset>
						<p>Character Name:
							<?php
							$sql = "SELECT Name FROM Characters";
							$result = $mysqli->query($sql);
							?>
							<select id="CID" name="CID">

							<?php 
							while($row = $result->fetch_assoc()) 
							{
    							echo "<option value=".$row["Name"].">".$row["Name"]."</option>";
							}
							?> 
							</select>
						</p>
					</fieldset>
					<fieldset>
						<p>Weapon Name:
							<?php
							$sql = "SELECT WID, Name FROM Weapons";
							$result = $mysqli->query($sql);
							?>
							<select id="WID" name="WID">

							<?php 
							while($row = $result->fetch_assoc()) 
							{
    							echo "<option value=".$row["WID"].">".$row["Name"]."</option>";
							}
							?> 
							</select>
						</p>
					</fieldset>
				<p id="submit"><input type="submit" value="Add" /></p>
 				</form>
				<br>
				<br>

				<table class="table table-striped">	

<?php	
$sql = "SELECT Name, Attack, Damage_Type FROM Weapons";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    echo "<caption>Weapons</caption><tr><th>Name</th><th>DPS</th><th>Type</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Name"]."</td><td>".$row["Attack"]."</td><td>".$row["Damage_Type"]."</td></tr>";
    }
    echo "";
} else {
    echo "0 results";
}

?>
				</table>
				<br>
	
				<p id="links">All Weapons can be found <a target="_blank" href="http://us.battle.net/d3/en/item/axe-1h/">here</a>.</p>
				<br>

				<form method="post" action="addweapon.php">
					<fieldset>
						<p>Weapon Name: <input type="text" name="Name"></p>
					</fieldset>
					<fieldset>
						<p>Attack Power: <input type="number" name="Attack" min="1" max="5000"></p>
					</fieldset>
					<fieldset>
						<p>Damage Type: <input type="text" name="Damage_Type" ></p>
					</fieldset>
					<p id="submit"><input type="submit" value="Add" /></p>
					</form>
	
					<br>
					<br>
				</div>
		</body>
</html>
