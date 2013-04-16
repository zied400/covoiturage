<?php
 session_start();
 
if ($_SESSION['loginOK'] == true)
	{ 
	$id_exp=$_GET['id'];
		
		include('connexion_SQL.php');
		
		$reponse = mysql_query("SELECT * FROM conducteurs WHERE ID='$id_exp'") or die(mysql_error());
		
		while ($donnees = mysql_fetch_array($reponse) )
			{ $mail_dest=$donnees['mail']; }
		
		$de=mysql_real_escape_string(htmlspecialchars($_POST['de']));
		$objet=mysql_real_escape_string(htmlspecialchars($_POST['objet']));
		$message=mysql_real_escape_string(htmlspecialchars($_POST['message']));
		
		$headers = 'From: <'.$de.'>'."\n"; 
		$headers .='Content-Type: text/html; charset="iso-8859-1"'."\n"; 
	     
		mail("$mail_dest", "$objet", "$message", $headers);
		echo "le message a été envoyé";
	}
	
else {
	echo "Merci de vous identifier pour accederà cette page";
	include('index.php');
	}
 
?>