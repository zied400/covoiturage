<?php
session_start();

$modif=$_GET['modif'];

$trajet=$_GET['num_trajet'];

$ponct=$_GET['ponct'];

$type_trajet="";

if ($ponct == 2) {
	$type_trajet="régulier";
}
if ($ponct== 1) {
	$type_trajet="ponctuel";
}
?>

<html>

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


<table width="940" border="0" align="left" >
	<TR>
		<TD width="150" valign="top">
			<?php include('frame_gauche.php'); ?>
		</TD>

		<TD width="770">
<?php
	
if ($_SESSION['loginOK'] == true) {
	include('menus_session.htm');
	echo "</br>";	
}
	
		
		$ville1="";
		$ville2="";
		$heure="hh:mm";
		$date_trajet="jj/mm/aa";
		$coment=="";
		
		
		

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
		$coment=$donnees['coment'];
		}
		
	mysql_close();
	}
	
	else {
		$modif = "";
		}

		?>

			
<form name="formulaire" action="

<?php
if ($modif == 1) { 
	echo"enregistre_trajet.php?modif=1&num_traj=$trajet";
}
else { 
	echo "enregistre_trajet.php"; 
}
?>

" method="post" onSubmit="return verification()">
  

<p><strong>Mon trajet:</strong></p>

<table width="750" border="0">
  <tr>
   
   <td width="240" height="24"><div align="right">Type de trajet: </div>
	</td>
	
    <td width="100">
		<INPUT type=radio name="type_trajet" value="ponctuel" 
		
		<?php 
		if ($type_trajet == "ponctuel") {
			echo "checked";
		}
		?>
		onclick="document.location.href='saisir_trajet.php?ponct=1'"> Ponctuel
		
		</BR>
		<INPUT type=radio name="type_trajet" value="régulier" 
		
		<?php 
		if ($type_trajet == "régulier" OR $type_trajet == "") {
			echo "checked"; 
		}
		?>
		
		onclick="document.location.href='saisir_trajet.php?ponct=2'"> Régulier </br>
	
	</td>

	<td>
		<div align="left">
			
			<?php 
			if ($type_trajet == "ponctuel") {
			?>
			
			* Date prévue pour ce trajet 
			<INPUT type="text" name="date_trajet" 
			
			<?php
			echo "value=\"$date_trajet\" onFocus=\"javascript:this.value=''\">";
			echo " jj/mm/aa";
					 
			} 
			?>
			
		</div>
	</td>
  </tr>
</table>

</br>

<table width="750" border="0">
  <tr>
    <td width="240" height="24"><div align="right">Ville de d&eacute;part * </div></td>
    <td width="500"><input type="text" name="ville1" <?php echo "value=\"$ville1\""; ?>></td>
  </tr>
</table>

<table width="750" border="0">
  <tr>
    <td width="240" height="24"><div align="right">Ville d'arriv&eacute;e * </div></td>
    <td width="500"><input type="text" name="ville2" <?php echo "value=\"$ville2\""; ?>></td>
  </tr>
</table>

<table width="750" border="0">
  <tr>
    <td width="240" height="24"><div align="right">Heure de d&eacute;part * </div></td>
    <td width="500"><input type="TIME" name="heure" <?php echo "value=\"$heure\""; ?> onFocus="javascript:this.value=''"> hh:mm ou "variable"</td>
	
  </tr>
</table>

<?php if ($modif <> 1) { ?>
<BR>

	<?php 
	if ($type_trajet == "ponctuel"){ ?>
	
	<table width="750" border="0">
		<tr>
		<td width="240" height="24">
		<div align="right">Trajet de retour (facultatif)&nbsp;</div>
		<td width="500"><INPUT type="text" name="date_trajet_retour" value="jj/mm/aa" onFocus="javascript:this.value=''"> jj/mm/aa</td>
		</tr>
		</table>
	<?php } ?>
	
<table width="750" border="0">
  <tr>
    <td width="240" height="24">
	<div align="right">D&eacute;part pour le retour (facultatif)&nbsp;</div>
    <td width="500"><input type="TIME" name="heure_retour" value="hh:mm" onFocus="javascript:this.value=''"> hh:mm ou "variable"</td>
  </tr>
</table>
		
<?php } ?>

</br>
<table width="750" border="0">
  <tr>
    <td width="240" height="24"><div align="right">Commentaires</div></td>
    <td width="500"><TEXTAREA rows="4" cols="40" name="coment"><?php echo "$coment"; ?></TEXTAREA></td>
  </tr>
</table>

<p>* champs obligatoires</p>

  <p>
   	  <input name="soumettre" type="submit" value="Valider" >
  

<?php
if ($modif == "1") {
	echo"<input type=\"button\" value=\"Annuler\"  onClick=\"javascript:document.location.href='trajets_conducteur.php'\" >";	
}
?>

</p>
</blockquote>
</form>

</TD>
</TR>

</table>

</html>
