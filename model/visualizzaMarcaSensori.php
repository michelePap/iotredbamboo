<?php
include '../../controller/config.php';

	mysql_select_db("$db_name",$connect);

	$interrogazioneMarcaSensori = 'SELECT * FROM `marcasensore`';
	
	$RisultatoMarcaSensori = mysql_query($interrogazioneMarcaSensori);

	$NumeroRigheMarcaSensori = mysql_num_rows($RisultatoMarcaSensori);

