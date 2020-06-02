<?php
$type_cours = mysql_query("SELECT distinct type_cours
    from groupe INNER JOIN appartient_groupe
    WHERE utilisateur_login = '".$login."'");

$groupe = "";

?>

<div id=bot-left class='container-message'>
<div class='title'>Nouvelle requête</div>
<form action='?page=2&new_request=true' method='post' class='form-container-message'>
    Nom de la requête<br>
    <input type='text' class='namerequest text-name' name='title' size=40><br>
    Type de cours
    <select name='type_cours'>
        <option value="CM">CM</option>
        <option value="TD">TD</option>
        <option value="TP">TP</option>
    </select><br>
    Groupe <input type='text' class='namerequest text-group' name='title' value="<?php echo ""; ?>" DISABLED><br>
    <br>
	<input type='submit' value='Ajouter la requête'>
</form>
</div>


<?php
 if (isset($_GET['new_request'])){
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
 }
?>