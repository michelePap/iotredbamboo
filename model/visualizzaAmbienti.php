<?php
include("../../controller/config.php");

	mysql_select_db("$db_name",$connect);

	$interrogazioneAmbientiAdmin = "SELECT * FROM `ambienti` ORDER BY `ambienti`.`Username`";
	
	function interrogazioneAmbientiUtente($stringa){
		
		$interrogazioneAmbientiUtente = "SELECT * FROM `ambienti` WHERE `Username` = '$stringa'";
		return $Risultato = mysql_query($interrogazioneAmbientiUtente);
	}
	
	$RisultatoAmbientiAdmin = mysql_query($interrogazioneAmbientiAdmin)
      or die ("Select Non Riuscita");

	$NumeroRigheAmbienteAdmin = mysql_num_rows($RisultatoAmbientiAdmin);

?> 
