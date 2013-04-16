<?php
session_start();
?>

<HTML>
<table width="940" border="0" align="left" >
	<TR>
		<TD width="150" valign="top">
			<?php include('frame_gauche.php'); ?>
		</TD>

		<TD valign="top">
		
<?php
	  		if (isset($_POST['loginOK']) && $_SESSION['loginOK'] == true) {

			include('menus_session.htm');
	echo "</br>";	
	}
	
	include('connexion_SQL.php');
	
	$ville1=mysql_real_escape_string(htmlspecialchars($_POST['ville1']));
	$ville2=mysql_real_escape_string(htmlspecialchars($_POST['ville2']));
	$heure=mysql_real_escape_string(htmlspecialchars($_POST['heure']));
	
	
	if ($ville1 == "") {$ville1="peu importe";}
	if ($ville2 == "") {$ville2="peu importe";}
	
	$depart=$ville1;
	$arrivee=$ville2;
	$heure_rech=$heure;
	
	include ('recherche_trajet.php');
	
	if ($ville1 == "peu importe") {$ville1="";}
	if ($ville2 == "peu importe") {$ville2="";}

	
	?>
		
		<HR>
<strong>&nbsp;&nbsp;Resultats de la recherche :</strong>
<BR><BR>

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
		echo "&nbsp;Désolé, aucun trajet ne correspond à votre recherche"; 
		echo "</br></br>";
	}
	
	else {
	echo "Il y a <strong>".$i." trajet(s)</strong> correspondants entre ".$heure1." et ".$heure2;
echo "<BR><BR>";

	?>
	<table width="680" border="1" cellspacing="0" align="center">
      
		<tr>
			<th width="130"> <div align="center">Ville de depart </div></th>
			<th width="130"><div align="center">Ville d'arrivee </div></th>
			<th width="120"><div align="center">Heure de depart </div></th>
			<th width="125"><div align="center">Type de trajet </div></th>
			<th width="115"> <div align="center">Voir les details </div></th>
		</tr>
		<tr>
	<?php
	
				while ($donnees = mysql_fetch_array($reponse) )
				{
				$num_T=$donnees['num_trajet'];
				$ident=$donnees['ID'];
				$ville1_tb=$donnees['ville1'];
				$ville2_tb=$donnees['ville2'];
				$heure=$donnees['heure'];
				$type_trajet=$donnees['type_trajet'];
								
														
				echo "<TR>";
				echo "<TD><div align=\"center\"> $ville1_tb </div></TD>";
				echo "<TD><div align=\"center\"> $ville2_tb </div></TD>";
				echo "<TD><div align=\"center\"> $heure </div></TD>";
								
				echo "<TD><div align=\"center\"> $type_trajet";
				if ($type_trajet == "ponctuel") {
					echo ": ".$date_trajet;
				}
				echo "</div></TD>";
				
				echo "<TD> <div align=\"center\"><a href=\"contact.php?num_trajet=$num_T\" >voir les details</a> </div></TD>";
				echo "</TR>";
				
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
	
</TR>

</table>	
</html>