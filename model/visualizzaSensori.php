<?php
include '../../controller/config.php';

$dbh = new PDO("mysql:dbname=iotredbamboo;host=localhost", "root", "");
$stmt1 = $dbh->prepare( 'SELECT * FROM `sensori`' );
$stmt1->execute();
$RisultatoSensori = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    
	
	
$stmt2 = $dbh->prepare( 'SELECT * FROM `sensori`, `ambienti` WHERE `sensori`.`IdAmbiente` = `ambienti`.`IdAmbiente`' );
$stmt2->execute();
$RisultatoSensori2 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

    function interrogazioneSensori($stringa){
		
		$dbh = new PDO("mysql:dbname=iotredbamboo;host=localhost", "root", "");
		$stmt = $dbh->prepare( "SELECT * FROM `sensori` WHERE `IdAmbiente` =  :stringa");
		$stmt->bindParam(':stringa', $stringa);
		$stmt->execute();
		$Risultato = $stmt->fetchAll(PDO::FETCH_ASSOC);	
		return $Risultato;
	
	}
    