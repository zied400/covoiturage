
		
<?php

	if (isset($_SESSION['loginOK']) and  $_SESSION['loginOK'] == true)
		{		
		
		$num=$_GET['num_trajet'];
		
		include('connexion_SQL.php');
		
		$reponse = mysql_query("SELECT * FROM trajets WHERE num_trajet='$num'") or die(mysql_error());
		
		while ($donnees = mysql_fetch_array($reponse) ) {
			$id2=$donnees['id_conducteur'];
			$ville1=$donnees['ville1'];
			$ville2=$donnees['ville2'];
			$places_dsipo=$donnees['nbr_places'];
			$heure=$donnees['heure'];
			$type_trajet=$donnees['type_trajet'];
			$date_trajet=$donnees['date_trajet'];
			$coment=$donnees['coment'];
			$date_heure_saisie=$donnees['date_heure_saisie'];
		}
		
		$reponse3 = mysql_query("SELECT * FROM reservations WHERE num_trajet='$num'") or die(mysql_error());
		$places_rest = $places_dsipo - mysql_num_rows($reponse3);
		
		$reponse2 = mysql_query("SELECT * FROM conducteurs WHERE id_conducteur='$id2'") or die(mysql_error());
		
		while ($donnees2 = mysql_fetch_array($reponse2) ) {
			$nom=$donnees2['nom'];
			$prenom=$donnees2['prenom'];
			$tel=$donnees2['tel'];
		} ?>
<form name="formulaire" action="index.php?reserver&num_trajet=<?php echo "$num" ; ?>"  method="post" >
<?php 		
		echo "D&eacute;tails du trajet : ";
		echo "<strong>";
		echo $ville1; 
		echo "   =>   "; 
		echo $ville2; 
		echo "</strong>";
		echo "</BR></BR> Type de trajet : ";
		echo "$type_trajet";
		
		if ($type_trajet == "ponctuel") {
			echo "</BR> Date du trajet :&nbsp;";
			echo "<strong>";
			echo "$date_trajet";
			echo "</strong>";
		}
		echo "</BR></BR> Places diponibles :&nbsp;";
		echo $places_dsipo;
		echo "</BR></BR> Places restantes :&nbsp;";
		echo $places_rest;
		echo "</BR></BR> Date de saisie :&nbsp;";
		echo $date_heure_saisie; 
		echo "<br /><br />D&eacute;part &agrave; : ";
		echo "<strong>";
		echo $heure; 
		echo "</strong>";
		echo "<br /><br /> Conducteur : ";
		echo "<strong>";
		echo $nom; 
		echo " ";
		echo $prenom;
		echo "</strong>";			
		echo "<br /><br />";
		echo "T&eacute;l&eacute;phone : ";
		echo "<strong>";
		echo $tel; 
		echo "</strong>";
		echo "<br /><br />Commentaires : ";
		echo "<strong>";
		echo $coment;
		echo "</strong>";
		
		
		mysql_close();
	
	
	echo"</br></br>";	
	
	echo "<table border=\"0\">";
		echo "<TR><TD>";
			echo "<a href=\"contact.php?num_trajet=$num\" onClick=\"javascript:window.open('rediger_message.php?id=$id2','message','width = 400, height = 350, scrollbars = yes' )\" >";
			echo "<img src=\"images/enveloppe.jpg\" border=\"0\" width=\"60\" height=\"50\">";
			echo "</a>";
		echo "</TD><TD>";
			echo "<a href=\"contact.php?num_trajet=$num\" onClick=\"javascript:window.open('rediger_message.php?id=$id2','message','width = 400, height = 350, scrollbars = yes' )\" >";
			echo "Envoyer un message &agrave; ce conducteur";
			echo "</a>";
		echo "</TD></TR>";
	echo "</table>";
	echo "</a>"; 
	
if ($places_rest > 0){?>
	<input type="submit" name="soumettre"  class="styled-button-12" value="résérver" />
<?php
}else{?>
	<h4 style='color:red'>Ce trajet est complet ! </h4><br />

<?php }?>
	</form>
	
<?php	}
	
	else {
	echo "</BR></BR></BR></BR>";
	echo"<div align=\"center\">";
	echo"Merci de vous identifier pour acceder à cette page.";
	echo "</BR></BR><BR>";
	echo "Vous n'&ecirc;tes pas inscrits? <a href=\"saisir_donnees_perso.php\" TARGET=\"bas\">Formulaire d'inscription</a>";
	echo"</div>";
		}
	
	?>
