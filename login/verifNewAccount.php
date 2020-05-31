<?php
// Connexion à la base de données
$username = "molierej";
$password = "356hkuwy";
$conn = mysql_pconnect("tp-epu:3308", $username, $password) or die("Impossible de se connecter : " . mysql_error());
mysql_select_db($username, $conn) or die("Impossible de sélectionner la base: " . mysql_error());
mysql_query("SET NAMES UTF8");

// Récupération des informations
$name = $_POST["name"];
$firstname = $_POST["firstname"];
$statut = $_POST["statut"];
$mail = $_POST["mail"];
$login = $_POST["login"];
$pwd1 = $_POST["pwd1"];
$pwd2 = $_POST["pwd2"];

$chkLogin = mysql_fetch_assoc(mysql_query("SELECT login FROM utilisateur WHERE login = '".$login."'"));
$getIdStatut = mysql_fetch_assoc(mysql_query("SELECT id_statut FROM statut WHERE statut = '".$statut."'"));

// Si l'un des champs n'est pas rempli
if ($name == "" or $firstname == "" or $statut == "Statut" or $mail == "" or $login == "" or $pwd1 == "" or $pwd2 == "") {
	header ('location: login.php?error2=empty');
	
// Si la confirmation du mot de passe n'est pas correcte
} elseif ($pwd1 != $pwd2){ 
	header ('location: login.php?error2=password');
	
// Si le mot de passe n'est pas assez long
} elseif (strlen($pwd1)<4){ 
	header ('location: login.php?error2=passwordLength');
	
// Si le login existe déjà
} elseif ($chkLogin["login"] == $login){ 
	header ('location: login.php?error2=uniqueConstraint');
	
// Sinon on peut insérer les données, démarrer une nouvelle session et revenir sur la page d'accueil
} else { 
	$sql = "INSERT INTO utilisateur (login,pwd,nom,prenom,email,statut_id_statut) VALUES (
	'".$login."',
	'".$pwd1."',
	'".$name."',
	'".$firstname."',
	'".$mail."',
	".$getIdStatut["id_statut"].")";
	if (!mysql_query($sql)) {
		echo "Echec de l'insertion dans la table utilisateur " . $sql . "<br>" . mysql_error($conn);
	}
	
	$sql = "INSERT INTO acces VALUES ('".$login."','attente')";
	mysql_query($sql);
	
	session_start ();
	$_SESSION['login'] = $login;
	$_SESSION['pwd'] = $pwd1;
	header ('location: attente.php');
}
?>