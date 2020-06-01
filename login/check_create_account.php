<?php
// Récupération des informations
$name = $_POST["name"];
$lastname = $_POST["lastname"];
$statut = $_POST["statut"];
$mail = $_POST["mail"];
$login = $_POST["username"];
$pwd1 = $_POST["password"];
$pwd2 = $_POST["password-confirm"];

$sql = "SELECT login FROM utilisateur WHERE login = '".$login."';";
$result = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$chkLogin = mysql_fetch_assoc($result);

$sql = "SELECT id_statut FROM statut WHERE statut = '".$statut."';";
$result = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$getIdStatut = mysql_fetch_assoc($result);


// Si l'un des champs n'est pas rempli
if ($name == "" or $lastname == "" or $statut == "Statut" or $mail == "" or $login == "" or $pwd1 == "" or $pwd2 == "") {
	$empty_create = true;
// Si la confirmation du mot de passe n'est pas correcte
} elseif ($pwd1 != $pwd2){
	$incompatible_password = true;

// Si le mot de passe n'est pas assez long
} elseif (strlen($pwd1)<4){
	$error_password_length = true;

// Si le login existe déjà
} elseif ($chkLogin["login"] == $login){
	$unique_constraint = true;

// Sinon on peut insérer les données, démarrer une nouvelle session et revenir sur la page d'accueil
} else {
	$sql = "INSERT INTO utilisateur (login,pwd,nom,prenom,email,statut_id_statut) VALUES (
	'".$login."',
	'".$pwd1."',
	'".$name."',
	'".$lastname."',
	'".$mail."',
	".$getIdStatut["id_statut"].")";
	if (!mysql_query($sql)) {
		echo "Echec de l'insertion dans la table utilisateur " . $sql . "<br>" . mysql_error($conn);
	}

	$sql = "INSERT INTO acces VALUES ('".$login."','attente')";
	mysql_query($sql);

	// session_start ();
	// $_SESSION['login'] = $login;
	// $_SESSION['pwd'] = $pwd1;
	// header ('location: attente.php');
}
?>
