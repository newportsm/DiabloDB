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
    
		<h3 id="h3">Diablo III Friend Database</h3>
		<div class="secondbody">
		
			<div class="armorWeapon">
			<a href="armor.php">Current Armor</a> - <a href="weapons.php">Current Weapons</a> - <a href="search.php">Search Database</a>
			</div>
		<br>
    
			<div class ="accountMAIN">
			<table class="table table-striped table-condensed">
			
<?php
$sql = "SELECT User_Name, Platform FROM Accounts";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    echo "<caption>ACCOUNTS</caption><tr><th>User Name</th><th>Platform</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["User_Name"]."</td><td>".$row["Platform"]."</td></tr>";
    }
    echo "";
} else {
    echo "0 results";
}

?>
			</table>

		<div class="accountID">
		<br>
   		
   		<form id="accountID" method="post" action="addaccount.php">
            <fieldset>
                <p>Account Name: <input type="text" name="User_Name" /></p>
            </fieldset>
            
            <fieldset>
                <p>Platform:
                    <select id ="Platform" name="Platform">
                        <option value="Xbox One">Xbox One</option>
                        <option value="Xbox 360">Xbox 360</option>
                        <option value ="Playstation 4">Playstation 4</option>
                        <option value="Playstation 3">Playstation 3</option>
                        <option value="PC">PC</option>
                    </select></p>
             </fieldset>
                <p id="submit"><input type="submit" value="Add" /></p>
        </form> 
        </div>



		<table class="table table-striped table-condensed">
<?php
$sql = "SELECT Name, Class, Level FROM Characters";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    echo "<caption>CHARACTERS</caption><tr><th>Name</th><th>Class</th><th>Level</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Name"]."</td><td>".$row["Class"]."</td><td>".$row["Level"]."</td></tr>";
    }
    echo "";
} else {
    echo "0 results";
}
?>
		</table>

		<div class="accountID">

			<form id="accountID" method="post" action="addchar.php">	
				<fieldset>
					<p>Character Name: <input type="text" name="Name"  /></p>
				</fieldset>
				<fieldset>
       			  <p>Class:
          			  <select id ="Class" name="Class">
              			  <option value="Barbarian">Barbarian</option>
               			  <option value="Crusader">Crusader</option>
                		  <option value ="Monk">Monk</option>
                		  <option value="Demon Hunter">Demon Hunter</option>
               		      <option value="Wizard">Wizard</option>
                          <option value="Witch Doctor">Witch Doctor</option>
            		 </select></p>
    			</fieldset>
  			  <fieldset>
    			<p>Account Name:
<?php
$sql = "SELECT User_Name FROM Accounts";
$result = $mysqli->query($sql);
?>
<select id="AID" name="AID">

<?php 
while($row = $result->fetch_assoc()) 
{
    echo "<option value=".$row["User_Name"].">".$row["User_Name"]."</option>";
}
?>        
</select>
			</p>
			</fieldset>
			<fieldset>
    			<p>Level: <input type="number" placeholder="1-70" name="Level">
    		</fieldset>
    		<fieldset>
    			<p>Armor:
<?php
$sql = "SELECT Name FROM Armor";
$result = $mysqli->query($sql);
?>
<select id="ArID" name="ArID">

<?php 
while($row = $result->fetch_assoc()) 
{
    echo "<option value=".$row["Name"].">".$row["Name"]."</option>";
}
?>        
</select>
				</p>
    		</fieldset>
   			<p id="submit"><input type="submit" value="Add" /></p>
    	</form>
   		<br>
    	<br>

		<table class="table table-striped table-condensed">  
<?php
$sql = "SELECT EG.CID, EG.Paragon_Level, EG.Difficulty, C.Name
FROM `End Game` EG
JOIN Characters C ON C.CID=EG.CID";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    echo "<caption>END GAME (over lvl 70)</caption><tr><th>Character Name</th><th>Paragon Level</th><th>Difficulty</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Name"]."</td><td>".$row["Paragon_Level"]."</td><td>".$row["Difficulty"]."</td></tr>";
    }
    echo "";
} else {
    echo "0 results";
}

?>
		</table>
		<br>

		<form method="post" action="addend.php">
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
				<p>Paragon Level: <input type="number" name="Paragon_Level"></p>
			</fieldset>
			<fieldset>
				<p>Difficulty
                 	   <select id ="Difficulty" name="Difficulty">
                 	        <option value="Normal">Normal</option>
                    		<option value="Hard">Hard</option>
                      		<option value ="Expert">Expert</option>
                      	  	<option value="Master">Master</option>
                        	<option value="Torment I">Torment I</option>
                        	<option value="Torment II">Torment II</option>
                        	<option value="Torment III">Torment III</option>
                        	<option value="Torment IV">Torment IV</option>
                        	<option value="Torment V">Torment V</option>
                        	<option value="Torment VI">Torment VI</option>
                        	<option value="Torment VII">Torment VII</option>
                        	<option value="Torment VII">Torment VIII</option>
                        	<option value="Torment IX">Torment IX</option>
                        	<option value="Torment X">Torment X</option>
                    	</select>
          		  </p>
       		 </fieldset>
        	 <p id="submit"><input type="submit" value="Add" /></p>
		</form>	
		<br>
		<br>
		</div>
	</div>       
	
</div>
	
</body>
</html>