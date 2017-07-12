<?php


    $dbh = new PDO("mysql:dbname=iotredbamboo;host=localhost", "root", "");
	$stmt = $dbh->prepare( 'SELECT * FROM `marcasensore`');
	$stmt->execute();
	$RisultatoMarcaSensori = $stmt->fetchAll(PDO::FETCH_ASSOC);