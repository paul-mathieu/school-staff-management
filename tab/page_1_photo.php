<?php
echo "<a id='link_picture' target='_blank' href=\"file/CV.php?login=".$_SESSION['username']."\">Ouvrir le CV actuel</a>";
if(isset($_POST["submit_CV"])) {

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if ($_FILES["fileToUpload"]["size"] > 800000000) {
echo "Désolé, taille de l'image trop importante";
$uploadOk = 0;
}
if($FileType != "pdf" && $FileType != "docx" && $FileType != "odt"  ) {
echo "Désolé, seul les formats pdf, docx et odt  sont autorisés";
$uploadOk = 0;
}
if ($uploadOk == 0) {

echo "Votre fichier n'a pas était telecharger.";
// essaie du telechargement si tout est bon
} else {
$file=addslashes(file_get_contents($_FILES["fileToUpload"]["tmp_name"]));
$file_name=$_FILES["fileToUpload"]["name"];
$file_type=$_FILES["fileToUpload"]["type"];
$sql_piece_joint="UPDATE molierej.utilisateur SET  utilisateur.CV_type='".$file_type."',utilisateur.CV_name='".$file_name."' , utilisateur.CV='".$file."' WHERE utilisateur.login='".$_SESSION['username']."'";

$requete_joint = mysql_query($sql_piece_joint);
}

}
?>

