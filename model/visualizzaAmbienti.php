<?php
include '../../controller/config.php';

	mysql_select_db((string)$db_name,$connect);

	$interrogazioneAmbientiAdmin = "SELECT * FROM `ambienti` ORDER BY `ambienti`.`Username`";
	
	function interrogazioneAmbientiUtente($stringa){
		
		$interrogazioneAmbientiUtente = "SELECT * FROM `ambienti` WHERE `Username` = '$stringa'";
		$Risultato = mysql_query($interrogazioneAmbientiUtente);
		return $Risultato;
	}
	
	$RisultatoAmbientiAdmin = mysql_query($interrogazioneAmbientiAdmin);

	$NumeroRigheAmbienteAdmin = mysql_num_rows($RisultatoAmbientiAdmin);
