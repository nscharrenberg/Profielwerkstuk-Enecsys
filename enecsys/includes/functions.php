<?php

/*
/
/ Dit script is gebaseert op een tutorial van wikihow.
/ @link http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL
/
*/
include_once 'connect.php';
 
function sec_session_start() {
    $session_name = 'sec_session_id';  // Een session openen.
    $secure = $SECURE;
	// Zorgt ervoor dat Javascript sec_session_id geen toegang meer heeft.
    $httponly = true;
    // Dwingt je om alleen een sessie te openen als er Cookies gebruikt worden.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }
    // Zoekt naar huidige Cookies.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"], 
        $cookieParams["domain"], 
        $secure,
        $httponly);
    // Veranderd de Sessie naar hetgene boven weergeven.
    session_name($session_name);
    session_start();            // Begin van PHP sessie.
    session_regenerate_id(true);    // Herstart de sessie.
}

function login($email, $password, $mysqli) {
    if ($stmt = $mysqli->prepare("SELECT id, username, password, salt 
        FROM members
       WHERE email = ?
        LIMIT 1")) {
        $stmt->bind_param('s', $email);  // $email naar parameter.
        $stmt->execute();    // Voer de Query uit.
        $stmt->store_result();
 
        // Krijg een variabele van de uitkomst.
        $stmt->bind_result($user_id, $username, $db_password, $salt);
        $stmt->fetch();
 
        // hash the password with the unique salt.
		// beveilig het wachtwoord door het password te hashen met Salt.
        $password = hash('sha512', $password . $salt);
        if ($stmt->num_rows == 1) {
            // Als de gebruiker bestaat controleer dan of de gebruiker geblokkeerd is voor teveel inlogpogingen
 
            if (checkbrute($user_id, $mysqli) == true) {
                // Account is geblokkeerd
                // Een E-mail word verzonden met het bericht dat het verzonden is. (Zal alleen werken als er een mailserver is verbonden).
                return false;
            } else {
               // Controleer of de ingegeven wachtwoorden met elkaar overeenkomen.
                if ($db_password == $password) {
                     // Het wachtwoord is goed!
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    // XSS Beveiligen, zoals we de waarde printen.
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $user_id;
                    // XSS BEveiligen, zoals we de waarden kunnen printen.
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/", 
                                                                "", 
                                                                $username);
                    $_SESSION['username'] = $username;
                    $_SESSION['login_string'] = hash('sha512', 
                              $password . $user_browser);
                    // Je bent met success ingelogd.
                    return true;
                } else {
                    // Wachtwoord is niet hetzelfde!
                    // De poging word genoteerd op de database.
                    $now = time();
                    $mysqli->query("INSERT INTO login_attempts(user_id, time)
                                    VALUES ('$user_id', '$now')");
                    return false;
                }
            }
        } else {
            // Ne gebruiker bestaat niet.
            return false;
        }
    }
}

function checkbrute($user_id, $mysqli) {
    // Geef waarde van de huidige tijd. 
    $now = time();
 
    // Alle login pogingen worden genoteerd over de laatste 2 uur.
    $valid_attempts = $now - (2 * 60 * 60);
 
    if ($stmt = $mysqli->prepare("SELECT time 
                             FROM login_attempts 
                             WHERE user_id = ? 
                            AND time > '$valid_attempts'")) {
        $stmt->bind_param('i', $user_id);
 
       // Voer de Query uit. 
        $stmt->execute();
        $stmt->store_result();
 
		// Controleer of er meer dan 5 mislukte login pogingen zijn gedaan.
        if ($stmt->num_rows > 5) {
            return true;
        } else {
            return false;
        }
    }
}

function login_check($mysqli) {
	// Controleer of alles sessie veriabelen er zijn.
    if (isset($_SESSION['user_id'], 
                        $_SESSION['username'], 
                        $_SESSION['login_string'])) {
 
        $user_id = $_SESSION['user_id'];
        $login_string = $_SESSION['login_string'];
        $username = $_SESSION['username'];
 
        // Get the user-agent string of the user.
		// Krijg de "User-Agent" van de gebruiker.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
 
        if ($stmt = $mysqli->prepare("SELECT password 
                                      FROM members 
                                      WHERE id = ? LIMIT 1")) {
			// $user_id naar parameter
            $stmt->bind_param('i', $user_id);
            $stmt->execute();   // Voer de Query uit.
            $stmt->store_result();
 
            if ($stmt->num_rows == 1) {
                // If the user exists get variables from result.
				// Geef variabele van het resultaat als de gebruiker al bestaat.
                $stmt->bind_result($password);
                $stmt->fetch();
                $login_check = hash('sha512', $password . $user_browser);
 
                if ($login_check == $login_string) {
                    // Ingelogt.
                    return true;
                } else {
                    // Niet ingelogt.
                    return false;
                }
            } else {
                /// Niet ingelogt.
                return false;
            }
        } else {
            // Niet ingelogt.
            return false;
        }
    } else {
        // Niet ingelogt.
        return false;
    }
}

function esc_url($url) {
 
    if ('' == $url) {
        return $url;
    }
 
    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
 
    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;
 
    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }
 
    $url = str_replace(';//', '://', $url);
 
    $url = htmlentities($url);
 
    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);
 
    if ($url[0] !== '/') {
        return '';
    } else {
        return $url;
    }
}