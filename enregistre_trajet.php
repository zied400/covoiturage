
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
	$date_trajet=mysql_real_escape_string(htmlspecialchars($_POST['date_trajet']));
	$heure=mysql_real_escape_string(htmlspecialchars($_POST['heure']));
	$nbr_places = mysql_real_escape_string(htmlspecialchars($_POST['nbr_places']));
	$coment=nl2br(mysql_real_escape_string(htmlspecialchars($_POST['coment'])));
	if(isset($_POST['heure_retour']) and !empty($_POST['heure_retour']) and isset($_POST['date_trajet_retour']) and !empty($_POST['date_trajet_retour'])){
		$heure_retour=mysql_real_escape_string(htmlspecialchars($_POST['heure_retour']));
		$date_trajet_retour=mysql_real_escape_string(htmlspecialchars($_POST['date_trajet_retour']));
	}
	
	
	if(isset($_POST['type_trajet'])){
		$type_trajet=mysql_real_escape_string(htmlspecialchars($_POST['type_trajet']));
	}else{
		$type_trajet="";
	}
	
	
	
	
	//$date=date("d/m/Y");
	
	if ($_SESSION['loginOK'] == true AND $modif == 1) 	{ //s'il s'agit d'une modofication
	
		/* modif Said
		//on verifie l'identitée du créateur de la fiche :
		$reponse = mysql_query("SELECT * FROM trajets WHERE num_trajet='$trajet2'") or die(mysql_error());
		
		while ($donnees = mysql_fetch_array($reponse) ) {
			$id_traj2=$donnees['id_conducteur'];
		}

		// on mets à jour les données dans la  table
		if ($id_traj2 == $id_cond) {*/
					
			mysql_query("UPDATE trajets SET ville1='$ville1', ville2='$ville2', heure='$heure', type_trajet='$type_trajet', date_trajet='$date_trajet',nbr_places='$nbr_places', coment='$coment' WHERE num_trajet='$trajet2' AND id_conducteur='$id_cond' LIMIT 1") or die(mysql_error());
	
			echo "<h4 style='color:green'>Les modifications on bien été prises en compte </h4><br /><br />";

			//echo "<a href=\"trajets_conducteur.php\">Retourner à mes trajets</a>";
		//}
		/* modif Said
		// si le numero de trajet ne correspond pas à un trajet de l'utilisateur connecté:
		else{ 
			echo "<h4 style='color:red'>une erreur est survenue</h4><br />";
			
		}*/
	}
	

	else { //pour un nouveau trajet
	
		$query = mysql_query("select * from trajets where id_conducteur='$id_cond' and ville1='$ville1' and ville2='$ville2' and heure='$heure' and type_trajet='$type_trajet' and date_trajet='$date_trajet'") or die(mysql_error());
		$i= mysql_num_rows($query);
		if($i==0){
		mysql_query("INSERT INTO trajets (id_conducteur,ville1,ville2,heure,type_trajet,date_trajet,nbr_places,coment) VALUES('$id_cond', '$ville1', '$ville2', '$heure', '$type_trajet', '$date_trajet','$nbr_places', '$coment')") or die(mysql_error());
		if(isset($_POST['heure_retour']) and !empty($_POST['heure_retour'])and $_POST['heure_retour'] != "hh:mm" and isset($_POST['date_trajet_retour']) and !empty($_POST['date_trajet_retour'])){		
			mysql_query("INSERT INTO trajets (id_conducteur,ville1,ville2,heure,type_trajet,date_trajet,nbr_places,coment) VALUES('$id_cond', '$ville2', '$ville1', '$heure_retour', '$type_trajet', '$date_trajet_retour','$nbr_places', '$coment')");
		}
		echo "<h4 style='color:green'>Votre trajet a bien été enregistré, merci. </h4><br />";
		}else{
			echo "<h4 style='color:red'>Ce trajet est déjà saisi sous votre nom! </h4><br />";
		}
		
		}
			
		
	mysql_close();
		
		
	?>