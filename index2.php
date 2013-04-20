<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>

<HTML>

<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
	}
	.Style5 {
	font-size: 14px;
	}
}-->
</style>

<body lang=FR link=blue vlink=blue style='tab-interval:35.4pt'>

<table width="940" border="0" align="left">
	<TR>
		<TD width="150" valign="top">
			<?php include('frame_gauche.php'); ?>
		</TD>

		<TD>

<table width="770" border="0" align="left">
	<tr>
		<td>
		<?php
	  		if (isset($_SESSION['loginOK'])) {
				include('menus_session.htm');
				echo "<BR><HR>";	
				
				}
				
				else {
				
				?>
		
		<table width="770" border="0" align="left">
		
		<TR>
				
		<TD>
		
		
		<div ALIGN="center" class="Style5">Afin d’encourager les économies d'énergie cette page propose de mettre en relation des conducteurs et des passagers. </BR>
		Ce site de covoiturage vous permet de rentrer en contact facilement avec d'autres conducteurs 
		afin d'organiser des trajets à plusieurs, d'une façon régulière ou ponctuelle. 
		</div>
		
		<HR>
				
		</TD>
		</TR>
		
		
		<?php } ?>
		
				
	

	<tr>
		<td>
		
		<table width="750" border="0" align="center">
			<TR>
				<TD>
					<div align="left"><strong>Derniers trajets enregistr&eacute;s:</strong></div>
				</TD>
				<TD>
					<div align="right"><a href="trajets.php" TARGET="bas">Voir tous les trajets</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
				</TD>
			</tr>
		</table>
			
		<BR>
		
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
		include('connexion_SQL.php');
		
		$reponse = mysql_query("SELECT * FROM trajets ORDER BY date DESC LIMIT 0, 10") or die(mysql_error());
		
			while ($donnees = mysql_fetch_array($reponse) )
				{
				$num_T=$donnees['num_trajet'];
				$ident=$donnees['ID'];
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
				
				echo "<TD> <div align=\"center\"><a href=\"contact.php?num_trajet=$num_T\" >voir les details</a> </div></TD>";
				echo "</TR>";
				
				}
		
		mysql_close();
		?>
				 
		</table>
		
		</td>
		</tr>
		
		<TR>
		<TD>
			
		<BR>
		
		<?php 
		$depart="peu importe";
		$arrivee="peu importe";
		include ('recherche_trajet.php'); ?>
		
		<HR>
		<STRONG>
		&nbsp;&nbsp;Statistiques:
		</STRONG>
		
		<BR><BR>
		
		<?php
		
			include('connexion_SQL.php');
				
			$reponse = mysql_query("SELECT COUNT(*) AS n_inscrits FROM conducteurs");
			$retour = mysql_query("SELECT COUNT(*) AS n_trajets FROM trajets");
			
			$trajets_compt = mysql_fetch_array($retour);	
			$inscrits_compt = mysql_fetch_array($reponse);	
			
			$n_incrits=$inscrits_compt['n_inscrits'];
			$n_traj=$trajets_compt['n_trajets'];	
			
			mysql_close();
			
			
			include('compteur.php');
			echo "<BR></BR>";
			echo $n_incrits." inscrits sur le site, ".$n_traj." trajets enregistrés.";
		
			
		
		?>
		
		
		</TD>
		</TR>

		
		</TABLE>
		



</TD>
</TR>

</table>

    
	

   
</body>

</html>
