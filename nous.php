<?php
session_start();
?>

<html>

<table width="920" border="0" align="left" >
	<TR>
		<TD width="150" valign="top">
			<?php include('frame_gauche.php'); ?>
		</TD>

		<TD width="760" valign="top">
		
<?php
		
if ($_SESSION['loginOK'] == true) {
	include('menus_session.htm');
	echo "</br>";	
}
?>


VOTRE TEXTE ICI


</TD>
</TR>

</table>
</body>
</html>
