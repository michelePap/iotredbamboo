<?php


    $dbh = new PDO('mysql:dbname=iotredbamboo;host=localhost', 'root', '');
	$stmt = $dbh->prepare( 'SELECT * FROM `utenti` WHERE `Privilegi` = 0');
	$stmt->execute();
	$RisultatoClienti = $stmt->fetchAll(PDO::FETCH_ASSOC);