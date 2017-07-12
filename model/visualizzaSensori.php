<?php
include '../../controller/config.php';

	mysql_select_db("$db_name",$connect);
    
    function interrogazioneSensori($stringa){

    	$dbh = new PDO("mysql:dbname=iotredbamboo;host=localhost", "root", "");
		$stmt = $dbh->prepare( "SELECT * FROM `sensori` WHERE `IdAmbiente` = :stringa");
		$stmt->bindParam(':stringa', $stringa);
		$stmt->execute();
		$Risultato = $stmt->fetchAll(PDO::FETCH_ASSOC);	

		return $Risultato;
	}

	$interrogazioneSensori = "SELECT * FROM `sensori`";
	
	$RisultatoSensori = mysql_query($interrogazioneSensori);

	$NumeroRigheSensori = mysql_num_rows($RisultatoSensori);

	$dbh = new PDO("mysql:dbname=iotredbamboo;host=localhost", "root", "");
		$stmt = $dbh->prepare( "SELECT * FROM `sensori`, `ambienti` WHERE `sensori`.`IdAmbiente` = `ambienti`.`IdAmbiente`");
		$stmt->execute();
		$RisultatoSensori1 = $stmt->fetchAll(PDO::FETCH_ASSOC);