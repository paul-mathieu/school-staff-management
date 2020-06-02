 <form id="expert-name" action="index.php?page=1" method="post">
        <label for="groupe">Votre groupe  : </label>
      <select name="groupe">
        <option value="titre">Selectionner votre groupe</option>
            <?php
            $sql_groupe = "SELECT groupe.libelle FROM molierej.groupe";
          
        $groupe = mysql_query($sql_groupe) or die("Requête invalide: ". mysql_error()."\n".$sql_groupe);
            if (mysql_num_rows($groupe) > 0){
                while ($row = mysql_fetch_array($groupe)) {
                    echo '      <option value="' . $row["libelle"] . '">' . $row["libelle"] . '</option>';
                }
            }
            ?>
        </select>

        ou ajouter votre groupe :
        <select name="type_cours">
            <option value="TD">TD</option><option value="TP">TP</option><option value="CM">CM</option></select>
         <input name='autre_groupe' type="text"  maxlength='50' placeholder="Autre groupe">
        <select name="enseignant">
        <option value="titre">Selectionner l'enseignant </option>
            <?php
            $enseignant = "SELECT utilisateur.login FROM molierej.utilisateur WHERE utilisateur.statut_id_statut =1";
          
            $requete_enseignant = mysql_query($enseignant) or die("Requête invalide: ". mysql_error()."\n".$enseignant);
                if (mysql_num_rows($requete_enseignant) > 0){
                while ($row_enseignant = mysql_fetch_array($requete_enseignant)) {
                    echo '      <option value="' . $row_enseignant["login"] . '">' . $row_enseignant["login"] . '</option>';
                }
            }
            ?>
        </select>   
     <div id="button_case" >
        <input type="submit" name="button_groupe" value="Envoyer le groupe" >
    </div>
</form>
<?php 

if(isset($_POST["button_groupe"])) {
    if($_POST["groupe"]!="titre"){
        $id="SELECT groupe.id_groupe FROM molierej.groupe WHERE groupe.libelle='".$_POST["groupe"]."'";
        $id_requete= mysql_query($id) or die("Requête invalide: ". mysql_error()."\n".$id);
        $id_resultat =mysql_fetch_array($id_requete);
        echo $id_resultat["id_groupe"];
        $sql_groupe_actuelle="INSERT INTO molierej.appartient_groupe (utilisateur_login,id_groupe) VALUES ('".$_SESSION['username']."',".$id_resultat["id_groupe"].")";
    
         $resultat =mysql_fetch_array($sql_groupe_actuelle)  or die("Requête invalide: ". mysql_error()."\n".$sql_groupe_actuelle);
    }
    if((isset($_POST["autre_groupe"])) && (isset($_POST["enseignant"])) ){
        if( ($_POST["autre_groupe"]!=null) && ($_POST["enseignant"]!=null) ){
            $new_groupe="INSERT INTO  molierej.groupe(type_cours,libelle, Login_enseignant)  VALUES ('".$_POST["type_cours"]."','".$_POST["autre_groupe"]."','".$_POST["enseignant"]."')";
            if( mysql_query($new_groupe)){
                $id_new="SELECT groupe.id_groupe FROM molierej.groupe WHERE groupe.libelle='".$_POST["autre_groupe"]."'";
                $id_requete_new= mysql_query($id_new) or die("Requête invalide: ". mysql_error()."\n".$id_new);
                $resultat_id_new =mysql_fetch_array($id_requete_new);
                $sql_groupe_new="INSERT INTO molierej.appartient_groupe (utilisateur_login,id_groupe) VALUES ('".$_SESSION['username']."',".$resultat_id_new["id_groupe"].");";
            
                 $resultat =mysql_query($sql_groupe_new)  or die("Requête invalide: ". mysql_error()."\n".$sql_groupe_new);
                }
            }
        }
    }
?>