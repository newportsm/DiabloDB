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
        <title>Diablo III Database</title>
    </head>

    <body>
    
		<h3 id="h3">Search the Database</h3>
		<div class="secondbody">
		
			<div class="armorWeapon">
				<a href="project.php">Home</a> - <a href="armor.php">Current Armor</a> - <a href="weapons.php">Current Weapons</a>
			</div>

	
	
			<br>
			<br>

			<table class="table table-striped table-condensed">
<?php
$sql = "SELECT A.Platform, COUNT(C.Name) AS Number
FROM Characters C
JOIN Accounts A ON C.AID=A.ID
Group By A.Platform";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    echo "<caption>CHARACTERS</caption><tr><th>Platform</th><th>Number of Characters</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Platform"]."</td><td>".$row["Number"]."</td></tr>";
    }
    echo "";
} else {
    echo "0 results";
}
?>
			</table>
			<br>
			<br>

			<table class="table table-striped table-condensed">
<?php
$sql = "SELECT Class, COUNT(Class) AS Number
FROM Characters
GROUP BY Class";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    echo "<caption>CLASSES</caption><tr><th>Class</th><th>Number of Characters</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Class"]."</td><td>".$row["Number"]."</td></tr>";
    }
    echo "";
} else {
    echo "0 results";
}
?>
			</table>
			<br>
			<br>

			<div class=accountMAIN>
				<form method="post" action="search1.php">
					<fieldset>
						<legend>Filter Characters By Platform</legend>
							<select name="Platform">
                       			 <option value="Xbox One">Xbox One</option>
                       			 <option value="Xbox 360">Xbox 360</option>
                       			 <option value ="Playstation 4">Playstation 4</option>
                        		 <option value="Playstation 3">Playstation 3</option>
                       			 <option value="PC">PC</option>
                    		</select>
            
					</fieldset>
					<br>
					<input type="submit" value="Run Search" />
				</form>
			</div>

			<br>
			<br>

			<div class=accountMAIN>
				<form method="post" action="search2.php">
					<fieldset>
						<legend>Filter Characters By Account</legend>
				<?php
					$sql = "SELECT User_Name FROM Accounts";
					$result = $mysqli->query($sql);
					?>
				<select name="User_Name">

				<?php 
					while($row = $result->fetch_assoc()) 
					{
   						 echo "<option value=".$row["User_Name"].">".$row["User_Name"]."</option>";
					}
				?>        
				</select>
            
					</fieldset>
					<br>
					<input type="submit" value="Run Search" />
				</form>
				</div>

				<br>
				<br>

				<div class=accountMAIN>
					<form method="post" action="search3.php">
						<fieldset>
							<legend>Filter Characters by Attack Power</legend>
								<p>Attack power greater than: <input type="number" placeholder="1-2000" name="Attack"></p>
            
						</fieldset>
						<input type="submit" value="Run Search" />
						</form>
				</div>
				<br><br>

		</div>
	
    </body>
</html>