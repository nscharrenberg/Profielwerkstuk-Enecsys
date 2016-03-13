<?php
/*
Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password)
*/
include_once 'includes/db_connect.php';
error_reporting(0);
 
// Connectie nakijken
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$player = mysqli_real_escape_string($mysqli, $_POST['player']);

 
// attempt insert query execution
$sql2 = "INSERT INTO players (name) VALUES ('$player')";
if(mysqli_query($mysqli, $sql2)){
    echo "Records added successfully.";
} else if ("Duplicate Entry") {
	echo "Er is al iemand met deze naam!";
} else {
	echo "";
}
 
// Sluiten van de connectie
mysqli_close($mysqli);