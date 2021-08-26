<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$nom_db = "spinninevents";

$db = new mysqli($host_db, $user_db, $pass_db, $nom_db);
$db->set_charset("utf8");

$message = "Pas de message pour le moment";
$connecte = false;

?>