<?php
session_start();
//Vider la session, dire que c'est vide
$_SESSION = array();
//Détruire la session
session_destroy();
//Redirection sur la page de connection
header("Location: login");
?>