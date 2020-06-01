<?php
$sql_data="Select * From molierej.utilisateur where login like '".$_SESSION['username']."'";
$result_data = mysql_query($sql_data) or die('Erreur SQL !'.$sql_id.'<br>'.mysql_error());
$data=mysql_fetch_assoc($result_data);
 ?>
<div id="title"><h2>Mon compte</h2></div><br>

<h3 style="font-size: 150%;">Changer les fichiers chargés</h3>

<div id="picture_div">
    <form action="index.php?page=1" method="post" enctype="multipart/form-data">
			<table>
				<tbody>
					<tr>
						<th><label>Changer la photo de profil : </label></th>
						<th>
							<input type="file" name="fileToUpload" id="fileToUpload">
							<input type="submit" value="Valider" name="submit_photo">
                        </th>
                        <th>
                            <?php
                            include 'tab/page_1_CV.php';
                            ?>
                        </th>
					</tr>
				</tbody>
			</table>
    </form>
    <form action="index.php?page=1" method="post" enctype="multipart/form-data">
            <table>
                <tbody>
                    <tr>
                        <th><label>Changer le CV (.pdf) : </label></th>
                        <th>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <input type="submit" value="Valider" name="submit_CV">
                        </th>
                        <th>

                        <?php
                        include 'page_1_photo.php';
                         ?>
                        </th>
                    </tr>
                </tbody>
            </table>
    </form>

</div>

<h3 style="font-size: 150%;">Modifier vos données personnelles</h3>

<div id="information">
  <form action="index.php?page=1" method="post">
		<table>
			<tbody>
				<tr>
					<th><label> Login  : </label></th>
					<th><?php echo "<label >".$data['login']."</label>"; ?></th>
				</tr>
				<tr>
					<th><label> Mot de passe : </label></th>
					<th><?php echo "<input name='pwd' value=".$data['pwd']." maxlength='50'> </input>"; ?></th>
				</tr>
				<tr>
					<th><label>  Nom : </label></th>
					<th><?php echo "<input name='nom' value=".$data['nom']." maxlength='50'> </input>"; ?></th>
				</tr>
				<tr>
					<th><label> Prenom : </label></th>
					<th><?php echo "<input name='prenom' value=".$data['prenom']." maxlength='50'> </input>"; ?></th>
				</tr>
				<tr>
					<th><label> Mail : </label></th>
					<th><?php echo "<input name='email' value=".$data['email']." maxlength='50'> </input>";?></th>
				</tr>
			</tbody>
		</table>

		<div id="button_account" >
                <input type="submit" name="compte" value="Valider" >
		</div>
	</form >
</div>

<?php
if(isset($_POST["compte"])) {
    $sql_id= "UPDATE molierej.utilisateur SET utilisateur.pwd='".$_POST["pwd"]."', utilisateur.nom='".$_POST["nom"]."', utilisateur.prenom='".$_POST["prenom"]."', utilisateur.email='".$_POST["email"]."' WHERE utilisateur.login LIKE '".$_SESSION['username']."'";
    if($result_id = mysql_query($sql_id)){
       echo '<meta http-equiv="refresh" content="1"; URL="index.php?page=1">';
    }
}
?>


<?php
    if (isset($_SESSION['statut'])){
        if ($_SESSION['statut'] == 'Expert'){
            echo '<h3 style=\"font-size: 150%;\">Modifier vos données Modifiez vos spécialités</h3>';
            include 'tab/page_1_specialites.php';
        }
    }
?>
