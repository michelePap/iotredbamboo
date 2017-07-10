<?php
include("../../controller/config.php");

	mysql_select_db("$db_name",$connect);

	$interrogazioneTipoSensori = "SELECT * FROM `tiposensore`";
	
	$RisultatoTipoSensori = mysql_query($interrogazioneTipoSensori)
      or die ("Select Non Riuscita");

	$NumeroRigheTipoSensori = mysql_num_rows($RisultatoTipoSensori);

?> 
