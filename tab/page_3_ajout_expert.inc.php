<?php
#requete sql

$prepare = ("SELECT capteur.description FROM molierej.capteur WHERE capteur.nom LIKE '$nom')");
$requete = mysql_query($prepare);
$data=mysql_fetch_array($requete);//recuperation donnee du compte

?>
<div id ="title"> Changement des données du compte</div>
<div id="picture_div">
    <form action="changement_information_utilisateur.php" method="post" enctype="multipart/form-data">
        <label>  Selection votre image de profil :</label> </br>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Envoie de l'image" name="submit">
    </form>
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
        echo "Désolé, votre image est trop volumineuse, la limite maximale est de 10 Mo";
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
        echo "Désolé, seuls les formats jpeg, jpg et png sont autorisés";
        $uploadOk = 0;
      
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

?>
<form action="changement_information_utilisateur.php" method="post" id="form_account" >
    <div id="information">
        <label> Nom  : </label>
        <?php  echo "<input type='text' name='nom' value=$data[0] />"; ?> </br>
        <label> prénom: </label>
        <?php  echo "<input type='text' name='prenom' value=$data[1] />"; ?></br>
        <label>  mail : </label>
        <?php  echo "<input type='text' name='mail' value=$data[2] />"; ?></br>
        <label> Commentaire : </label>
        <?php  echo "<input type='text' name='commentaire' value=$data[3] />"; ?></br>
        <label> Groupe : </label>
        <?php  echo "<input type='text' name='Groupe' value=$data[4] />"; ?></br>

        <label> Commentaire : </label>
        <?php echo "<input type='text' name='valmax' value=$data[5] />"; ?></br>
        <label> Commentaire : </label>
        <?php  echo "<input type='text' name='valmax' value=$data[6] />"; ?></br>
        <label> Commentaire : </label>
        <?php  echo "<input type='text' name='valmax' value=$data[7] />"; ?></br>
    </div>
    </br>
    <div id="button_account" >
        <input type="button" name="compte" value="Envoyer les données" >
    </div>
</form>

<?php


if(isset($_POST["compte"])) {

}
?>
