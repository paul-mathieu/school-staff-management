<?php
  if (!isset($_SESSION['connect'])){ // if not connect yet
    // remove old cookies
    $_SESSION['connect'] = true;
    // delete cookies
    if (isset($_COOKIE['PHPSESSID'])) {
        unset($_COOKIE['PHPSESSID']);
        setcookie('PHPSESSID', null, -1, '/');
    }
    // start session
    session_start();
  } else { // if connect
    // $_SESSION['connect'] = true;
    // delete cookies
    if (isset($_COOKIE['PHPSESSID'])) {
        unset($_COOKIE['PHPSESSID']);
        setcookie('PHPSESSID', null, -1, '/');
    }
    // delete session
    $_SESSION = array(); // Ecrase tableau de session
    session_unset();     // Detruit toutes les variables de la session en cours
    session_destroy();
  }
?>
