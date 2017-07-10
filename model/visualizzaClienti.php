<?php
include("../../controller/config.php");

	mysql_select_db("$db_name",$connect);

	$interrogazioneClienti = "SELECT * FROM `utenti` WHERE `Privilegi` = 0";
	
	$RisultatoClienti = mysql_query($interrogazioneClienti)
      or die ("Select Non Riuscita");

	$NumeroRigheClienti = mysql_num_rows($RisultatoClienti);

?> 
