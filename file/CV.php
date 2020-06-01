<?php
include 'connect_db.php';
    if(isset($_GET['login'])) {
    	$login=$_GET['login'];
       	$sql_CV="SELECT utilisateur.CV,utilisateur.CV_name,utilisateur.CV_type FROM molierej.utilisateur  WHERE utilisateur.login='".$login."'";
	    $requete_CV = mysql_query($sql_CV) or die('Erreur SQL !'.$sql_CV.'<br>'.mysql_error());
	    $CV_resultat=mysql_fetch_assoc($requete_CV);
	   	header("Content-Type:".$CV_resultat["CV_type"]);
        echo $CV_resultat["CV"];
	}
?>