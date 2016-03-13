<?php
$host = "localhost";															// MYSQL-SERVER HOST, dit is meestal "localhost"
$gebruiker = "root";															// MYSQL-SERVER GEBRUIKER.
$wachtwoord = "raspberry";														// MYSQL-SERVER WACHTWOORD, dit is het wachtwoord die je hebt aangemaakt.
$database = "enecsys";															// MYSQL-SERVER DATABASE, dit is de database die je in phpmyadmin hebt aangemaakt.

$pvoutput = "http://pvoutput.org/intraday.jsp?id=45139&sid=41722";				// PVOUTPUT url, zie "Your Outputs" op de pvoutput.org website, en plaats die link hierin.
$avatar = "assets/images/users/avatar.jpg";										// Plaats een link van een afbeelding of een path van een afbeelding voor je avatar.
$sitename = "Enecsys Data Monitor";												// De website naam, dit kan je naar eigen voorkeur zetten. De website naam word dan veranderd.

$SECURE = false;																// Security, houd op false.

$mysqli = mysql_connect($host, $gebruiker, $wachtwoord)							// Dit zorgt ervoor dat er verbinding word gemaakt met de database.
or die("verbinding met de server mislukt vanwege:" . mysql_error());			// Als er geen verbinding kan worden gemaakt met de database geeft hij een error weer.
$db = mysql_select_db($database) or die("database error: " . mysql_error());	// Er word verbinding gemaakt met de database tables, als er geen verbinding gemaakt kan worden weergeeft het een error.
?>