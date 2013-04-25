<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>BuildUp Real Estate</title>
<link rel="stylesheet" type="text/css" href="style.css" />

</head>
<body>
<div id="main_container">

<div id="header">

       <div id="logo">
        <a href="index.html"><img src="images/carpool-masthead.png" width="147" height="78" alt="" title="" border="0" /></a>
       </div>
           
       <div class="banner_adds"></div>    


<div class="menu">

<ul>
<li><a href="index.php?accueil">Acceuil</a></li>
<?php
if (isset($_SESSION['loginOK'])) {
?>
<li><a href="javascript:document.location.href='index.php?modif=1&edit_profile'">Modifier mes donn&eacute;es</a></li>
<li ><a href="javascript:document.location.href='index.php?add_trajet'">Saisir un trajet</a></li>
<li><a href="javascript:document.location.href='index.php?gestion_mes_trajets'">G&eacute;rer mes trajets </a></li>
<li><a href="">Me d&eacute;sinscrire</a></li>
<?php
}
?>

<li><a href="contact.html">Contact</a></li>


</ul>

</div>






</div>
    

    
    <div id="main_content"> 
    	<div class="column1">
        
        
        	<div class="left_box">
            	<div class="top_left_box">
                </div>
                <div style="padding-left: 10px;" class="center_left_box">
                	<div class="box_title"><span>Votre</span> Espace</div>
                    
 
                 	
<?php

	  		if (isset($_SESSION['loginOK'])) {
				
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
							
				echo "Vous avez saisi:<BR>";
				echo" <strong>$n Trajet(s)</strong>";
				echo "<BR><BR>";
				?>
				<input type="submit" class="styled-button-6" value="D&eacute;connecter" onclick="javascript:document.location.href='logout.php'" /> 
<style type="text/css">
.styled-button-6 {
	background:#f78096;
	background:-moz-linear-gradient(top,#f78096 0%,#f56778 100%);
	background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#f78096),color-stop(100%,#f56778));
	background:-webkit-linear-gradient(top,#f78096 0%,#f56778 100%);
	background:-o-linear-gradient(top,#f78096 0%,#f56778 100%);
	background:-ms-linear-gradient(top,#f78096 0%,#f56778 100%);
	background:linear-gradient(top,#f78096 0%,#f56778 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f78096',endColorstr='#f78096',GradientType=0);
	padding:5px 4px;
	color:#fff;
	font-family:'Helvetica Neue',sans-serif;
	font-size:12px;
	border-radius:4px;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border:1px solid #ae4553;
	 cursor: pointer;
}
.styled-button-6:hover{
background:#f22096;
}
</style>
				<?php
				}
				
				else {
				
				?>
		
				
		<form action="verif_login.php?accueil" method="post" class="form" >
		 <div class="form_row">
		 <label class="left">User :</label><input type="text" name="pseudo" size="18"
		value=" <?php if(isset($_COOKIE['pseudo'])){echo $_COOKIE['pseudo'] ;} ?>"
		onFocus="javascript:this.value=''"></div>
		
		 <div class="form_row">
		 <label class="left">Password :</label><input type="password" name="password" onFocus="javascript:this.value=''" size="18" ></div>
		

		  <div style="float:right; padding:10px 25px 0 0;">
                    <input type="image" src="images/login.gif">
                    </div>
      	</form>
		<br/>	<br/>	<br/>	<br/>
		<div class="more" style="margin-top: 40px;margin-right: 30px;">
         <a href="oublimdp.php" class="pink" >Identifiants oubli&eacute;s ?</a>
		 <br/>
		<a href="saisir_donnees_perso.php" class="pink">S'inscrire</a>
		</div>
		
<?php } ?>
                
                </div>
                <div class="bottom_left_box">
                </div>
            </div>
            
            
 
        	<div class="left_box">
            	<div class="top_left_box">
                </div>
                <div class="center_left_box">
                	<div class="box_title"><span>Dernier</span> evenements</div>
                    
                    
                    <div class="form">
                    <div class="form_row"><label class="left">Email: </label><input type="text" class="form_input"/></div>                    
                    <div style="float:right; padding:10px 25px 0 0;">
                    <input type="image" src="images/join.gif"/>
                    </div>
                    
                    </div>
                
                
                </div>
                <div class="bottom_left_box">
                </div>
            </div> 
 
 
        	<div class="left_box">
            	<div class="top_left_box">
                </div>
                <div class="center_left_box">
                	<div class="box_title"><span>Contact</span> information:</div>
                    
                    
                    <div class="form">
                    <div class="form_row">
                    	<img src="images/contact_envelope.gif" width="50" height="47" border="0" class="img_right" alt="" title="" />
                        <div class="contact_information">
                        Email: zied.salem.gmail.com<br />
                        Telephone: 06 50 04 20 93<br />
                        Mobile:      234 345 234534<br />
                        Fax:         34534 3456 3456(54)<br /><br />
                        
                        <span>www.utbm.fr</span>
                        </div>
                    </div>                    
                    </div>
                
                
                </div>
                <div class="bottom_left_box">
                </div>
            </div>  
			</div><!-- end of column one -->
			
			
			  	<?php
if(isset($_GET['edit_profile'])){ ?>	
		
		   		<div class="column4">
        
        <div class="title">Modifier mes donn&eacute;es </div> 
		<?php
include('edit_profile.php');
		?>
</div>
<?php } ?>

			  	<?php
if(isset($_GET['detail_projet'])){ ?>	
		
		   		<div class="column4">
        
        <div class="title">D&eacute;tails trajets</div> 
		<?php
include('contact.php');
		?>
</div>
<?php } ?>

			  	<?php
if(isset($_GET['supprimer_trajet'])){ ?>	
		
		   		<div class="column4">
        
		<?php
include('supprimer_trajet.php');
		?>
</div>
<?php } ?>



			  	<?php
if(isset($_GET['edit_trajet'])){ ?>	
		
		   		<div class="column4">
        
        <div class="title">Modifier un trajet </div> 
		<?php
include('edit_trajet.php');
		?>
</div>
<?php } ?>



			  	<?php
if(isset($_GET['gestion_mes_trajets'])){ ?>	
		
		   		<div class="column4">
        
        <div class="title">Gestion de mes trajets </div> 
		<?php
include('gestion_mes_trajets.php');
		?>
</div>
<?php } ?>


			  	<?php
if(isset($_GET['add_trajet'])){ ?>	
		
		   		<div class="column4">
        
        <div class="title">Ajouter un trajet </div> 
		<?php
include('add_trajet.php');
		?>
</div>
<?php } ?>


			  	<?php
if(isset($_GET['enregistre_trajet'])){ ?>	
		
		   		<div class="column4">
        
		<?php
include('enregistre_trajet.php');
		?>
</div>
<?php } ?>






   		<div class="column4">
        
        <div class="title">Rechercher un trajet </div> 
        	      <form action="index.php" method="post">
				  </br>
		<STRONG>Veuillez saisir les informations n&eacute;cessaires </strong></br>
		D&eacute;part:
		<input type="hidden" name="rech" />
		<?php
			$ville1 = "";
		?>
		<SELECT name="ville1">		
			<OPTION <?php if ($ville1 == "") {echo"selected";} ?> VALUE=""></OPTION>
			<OPTION <?php if ($ville1 == "Belfort") {echo"selected";} ?> VALUE="Belfort">Belfort</OPTION>
			<OPTION <?php if ($ville1 == "Sevenans") {echo"selected";} ?> VALUE="Sevenans">Sevenans</OPTION>
			<OPTION <?php if ($ville1 == "Montbeliard") {echo"selected";} ?> VALUE="Montbeliard">Montbeliard</OPTION>
		</SELECT>
		
		<!-- <input type="text" name="ville1" value="" onFocus="javascript:this.value=''" size="15"> -->
		
		Arriv&eacute;e 
		<input type="hidden" name="rech" />
		<?php
			$ville2 = "";
		?>
		<SELECT name="ville2">		
			<OPTION <?php if ($ville2 == "") {echo"selected";} ?> VALUE=""></OPTION>
			<OPTION <?php if ($ville2 == "Belfort") {echo"selected";} ?> VALUE="Belfort">Belfort</OPTION>
			<OPTION <?php if ($ville2 == "Sevenans") {echo"selected";} ?> VALUE="Sevenans">Sevenans</OPTION>
			<OPTION <?php if ($ville2 == "Montbeliard") {echo"selected";} ?> VALUE="Montbeliard">Montbeliard</OPTION>
		</SELECT>
		
		<!-- <input type="text" name="ville2" value="Sevenans" value="Belfort" onFocus="javascript:this.value=''" size="15"> -->
		Date:
		<input type="text" name="ville2" value="" onFocus="javascript:this.value=''" size="15">
		Horaire 
		<?php
$heure_rech = "tous";
?>
		<SELECT name="heure">
		
		<OPTION <?php if ($heure_rech == "tous") {echo"selected";} ?> VALUE="tous">Tous</OPTION>
		<OPTION <?php if ($heure_rech == "00:00") {echo"selected";} ?> VALUE="00:00">00:00</OPTION>
		<OPTION <?php if ($heure_rech == "00:30") {echo"selected";} ?> VALUE="00:30">00:30</OPTION>
		<OPTION <?php if ($heure_rech == "01:00") {echo"selected";} ?> VALUE="01:00">01:00</OPTION>
		<OPTION <?php if ($heure_rech == "01:30") {echo"selected";} ?> VALUE="01:30">01:30</OPTION>
		<OPTION <?php if ($heure_rech == "02:00") {echo"selected";} ?> VALUE="02:00">02:00</OPTION>
		<OPTION <?php if ($heure_rech == "02:30") {echo"selected";} ?> VALUE="02:30">02:30</OPTION>
		<OPTION <?php if ($heure_rech == "03:00") {echo"selected";} ?> VALUE="03:00">03:00</OPTION>
		<OPTION <?php if ($heure_rech == "03:30") {echo"selected";} ?> VALUE="03:30">03:30</OPTION>
		<OPTION <?php if ($heure_rech == "04:00") {echo"selected";} ?> VALUE="04:00">04:00</OPTION>
		<OPTION <?php if ($heure_rech == "04:30") {echo"selected";} ?> VALUE="04:30">04:30</OPTION>
		<OPTION <?php if ($heure_rech == "05:00") {echo"selected";} ?> VALUE="05:00">05:00</OPTION>
		<OPTION <?php if ($heure_rech == "05:30") {echo"selected";} ?> VALUE="05:30">05:30</OPTION>
		<OPTION <?php if ($heure_rech == "06:00") {echo"selected";} ?> VALUE="06:00">06:00</OPTION>
		<OPTION <?php if ($heure_rech == "06:30") {echo"selected";} ?> VALUE="06:30">06:30</OPTION>
		<OPTION <?php if ($heure_rech == "07:00") {echo"selected";} ?> VALUE="07:00">07:00</OPTION>
		<OPTION <?php if ($heure_rech == "07:30") {echo"selected";} ?> VALUE="07:30">07:30</OPTION>
		<OPTION <?php if ($heure_rech == "08:00") {echo"selected";} ?> VALUE="08:00">08:00</OPTION>
		<OPTION <?php if ($heure_rech == "08:30") {echo"selected";} ?> VALUE="08:30">08:30</OPTION>
		<OPTION <?php if ($heure_rech == "09:00") {echo"selected";} ?> VALUE="09:00">09:00</OPTION>
		<OPTION <?php if ($heure_rech == "09:30") {echo"selected";} ?> VALUE="09:30">09:30</OPTION>
		<OPTION <?php if ($heure_rech == "10:00") {echo"selected";} ?> VALUE="10:00">10:00</OPTION>
		<OPTION <?php if ($heure_rech == "10:30") {echo"selected";} ?> VALUE="10:30">10:30</OPTION>
		<OPTION <?php if ($heure_rech == "11:00") {echo"selected";} ?> VALUE="11:00">11:00</OPTION>
		<OPTION <?php if ($heure_rech == "11:30") {echo"selected";} ?> VALUE="11:30">11:30</OPTION>
		<OPTION <?php if ($heure_rech == "12:00") {echo"selected";} ?> VALUE="12:00">12:00</OPTION>
		<OPTION <?php if ($heure_rech == "12:30") {echo"selected";} ?> VALUE="12:30">12:30</OPTION>
		<OPTION <?php if ($heure_rech == "13:00") {echo"selected";} ?> VALUE="13:00">13:00</OPTION>
		<OPTION <?php if ($heure_rech == "13:30") {echo"selected";} ?> VALUE="13:30">13:30</OPTION>
		<OPTION <?php if ($heure_rech == "14:00") {echo"selected";} ?> VALUE="14:00">14:00</OPTION>
		<OPTION <?php if ($heure_rech == "14:30") {echo"selected";} ?> VALUE="14:30">14:30</OPTION>
		<OPTION <?php if ($heure_rech == "15:00") {echo"selected";} ?> VALUE="15:00">15:00</OPTION>
		<OPTION <?php if ($heure_rech == "15:30") {echo"selected";} ?> VALUE="15:30">15:30</OPTION>
		<OPTION <?php if ($heure_rech == "16:00") {echo"selected";} ?> VALUE="16:00">16:00</OPTION>
		<OPTION <?php if ($heure_rech == "16:30") {echo"selected";} ?> VALUE="16:30">16:30</OPTION>
		<OPTION <?php if ($heure_rech == "17:00") {echo"selected";} ?> VALUE="17:00">17:00</OPTION>
		<OPTION <?php if ($heure_rech == "17:30") {echo"selected";} ?> VALUE="17:30">17:30</OPTION>
		<OPTION <?php if ($heure_rech == "18:00") {echo"selected";} ?> VALUE="18:00">18:00</OPTION>
		<OPTION <?php if ($heure_rech == "18:30") {echo"selected";} ?> VALUE="18:30">18:30</OPTION>
		<OPTION <?php if ($heure_rech == "19:00") {echo"selected";} ?> VALUE="19:00">19:00</OPTION>
		<OPTION <?php if ($heure_rech == "19:30") {echo"selected";} ?> VALUE="19:30">19:30</OPTION>
		<OPTION <?php if ($heure_rech == "20:00") {echo"selected";} ?> VALUE="20:00">20:00</OPTION>
		<OPTION <?php if ($heure_rech == "20:30") {echo"selected";} ?> VALUE="20:30">20:30</OPTION>
		<OPTION <?php if ($heure_rech == "21:00") {echo"selected";} ?> VALUE="21:00">21:00</OPTION>
		<OPTION <?php if ($heure_rech == "21:30") {echo"selected";} ?> VALUE="11:30">21:30</OPTION>
		<OPTION <?php if ($heure_rech == "22:00") {echo"selected";} ?> VALUE="22:00">22:00</OPTION>
		<OPTION <?php if ($heure_rech == "22:30") {echo"selected";} ?> VALUE="22:30">22:30</OPTION>
		<OPTION <?php if ($heure_rech == "23:00") {echo"selected";} ?> VALUE="23:00">23:00</OPTION>
		<OPTION <?php if ($heure_rech == "23:30") {echo"selected";} ?> VALUE="23:30">23:30</OPTION>
		</SELECT>
		&nbsp;&nbsp;
	</br>		</br>	
		<p>
   	    <input type="submit" name="soumettre" class="styled-button-12" value="Rechercher"> 
<style type="text/css">
.styled-button-12 {
	-webkit-box-shadow:rgba(0,0,0,0.2) 0 1px 0 0;
	-moz-box-shadow:rgba(0,0,0,0.2) 0 1px 0 0;
	box-shadow:rgba(0,0,0,0.2) 0 1px 0 0;
	border-bottom-color:#333;
	border:1px solid #61c4ea;
	background-color:#7cceee;
	border-radius:5px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	color:#333;
	font-family:'Verdana',Arial,sans-serif;
	font-size:14px;
	text-shadow:#b2e2f5 0 1px 0;
	padding:5px;
	 cursor: pointer;
	 float:right;
	 width:100px;
}
.styled-button-12:hover{
background-color:#7ddeee;
}
</style>
  


</p>
      	</form>




        
        </div><!-- end of column four -->	

		
	<?php
if(isset($_POST['rech'])){ ?>	
		
		   		<div class="column4">
        
        <div class="title">Liste de trajets </div> 
	<?php include('result_search.php');?>
<?php } ?>
</div>

<?php
if(!isset($_POST['rech']) && isset($_GET['accueil'])){ ?>	
		
		   		<div class="column4">
        
        <div class="title">Liste de trajets </div> 
	<?php include('result_search.php');?>
<?php } ?>
</div>



	<!-- end of column four -->
		
		
		
		<!-- end of column two 
   		<div class="column2">
        	<div class="main_text_box">
            <h2>Covoiturage UTBM</h2>
            <p> <a href="index.html"><img src="images/carpool.png" width="200" height="108" alt="" title="" border="0" /></a>
 "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. <br /><br />

Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."            
            </p>        
        	</div>
            
        	<div class="main_text_box">
            <h2>Request a proposal</h2>
            <div class="proposal">
           			<p class="proposal_text">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>        
        	</div>            
            
            
            
            
        </div>
   




   		<div class="column3">
        	<div class="small_title">Latest offers</div> 
            
            <div class="offer_box">
            	<a href="details.html"><img src="images/p1.jpg" width="130" height="98" class="img_left" alt="" title="" border="0"/></a>
                <div class="offer_info">
                <span>For Sale  150 000 $</span>
                <p class="offer">
                "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."             
                </p>
                <div class="more"><a href="details.html">...more</a></div>
                </div>
            </div>
            
            
             <div class="offer_box">
            	<a href="details.html"><img src="images/p2.jpg" width="130" height="98" class="img_left" alt="" title="" border="0"/></a>
                <div class="offer_info">
                <span>For Sale  220 000 $</span>
                <p class="offer">
                "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."             
                </p>
                <div class="more"><a href="details.html">...more</a></div>
                </div>
            </div>           
            
        </div> end of column three -->








    <!-- end of main_content -->
    
<div id="footer">

	<div id="copyright">
    <div style="float:left; padding:3px;"><a href="#"><img src="images/Logo_utbm.png" width="100" height="35" alt="" title="" border="0" /></a></div>
    <div style="float:left; padding:14px 10px 10px 10px;"> UTBM .&copy; All Rights Reserved 2008 - By <a href="http://utbm.fr" style="color:#772c17;">ZIED-ILVES-SAID</a></div>
    </div>
    
    
    <ul class="footer_menu">
    	<li><a href="index.html" class="nav_footer">  Accueil </a></li>
        <li><a href="#" class="nav_footer">  Modifier mes données </a></li>
        <li><a href="" class="nav_footer">  Saisir un trajet </a></li>
        <li><a href="" class="nav_footer">  Gérer mes trajets</a></li>
        <li><a href="" class="nav_footer">  Me désinscrire</a></li>
        <li><a href="" class="nav_footer">  Contact </a></li>
    </ul>

</div>


</div>
<!-- end of main_container -->

</body>
</html>