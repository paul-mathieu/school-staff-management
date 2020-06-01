<?php
$sql = "SELECT nom, prenom, email, login FROM molierej.utilisateur
            INNER JOIN molierej.est_specialise ON molierej.utilisateur.login = molierej.est_specialise.utilisateur_login 
            WHERE molierej.est_specialise.id_specialite = " . $_POST['id-spe'];
$result_spe = mysql_query($sql) or die('Erreur SQL ! '.$sql.'<br>'.mysql_error());
?>
<script>
    function consultProfil(login){
        var a = document.createElement('form');
        a.href = "https://reader.izneo.com/read/" + id_book + "/" + index;
        a.download = id_book + '_' + index + ".jpg";
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }
</script>
<div class="table-speciality">
    <table>
        <thead>
            <tr>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Login</th>
            </tr>
        </thead>
        <tbody class="expert-list">
            <?php
            $space = "            ";
            if (mysql_num_rows($result_spe) > 0){
                while ($row = mysql_fetch_array($result_spe, MYSQL_NUM)) {
                    echo $space . '<tr>';
                    echo $space . '<th>' . $row[0] . '</th>';
                    echo $space . '<th>' . $row[1] . '</th>';
                    echo $space . '<th><a href="mailto:' . $row[2] . '">' . $row[2] . '</a></th>';
                    echo $space . '<th>' . $row[3] . '</th>';
//                    echo $space . '<th><a onclick="consultProfil(' . $row[3] . ')">Consulter le profil</a></th>';
                    echo $space . '</tr>';
                }
            }
            ?>
        </tbody>
    </table>
</div>