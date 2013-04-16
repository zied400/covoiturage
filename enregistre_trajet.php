<?php
session_start();
?>

<html>
<table width="940" border="0" align="left" >
	<TR>
		<TD width="150" valign="top">
			<?php include('frame_gauche.php'); ?>
		</TD>

		<TD valign="top">

	<?php
	
	if ($_SESSION['loginOK'] == true) {
	include('menus_session.htm');
	echo "</br>";	
	}

	$modif=$_GET['modif'];
		
	$trajet2=$_GET['num_traj'];
	
		
	$id_cond=$_SESSION['id'];
	
	include('connexion_SQL.php');
	
	$ville1=mysql_real_escape_string(htmlspecialchars($_POST['ville1']));
	$ville2=mysql_real_escape_string(htmlspecialchars($_POST['ville2']));
	$heure=mysql_real_escape_string(htmlspecialchars($_POST['heure']));
	$heure_retour=mysql_real_escape_string(htmlspecialchars($_POST['heure_retour']));
	$type_trajet=mysql_real_escape_string(htmlspecialchars($_POST['type_trajet']));
	$date_trajet=mysql_real_escape_string(htmlspecialchars($_POST['date_trajet']));
	$date_trajet_retour=mysql_real_escape_string(htmlspecialchars($_POST['date_trajet_retour']));
	$coment=nl2br(mysql_real_escape_string(htmlspecialchars($_POST['coment'])));
	
	$date=date("Y-m-d");
	
	if ($_SESSION['loginOK'] == true AND $modif == 1) 	{ //s'il s'agit d'une modofication
	
		//on verifie l'identitée du créateur de la fiche :
		$reponse = mysql_query("SELECT * FROM trajets WHERE num_trajet='$trajet2'") or die(mysql_error());
		
		while ($donnees = mysql_fetch_array($reponse) ) {
			$id_traj2=$donnees['ID'];
		}

		// on mets à jour les donnéesdans la  table
		if ($id_traj2 == $id_cond) {
					
			mysql_query("UPDATE trajets SET ville1='$ville1', ville2='$ville2', heure='$heure', type_trajet='$type_trajet', date_trajet='$date_trajet', coment='$coment', date='$date' WHERE num_trajet='$trajet2' LIMIT 1") or die(mysql_error());
	
			echo "Les modifications on bien été prises en compte <br /><br /><br />";
		
			echo "<a href=\"trajets_conducteur.php\">Retourner à mes trajets</a>";
		}
		
		// si le numero de trajet ne correspond pas à un trajet de l'utilisateur connecté:
		else{ 
			echo "une erreur est survenue";
			echo "</BR></bR>";
			echo "<a href=\"index2.php\">Retour à l'accueil</a>";
		}
	}
	

	else { //pour un nouveau trajet
					
		mysql_query("INSERT INTO trajets VALUES('', '$id_cond', '$ville1', '$ville2', '$heure', '$type_trajet', '$date_trajet', '$coment', '$date' )");
			
		if (($heure_retour != "") AND ($heure_retour != "hh:mm")) { //si un trajet de retour a  été saisi
		mysql_query("INSERT INTO trajets VALUES('', '$id_cond', '$ville2', '$ville1', '$heure_retour', '$type_trajet', '$date_trajet_retour', '$coment', '$date' )");
		}
			
		echo "Votre trajet a bien été enregistré, merci. <br /><br /><br />";
		echo "<a href=\"trajets_conducteur.php\">Retour vers mes trajets</a>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp";
		echo "<a href=\"index2.php\">Retour à l'accueil</a>";
		}
			
		
	mysql_close();
		
		
	?>
	</TD>
</TR>

</table>	
</html>

