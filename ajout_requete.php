<?php
//
 // Connexion à la base de données
 $username = "molierej";
 $password = "356hkuwy";
 $conn = mysql_pconnect("tp-epu:3308", $username, $password) or die("Impossible de se connecter : " . mysql_error());
 mysql_select_db($username, $conn) or die("Impossible de sélectionner la base: " . mysql_error());
 mysql_query("SET NAMES UTF8");

 session_start();

$login = $_SESSION['username'];

// IMPORT REQUETE
$sql = "insert into requete (nom,statut) values ('".$_POST['title']."','demande')";
mysql_query($sql);

// IMPORT REQUETE_UTILISATEUR
$maxId =  mysql_fetch_assoc(mysql_query("SELECT max(id_requete) as maxi FROM requete"));
$users = mysql_query("SELECT utilisateur_login from appartient_groupe
WHERE id_groupe IN (select distinct groupe.id_groupe from groupe inner join appartient_groupe
where type_cours = '".$_POST['type_cours']."' AND utilisateur_login='".$login."')");
while ($row = mysql_fetch_assoc($users)) {
	mysql_query("INSERT INTO requete_utilisateur VALUES (".$maxId['maxi'].",'".$row['utilisateur_login']."')");
}
header ('location: index.php?page=2');


?>
