<?php

	$username = $_POST['username'];
	$nomeAmbiente = $_POST['nomeAmbiente'];
	$tipoAmbiente = $_POST['tipoAmbiente'];

	
	
	
	$dbh = new PDO("mysql:dbname=iotredbamboo;host=localhost", "root", "");
	

		
		$stmt = $dbh->prepare( "INSERT INTO `ambienti` (`IdAmbiente`, `NomeAmbiente`, `TipologiaAmbiente`, `Username`)
	VALUES (NULL, :nomeAmbiente, :tipoAmbiente, :username)");
		$stmt->bindParam(':nomeAmbiente', $nomeAmbiente);
		$stmt->bindParam(':tipoAmbiente', $tipoAmbiente);
		$stmt->bindParam(':username', $username);
		$stmt->execute();
		
	
	  
	  	header('location:../view/Admin/HomeAdmin.php');
	  