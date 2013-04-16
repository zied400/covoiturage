<?php
$heure_rech = "tous";
?>
<html>
<table border="0" bgcolor=#D3D3D3><TR valign="middle"><TD>

		<form action="resultat_recherche.php" method=post>
		<STRONG>Rechercher un trajet :</strong>
		&nbsp;depart :&nbsp;
		<input type="text" name="ville1" value="<?php echo $depart ?>" onFocus="javascript:this.value=''" size="15">
		arrivée :&nbsp;
		<input type="text" name="ville2" value="<?php echo $arrivee ?>" onFocus="javascript:this.value=''" size="15">
		&nbsp;&nbsp;horaire :&nbsp;
		
		<SELECT name="heure">
		
		<OPTION <?php if ($heure_rech == "tous") {echo"selected";} ?> VALUE="tous">tous</OPTION>
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
		<INPUT TYPE="submit" ACTION="resultat_recherche.php" VALUE="Valider" METHOD="post" >
      	</form>
		
		</td></tr></table>
<html>