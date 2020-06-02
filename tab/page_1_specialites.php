<?php
$sql_specialite="SELECT * FROM molierej.specialite ORDER BY specialite";
$requete_specialite = mysql_query($sql_specialite) or die('Erreur SQL !'.$sql_specialite.'<br>'.mysql_error());

?>

<div style='overflow-y:hidden;display: block;height:150px;'>
    <form action='index.php?page=1' method='post'>
        <table>
            <tbody>
                <tr>
                    <td style="overflow-y: scroll;display: block;height:150px;">
                        <table style="">
                            <?php
                            While($liste=mysql_fetch_assoc($requete_specialite)){
                                echo "<tr>";
                                $sql="SELECT * FROM molierej.est_specialise 
                                        WHERE utilisateur_login = '" . $_SESSION['username'] . "'
                                        AND id_specialite = " . $liste["id_specialite"];
                                $specialities_user = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
                                $is_spe = mysql_num_rows($specialities_user) > 0;

                                if ($is_spe){
                                    echo "<td><input type='checkbox' value='".$liste["id_specialite"]."' name ='case[]' checked></td>";
                                } else {
                                    echo "<td><input type='checkbox' value='".$liste["id_specialite"]."' name ='case[]'></td>";
                                }


                                echo "<td>" . $liste["specialite"] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </table>
                    </td>
                    <td>
                        <input name='autre' type="text" value="" maxlength='50' placeholder="Autre Specialité...">
                    </td>
                    <td>
                        <div id="button_case" >
                                <input type="submit" name="submit-specialities" value="Envoyer les specialités" >
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

<?php

$sql_specialite_ajout="SELECT * FROM molierej.specialite";
$requete_specialite_ajout = mysql_query($sql_specialite_ajout) or die('Erreur SQL !'.$sql_specialite_ajout.'<br>'.mysql_error());

if(isset($_POST["submit-specialities"])) {
    // ajout d'une nouvelle spécialite
    if (isset($_POST["autre"])){
        if ($_POST["autre"]!=""){
            $specialite_id_max ="SELECT max(specialite.id_specialite)+1 as max_id FROM molierej.specialite";
            $requete_specialite_id_max = mysql_query($specialite_id_max) or die('Erreur SQL !'.$specialite_id_max.'<br>'.mysql_error());
            $id_max=mysql_fetch_assoc($requete_specialite_id_max);
            echo $id_max["max_id"];
            $specialite_ajout="INSERT INTO molierej.specialite(id_specialite,specialite) VALUES ('".$id_max["max_id"]."','".$_POST["autre"]."')";
            if( mysql_query($specialite_ajout) ){
                $specialite_ajout="INSERT INTO molierej.est_specialise(utilisateur_login,id_specialite) VALUES ('".$_SESSION['username']."','".$id_max["max_id"]."') ";
                $requete = mysql_query($specialite_ajout) or die('Erreur SQL !'.$specialite_ajout.'<br>'.mysql_error());
            }
        }
    }

    //suppression des anciens choix
    $spe_sql="DELETE FROM molierej.est_specialise WHERE est_specialise.utilisateur_login='".$_SESSION['username']."'";

    //
    if(!empty($_POST['case'])) {
//        echo 'Les valeurs des cases cochées sont :<br />';
        $checkboxes = is_array($_POST['case']) ? $_POST['case'] : array();
        foreach($checkboxes as $checkbox) {
            console_log($checkbox);
            $new_spe="INSERT INTO molierej.est_specialise VALUES ('" . $_SESSION['username'] . "', " . $checkbox . ")";
            $requete = mysql_query($new_spe);
        }
//        foreach ($_POST['case'] as $val) {
//            $new_spe="INSERT INTO molierej.est_specialise VALUES ('" . $_SESSION['username'] . "', " . $val;
//            $requete = mysql_query($new_spe);
//        }
        redirect("1");

    }
    // add the new spe


//    if( mysql_query($spe_sql) ){
//        // modification des spécialités de l'expert
//        While($liste2=mysql_fetch_assoc($requete_specialite_ajout)){
//            if(isset($_POST[$liste2["id_specialite"]])){
//                $new_spe="INSERT INTO molierej.est_specialise VALUES ('" . $_SESSION['username'] . "'," . $_POST[$liste2["id_specialite"]];
//                $requete = mysql_query($new_spe) or die('Erreur SQL !'.$new_spe.'<br>'.mysql_error());
//            }
//        }
//    }
}

?>
