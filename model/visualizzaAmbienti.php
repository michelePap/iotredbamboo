<?php

$dbh = new PDO("mysql:dbname=iotredbamboo;host=localhost", "root", "");
$stmt = $dbh->prepare( 'SELECT * FROM `ambienti` ORDER BY `Username`' );
$stmt->execute();
$RisultatoAmbientiAdmin = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	function interrogazioneAmbientiUtente($stringa){

		$dbh = new PDO("mysql:dbname=iotredbamboo;host=localhost", "root", "");
		$stmt = $dbh->prepare( "SELECT * FROM `ambienti` WHERE `Username` = '$stringa'");
		$stmt->execute();
		$Risultato = $stmt->fetchAll(PDO::FETCH_ASSOC);	

		return $Risultato;
	}

