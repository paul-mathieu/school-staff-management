<?php
// connexion to the data base
$username = "molierej";
$password = "356hkuwy";
$conn = mysql_pconnect("tp-epu:3308", $username, $password) or die("Impossible de se connecter : " . mysql_error());
mysql_select_db($username, $conn) or die("Impossible de sélectionner la base: " . mysql_error());
mysql_query("SET NAMES UTF8");
?>
