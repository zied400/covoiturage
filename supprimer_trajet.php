<?php
$num=$_GET['num_trajet'];
$id_session=$_SESSION['id'];

if ($_SESSION['loginOK'] == true) {

	include('connexion_SQL.php');
	
	$reponse = mysql_query("SELECT * FROM trajets WHERE num_trajet='$num'") or die(mysql_error());

	//on verifie l'identitée du créateur de la fiche :
	while ($donnees = mysql_fetch_array($reponse) ) {
		$id_trajet=$donnees['ID'];
	}

	if ($id_trajet == $id_session) {
		mysql_query("DELETE FROM trajets WHERE num_trajet='$num'");
		echo "</BR>";
		echo "<h3 style='color:green'>Trajet supprimé avec succes !</h3>";
	}
	
	// si le numero de trajet ne correspond pas à un trajet de l'utilisateur connecté:
	else {
		echo "<h3 style='color:red'>Une erreur est survenue</h3>";
		echo "</BR>";
		echo "<a href=\"index.php?gestion_mes_trajets\">Retour à l'accueil</a>";
	}

}

else {
	echo "Merci de vous indentifier pour accèder à cette page";
	}

mysql_close();

?>





	