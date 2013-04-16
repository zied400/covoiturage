<?php
session_start();
?>

<html>

	<?php
		
	$modif=$_GET['modif'];
	
	include('connexion_SQL.php');
	
	$pseudo=mysql_real_escape_string(htmlspecialchars($_POST['pseudo']));
	$mail=mysql_real_escape_string(htmlspecialchars($_POST['mail']));
	$pwd=mysql_real_escape_string(htmlspecialchars($_POST['pwd']));
	$heure=mysql_real_escape_string(htmlspecialchars($_POST['heure']));
	
	$nom=mysql_real_escape_string(htmlspecialchars($_POST['nom']));
	if ($nom == "nom") { $nom=""; }
	
	$prenom=mysql_real_escape_string(htmlspecialchars($_POST['prenom']));
	if ($prenom == "prenom") { $prenom=""; }
	
	$tel=mysql_real_escape_string(htmlspecialchars($_POST['tel']));
	$coment=nl2br(mysql_real_escape_string(htmlspecialchars($_POST['coment'])));
		
	$date=date("Y-m-d");
	
	if ($_SESSION['loginOK'] == true AND $modif == 1) 
	{
	$id=$_SESSION['id'];
			
	mysql_query("UPDATE conducteurs SET pseudo='$pseudo', mail='$mail', pwd='$pwd', nom='$nom', prenom='$prenom', tel='$tel' WHERE ID='$id' LIMIT 1") or die(mysql_error());
	
		?>
	<table width="940" border="0" align="left" >
	<TR>
		<TD width="150" valign="top">
			<?php include('frame_gauche.php'); ?>
		</TD>

		<TD valign="top">
		
	<?php
	
	if ($_SESSION['loginOK'] == true) {
	include('menus_session.htm');
	echo "</br>";	
	}
		echo "Les modifications on bien été prises en compte <br /><br /><br />";
		
		echo "<a href=\"index2.php\">Retour &agrave; l'accueil</a>";
		
		echo "</TD></TR></table>";
		
	}
	

	else {
	
			
		$reponse = mysql_query("SELECT * FROM conducteurs WHERE pseudo='$pseudo'") or die(mysql_error());
		
		$donnees = mysql_fetch_array($reponse);
		
		if ($donnees== "") 
		{
		
			?>
		<table width="940" border="0" align="left" >
		<TR>
		<TD width="150" valign="top">
			<?php include('frame_gauche.php'); ?>
		</TD>

		<TD valign="top">
		
		<?php
						
	   	mysql_query("INSERT INTO conducteurs VALUES('', '$pseudo', '$mail', '$pwd', '$nom', '$prenom', '$tel')");
			
		$_SESSION['pseudo'] = $pseudo;
		$_SESSION['mail'] = $mail;
		$_SESSION['loginOK'] = true;
		
		//J'avais mis un cookie qui s'est mis à ne plus marcher...
		
		//$timestamp_expire = time() + 365*24*3600; // Le cookie expirera dans un an
		//setcookie('pseudo', $pseudo, $timestamp_expire); // On écrit un cookie
		
		$reponse = mysql_query("SELECT * FROM conducteurs WHERE pseudo='$pseudo'") or die(mysql_error());
						
		while ($donnees = mysql_fetch_array($reponse) )
			{
			$_SESSION['id'] = $donnees['ID'];
			}
		
		mysql_close();
		
		$objet="votre inscription sur covoiturage";
		$message="Bonjour,<BR><BR>Bienvenue sur le site covoiturage.<BR><BR>Voici vos informations personelles:<BR><BR>pseudo : ".$pseudo."<BR>mot de passe : ".$pwd."<BR><BR>L'équipe de <a href=\"http://vvcovoiturage.free.fr\">vvcovoiturage</a>";
		
		$headers .='Content-Type: text/html; charset="iso-8859-1"'."\n"; 
	     
		mail("$mail", "$objet", "$message", $headers);
		
		include('menus_session.htm');
		echo "</br>";
		
		echo "Votre inscription a bien &eacute;t&eacute; prise en compte, merci. Vous êtes maintenant connect&eacute;<br /><br /><br />";
		echo "Un mail vous a été envoy&eacute; avec vos informations personnelles.";
		echo "<BR><BR>";
		
		echo "<a href=\"index2.php\">Retour &agrave; l'accueil</a>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "<a href=\"saisir_trajet.php\">Saisir un trajet</a>";
		
		echo "</TD></TR></table>";
		
		}
			
		else 
		{
		$modif = 2;
		$pseudo2 = $pseudo;
		include ('saisir_donnees_perso.php');
		echo "<script>alert(unescape('D%E9sol%E9, ce pseudo existe d%E9jà !'))</script>"; 
		
		}
		
		
		}		
		
		
		
		?>

</html>

