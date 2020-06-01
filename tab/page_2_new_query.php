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
    // stocker dans la db
 }
?>