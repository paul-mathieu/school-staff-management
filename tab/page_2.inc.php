<script type="text/javascript">
	// url avec la requête
  function accessRequest(id){
    var url = "?page=2&id_request=" + id;
    window.location.replace(url);
  }
</script>

<?php
$sql = "SELECT statut_id_statut FROM utilisateur WHERE login = '" . $_SESSION['username'] . "'";
$result = mysql_query($sql) or die("Requête invalide: ". mysql_error()."\n".$sql);
$idStatut = mysql_fetch_assoc($result);

$login = $_SESSION['username'];
?>
<!-- MESSAGERIE -->
<div id=background >

	<!-- LEFT-TOP SIDE -->
	<div id=top-left class='container-message'>
	<?php
		$sql_id= "SELECT requete_utilisateur.requete_id_requete
				FROM molierej.requete_utilisateur
				WHERE requete_utilisateur.utilisateur_login LIKE '".$_SESSION['username']."'";

		$sql = "SELECT * FROM molierej.requete
			WHERE requete.id_requete IN (".$sql_id.")";
			
		$result = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

		while ($getRequete = mysql_fetch_assoc($result)){
			$id=$getRequete["id_requete"];
			$statut=$getRequete["nom"];
			echo "<div class='requete'><div class='requete-in' onclick=accessRequest(".$id.")>".$statut." </div></div>";
			}
		?>
	</div>
	<!-- RIGHT-TOP SIDE -->
	<div id=top-right class='container-message'>


		<?php
	if(isset($_GET['id_request'])){

		$id_requete=$_GET['id_request'];
		$sql_message="SELECT * FROM molierej.message WHERE message.id_requete=".$id_requete;
		$requete_message = mysql_query($sql_message) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
		while ($getMessage = mysql_fetch_assoc($requete_message)){
			echo "<div class='message'>".$getMessage['date']." de ".$getMessage['utilisateur_login']."</br>".$getMessage['message']."</div>";
			/*afficher lien image*/
			echo"</br>";
		}
	}
	?>


	</div>

	<!-- LEFT-BOT SIDE -->
	<?php
	console_log($_SESSION['statut']);
	if ($_SESSION['statut'] == 'Etudiant'){
		include 'tab/page_2_new_query.php';
	}
	?>

	<!-- RIGHT-BOT SIDE -->

	<?php
	// if (isset($_GET["new_request"])){
	include 'tab/page_2_new_message.php';
	// }
	?>
	
</div>
