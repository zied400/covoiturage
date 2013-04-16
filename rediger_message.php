<?php
 session_start();
 ?>
 <html>
 <script type="text/javascript" language="Javascript" >
<!--
function verification()
{
if(document.formulaire.de.value.indexOf('@') == -1) {
   alert("Ce n'est pas une adresse mail valide");
   document.formulaire.de.focus();
   return false;
  }
if(document.formulaire.de.value.indexOf('.') == -1) {
   alert("Ce n'est pas une adresse mail valide");
   document.formulaire.de.focus();
   return false;
  }
  return true
}
//-->
</script>

<?php
 
if ($_SESSION['loginOK'] == true)
	{ 
	
	$id_exp=$_GET['id'];
	$mail_exp=$_SESSION['mail'];
	
	echo "<form name=\"formulaire\" action=\"envoyer_message.php?id=$id_exp\" method=\"post\" onSubmit=\"return verification()\">";
	
	echo "de :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"text\" name=\"de\" value=\"$mail_exp\" size=\"40\" onFocus=\"javascript:this.value=''\">";
	?>
	
	</br></br>
	objet :&nbsp;<input type="text" name="objet" size="40" value="covoiturage" onFocus="javascript:this.value=''">
	</br></br>
	votre message:
	</br>
	<TEXTAREA rows="10" cols="40" name="message"></TEXTAREA>
	</br></br>
	<input name="soumettre" type="submit" value="Envoyer" >
	
	</form>
	
	
	<?php
	
	}
	
else {
	echo "Merci de vous identifier pour accederà cette page";
	include('index2.php');
	}
 
?>