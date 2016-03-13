<?php
	include("connect.php");
?>
<html>
	<head>
		<title>cmonth</title>
	</head>
	<body>
		<h2>cmonth</h2>
		<table border="1" cellpadding="3">
			<tr>
				<th>Inverter ID</th>
				<th>wh</th>
			</tr>
			<?php
				mysql_connect($servername,$username,$password);
				mysql_select_db($database);
				$query = "INSERT INTO cmonth (id, wh, dcpower, dccurrent, efficiency, acfreq, acvolt, temp, state) SELECT id, SUM(wh), SUM(dcpower), SUM(dccurrent), SUM(efficiency), SUM(acfreq), SUM(acvolt), SUM(temp), SUM(state) FROM cday GROUP BY id HAVING COUNT(id) > 1";
				$resultaat = mysql_query($query);
				while ($row = mysql_fetch_array($resultaat))
				{
			?>
			<tr>
				<td><?php $row["id"]; ?></td>
				<td><?php $row["SUM(wh)"]; ?></td>
			</tr>
			
			<br />
			<?php
			
		}
			

$delete = "DELETE FROM cday";
$dresultaat = mysql_query($delete);

			?>


			
	</table>
	</body>
</html>