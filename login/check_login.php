<?php
	// Récupération des informations de connexion
	$username = $_POST["username"];
	$password = $_POST["password"];

	$sql = "select pwd from utilisateur where login = '".$username."';";
	$result = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
	$password_match = mysql_fetch_assoc($result);

	// $password_match = mysql_fetch_assoc(mysql_query("select password from utilisateur where username LIKE '".$username."'"));
	// Si l'un des champs n'est pas rempli
	if ($username == "" or $password == "") {
		$empty_login = true;

	// Si le username ou le mot de passe est incorrect
	} elseif ($password_match["password"] != $password){
		$wrong_password = true;

	// Sinon on peut démarrer une nouvelle session et revenir sur la page d'accueil
	} else {
		session_start ();
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
	}
?>
