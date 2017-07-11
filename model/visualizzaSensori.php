<?php
include '../../controller/config.php';

	mysql_select_db((string)$db_name,$connect);
    
    function interrogazioneSensori($stringa){
		
		$interrogazioneSensori = "SELECT * FROM `sensori` WHERE `IdAmbiente` = '$stringa'";
		$Risultato = mysql_query($interrogazioneSensori);
		return $Risultato;
	}

	$interrogazioneSensori = "SELECT * FROM `sensori`";
	
	$RisultatoSensori = mysql_query($interrogazioneSensori);

	$NumeroRigheSensori = mysql_num_rows($RisultatoSensori);
    
    $interrogazioneSensori1 = "SELECT * FROM `sensori`, `ambienti` WHERE `sensori`.`IdAmbiente` = `ambienti`.`IdAmbiente`";
	
	$RisultatoSensori1 = mysql_query($interrogazioneSensori1);

	$NumeroRigheSensori1 = mysql_num_rows($RisultatoSensori1);
