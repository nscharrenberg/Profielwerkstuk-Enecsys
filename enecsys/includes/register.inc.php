<?php
/*
/
/ Dit script is gebaseert op een tutorial van wikihow.
/ @link http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL
/
*/
include_once 'db_connect.php';
include_once 'connect.php';
 
$error_msg = "";
 
if (isset($_POST['username'], $_POST['email'], $_POST['p'])) {
    // Nakijken van de ingevulde data
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // geen correct E-mail adres
        $error_msg .= '<p class="error">The email address you entered is not valid</p>';
    }
 
    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {
        // Het gehashte wachtwoord moet 128 tekens lang zijn.
        // Als dat niet het geval is dan is er iets verkeerds gegaan.
        $error_msg .= '<p class="error">Invalid password configuration.</p>';
    }
 
	// Gebruikersnaam en wachtwoord validatie word gecontroleerd door de gebruiker.
    // TDit heeft verder geen meerwaarde voor de beveiliging als dit alleen voor de gebruiker is.
 
    $prep_stmt = "SELECT id FROM members WHERE email = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
   // nakijken naar de bestaande E-mail adressen 
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
 
        if ($stmt->num_rows == 1) {
            // Een gebruiker met dit gebruikersnaam bestaat al
            $error_msg .= '<p class="error">A user with this email address already exists.</p>';
                        $stmt->close();
        }
                $stmt->close();
    } else {
        $error_msg .= '<p class="error">Database error Line 39</p>';
                $stmt->close();
    }
 
    // nakijken van de bestaande gebruikers
    $prep_stmt = "SELECT id FROM members WHERE username = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
 
                if ($stmt->num_rows == 1) {
                        // Een gebruiker met dit gebruikersnaam bestaat al
                        $error_msg .= '<p class="error">A user with this username already exists</p>';
                        $stmt->close();
                }
                $stmt->close();
        } else {
                $error_msg .= '<p class="error">Database error line 55</p>';
                $stmt->close();
        }
 
    if (empty($error_msg)) {
        // Het wachtwoord word willekeurig gesalt.
        //$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE)); // Heeft niet gewerkt.
        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
 
        // Maak salted wachtwoord aan.
        $password = hash('sha512', $password . $random_salt);
 
        // Voeg de nieuwe gebruiker toe, wachtwoord, email, wachtwoord, salted.
        if ($insert_stmt = $mysqli->prepare("INSERT INTO members (username, email, password, salt) VALUES (?, ?, ?, ?)")) {
            $insert_stmt->bind_param('ssss', $username, $email, $password, $random_salt);
            // Voor Query uit.
            if (! $insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
            }
        }
        header('Location: ./register_success.php');
    }
}