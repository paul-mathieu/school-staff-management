<?php
$sql_photo="SELECT utilisateur.photo,utilisateur.photo_name,utilisateur.photo_type FROM molierej.utilisateur  WHERE utilisateur.login='".$_SESSION['username']."'";

$requete_photo = mysql_query($sql_photo) or die('Erreur SQL !'.$sql_CV.'<br>'.mysql_error());
$photo_resultat=mysql_fetch_assoc($requete_photo);
if($photo_resultat["photo"]!=null){
    echo "<a id='link_picture' target='_blank' href=\"file/photo.php?login=".$_SESSION['username']."\">Ouvrir la photo de profil actuelle</a>";
}

if(isset($_POST["submit_photo"])) {

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//    if (file_exists($target_file)){
        $proportion=getimagesize($_FILES["fileToUpload"]["tmp_name"]);

        if ($_FILES["fileToUpload"]["size"] > 800000000) {
            alert_error("L'image est trop volumineuse");
            $uploadOk = 0;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
//        echo "Seuls les formats .jpeg, .jpg et .png sont autorisés";
            alert_error("Seuls les formats .jpeg, .jpg et .png sont autorisés");
            $uploadOk = 0;
        }
        if($proportion[0]>1000 ||$proportion[1]>1000){
            alert_error("Les proportions de l'image ne sont pas valides");
//        echo "Les proportions de l'image ne sont pas valides";
        }
        if ($uploadOk == 0) {
            alert_error("Votre fichier n'a pas été telechargé");
//        echo "Votre fichier n'a pas été telechargé";
            // essaie du telechargement si tout est bon
        } else {

            $file=addslashes(file_get_contents($_FILES["fileToUpload"]["tmp_name"]));
            $file_name=$_FILES["fileToUpload"]["name"];
            $file_type=$_FILES["fileToUpload"]["type"];
            $sql_piece_joint="UPDATE molierej.utilisateur SET  utilisateur.photo_type='".$file_type."',utilisateur.photo_name='".$file_name."' , utilisateur.photo='".$file."' WHERE utilisateur.login='".$_SESSION['username']."'";

            $requete_joint = mysql_query($sql_piece_joint);

            redirect("1");
        }

//    } else {
//        alert_error("Vous n'avez pas choisi de fichier");
//    }
}
?>
