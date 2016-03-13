<?php
/*
/
/ Dit script is gebaseert op een tutorial van wikihow.
/ @link http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL
/
*/
include_once 'functions.php';
sec_session_start();
 
// Sessie waardes uitschakelen 
$_SESSION = array();
 
// Sessie parameters ontvangen
$params = session_get_cookie_params();
 
// Cookies verwijderen 
setcookie(session_name(),
        '', time() - 42000, 
        $params["path"], 
        $params["domain"], 
        $params["secure"], 
        $params["httponly"]);
 
// Verwijder / Vernietig Sessie 
session_destroy();
header('Location: ../login.php');

