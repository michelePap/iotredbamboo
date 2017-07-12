<?php

    $dbh = new PDO("mysql:dbname=iotredbamboo;host=localhost", "root", "");
	$stmt = $dbh->prepare( 'SELECT * FROM `tiposensore`');
	$stmt->execute();
	$RisultatoTipoSensori = $stmt->fetchAll(PDO::FETCH_ASSOC);