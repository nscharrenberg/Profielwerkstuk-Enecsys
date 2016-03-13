<?php
include_once 'includes/connect.php';
include_once 'includes/db_connect.php';
 
sec_session_start();
if (login_check($mysqli) == true) :
include('partials/header.php');

$serial = htmlspecialchars($_POST['serial']);
$inverter = htmlspecialchars($_POST['inverter']);
$type = htmlspecialchars($_POST['type']);

$sql2 = mysqli_query($mysqli, "INSERT IGNORE INTO `inverters` (inverter_serial, 
		inverter_type, inverter_name) values 
		($serial, '$inverter', '$type')");
		
		mysqli_close($mysqli);
?>  