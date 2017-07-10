<?php
include("config.php");

	mysql_select_db("$db_name",$connect);
    
    function interrogazioneSensori($stringa){
		
		$interrogazioneSensori = "SELECT * FROM `sensori` WHERE `IdAmbiente` = '$stringa'";
		return $Risultato = mysql_query($interrogazioneSensori);
	}

	$interrogazioneSensori = "SELECT * FROM `sensori`";
	
	$RisultatoSensori = mysql_query($interrogazioneSensori)
      or die ("Select Non Riuscita");

	$NumeroRigheSensori = mysql_num_rows($RisultatoSensori);
    
    $interrogazioneSensori1 = "SELECT * FROM `sensori`, `ambienti` WHERE `sensori`.`IdAmbiente` = `ambienti`.`IdAmbiente`";
	
	$RisultatoSensori1 = mysql_query($interrogazioneSensori1)
      or die ("Select Non Riuscita");

	$NumeroRigheSensori1 = mysql_num_rows($RisultatoSensori1);

?> 
