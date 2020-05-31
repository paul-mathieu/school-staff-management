<?php
// Connexion à la base de données
//$conn = mysqli_connect("localhost", "root", "polytech","polyBase");
//mysqli_query($conn,"SET NAMES UTF8");

// Connexion à la base de données
$username = "molierej";
$password = "356hkuwy";
$conn = mysql_pconnect("tp-epu:3308", $username, $password) or die("Impossible de se connecter : " . mysql_error());
mysql_select_db($username, $conn) or die("Impossible de sélectionner la base: " . mysql_error());
mysql_query("SET NAMES UTF8");

//while ($row = mysql_fetch_assoc($result)) {
//   $temp = $row["pwd"];
//}


// Récupération des informations de connexion
$login = $_POST["login"];
$pwd = $_POST["pwd"];
$pwd_match = mysql_fetch_assoc(mysql_query("select pwd from utilisateur where login = '".$login."'"));

// Si l'un des champs n'est pas rempli
if ($login == "" or $pwd == "") {
	header ('location: login.php?error=empty');
	
// Si le login ou le mot de passe est incorrect
} elseif ($pwd_match["pwd"] != $pwd){ 
	header ('location: login.php?error=entry');
	
// Sinon on peut démarrer une nouvelle session et revenir sur la page d'accueil
} else { 
	session_start ();
	$_SESSION['login'] = $login;
	$_SESSION['pwd'] = $pwd;
	header ('location: index.php');
}
?>