<?php
session_start();


include('connexion_SQL.php');

	$pseudo=mysql_real_escape_string(htmlspecialchars($_POST['pseudo']));
	$password=mysql_real_escape_string(htmlspecialchars($_POST['password']));
  
    if ($pseudo != NULL AND $password != NULL) // Si on a quelque chose à enregistrer
		{
			
		$reponse = mysql_query("SELECT * FROM conducteurs WHERE pseudo='$pseudo'") or die(mysql_error());
		
		$donnees = mysql_fetch_array($reponse);
			
		mysql_close();
		
		if ($donnees == "") 
			{
			include('index.php');
			echo "<script>alert(unescape('D%E9sol%E9, ce pseudo n\'existe pas !'))</script>"; 
			}
			
		elseif ($password == $donnees['pwd']) 
			{
			$_SESSION['pseudo'] = $donnees['pseudo'];
			$_SESSION['id'] = $donnees['ID'];
			$_SESSION['mail'] = $donnees['mail'];
			$_SESSION['loginOK'] = true;
			
			
			include('index.php');
			}
			
		else {
			include('index.php');
			echo "<script>alert(unescape('Mot de passe Incorect !'))</script>"; 
			}
		
		
					
			 
	}
	
	else {
		include('index.php');
		echo "<script>alert(unescape('Une erreur est survenue, merci de r%E9essayer !'))</script>"; 
		}	
	
	
	


?>



