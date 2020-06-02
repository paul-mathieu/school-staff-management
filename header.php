<?php
  // debug function
  function console_log($data) {echo "<script type=\"text/javascript\">console.log(\"".$data."\");</script>";}

  // error function
  function alert_error($data) {
    echo "<script type=\"text/javascript\">
        window.onload = function(e){window.alert(\"".$data."\")};
    </script>";
  }

  // function redirect page
    function redirect($page) {echo "<script type=\"text/javascript\">window.location.replace(\"index.php?page=" . $page . "\");</script>";}

  // connect to db
  include 'connect_db.php';

  session_start();

  // init errors login
  $empty_login = false;
	$wrong_password = false;
  // init errors create account
  $empty_create = false;
  $incompatible_password = false;
  $error_password_length = false;
  $unique_constraint = false;

  // get the page number
  $encours = array(" "," "," "," "," ");
  !isset($_GET["page"]) ?  $page=0 :  $page=$_GET["page"];
  $encours[$page] = "encours";

  if (isset($_POST['submit-login'])){ // if not connect yet
    // remove old cookies
    $_SESSION['connect'] = true;
    // delete cookies
    // if (isset($_COOKIE['PHPSESSID'])) {
    //     unset($_COOKIE['PHPSESSID']);
    //     setcookie('PHPSESSID', null, -1, '/');
    // }

    // start session
    include "login/check_login.php";

  } elseif (isset($_POST['submit-create'])) { // if create account
    // start session
    include "login/check_create_account.php";
  }

  if (isset($_GET['disconnect'])){
    if ($_GET['disconnect']){
      unset($_SESSION['username']);
      unset($_SESSION['password']);
      unset($_SESSION['statut']);
      session_destroy();
      header('Location: index.php');
    }
  }

?>
