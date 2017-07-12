<?php


function interrogazioneSensori($stringa){

	$dbh = new PDO('mysql:dbname=iotredbamboo;host=localhost', 'root', '');
	$stmt = $dbh->prepare( 'SELECT * FROM `sensori` WHERE `IdAmbiente` = :stringa');
	$stmt->bindParam(':stringa', $stringa);
	$stmt->execute();
	$Risultato = $stmt->fetchAll(PDO::FETCH_ASSOC);	

	return $Risultato;
}

function interrogazioneSensoriAdmin(){

	$dbh = new PDO('mysql:dbname=iotredbamboo;host=localhost', 'root', '');
	$stmt = $dbh->prepare( 'SELECT * FROM `sensori`, `ambienti` WHERE `sensori`.`IdAmbiente` = `ambienti`.`IdAmbiente`');
	$stmt->execute();
	$Risultato = $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $Risultato;
}