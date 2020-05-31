<div id="login form-popup">
  <form action="" method="post" class="form-container login">

    <h5>Connectez vous à la plateforme</h5>
    <?php
    	if ($empty_login){
    		echo "<h5 class=\"error\">Veuillez remplir tous les champs pour vous connecter.</h5>";
    	} elseif ($wrong_password) {
    		echo "<h5 class=\"error\">Mot de passe incorrect. Veuillez réessayer.</h5>";
    	} else {
        echo "<h5></h5>";
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

    <input type='submit' name="submit" value='Connexion'>

  </form>
</div>
