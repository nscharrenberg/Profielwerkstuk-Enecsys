<?php
/*
/
/ Dit script is gebaseert op een tutorial van wikihow.
/ @link http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL
/
*/
include_once 'db_connect.php';
include_once 'functions.php';														// Het bestand verbinding met de database.
 
sec_session_start(); 																// Een veilige manier om de PHP Sessie te starten
 
if (isset($_POST['email'], $_POST['p'])) {											// Bekijkt of het formulier is ingevuld.
    $email = $_POST['email'];														// Geeft het formulier "email" de variabele $email
    $password = $_POST['p']; 														// Geeft het formulier "p" de variabele $password
 
    if (login($email, $password, $mysqli) == true) {								// Wanneer $email, $password & $mysqli op de waarde "true" staan dan word de code tussen haakjes uitgevoerd.
        // Inloggen is gelukt
        header('Location: ../index.php');
    } else {																		// Als dat niet het geval is dan zal de text tussen deze haakjes worden uitgevoerd.
        // Inloggen is niet gelukt 
        header('Location: ../login.php?error=1');
    }
} else {																			//Als het formulier niet is ingevult dan word er een "Invalid Request" verstuurd.
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
}