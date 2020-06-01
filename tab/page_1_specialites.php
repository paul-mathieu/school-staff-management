<?php
$sql_specialite="SELECT * FROM molierej.specialite ORDER BY specialite";
$requete_specialite = mysql_query($sql_specialite) or die('Erreur SQL !'.$sql_specialite.'<br>'.mysql_error());
?>

<div style='overflow-y:hidden;height:200px;'>
    <form action='index.php?page=1' method='post'>
        <table>
            <tbody>
                <tr>
                    <td style="overflow-y: scroll">
                        <table>
                            <?php
                            While($liste=mysql_fetch_assoc($requete_specialite)){
                                echo "<tr>";
                                echo "<td><input type='checkbox' value='".$liste["id_specialite"]."' name ='case' ></td>";
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
                                <input type="submit" name="box" value="Envoyer les specialitées" >
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
if(isset($_POST["box"])) {
    While($liste2=mysql_fetch_assoc($requete_specialite_ajout)){
        echo $_POST["case"][1];
        if (isset($_POST["'".$liste2["id_specialite"]."'"])){
            echo $liste2["id_specialite"];
        }
    }
}
?>

