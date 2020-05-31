<div id="create-account form-popup">
  <form action="verifNewAccount.php" method="post" class="form-container create-account">
    <h5>Vous n'avez pas encore de compte ? <br>Créez-en un maintenant !</h5>
    <?php
    if (isset($_GET["error_creation"])){
    	if ($_GET["error_creation"] == "empty"){
    		echo "<h5>Veuillez remplir tous les champs.</h5>";
    	} elseif ($_GET["error_creation"] == "passwordLength"){
    		echo "<h5>Pour des raisons de sécurité, veuillez choisir un mot de passe supérieur à 4 caractères.</h5>";
    	} elseif ($_GET["error_creation"] == "uniqueConstraint") {
    		echo "<h5>Ce nom d'utilisateur existe déjà. Veuillez en choisir un autre.</h5>";
    	} elseif ($_GET["error_creation"] == "password") {
    		echo "<h5>Veuillez vérifier la saisie de votre mot de passe.</h5>";
    	}
    }
    ?>

    <table>
      <tbody>
        <tr>
          <th><label for="name">Prénom</label></th>
          <th><input type="text" name="name" id="name" required></th>
        </tr>
        <tr>
          <th><label for="lastname">Nom</label></th>
          <th><input type="text" name="lastname" id="lastname" required></th>
        </tr>
        <tr>
          <th><label for="statut">Statut</label></th>
          <th><select name="statut">
      			<option></option>
      			<option>Etudiant</option>
      			<option>Enseignant</option>
      			<option>Expert</option>
      			<option>Comptable</option>
      		</select></th>
        </tr>
        <tr>
          <th><label for="mail">Adresse mail</label></th>
          <th><input type="text" name="mail" id="mail" required></th>
        </tr>
        <tr>
          <th><label for="username">Nom d'utilisateur</label></th>
          <th><input type="text" name="username" id="username" required></th>
        </tr>
        <tr>
          <th><label for="password">Mot de passe</label></th>
          <th><input type="password" name="password" id="password" required></th>
        </tr>
        <tr>
          <th><label for="password-confirm">Confirmation</label></th>
          <th><input type="password-confirm" name="password-confirm" id="password-confirm" required></th>
        </tr>
      </tbody>
    </table>

    <input type="submit" value="Créer un compte">
  </form>
</div>
