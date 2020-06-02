<?php
if (isset($_GET["id_request"])) {
	$id_requete = $_GET["id_request"];
} else {
	$id_requete = 0;
}

if (!(isset($_GET["second"]))) {
	echo"
	<div id=bot-right class='container-message'>

    <div class='title'>Nouveau message</div></br>

    <form action='?page=2&id_request=".$id_requete."&second=true' method='post' class='form-container-messagerie'>

        <div>Profession du destinataire :
            <select name='prof'>
				<option>Enseignant</option>
				<option>Etudiant</option>
				<option>Expert</option>
				<option>Comptable</option>
            </select>
        </div></br>

      <input type='submit' value='Rédiger le message'>

    </form>
</div>";
} else {
$profession = $_POST['prof'];
$sql = "SELECT nom, prenom, login FROM molierej.utilisateur
	INNER JOIN molierej.statut ON molierej.statut.statut = '".$profession."'
    AND molierej.statut.id_statut = molierej.utilisateur.statut_id_statut
	ORDER BY nom";
$result_name = mysql_query($sql) or die('Erreur SQL ! '.$sql.'<br>'.mysql_error());

echo"
<div id=bot-right class='container-message'>

    <div class='title'>Nouveau message</div>

    <form action='?page=2&id_request=".$id_requete."&new_message=true' method='post' class='form-container-messagerie'>

        <div>Destinataire (".$profession.") :
            <select name='login'>";
                if (mysql_num_rows($result_name) > 0){
                    while ($row = mysql_fetch_array($result_name, MYSQL_NUM)) {
                        echo '		<option value="' . $row[2] . '">' . $row[1] . ' ' . $row[0] . '</option>';
                    }
                } echo"
            </select>
        </div>

        <textarea id='content' class='big-zone' name='content' rows='3' cols='50' placeholder='Écrivez ici le contenu de votre message. Il sera visible par toutes les personnes concernées'></textarea>

       <input type='file' name='fileToUpload' id='fileToUpload' title='Ajouter une pièce jointe'>

      <input type='submit' value='Envoyer le message'>

    </form>
</div>";

}

if (isset($_GET["new_message"])) {
	if (empty($_POST['fileToUpload'])){
		$piece_jointe = 'NULL';
	} else {
		$piece_jointe = 'NULL';
	}
	$sql = "insert into message (utilisateur_login, id_requete, message, piece_jointe) values ('".
	$login."',".$id_requete.",'".$_POST['content']."',".$piece_jointe.")";
	mysql_query($sql);
}
?>
