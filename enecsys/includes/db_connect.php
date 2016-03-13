<?php
include_once 'connect.php';   												// Zorgt ervoor dat connect.php in dit bestand word verwerkt. Het plaatst de codes van connect.php eigenlijk bovenop dit bestand.
$mysqli = new mysqli($host, $gebruiker, $wachtwoord, $database);			// zorgt voor een nieuwe verbinding.