<?php
$sql_data="Select * From molierej.utilisateur where login like '".$_SESSION['username']."'";
$result_data = mysql_query($sql_data) or die('Erreur SQL !'.$sql_id.'<br>'.mysql_error());
$data=mysql_fetch_assoc($result_data);
 ?>

<div id="title"> Mon compte </div> </br>
<div id="picture_div">
    <form action="page_3.php" method="post" enctype="multipart/form-data">
			<table>
				<tbody>
					<tr>
						<th><label>Choisir une image de profil : </label></th>
						<th>
							<input type="file" name="fileToUpload" id="fileToUpload">
							<input type="submit" value="Envoyer l'image" name="submit">
						</th>
					</tr>
				</tbody>
			</table>
    </form>
</div>
<div id="information">
  <form action="index.html" method="post">
		<table>
			<tbody>
				<tr>
					<th><label> Login  : </label></th>
					<th><?php echo "<input value=".$data['login']." maxlength='50'> </input>"; ?></th>
				</tr>
				<tr>
					<th><label> Mot de passe : </label></th>
					<th><?php echo "<input value=".$data['pwd']." maxlength='50'> </input>"; ?></th>
				</tr>
				<tr>
					<th><label>  Nom : </label></th>
					<th><?php echo "<input value=".$data['nom']." maxlength='50'> </input>"; ?></th>
				</tr>
				<tr>
					<th><label> Prenom : </label></th>
					<th><?php echo "<input value=".$data['prenom']." maxlength='50'> </input>"; ?></th>
				</tr>
				<tr>
					<th><label> Mail : </label></th>
					<th><?php echo "<input value=".$data['email']." maxlength='50'> </input>";?></th>
				</tr>
			</tbody>
		</table>

		<div id="button_account" >
      <input type="button" name="compte" value="Envoyer les données" >
		</div>
	</form >
</div>

<?php

if(isset($_POST["submit"])) {

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    //verification si le fichier exist
    if (file_exists($target_file)) {
        echo "Désolé, le fichier est introuvable.";
        $uploadOk = 0;
        }
    if ($_FILES["fileToUpload"]["size"] > 800000000) {
        echo "Désolé, votre image est trop gros,la limite maximal des 10 Mo";
        $uploadOk = 0;
        }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
        echo "Désolé, seul les formats jpeg, jpg et png sont autorisés";
        $uploadOk = 0;
        }
    //verifie si c'est bien une image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "C'est bien une image  - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Ce n'est pas une image.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
    echo "Votre fichier n'a pas était telecharger.";
    // essaie du telechargement si tout est bon
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "Le fichier ". basename( $_FILES["fileToUpload"]["name"]). "  a bien été envoyer.";
        } else {
            echo "Il y a eu une erreur lors du chargement du fichier";
        }
    }
}

if(isset($_POST["compte"])) {


}
?>
