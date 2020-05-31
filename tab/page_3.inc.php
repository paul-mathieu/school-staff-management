<?php 
#requete sql
/*
$mysql_user = "molierej";
$mysql_passwd = "356hkuwy";
$mysql_host = "localhost:/var/run/mysql/mysql_tp.sock";
$mysql_link = mysql_connect($mysql_host, $mysqlw_user, $mysql_passwd);

$prepare_expert = ("SELECT capteur.description FROM molierej.capteur WHERE capteur.nom LIKE '$nom')");
$requete_expert = mysql_query($prepare_expert);
//recuperation des experts possible*/

?>
<div >
	<span id= "">Demande d'un cours avec un expert </span>
</div>
<form id="form_expert">

<div id="">
	<label> Nom de l'expert: </label>
	<SELECT name="nom" size="1"></br>
            <?php
            echo "<option> Veuillez choisir un expert</option>";
            while ($expert = mysql_fetch_array($requete_expert) ){
                echo "<option> ".$expert[0]."</option>";
            }
            ?>
        </SELECT>
    </br>
	<label> Prénom: </label>
	<label><?php echo"$data[1]"; ?> </label></br>

</form>