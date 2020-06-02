<?php

$sql_photo="SELECT utilisateur.photo,utilisateur.photo_name,utilisateur.photo_type FROM molierej.utilisateur  WHERE utilisateur.login='".$_SESSION['username']."'";
$requete_photo = mysql_query($sql_photo) or die('Erreur SQL !'.$sql_CV.'<br>'.mysql_error());
$photo_resultat=mysql_fetch_assoc($requete_photo);
if($photo_resultat["photo"]!=null){
    echo "<a id='link_picture' target='_blank' href=\"file/CV.php?login=".$_SESSION['username']."\">Ouvrir le CV actuel</a>";
}

if(isset($_POST["submit_CV"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (file_exists($target_file)){

        if ($_FILES["fileToUpload"]["size"] > 800000000) {
            alert_error("Le fichier est trop volumineux");
            $uploadOk = 0;
        } elseif($FileType != "pdf" && $FileType != "docx" && $FileType != "odt"  ) {
            alert_error("Seul les formats pdf, docx et odt sont autorisés");
            $uploadOk = 0;
        } elseif ($uploadOk == 0) {

            alert_error("Votre fichier n'a pas été téléchargé.");
            // essaie du telechargement si tout est bon
        } else {
            $file=addslashes(file_get_contents($_FILES["fileToUpload"]["tmp_name"]));
            $file_name=$_FILES["fileToUpload"]["name"];
            $file_type=$_FILES["fileToUpload"]["type"];
            $sql_piece_joint="UPDATE molierej.utilisateur SET  utilisateur.CV_type='".$file_type."',utilisateur.CV_name='".$file_name."' , utilisateur.CV='".$file."' WHERE utilisateur.login='".$_SESSION['username']."'";

            $requete_joint = mysql_query($sql_piece_joint);
        }
    } else {
        alert_error("Vous n'avez pas choisi de fichier");
    }
}
?>

