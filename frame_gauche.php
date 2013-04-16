
<html>
cc
<style type="text/css">
<!--
body {
	background-image: url(images/fond_G.JPG);
	background-repeat: no-repeat;
	
	}
	.Style1 {
	color: #FFFFFF;
	}
	.Style2 {
	color: #000000;
	}
	.Style4 {
	font-size: 13px;
	}
;
	-->
</style>

<div align="center" class="Style1">
Covoiturage 1.1
</div>

</br>


<?php

	  		if (isset($_POST['loginOK']) && $_SESSION['loginOK'] == true) {
				
				echo "Votre espace : "; 
				echo"<STRONG>";
				echo $_SESSION['pseudo'];
				echo"</STRONG>";
				echo "<BR><BR>";
				echo "</strong>";
				
				include('connexion_SQL.php');
							
				$id_sess=$_SESSION['id'];
	
				$reponse = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM trajets WHERE ID='$id_sess'");
				$compt = mysql_fetch_array($reponse);	
				$n=$compt['nbre_entrees'];
				mysql_close();
							
				echo "vous avez saisi:<BR>";
				echo" $n trajet(s)";
				echo "<BR><BR>";
				}
				
				else {
				
				?>
		
				
		<form action="verif_login.php" method=post>
		<strong>
		Pseudo</BR>
		<input type="text" name="pseudo" size="18"
		value=" <?php if(isset($_COOKIE['pseudo'])){echo $_COOKIE['pseudo'] ;} ?>"
		onFocus="javascript:this.value=''">
		
		<BR><BR>
		Mot de passe
		</strong>
		</BR>
		<input type="password" name="password" onFocus="javascript:this.value=''" size="18" >
		
		<div  class="Style4">
		&nbsp;<a href="oublimdp.php" TARGET="bas">identifiants oubli&eacute;s ?</a>	
		</div>

		<BR>
		<table border="0">
		<TR><TD>
		<p><INPUT TYPE="submit" ACTION="verif_login.php" VALUE="Valider" METHOD="post" >
      	</form>
        </TD><TD>
		
		&nbsp;
		<a href="saisir_donnees_perso.php" TARGET="bas">S'inscrire</a></p>
		</TD></TR>
		
		</TABLE>
		
<?php } ?>

<HR>





<table border="0">

<tr><TD>&#149;&nbsp;<a href="index2.php" TARGET="_self">Accueil</a></BR></TD></TR>

<tr><TD>&#149;&nbsp;<a href="trajets.php" TARGET="_self">Voir tous les trajets</a></BR></tr></TD>

<tr><TD>&#149;&nbsp;<a href="nous.php" TARGET="_self">Qui sommes nous ?</a></BR></tr></TD>

<tr><TD>&#149;&nbsp;<a href="index.html" target="_top" onClick="javascript:window.open('rediger_message_webmaster.htm', 'message', 'width = 400, height = 350, scrollbars = yes')" >Nous &eacute;crire</a></BR></tr></TD>

<tr><TD>&#149;&nbsp;<a href="liens.php" TARGET="_self">Liens</a></BR></tr></TD>

</table>



<hr>
<BR>

<div align="center" class="Style1">
Derni&eacute;re mise &agrave; jour: date
</div>
</html>