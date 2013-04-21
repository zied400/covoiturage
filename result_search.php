
		
	<?php	
		
		

$ville1="" ;
$ville2="" ;
$heure="tous" ;
	include('connexion_SQL.php');
	
	if(isset($_POST['ville1'])){$ville1=mysql_real_escape_string(htmlspecialchars($_POST['ville1']));}
if(isset($_POST['ville2'])){	$ville2=mysql_real_escape_string(htmlspecialchars($_POST['ville2']));}
if(isset($_POST['heure'])){	$heure=mysql_real_escape_string(htmlspecialchars($_POST['heure']));}


	
	
	if ($ville1 == "") {$ville1="peu importe";}
	if ($ville2 == "") {$ville2="peu importe";}
	
	$depart=$ville1;
	$arrivee=$ville2;
	$heure_rech=$heure;
	

	
	if ($ville1 == "peu importe") {$ville1="";}
	if ($ville2 == "peu importe") {$ville2="";}

	
	?>
		

<?php

if ($heure =="tous") {
	$heure1="00:00";
	$heure2="24:00";
	}
else {
$heure_ex = explode(":", $heure);

if ($heure_ex[0] != "00") {$h1=$heure_ex[0]-1;} else {$h1=$heure_ex[0];} 
if($heure_ex[0] < 11 AND $heure_ex[0] != "00") { $h1="0".$h1; } 
 
$h2=$heure_ex[0]+1;
if($heure_ex[0] < 9) { $h2="0".$h2; } 


if ($heure_ex[1] == 30){ $heure1=$heure_ex[0].":00"; $heure2=$h2.":00";}
else{ $heure1=$h1.":30"; $heure2=$heure_ex[0].":30";}

}

$retour = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM trajets WHERE ((heure >= '$heure1' AND heure <= '$heure2') OR heure='variable')  AND ville1 LIKE '%$ville1%' AND ville2 LIKE '%$ville2%' ");
	$donnees_compt = mysql_fetch_array($retour);	
	$i=$donnees_compt['nbre_entrees'];
	
$reponse = mysql_query("SELECT * FROM trajets WHERE ((heure >= '$heure1' AND heure <= '$heure2') OR heure='variable') AND ville1 LIKE '%$ville1%' AND ville2 LIKE '%$ville2%'  ") or die(mysql_error());		
	
	if ($i == 0) {
		echo "&nbsp;D&eacute;sol&eacute;, aucun trajet ne correspond à votre recherche"; 
		echo "</br></br>";
	}
	
	else {
	echo "<BR>";
	echo "Il y a <strong>".$i." trajet(s)</strong> correspondants entre ".$heure1." et ".$heure2;
echo "<BR>";

	?>
	
	
	
	
	<table class="tablezied"  cellspacing="0"  >
      <tr><th>Ville de depart</th><th>Ville d'arrivee</th><th>Heure de depart </th><th>Voir les details </th></tr><!-- Table Header -->

		
	<?php
	$i=0;
				while ($donnees = mysql_fetch_array($reponse) )
				{
				$num_T=$donnees['num_trajet'];
				$ident=$donnees['ID'];
				$ville1_tb=$donnees['ville1'];
				$ville2_tb=$donnees['ville2'];
				$heure=$donnees['heure'];
				$type_trajet=$donnees['type_trajet'];
								
					 if ($i % 2 == 0){echo "<TR>";}else{echo "<TR class='even'>";}									
				echo "<TR>";
				echo "<TD> $ville1_tb </TD>";
				echo "<TD> $ville2_tb </TD>";
				echo "<TD> $heure  </TD>";
								
				echo "<TD> $type_trajet";
				if ($type_trajet == "ponctuel") {
					echo ": ".$date_trajet;
				}
				echo " </TD>";
				
				echo "<TD>  <a href=\"index.php?detail_projet&num_trajet=$num_T\" > Voir les details</a></TD>";
				echo "</TR>";
				$i++;
				}
				echo "</table>";
		}
				
		mysql_close();

		?>
		
		
		<BR><hR>
		<?php if ($ville1 <> "" OR $ville2<> "") { ?>	
		<strong>&nbsp;&nbsp;Resultats sur les autres sites de covoiturage :</strong>
		
		
	
	<BR><BR>
	&nbsp;<a href="http://www.123envoiture.com/recherche-resultats.php?recherche=rapide&ville_depart=<?php echo$ville1; ?>&ville_arrivee=<?php echo$ville2; ?>&status=tous"TARGET="_blank">123envoiture</a>
	
	
	<?php if ($ville1 <> "" AND $ville2<> "") { ?>
	<BR><BR>	
	&nbsp;<a href="http://www.easycovoiturage.com/covoiturage/covoiturage_page/page.php?source=index&adr_from=<?php echo$ville1; ?>&elarg_dep=0&adr_to=<?php echo$ville2; ?>&elarg_arr=0&conpass=CP&date_trajet=jj/mm/aaaa%20&date_elarg=0"TARGET="_blank">Easy Covoiturage</a>
	<?php } ?>
	
	<BR><BR>	
	<form name='recherche' action="http://www.tribu-covoiturage.com/recherche.php" method="POST">
	<input type="hidden" value="<?php echo$ville1; ?>" name="DVille" id="DVille" >
	<input type="hidden" value="<?php echo$ville2; ?>" name="AVille" id="AVille" >
	&nbsp;<a href="#" onclick="document.recherche.submit();">Tribu covoiturage</a>
	</form> 

	<?php } ?>