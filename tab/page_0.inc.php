<div id=background style="width: 980px;height: 400px;">
<?php 
if (isset($_SESSION['username'])){
	$login = $_SESSION['username'];
	$statut = $_SESSION['statut'];
} else {
	$login="";
	$statut="(Pas encore connecté)";
}
?>

<div id=welcome style="position:absolute">
<h2>Bienvenue <?php echo $login;?></h2>
<?php 
echo "Vous êtes connectés que ".$statut.".";
?>
</div>

<div id=picture style="margin-left: 360px; padding: 15px;">

<a href="https://www.polytech.univ-smb.fr/"> 
				<img src="https://events.listic.univ-smb.fr/multitemp2015/images/POLYTECH_ANNECY-CHAMBERY.jpg" width="300" height="88">
</a>
</div><br>
  
<p>
Cliquez sur l'un des liens ci-dessous pour accéder aux différents services de la plateforme : 
<ul > 
	<li> <a href=\"?page=1\">Informations Utilisateur</a></li>
	<li> <a href=\"?page=3\">Messagerie</a> </li>
	<li> <a href=\"?page=2\">Informations experts</a></li> 
	<li> <a href=\"?page=4\">Emploi du temps</a></li> 
</ul>
</p>
</div>

