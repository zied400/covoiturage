 
<style type="text/css">
.styled-button-122 {
	-webkit-box-shadow:rgba(0,0,0,0.2) 0 1px 0 0;
	-moz-box-shadow:rgba(0,0,0,0.2) 0 1px 0 0;
	box-shadow:rgba(0,0,0,0.2) 0 1px 0 0;
	border-bottom-color:#333;
	border:1px solid #61c4ea;
	background-color:#7cceee;
	border-radius:5px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	color:#333;
	font-family:'Verdana',Arial,sans-serif;
	font-size:14px;
	text-shadow:#b2e2f5 0 1px 0;
	padding:5px;
	 cursor: pointer;
	 float:left;
	 width:250px;
}
.styled-button-122:hover{
background-color:#7ddeee;
}
</style>
  


<?php

	echo "</br></br>";	
	echo "Vos trajets : "; 
	echo $_SESSION['pseudo'];
	
	echo"</BR></BR>";
	echo "<a href=\"index.php?add_trajet\" class='styled-button-122'>Saisir un nouveau trajet</a>";
	
	echo "</br></br></br>";

	$id_cond=$_SESSION['id'];
		
	include('connexion_SQL.php');
	
	$retour = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM trajets WHERE ID='$id_cond'");
	$donnees_compt = mysql_fetch_array($retour);	
	$i=$donnees_compt['nbre_entrees'];
	
	$reponse = mysql_query("SELECT * FROM trajets WHERE ID='$id_cond'") or die(mysql_error());

	
	if ($i == 0) {
		echo "Pas de trajet enregistré"; 
		echo "</br></br>";
	}
	
	else {
	   
	?>

	<table class="tablezied"  cellspacing="0" style="margin: 0px;"  >
      <tr><th>Ville de depart</th><th>Ville d'arrivee</th><th>Heure de depart </th><th>Type de trajet </th><th>Modifier</th><th>Supprimer </th></tr><!-- Table Header -->

	<?php	
	$i=0;
		while ($donnees = mysql_fetch_array($reponse) ) {
			$num_trajet=$donnees['num_trajet'];
			$ville1=$donnees['ville1'];
			$ville2=$donnees['ville2'];
			$heure=$donnees['heure'];
			$type_trajet=$donnees['type_trajet'];
			$date_trajet=$donnees['date_trajet'];
		
			 if ($i % 2 == 0){echo "<TR>";}else{echo "<TR class='even'>";}		
			echo "<TD><div align=\"center\"> $ville1 </div></TD>";
			echo "<TD><div align=\"center\"> $ville2 </div></TD>";
			echo "<TD><div align=\"center\"> $heure </div></TD>";
			
			echo "<TD><div align=\"center\"> $type_trajet";
			if ($type_trajet == "ponctuel") {
				echo ": ".$date_trajet;
			}
			echo "</div></TD>";
			
			echo "<TD><div align=\"center\"><a href =\"index.php?gestion_mes_trajets&edit_trajet&modif=1&num_trajet=$num_trajet\"><img src='images/adminicons/edit.png' width='24' height='24' border='0'></a></div></TD>";	
			echo "<TD><div align=\"center\"><a href =\"index.php?gestion_mes_trajets&supprimer_trajet&num_trajet=$num_trajet\"><img src='images/adminicons/delete.png' width='24' height='24' border='0'></a></div></TD>";
			echo "</TR>";
	
		}
		echo "</table>";
	}	

		


?>






