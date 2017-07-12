<?php

	$ambienteget = $_POST['IdAmbiente'];
	
	$pos = strpos ("$ambienteget","_");
	  
	$IdAmbiente = substr($ambienteget,0, (string)$pos);

	$csrf5 = 'io';
	$csrf6 = 'io';
	
	$dbh = new PDO("mysql:dbname=iotredbamboo;host=localhost", "root", "");
	

		
		$stmt = $dbh->prepare( "DELETE FROM `ambienti` WHERE `ambienti`.`IdAmbiente` = :IdAmbiente");
		$stmt->bindParam(':IdAmbiente', $IdAmbiente);
		$stmt->execute();
		

	  	header('location:../view/Admin/HomeAdmin.php');
