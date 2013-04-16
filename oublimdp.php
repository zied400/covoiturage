<?php
session_start();
?>

<html>
<table width="930" border="0" align="left" >
	<TR>
		<TD width="160" valign="top">
			<?php include('frame_gauche.php'); ?>
		</TD>

		<TD width="770" valign="top">
	
<form action="envoimdp.php" method=post>

<BR><BR>
<STRONG>Oubli de mot de passe :</STRONG>
<BR><BR>
Veuilez saisir votre email:
<BR><BR>
<input type="text" name="email">

<BR><BR>
<INPUT TYPE="submit" ACTION="envoimdp.php" VALUE="Valider" METHOD="post" >

</form>



</TD>
</TR>

</table>

</html>
