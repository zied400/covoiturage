<?php
session_start();
?>
<html>
<table width="940" border="0" align="left" >
	<TR>
		<TD width="150" valign="top">
			<?php include('frame_gauche.php'); ?>
		</TD>

		<TD width="770" valign="top">

<?php

if ($_SESSION['loginOK'] == true) {
	include('menus_session.htm');
	echo "</br></br>";	
	echo "Vos trajets : "; 
	echo $_SESSION['pseudo'];
	
	echo"</BR></BR>";
	echo "<a href=\"saisir_trajet.php\">Saisir un nouveau trajet</a>";
	
	echo "</br></br></br>";

	$id_cond=$_SESSION['id'];
		
	include('connexion_SQL.php');
	
	$retour = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM trajets WHERE ID='$id_cond'");
	$donnees_compt = mysql_fetch_array($retour);	
	$i=$donnees_compt['nbre_entrees'];
	
	$reponse = mysql_query("SELECT * FROM trajets WHERE ID='$id_cond'") or die(mysql_error());

	
	if ($i == 0) {
		echo "pas de trajet enregistré"; 
		echo "</br></br>";
	}
	
	else {
	   
	?>
		<table width="710" border="1" align="center" cellspacing="0">
		<tr>
			<th width="130"> <div align="center">Ville de depart </div></th>
			<th width="130"><div align="center">Ville d'arrivee </div></th>
			<th width="120"><div align="center">Heure de depart </div></th>
			<th width="120"><div align="center">Type de trajet</div></th>
			<th width="100"><div align="center">Modifier</div></th>
			<th width="100"><div align="center">Supprimer</div></th>
		</tr>
		<tr>
	<?php	
	
		while ($donnees = mysql_fetch_array($reponse) ) {
			$num_trajet=$donnees['num_trajet'];
			$ville1=$donnees['ville1'];
			$ville2=$donnees['ville2'];
			$heure=$donnees['heure'];
			$type_trajet=$donnees['type_trajet'];
			$date_trajet=$donnees['date_trajet'];
		
			echo "<TR>";
			echo "<TD><div align=\"center\"> $ville1 </div></TD>";
			echo "<TD><div align=\"center\"> $ville2 </div></TD>";
			echo "<TD><div align=\"center\"> $heure </div></TD>";
			
			echo "<TD><div align=\"center\"> $type_trajet";
			if ($type_trajet == "ponctuel") {
				echo ": ".$date_trajet;
			}
			echo "</div></TD>";
			
			echo "<TD><div align=\"center\"><a href =\"saisir_trajet.php?modif=1&num_trajet=$num_trajet\">modifier</a></div></TD>";	
			echo "<TD><div align=\"center\"><a href =\"supprimer_trajet.php?num_trajet=$num_trajet\">supprimer</a></div></TD>";
			echo "</TR>";
	
		}
		echo "</table>";
	}	

		

}

else {
	echo "Merci de vous identifier pour acceder à cette page";
	include ('index2.php');
}
?>

</TD>
</TR>

</table>

</html>




