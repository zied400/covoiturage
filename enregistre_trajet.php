
<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 	
if(isset($_GET['modif'])){$modif=$_GET['modif'];}else{$modif="";}
if(isset($_GET['num_traj'])){$trajet2=$_GET['num_traj'];}else{$trajet2="";}

	
		
	$id_cond=$_SESSION['id'];
	
	include('connexion_SQL.php');
	
	$ville1=mysql_real_escape_string(htmlspecialchars($_POST['ville1']));
	$ville2=mysql_real_escape_string(htmlspecialchars($_POST['ville2']));
	$heure=mysql_real_escape_string(htmlspecialchars($_POST['heure']));
	$heure_retour="";
	//zied modif
	//$heure_retour=mysql_real_escape_string(htmlspecialchars($_POST['heure_retour']));
	if(isset($_POST['type_trajet'])){$type_trajet=mysql_real_escape_string(htmlspecialchars($_POST['type_trajet']));}else{$type_trajet="";}
		if(isset($_POST['date_trajet'])){$date_trajet=mysql_real_escape_string(htmlspecialchars($_POST['date_trajet']));}else{$date_trajet="";}
	//zied modif
	$date_trajet_retour="";
	//$date_trajet_retour=mysql_real_escape_string(htmlspecialchars($_POST['date_trajet_retour']));
	$coment=nl2br(mysql_real_escape_string(htmlspecialchars($_POST['coment'])));
	
	$date=date("Y-m-d");
	
	if ($_SESSION['loginOK'] == true AND $modif == 1) 	{ //s'il s'agit d'une modofication
	
		//on verifie l'identitée du créateur de la fiche :
		$reponse = mysql_query("SELECT * FROM trajets WHERE num_trajet='$trajet2'") or die(mysql_error());
		
		while ($donnees = mysql_fetch_array($reponse) ) {
			$id_traj2=$donnees['ID'];
		}

		// on mets à jour les donnéesdans la  table
		if ($id_traj2 == $id_cond) {
					
			mysql_query("UPDATE trajets SET ville1='$ville1', ville2='$ville2', heure='$heure', type_trajet='$type_trajet', date_trajet='$date_trajet', coment='$coment', date='$date' WHERE num_trajet='$trajet2' LIMIT 1") or die(mysql_error());
	
			echo "<h4 style='color:green'>Les modifications on bien été prises en compte </h4><br /><br />";
		
			//echo "<a href=\"trajets_conducteur.php\">Retourner à mes trajets</a>";
		}
		
		// si le numero de trajet ne correspond pas à un trajet de l'utilisateur connecté:
		else{ 
			echo "<h4 style='color:red'>une erreur est survenue</h4><br />";
			
		}
	}
	

	else { //pour un nouveau trajet
					
		mysql_query("INSERT INTO trajets VALUES('', '$id_cond', '$ville1', '$ville2', '$heure', '$type_trajet', '$date_trajet', '$coment', '$date' )");
			
		if (($heure_retour != "") AND ($heure_retour != "hh:mm")) { //si un trajet de retour a  été saisi
		mysql_query("INSERT INTO trajets VALUES('', '$id_cond', '$ville2', '$ville1', '$heure_retour', '$type_trajet', '$date_trajet_retour', '$coment', '$date' )");
		}
			
		echo "<h4 style='color:green'>Votre trajet a bien été enregistré, merci. </h4><br />";
		
		}
			
		
	mysql_close();
		
		
	?>