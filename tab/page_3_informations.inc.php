<?php
$sql = "SELECT login, nom, prenom, email, photo, CV
         FROM molierej.utilisateur
         WHERE login = '".$login_expert."';";
$result = mysql_query($sql) or die("Requête invalide: ". mysql_error()."\n".$sql);
$infos_expert = mysql_fetch_array($result, MYSQL_NUM);

$sql = "SELECT specialite FROM specialite
          INNER JOIN est_specialise
          WHERE utilisateur_login = '".$login_expert."'
          AND specialite.id_specialite = est_specialise.id_specialite;";
$specialities_expert = mysql_query($sql) or die("Requête invalide: ". mysql_error()."\n".$sql);

?>

<br>
<h2><?php echo $infos_expert[2] . ' ' . $infos_expert[1]; ?></h2>

<table>
  <tbody>
    <tr>
      <th>Photo de profil</th>
      <th>
        <?php

    $sql_photo="SELECT utilisateur.photo,utilisateur.photo_name,utilisateur.photo_type FROM molierej.utilisateur  WHERE utilisateur.login='".$infos_expert[0]."'";
    $requete_photo = mysql_query($sql_photo) or die('Erreur SQL !'.$sql_CV.'<br>'.mysql_error());
    $photo_resultat=mysql_fetch_assoc($requete_photo);
    if($photo_resultat["photo"]!=null){
        echo "<a id='link_picture' target='_blank' href=\"file/photo.php?login=".$infos_expert[0]."\">Photo de profil</a>";
    }else{
      echo "<label> photo indisponible</label>";
    }
    ?>
      </th>
    </tr>
    <tr>
      <th>Login</th>
      <th><?php echo $infos_expert[0]; ?></th>
    </tr>
    <tr>
      <th>Liste des spécialités</th>
      <th>
        <?php
          if (mysql_num_rows($specialities_expert) > 0){
            while ($row = mysql_fetch_array($specialities_expert, MYSQL_NUM)) {
              echo $row[0] . ' ';

            }
          }
        ?>
      </th>
    </tr>
    <tr>
      <th>Envoyer un mail</th>
      <th><?php echo "<a href=\"mailto:" . $infos_expert[3] . "\">" . $infos_expert[3] . "</a>"; ?></th>
    </tr>
    <tr>
      <th>Télécharger le CV</th>
      <th>
    <?php
    $sql_CV="SELECT utilisateur.CV,utilisateur.CV_name,utilisateur.CV_type FROM molierej.utilisateur  WHERE utilisateur.login='".$infos_expert[0]."'";
    $requete_CV = mysql_query($sql_CV) or die('Erreur SQL !'.$sql_CV.'<br>'.mysql_error());
    $CV_resultat=mysql_fetch_assoc($requete_CV);
    if($CV_resultat["CV"]!=null){
        echo "<a id='link_picture' target='_blank' href=\"file/CV.php?login=".$infos_expert[0]."\">Ouvrir le CV actuel</a>";

    }else{
      echo "<label> CV indisponible</label>";
    }
        
    ?>
      </th>
    </tr>
    <tr>
      <th>Rechercher l'expert sur DuckDuckGo</th>
      <th>
        <?php
          $url_search = "https://www.google.com/search?q=" . $infos_expert[2] . '+' . $infos_expert[1];
          echo "<a href=\"" . $url_search . "\" target=\"_blank\">Recherche Google</a>";
        ?>
      </th>
    </tr>
    <tr>
      <th>Rechercher l'expert sur Google </th>
      <th>
        <?php
          $url_search = "https://duckduckgo.com/?q=" . $infos_expert[2] . '+' . $infos_expert[1];
          echo "<a href=\"" . $url_search . "\" target=\"_blank\">Recherche DuckDuckGo</a>";
        ?>
      </th>
    </tr>
  </tbody>
</table>
<br><br><br>


</table>
