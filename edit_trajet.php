<?php

$modif="";
if(isset($_GET['modif'])){
$modif=$_GET['modif'];
}
if(isset($_GET['num_trajet'])){
$trajet=$_GET['num_trajet'];
}
$ponct=1;
if(isset($_GET['ponct'])){
$ponct=$_GET['ponct'];
}
$type_trajet="";

if ($ponct == 2) {
	$type_trajet="régulier";
}
if ($ponct== 1) {
	$type_trajet="ponctuel";
}
?>

<script type="text/javascript" language="Javascript" >
<!--
function verification()
{



<?php
	if ($ponct== 1) { 

		echo "if(document.formulaire.date_trajet.value == \"\") {
			alert(\"Veuillez sasir une date pour votre trajet ponctuel svp\");
			document.formulaire.heure.focus();
			return false;}
			
			else if(document.formulaire.date_trajet.value == \"jj/mm/aa\") {
			alert(\"Veuillez sasir une date pour votre trajet ponctuel svp\");
			document.formulaire.heure.focus();
			return false;}
									
			";
	}
?>
 
   if(document.formulaire.ville1.value == "") {
   alert("Veuillez saisir une ville de depart svp");
   document.formulaire.ville1.focus();
   return false;
  } 
   else if(document.formulaire.ville2.value == "") {
   alert("Veuillez saisir une ville d'arrivée svp");
   document.formulaire.ville2.focus();
   return false;
  
  }
   else if(document.formulaire.ville1.value == document.formulaire.ville2.value) {
   alert("Vous avez saisi la meme ville pour le départ et l'arrivée !");
   document.formulaire.ville2.focus();
   return false;
  
  } 
  else if(document.formulaire.heure.value == "") {
   alert("Veuillez saisir votre heure de depart svp");
   document.formulaire.heure.focus();
   return false;
  } 
  else if(document.formulaire.heure.value == "hh:mm") {
   alert("Veuillez sasir votre heure de depart svp");
   document.formulaire.heure.focus();
   return false;
  } 
   else if((document.formulaire.heure.value.indexOf(':') != 2)&&(document.formulaire.heure.value != "variable")) {
   alert("Svp, veuillez saisir votre heure de depart au format hh:mm \n \n exemple: écrire 06:30 pour un trajet à 6h30 \n \n note: vous pouvez également saisir \"variable\" ");
   document.formulaire.heure.focus();
   return false;
	}
	else if((document.formulaire.heure_retour.value.indexOf(':') != 2)&&(document.formulaire.heure_retour.value != "variable")&&(document.formulaire.heure_retour.value != "")) {
   alert("Svp, veuillez saisir votre heure de depart au format hh:mm \n \n exemple: écrire 06:30 pour un trajet à 6h30 \n \n note: vous pouvez également saisir \"variable\" ");
   document.formulaire.heure_retour.focus();
   return false;
	}
	
  return true
 

}
//-->
</script>

 
<?php
	$ville1="";
	$ville2="";
	$heure="hh:mm";
	$date_trajet="";
	$coment="";	
	

if ($_SESSION['loginOK'] == true AND $modif == 1) {
	
	$id=$_SESSION['id'];
		
	include('connexion_SQL.php');
		
	$reponse = mysql_query("SELECT * FROM trajets WHERE num_trajet='$trajet'") or die(mysql_error());
		
	while ($donnees = mysql_fetch_array($reponse) ) {
		$ville1=$donnees['ville1'];
		$ville2=$donnees['ville2'];
		$heure=$donnees['heure'];
		$type_trajet=$donnees['type_trajet'];
		$date_trajet=$donnees['date_trajet'];
		$nbr_places=$donnees['nbr_places'];
		$coment=$donnees['coment'];
		}
		
	mysql_close();
	}
	
	else {
		$modif = "";
		}

		?>

			
<form name="formulaire" action="index.php?enregistre_trajet&modif=1&num_traj=<?php echo "$trajet"; ?>" method="post" onSubmit="return verification()">
  

<p><strong>Mon trajet:</strong></p>

<table  border="0">
  <tr>
   
   <td width="240" height="24"><div align="right">Type de trajet: </div>
	</td>
	
    <td width="100">
		<INPUT type="radio" name="type_trajet" value="ponctuel" <?php if ($type_trajet == "ponctuel") {echo "checked";}?> onclick="document.location.href='index.php?add_trajet&ponct=1'"> Ponctuel
		
		</BR>
		<INPUT type="radio" name="type_trajet" value="régulier" 
		
		<?php 
		if ($type_trajet == "régulier" OR $type_trajet == "") {
			echo "checked"; 
		}
		?>
		onclick="document.location.href='index.php?add_trajet&ponct=2'"> Régulier </br>
	
	</td>

	<td>
		<div align="left">
			
			<?php 
			if ($type_trajet == "ponctuel") {
			?>
			
			* Date prévue pour ce trajet 
			<input type="text" id="datepicker1" name="date_trajet"
			<?php
			echo "value=\"$date_trajet\" onFocus=\"javascript:this.value=''\">";		 
			} 
			?>
			
			
		</div>
	</td>
	<td>
		<div align="left">
			
			<?php 
			if ($type_trajet == "ponctuel") {
			?>
			
			* Nombre de places 
			<input type="text" name="nbr_places"
			<?php
			echo "value=\"$nbr_places\" onFocus=\"javascript:this.value=''\">";		 
			} 
			?>
			
			
		</div>
	</td>
  </tr>
</table>

</br>
<input type='hidden' name='enregistre_trajet'/>
<table  border="0">
  <tr>
    <td width="240" height="24"><div align="right">Ville de d&eacute;part * </div></td>
    <td width="500"> 
		<SELECT name="ville1">		
			<OPTION <?php if ($ville1 == "") {echo"selected";} ?> VALUE=""></OPTION>
			<OPTION <?php if ($ville1 == "Belfort") {echo"selected";} ?> VALUE="Belfort">Belfort</OPTION>
			<OPTION <?php if ($ville1 == "Sevenans") {echo"selected";} ?> VALUE="Sevenans">Sevenans</OPTION>
			<OPTION <?php if ($ville1 == "Montbeliard") {echo"selected";} ?> VALUE="Montbeliard">Montbeliard</OPTION>
		</SELECT>
	</td>
  </tr>
</table>

<table  border="0">
  <tr>
    <td width="240" height="24"><div align="right">Ville d'arriv&eacute;e * </div></td>
    <td width="500">
		<SELECT name="ville2">		
			<OPTION <?php if ($ville2 == "") {echo"selected";} ?> VALUE=""></OPTION>
			<OPTION <?php if ($ville2 == "Belfort") {echo"selected";} ?> VALUE="Belfort">Belfort</OPTION>
			<OPTION <?php if ($ville2 == "Sevenans") {echo"selected";} ?> VALUE="Sevenans">Sevenans</OPTION>
			<OPTION <?php if ($ville2 == "Montbeliard") {echo"selected";} ?> VALUE="Montbeliard">Montbeliard</OPTION>
		</SELECT>
	</td>
  </tr>
</table>

<table  border="0">
  <tr>
    <td width="240" height="24"><div align="right">Heure de d&eacute;part * </div></td>
    <td width="500"><input type="TIME" name="heure" <?php echo "value=\"$heure\""; ?> onFocus="javascript:this.value=''"> hh:mm ou "variable"</td>
	
  </tr>
</table>

<?php if ($modif <> 1) { ?>
<BR>

	<?php 
	if ($type_trajet == "ponctuel"){ ?>
	
	<table  border="0">
		<tr>
		<td width="240" height="24">
		<div align="right">Trajet de retour (facultatif)&nbsp;</div>
		<td width="500"><input type="text" id="A" name="date_trajet_retour"  onFocus="javascript:this.value=''"> </td>
		</tr>
		</table>
	<?php } ?>
	
<table  border="0">
  <tr>
    <td width="240" height="24">
	<div align="right">D&eacute;part pour le retour (facultatif)&nbsp;</div>
    <td width="500"><input type="TIME" name="heure_retour" value="hh:mm" onFocus="javascript:this.value=''"> hh:mm ou "variable"</td>
  </tr>
</table>
		
<?php } ?>

</br>
<table  border="0">
  <tr>
    <td width="240" height="24"><div align="right">Commentaires</div></td>
    <td width="500"><TEXTAREA rows="4" cols="40" name="coment"><?php echo "$coment"; ?></TEXTAREA></td>
  </tr>
</table>

<p>* champs obligatoires</p>

  <p>
   	    <input type="submit" name="soumettre"  class="styled-button-12" value="Valider" /> 
<style type="text/css">
.styled-button-12 {
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
	 float:right;
	 width:100px;
}
</style>
  

<?php
if ($modif == "1") {
	echo"<input type=\"button\" value=\"Annuler\"  onClick=\"javascript:document.location.href='trajets_conducteur.php'\" >";	
}
?>

</p>
</form>

