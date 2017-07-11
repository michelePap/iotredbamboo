<?php
include '../../controller/config.php';

	mysql_select_db((string)$db_name,$connect);

	$interrogazioneClienti = 'SELECT * FROM `utenti` WHERE `Privilegi` = 0';
	
	$RisultatoClienti = mysql_query($interrogazioneClienti);

	$NumeroRigheClienti = mysql_num_rows($RisultatoClienti);
