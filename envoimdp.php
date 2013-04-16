<?php
session_start();
?>
ok
<html>
<table width="930" border="0" align="left" >
	<TR>
		<TD width="160" valign="top">
			<?php include('frame_gauche.php'); ?>
		</TD>

		<TD width="770" valign="top">
		
<?php

include('connexion_SQL.php');

$email=mysql_real_escape_string(htmlspecialchars($_POST['email']));

$reponse = mysql_query("SELECT * FROM conducteurs WHERE mail='$email'") or die(mysql_error());
		
		$donnees = mysql_fetch_array($reponse);
		
		if ($donnees== "") {
		echo"<BR><BR><BR><BR>D&eacute;sol&eacute;, cet email n'est pas enregistr&eacute; sur covoiturage, "; ?> <a href="oublimdp.php" TARGET="bas">réésayer</a> <?php
		}
		
		else {
		$pseudo_oubli=$donnees['pseudo'];
		$pwd_oubli=$donnees['pwd'];
				
		$objet="votre mot de passe";
		$message="Bonjour,<BR><BR>voici vos informations personelles:<BR><BR>pseudo : ".$pseudo_oubli."<BR>mot de passe : ".$pwd_oubli."<BR><BR>L'équipe de <a href=\"http://vvcovoiturage.free.fr\">vvcovoiturage</a>";
		
		$headers .='Content-Type: text/html; charset="iso-8859-1"'."\n"; 
	     
		mail("$email", "$objet", "$message", $headers);
		echo "<BR>Vos informations personelles ont &eacute;t&eacute; envoy&eacute;es sur votre adresse email.";
		}
		
?>

</TD>
</TR>

</table>

</html>
