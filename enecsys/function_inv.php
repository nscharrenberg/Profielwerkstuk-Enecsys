<html>
<head>
<title> 4.2 </title>
</head>
<body>
<?php
		include("includes/connect.php");
		$serial = $_POST["serial"];
		$inverter = $_POST["inverter"];
		$type = $_POST["type"];
		$sql = "INSERT INTO 
		inverters(data_id, inverter_name, inverter_serial, inverter_type)
		VALUES ('', '$serial','$inverter','$type')";
		$resultaat = mysql_query($sql);
		if (!$resultaat) {
			echo "de inverter is <b>NIET</b> geregistreerd"; }
		else {
		header('location: ./addinverter_succes.php');
		}
		echo "teet";
		?>
</body>
</html>		