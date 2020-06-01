<?php
$sql = "SELECT login, nom, prenom, email, photo, CV
         FROM molierej.utilisateur
         WHERE login = '".$login_expert."';";
$result = mysql_query($sql) or die("Requête invalide: ". mysql_error()."\n".$sql);
$infos_expert = mysql_fetch_array($result, MYSQL_NUM);

$sql = "SELECT specialite FROM specialite
          INNER JOIN est_specialise
          WHERE utilisateur_login = '".$login_expert."';";
$specialities_expert = mysql_query($sql) or die("Requête invalide: ". mysql_error()."\n".$sql);

?>

<br>
<h2><?php echo $infos_expert[2] . ' ' . $infos_expert[1]; ?></h2>

<table>
  <tbody>
    <tr>
      <th>Photo de profil</th>
      <th></th>
    </tr>
    <tr>
      <th>Login</th>
      <th><?php echo $infos_expert[0]; ?></th>
    </tr>
    <tr>
      <th>Liste des spécialités</th>
      <th>
        <?php
          if (mysql_num_rows($result_login) > 0){
            while ($row = mysql_fetch_array($result_login, MYSQL_NUM)) {
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
      <th></th>
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
