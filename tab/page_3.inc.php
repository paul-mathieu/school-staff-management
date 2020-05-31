<?php
//recuperation des experts possible
$sql = "SELECT nom, prenom, login FROM molierej.utilisateur
	INNER JOIN molierej.statut ON molierej.statut.statut = 'Expert'
        AND molierej.statut.id_statut = molierej.utilisateur.statut_id_statut
	ORDER BY nom";
$result_name = mysql_query($sql) or die('Erreur SQL ! '.$sql.'<br>'.mysql_error());

$sql = "SELECT nom, prenom, login FROM molierej.utilisateur
	INNER JOIN molierej.statut ON molierej.statut.statut = 'Expert'
        AND molierej.statut.id_statut = molierej.utilisateur.statut_id_statut
	ORDER BY login";
$result_login = mysql_query($sql) or die('Erreur SQL ! '.$sql.'<br>'.mysql_error());

?>
<div >
	<p>Choisissez un expert avec son nom ou son login puis validez pour trouver votre expert.</p>
</div>

<form id="expert-name" action="index.php?page=3" method="post">
		<label for="login">Recherche par nom : </label>
	  <select name="login">
			<?php
			if (mysql_num_rows($result_name) > 0){
				while ($row = mysql_fetch_array($result_name, MYSQL_NUM)) {
					echo '		<option value="' . $row[2] . '">' . $row[1] . ' ' . $row[0] . '</option>';
				}
			}
			?>
		</select>

		<input type="submit" name="submit-name-expert" value="Charger les données de cet expert">

	</form>

	<form id="expert-login" action="index.php?page=3" method="post">

		<label for="login">Recherche par login : </label>
	  <select name="login">
			<?php
			if (mysql_num_rows($result_login) > 0){
				while ($row = mysql_fetch_array($result_login, MYSQL_NUM)) {
					echo '		<option value="' . $row[2] . '">' . $row[2] . '</option>';
				}
			}
			?>
		</select>

		<input type="submit" name="submit-login-expert" value="Charger les données de cet expert">

	</form>

	<div id="information-experts">

		<?php
			if (isset($_POST['submit-name-expert']) || isset($_POST['submit-login-expert'])) {
				$login_expert = $_POST['login'];
				include 'tab/page_3_informations.inc.php';
			}
		 ?>

	</div>
