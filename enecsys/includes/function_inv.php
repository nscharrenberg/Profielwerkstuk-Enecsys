<?php
include_once 'db_connect.php';																
include_once 'connect.php';																	// Deze 2 bestanden zorgen ervoor dat er verbinding met de database word gemaakt.
 
$error_msg = "";																			// Variabele aangemaakt voor fout meldingen.

if (isset($_POST['serial'], $_POST['inverter'], $_POST['type'])) {							// Bekijkt of het formulier is ingevuld.
	$serial = $_POST['serial'];																// Geeft het formulier "serial" de variabele $serial
	$inverter = $_POST['inverter'];															// Geeft het formulier "inverter" de variabele $inverter
	$type = $_POST['type'];																	// Geeft het formulier "type" de variabele $type
	$prep_stmt = "SELECT data_id FROM inverters WHERE serial = ? LIMIT 1";					// Selecteerd alle inverters
    $stmt = $mysqli->prepare($prep_stmt);													
	
	// Controleren of het serialnummer al eens voorkomt in de database.
	// @link http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL
	//
    if ($stmt) {
        $stmt->bind_param('s', $serial);
        $stmt->execute();
        $stmt->store_result();
 
        if ($stmt->num_rows == 1) {
           // Als het serialnummer al eens voorkomt krijgt hij een foutmelding.
            $error_msg .= '<p class="error">A Inverter with this Serial already excists.</p>';
                        $stmt->close();
        }
                $stmt->close();
    } else {
		// Als hij het anders nog niet doet, geeft hij deze foutmelding.
        $error_msg .= '<p class="error">Database error Line 39</p>';
                $stmt->close();
    }
	
	if (empty($error_msg)) {
        // Als er geen foutmelding is, en alles dus goed is, dan zal hij de data van het formulier in de "inverter" database zetten.
        if ($insert_stmt = $mysqli->prepare("INSERT INTO inverters (inverter_serial, inverter_name, inverter_type) VALUES ($serial, $inverter, $type)")) {
