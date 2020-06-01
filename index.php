<?php
  // header to connect an user to a session
  include 'header.php';
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Index</title>
    <meta content="info">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/popup.css">
    <?php
        if ($page == "2") {
            echo '    <link rel="stylesheet" type="text/css" href="css/messagerie.css">';
        } elseif ($page == "3") {
            echo '    <link rel="stylesheet" type="text/css" href="css/info_experts.css">';
        }
//        if (isset($_SESSION['statut'])){
//            console_log("statut : " . $_SESSION['statut']);
//        }
    ?>
  </head>

  <body>

    <?php
    // check if errors
    $has_error = $empty_login || $wrong_password ||
      $empty_create || $empty_create ||
      $incompatible_password || $error_password_length || $unique_constraint;

    // include popup (login or create account)
    if (!isset($_SESSION['username']) || $has_error){
      include 'login/popup.inc.php';
    }
    // console_log("username : " . $_SESSION['username']);
    // console_log("il y a une erreur : " . strval($has_error));
    // console_log(strval(!empty(session_id()) || $has_error));

    ?>
    <!-- -- title -- -->
    <div id="titre" class="container">
        <h1>Gestion d'intervenants experts dans la formation</h1>
        <?php
            if (isset($_SESSION['username'])) {
                echo "<div><a href=\"./index.php?page=0&disconnect=true\"><input type=\"button\" value=\"Se déconnecter\" class=\"disconnect\"></a></div>";
            }
        ?>
    </div>

    <!-- -- content -- -->
    <div id="fond" class="row">

      <!-- menu -->
      <div id="menu" class="col-md-3" >
        <ul id="theMenu" >
          <?php
echo "         <li><a href=\"?page=0\" class=\"btn_menu $encours[0]\">Accueil</a></li>\n";
echo "         <li><a href=\"?page=1\" class=\"btn_menu $encours[1]\">Informations Utilisateur</a></li>\n";
echo "         <li><a href=\"?page=2\" class=\"btn_menu $encours[2]\">Messagerie</a></li> \n";
echo "         <li><a href=\"?page=3\" class=\"btn_menu $encours[3]\">Informations Experts</a></li>\n";
echo "         <li><a href=\"?page=4\" class=\"btn_menu $encours[4]\">Emploi du temps</a></li>\n";
          ?>
        </ul>
      </div>

      <!-- include content -->
      <div id="content" class="col-md-9">
      <?php
        // if the file of the page exists
        if( file_exists("tab/page_".$page.".inc.php") ){
          include("tab/page_".$page.".inc.php");
        }
      ?>
      </div>

    </div>

    <!-- -- footer -- -->
    <div id="footer" class="container footer">
        <span>Polytech Annecy-Chambéry - Module INFO642 - Guilbert, Guilly, Mathieu, Molières</span>
    </div>

  </body>
  <?php
    // session_destroy();
   ?>
</html>
