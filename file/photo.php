<?php
include 'connect_db.php';
//include 'header.php';
if(isset($_GET['login'])) {
    $login=$_GET['login'];
    $sql_photo="SELECT utilisateur.photo,utilisateur.photo_name,utilisateur.photo_type FROM molierej.utilisateur  WHERE utilisateur.login='".$login."'";
    $requete_photo = mysql_query($sql_photo) or die('Erreur SQL !'.$sql_CV.'<br>'.mysql_error());
    $photo_resultat=mysql_fetch_assoc($requete_photo);
    header("Content-Type:".$photo_resultat["photo_type"]);
    echo $photo_resultat["photo"];
}
?>