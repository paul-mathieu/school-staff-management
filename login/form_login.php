<div id="login form-popup">
  <form action="verifLogin.php" method="post" class="form-container login">

    <h5>Connectez vous à la plateforme</h5>
    <?php
    if (isset($_GET["error_login"])){
    	if ($_GET["error_login"] == "empty"){
    		echo "<h5>Veuillez remplir tous les champs pour vous connecter.</h5>";
    	} else {
    		echo "<h5>Login ou mot de passe incorrect. Veuillez réessayer.</h5>";
    	}
    }
    ?>

    <table>
      <tbody>
        <tr>
          <th><label for="username">Nom d'utilisateur</label></th>
          <th><input type="text" name="username" id="username" required></th>
        </tr>
        <tr>
          <th><label for="password">Mot de passe</label></th>
          <th><input type="password" name="password" id="password" required></th>
        </tr>
      </tbody>
    </table>
    
    <input type='submit' value='Connexion'>

  </form>
</div>
