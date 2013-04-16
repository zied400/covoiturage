<html>
<?php
 
		
		$de=htmlspecialchars($_POST['de']);
		$objet=htmlspecialchars($_POST['objet']);
		$message=htmlspecialchars($_POST['message']);
		
		$headers = 'From: <'.$de.'>'."\n"; 
	     
		//metez votre mail ici :
		
		mail("votremail", "$objet", "$message", $headers);
						 
		echo "le message a été envoyé";
	
 
?>
</html>