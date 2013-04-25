<?php
session_start();
?>

<html>
<link rel="stylesheet" type="text/css" href="style.css" />

<script type="text/javascript" language="Javascript" >

<!--
function verification()
{



 if(document.formulaire.pseudo.value == "")  {
   alert("Veuillez entrer un pseudo svp");
   document.formulaire.pseudo.focus();
   return false;
  }
   else if(document.formulaire.pwd.value == "") {
   alert("Veuillez entrer un mot de passe svp");
   document.formulaire.pwd.focus();
   return false;
  }
   else if(document.formulaire.pwd2.value == "") {
   alert("Veuillez confirmer votre mot de passe svp");
   document.formulaire.pwd2.focus();
   return false;
  }
  else   if(document.formulaire.pwd2.value != document.formulaire.pwd.value) {
   alert("Veuillez entrer un mot de passe identique svp");
   document.formulaire.pwd2.focus();
   return false;
  }
  else   if(document.formulaire.mail.value == "") {
   alert("Veuillez entrer une adresse email svp");
   document.formulaire.mail.focus();
   return false;
  }
  
  else  if(document.formulaire.mail.value.indexOf('@') == -1) {
   alert("Ce n'est pas une adresse mail valide");
   document.formulaire.mail.focus();
   return false;
  }
  else  if(document.formulaire.mail.value.indexOf('.') == -1) {
   alert("Ce n'est pas une adresse mail valide");
   document.formulaire.mail.focus();
   return false;
  }
 
   else if(document.formulaire.accord.checked == false) {
   alert("Veuillez accepter la difusion de vos coordonnées svp");
   document.formulaire.accord.focus();
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

		<TD>

<?php
	
/*if ($_SESSION['loginOK'] == true) {
	include('menus_session.htm');
	echo "</br>";	
}*/
	
If (isset($_GET['modif']) && $_GET['modif']!= 2) {

$modif=$_GET['modif'];

		$pseudo2="";
		$mail="";
		$pwd="";
		$nom="nom";
		$prenom="prenom";
	}

/*if ($_SESSION['loginOK'] == true AND $modif == 1) {
	
	$id=$_SESSION['id'];
		
	include('connexion_SQL.php');
		
	$reponse = mysql_query("SELECT * FROM conducteurs WHERE ID='$id'") or die(mysql_error());
		
	while ($donnees = mysql_fetch_array($reponse) ) {
		$pseudo2=$donnees['pseudo'];
		$mail=$donnees['mail'];
		$pwd=$donnees['pwd'];
		$nom=$donnees['nom'];
		$prenom=$donnees['prenom'];
		$tel=$donnees['tel'];
		}
		
	mysql_close();
	}
*/	
	else {
		//$modif = "";
		}
?>

		
		
<form name="formulaire" action="

<?php
if ($modif == 1) { echo"enregistre_conducteur.php?modif=1"; }
else {echo"enregistre_conducteur.php"; }
?>

" method="post" onSubmit="return verification()">
  
  <table width="750" border="0">
    <tr>
      <td width="240" height="24"><p><strong>Je m'identifie:</strong></p>
      </td>
      <td width="500">&nbsp;</td>
  </tr>
  </table>
  
    <table width="750" border="0">
    <tr>
      <td width="240" height="24"><div align="right">Mon nom</div></td>
      <td width="500"><input name="prenom" type="text" <?php echo "value=\"$prenom\""; ?>	  onFocus="javascript:this.value=''" >
        <input name="nom" type="text" <?php echo "value=\"$nom\""; ?> onFocus="javascript:this.value=''" ></td>
    </tr>
	</table>
	
	<table width="750" border="0">
    <tr>
      <td width="240" height="24"><div align="right">Mon pseudo*</div></td>
      <td width="500"><input type="text" name="pseudo" <?php echo "value=\"$pseudo2\""; ?> ></td>
    </tr>
	</table>
	
	<table width="750" border="0">
    <tr>
      <td height="8"></td>
    </tr>
	</table>
  
	<table width="750" border="0">
  <tr>
    <td width="240" height="24"><div align="right">Je choisis un mot de passe*</div></td>
    <td width="500"><input type="password" name="pwd" <?php echo "value=\"$pwd\""; ?> ></td>
  </tr>
	</table>
  
  <table width="750" border="0">
  <tr>
    <td width="240" height="24"><div align="right">Je confirme le mot de passe*</div></td>
      <td width="500"><input type="password" name="pwd2" <?php echo "value=\"$pwd\""; ?>></td>
  </tr>
	</table>
<p>&nbsp;</p>
<p><strong>Pour me joindre:</strong></p>
<table width="750" border="0">
  <tr>
    <td width="240" height="24"><div align="right">Mon adresse mail*      </div></td>
    <td width="500"><input type="text" name="mail" <?php echo "value=\"$mail\""; ?>></td>
  </tr>
</table>

	<table width="750" border="0">
  <tr>
    <td width="240" height="24"><div align="right">Mon t&eacute;l&eacute;phone</div></td>
    <td width="500"><input type="text" name="tel" <?php echo "value=\"$tel\""; ?>></td>
  </tr>
	</table>

	
<p>* champs obligatoires</p>

<BR>

<p>
  <input name="accord" type="checkbox" value="oui" <?php if ($modif != "") {echo"checked"; } else {echo "unchecked"; } ?> >
  J'accepte que mes coordonnées soient communiquées aux usagers de ce site (dans tous les cas mon adresse mail ne sera pas visible sur le site)<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ce site s'engage à ne pas communiquer vos données à toute autre personne que les utilisateurs de ce site.<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Je decharge les createurs de ce site de toute responsabilité en cas de problème survenu lors du covoiturage. 
  
  <br />
</p>
<blockquote>
  <p>
   	  <input name="soumettre" type="submit" value="Valider" >
  </p>
</blockquote>
</form>

</TD>
</TR>

</table>


</html>
